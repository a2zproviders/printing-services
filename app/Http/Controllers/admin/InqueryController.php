<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Model\Inquery;
use App\Model\Setting;
use PDF;
use Illuminate\Http\Request;

class InqueryController extends Controller
{
    public function index()
    {
        $lists = Inquery::orderBy('id', 'desc')->with('state_name', 'city_name', 'plan')->paginate(10);
        $page  = 'inquery.list';
        $title = 'Inquery list';
        $data  = compact('lists', 'page', 'title');
        return view('admin.layout', $data);
    }

    public function create()
    {
        $page  = 'inquery.add';
        $title = 'Add Inquery';
        $data  = compact('page', 'title');
        return view('admin.layout', $data);
    }

    public function store(Request $request)
    {
        $rules = [
            'name'      => 'required',
            'price'     => 'required',
        ];
        $messages = [
            'name.required'  => 'Please Enter Name.',
            'price.required'  => 'Please Enter Price.'
        ];
        $request->validate($rules, $messages);

        $input = $request->all();

        $obj = new Inquery($input);
        $obj->save();

        return redirect(url('admin/inquery'))->with('success', 'Success! New record has been added.');
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

    public function changestatus(Request $request, $id)
    {
        $obj = Inquery::findOrFail($id);
        if ($obj->status == 'true') {
            $obj->status = 'false';
        } else {
            $obj->status = 'true';
        }
        $obj->save();
        return redirect()->back()->with('success', 'Success! Status has been changed.');
    }
    public function invoicepdf(Request $request, $id)
    {
        $list = Inquery::where('id', $id)->with('city_name', 'state_name', 'plan')->first();

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
}
