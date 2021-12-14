<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Color;
use Illuminate\Support\Str;
use App\Model\Price;
use App\Model\Size;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index()
    {
        $lists = Price::orderBy('id', 'desc')->with('category', 'size', 'color')->paginate(10);
        $page  = 'price.list';
        $title = 'Price list';
        $data  = compact('lists', 'page', 'title');
        return view('admin.layout', $data);
    }

    public function create()
    {
        $page  = 'price.add';
        $title = 'Add Price';

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
        $rules = [
            'category_id'      => 'required',
            'size_id'      => 'required',
            'color_id'      => 'required',
            'price'     => 'required',
        ];
        $messages = [
            'category_id.required'  => 'Please Select Category.',
            'size_id.required'  => 'Please Select Size.',
            'color_id.required'  => 'Please Select Color.',
            'price.required'  => 'Please Enter Price.'
        ];
        $request->validate($rules, $messages);
        if (Price::where('category_id', $request->category_id)->where('size_id', $request->size_id)->where('color_id', $request->color_id)->exists()) {
            return redirect()->back()->with('error', 'Error! This record already exists');
        } else {
            $input = $request->all();
            $obj = new Price($input);
            $obj->save();

            return redirect(url('admin/price'))->with('success', 'Success! New record has been added.');
        }
    }

    public function show(Price $price)
    {
        //
    }

    public function edit(Price $price, Request $request)
    {
        $edit = $price;
        $request->replace($edit->toArray());
        $request->flash();
        $page  = 'price.edit';
        $title = 'Price Edit';

        $category = Category::get();
        $categoryArr  = ['' => 'Select Category'];
        if (!$category->isEmpty()) {
            foreach ($category as $mcat) {
                $categoryArr[$mcat->id] = $mcat->name;
            }
        }

        $size = Size::where('category_id', $edit->category_id)->get();
        $sizeArr  = ['' => 'Select Size'];
        if (!$size->isEmpty()) {
            foreach ($size as $mcat) {
                $sizeArr[$mcat->id] = $mcat->name;
            }
        }

        $color = Color::where('category_id', $edit->category_id)->get();
        $colorArr  = ['' => 'Select Color'];
        if (!$color->isEmpty()) {
            foreach ($color as $mcat) {
                $colorArr[$mcat->id] = $mcat->name;
            }
        }

        $data  = compact('page', 'title', 'sizeArr', 'categoryArr', 'colorArr', 'edit', 'request');

        // return data to view
        return view('admin.layout', $data);
    }

    public function update(Request $request, Price $price)
    {
        $rules = [
            'category_id'      => 'required',
            'size_id'      => 'required',
            'color_id'      => 'required',
            'price'     => 'required',
        ];
        $messages = [
            'category_id.required'  => 'Please Select Category.',
            'size_id.required'  => 'Please Select Size.',
            'color_id.required'  => 'Please Select Color.',
            'price.required'  => 'Please Enter Price.'
        ];
        $request->validate($rules, $messages);
        $input = $request->all();

        if (Price::where('id', '!=', $price->id)->where('category_id', $request->category_id)->where('size_id', $request->size_id)->where('color_id', $request->color_id)->exists()) {
            return redirect()->back()->with('error', 'Error! This record already exists');
        } else {
            $obj = $price;
            $obj->fill($input);
            $obj->update();

            return redirect(url('admin/price'))->with('success', 'Success! New record has been added.');
        }
    }

    public function destroy(Price $price)
    {
        $price->delete();
        return redirect()->back()->with('success', 'Success! Record has been deleted');
    }

    public function destroyAll(Request $request)
    {
        $ids = $request->sub_chk;
        Price::whereIn('id', $ids)->delete();
        return redirect()->back()->with('success', 'Success! Select record(s) have been deleted');
    }
}
