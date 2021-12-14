<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Color;
use Illuminate\Support\Str;
use App\Model\Inquery;
use App\Model\Price;
use App\Model\Setting;
use App\Model\Size;
use App\User;
use Image;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class InqueryController extends Controller
{
    public function index()
    {
        $lists  = Inquery::orderBy('id', 'desc')->with('category', 'size', 'color')->paginate(10);
        $page  = 'inquery.list';
        $title = 'Inquery list';
        $setting = Setting::find(1);
        $data  = compact('lists', 'page', 'title', 'setting');
        return view('admin.layout', $data);
    }

    public function create()
    {
        $page  = 'inquery.add';
        $title = 'Add Inquery';

        $category = Category::get();
        $categoryArr  = ['' => 'Select Category'];
        if (!$category->isEmpty()) {
            foreach ($category as $mcat) {
                $categoryArr[$mcat->id] = $mcat->name;
            }
        }

        $size = Size::get();
        $sizeArr  = ['' => 'Select Size'];
        // if (!$size->isEmpty()) {
        //     foreach ($size as $mcat) {
        //         $sizeArr[$mcat->id] = $mcat->name;
        //     }
        // }

        $color = Color::get();
        $colorArr  = ['' => 'Select Color'];
        // if (!$color->isEmpty()) {
        //     foreach ($color as $mcat) {
        //         $colorArr[$mcat->id] = $mcat->name;
        //     }
        // }

        $data  = compact('page', 'title', 'sizeArr', 'categoryArr', 'colorArr');
        return view('admin.layout', $data);
    }

    public function store(Request $request)
    {
        $maxInvoice     = Inquery::max('invoice_no');
        $invocieNo      = $maxInvoice + 1;

        $input = $request->except('_token');

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $path = public_path() . '/attechment/inquery';
            if (!file_exists($path)) {
                mkdir($path, 0775, true);
            }

            $filename = time() . $file->getClientOriginalName();
            $filename = str_replace(' ', '_', $filename);
            $file->move($path, $filename);

            $input['file'] = $filename;
        }

        $obj = new Inquery($input);
        $obj->invoice_no = $invocieNo;
        $obj->user_id = Auth::user()->id;
        $obj->save();

        $inquery = Inquery::where('id', $obj->id)->with('category', 'size', 'color')->first();
        $user = User::find($obj->user_id);
        $setting = Setting::find(1);
        $subject = 'Your Inquery has been received successfully.';

        Mail::send('email.inquery', ['setting' => $setting, 'user' => $user, 'subject' => $subject, 'inquery' => $inquery], function ($message) use ($user, $setting, $subject) {
            $message->to($user->email);
            $message->subject($subject);
            $message->from(env('MAIL_USERNAME'), $setting->title);
        });

        $data = [
            'status' => true
        ];

        return response()->json($data);
    }

    public function show(Inquery $inquery)
    {
        //
    }

    public function edit(Inquery $inquery, Request $request)
    {
        $edit = $inquery;
        $request->replace($edit->toArray());
        $request->flash();
        $page  = 'inquery.edit';
        $title = 'Inquery Edit';
        $data  = compact('page', 'title', 'edit', 'request');

        // return data to view
        return view('admin.layout', $data);
    }

    public function update(Request $request, Inquery $inquery)
    {
        $rules = [
            'name'        => 'required',
        ];
        $request->validate($rules);

        $obj = $inquery;
        $obj->name = $request->name;
        $obj->update();

        return redirect(url('admin/inquery'))->with('success', 'Success! New record has been added.');
    }

    public function destroy(Inquery $inquery)
    {
        $inquery->delete();
        return redirect()->back()->with('success', 'Success! Record has been deleted');
    }

    public function destroyAll(Request $request)
    {
        $ids = $request->sub_chk;
        Inquery::whereIn('id', $ids)->delete();
        return redirect()->back()->with('success', 'Success! Select record(s) have been deleted');
    }

    public function change_status(Request $request, $id)
    {
        $inquery = Inquery::findOrFail($id);
        $inquery->update([$request->field => $request->status]);
        // dd('fdgk',$inquery);

        return redirect()->back()->with('success', "{$request->field} status has been changed.");
    }

    public function invoicepdf(Request $request, $id)
    {
        // $inquery = Inquery::where('id', $id)->with('category', 'size', 'color')->first();
        // $user = User::find($inquery->user_id);
        // $setting = Setting::find(1);
        // $subject = 'Your Inquery has been received successfully.';

        // Mail::send('email.inquery', ['setting' => $setting, 'user' => $user, 'subject' => $subject, 'inquery' => $inquery], function ($message) use ($user, $setting, $subject) {
        //     $message->to($user->email);
        //     $message->subject($subject);
        //     $message->from(env('MAIL_USERNAME'), $setting->title);
        // });

        $list = Inquery::where('id', $id)->with('city_name', 'state_name', 'category', 'size', 'color', 'user')->first();

        $price = $list->price;
        //display the result
        $gst_price = ($price * 18) / 100;
        $total_price = $price + $gst_price;

        $inword_price = Inquery::convert_number_to_words($total_price);

        $setting = Setting::find(1);
        $logo_url = 'public/images/setting/logo/' . $setting->logo;
        $pdf = PDF::loadView('admin.inc.inquery.invoice', compact('list', 'setting', 'logo_url', 'price', 'gst_price', 'inword_price', 'total_price'));
        return $pdf->stream('invoice.pdf');
        // return view('admin.inc.inquery.invoice', compact('list', 'setting', 'logo_url', 'price', 'gst_price', 'inword_price', 'total_price'));
    }

    public function get_price(Request $request)
    {
        $list = Price::where('category_id', $request->category_id)->where('size_id', $request->size_id)->where('color_id', $request->color_id)->first();

        return response()->json($list->price);
    }
}
