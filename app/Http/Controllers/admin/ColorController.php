<?php

namespace App\Http\Controllers\admin;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Model\Category;
use App\Model\Color;
use App\Model\Size;

class ColorController extends BaseController
{
    public function index(Request $request)
    {
        $lists = Color::with('category')
            ->orderBy('id', 'desc')
            ->paginate(10);

        // root category
        $category = Category::get();
        $parentArr  = ['' => 'Select Category'];
        if (!$category->isEmpty()) {
            foreach ($category as $mcat) {
                $parentArr[$mcat->id] = $mcat->name;
            }
        }

        // set page and title ------------------
        $page  = 'color.add_color';
        $title = 'Add Color';
        $data  = compact('page', 'title', 'lists', 'parentArr');

        // return data to view
        return view('admin.layout', $data);
    }
    public function list()
    {
        $lists = Color::orderBy('id', 'desc')
            ->paginate(10);

        // set page and title ------------------
        $page  = 'color.list';
        $title = 'Color List';
        $data  = compact('page', 'title', 'lists');
        // return data to view
        return view('admin.layout', $data);
    }
    public function create(Request $request)
    {
        $rules = [
            'record'        => 'required|array',
            'record.name'  => 'required|string',
            'record.category_id'  => 'required'
        ];

        $messages = [
            'record.category_id.required'  => 'Please Select Category.',
            'record.name.required'  => 'Please Enter Color Name.'
        ];

        $request->validate($rules, $messages);

        $record           = new Color;
        $input            = $request->record;
        // $input['slug']    = $input['slug'] == '' ? Str::slug($input['name'], '-'):$input['slug'];
        $record->fill($input);

        if ($record->save()) {
            return redirect(url('admin/color'))->with('success', 'Success! New record has been added.');
        } else {
            return redirect(url('admin/color'))->with('danger', 'Error! Something going wrong.');
        }
    }
    public function store(Request $request)
    {
        $rules = [
            'record'        => 'required|array',
            'record.name'  => 'required',
            'record.category_id'  => 'required'
        ];


        $messages = [
            'record.category_id.required'  => 'Please Select Category.',
            'record.name.required'  => 'Please Enter Color Name.'
        ];

        $request->validate($rules, $messages);

        $record           = new Color;
        $input            = $request->record;

        $record->fill($input);

        if ($record->save()) {
            return redirect(url('admin/color'))->with('success', 'Success! New record has been added.');
        } else {
            return redirect(url('admin/color'))->with('danger', 'Error! Something going wrong.');
        }
    }

    public function edit(Request $request, $id)
    {
        $edit     =  Color::with(['category'])->find($id);

        $editData =  ['record' => $edit->toArray()];

        $request->replace($editData);
        //send to view
        $request->flash();


        $category = Category::get();

        $parentArr  = ['' => 'Select Category'];
        if (!$category->isEmpty()) {
            foreach ($category as $mcat) {
                $parentArr[$mcat->id] = $mcat->name;
            }
        }

        // set page and title ------------------
        $page = 'color.edit';
        $title = 'Edit Color';
        $data = compact('page', 'title', 'parentArr', 'id', 'edit');
        // return data to view

        return view('admin.layout', $data);
    }
    public function update(Request $request, $id)
    {
        $record           = Color::find($id);
        $input            = $request->record;
        $record->fill($input);
        if ($record->save()) {
            return redirect(url('admin/color'))->with('success', 'Success! Record has been edided');
        }
    }
    public function destroy(Color $row)
    {
        $row->delete();
        return redirect()->back()->with('success', 'Success! Record has been deleted');
    }

    public function destroyAll(Request $request)
    {
        $ids = $request->sub_chk;
        // dd($ids);
        Color::whereIn('id', $ids)->delete();
        return redirect()->back()->with('success', 'Success! Select record(s) have been deleted');
    }

    public function get_category_wise(Request $request)
    {
        $colors = Color::where('category_id', $request->category_id)->get();
        $colorArr  = ['' => 'Select Color'];
        if (!$colors->isEmpty()) {
            foreach ($colors as $mcat) {
                $colorArr[$mcat->id] = $mcat->name;
            }
        }
        
        $sizes = Size::where('category_id', $request->category_id)->get();
        $sizeArr  = ['' => 'Select Size'];
        if (!$sizes->isEmpty()) {
            foreach ($sizes as $mcat) {
                $sizeArr[$mcat->id] = $mcat->name;
            }
        }

        $color_html = view('admin.template.color', compact('colorArr'))->render();
        $size_html = view('admin.template.size', compact('sizeArr'))->render();

        $data = [
            'color_html' => $color_html,
            'size_html' => $size_html,
        ];
        return response()->json($data);
    }
}
