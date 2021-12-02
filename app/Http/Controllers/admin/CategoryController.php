<?php

namespace App\Http\Controllers\admin;

use App\Model\Category;
use Illuminate\Routing\Controller as BaseController;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    public function index()
    {
        $lists = Category::with('cat')->orderBy('id', 'desc')
            ->paginate(10);
        $cat = Category::get();

        $parentArr  = ['' => 'Select Category'];
        if (!$cat->isEmpty()) {
            foreach ($cat as $mcat) {
                $parentArr[$mcat->id] = $mcat->name;
            }
        }

        // set page and title ------------------
        $page  = 'category.add_category';
        $title = 'Add City';
        $data  = compact('page', 'title', 'lists', 'parentArr');

        // return data to view
        return view('admin.layout', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $rules = [
            'name'         => 'required',
        ];


        $request->validate($rules);
        $input = $request->all();
        $input['slug']    = $input['slug'] == '' ? Str::slug($input['name'], '-') : $input['slug'];
        // $input['password'] =  Hash::make($request->record['password']);  
        if ($request->hasFile('image')) {

            $image       = $request->file('image');
            $filename    = uniqid() . $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            // $image_resize->resize(750, 500);
            $image_resize->save(public_path('imgs/category/' . $filename));
            $input['image']   = $filename;
        }
        $obj = new Category($input);
        // $obj->images = json_encode($data);

        if ($obj->save()) {
            return redirect(url('admin/category'))->with('success', 'Success! New record has been added.');
        } else {
            return redirect(url('admin/category'))->with('danger', 'Error! Something going wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $edit     =  Category::find($id);
        $request->replace($edit->toArray());
        $request->flash();

        $cat = Category::get();

        $parentArr  = ['' => 'Select Category'];
        if (!$cat->isEmpty()) {
            foreach ($cat as $mcat) {
                $parentArr[$mcat->id] = $mcat->name;
            }
        }

        // set page and title ------------------
        $page = 'category.edit';
        $title = 'Edit Category';
        $data = compact('page', 'title', 'parentArr', 'id', 'edit');
        // return data to view

        return view('admin.layout', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $rules = [
            'name'         => 'required',
        ];


        $request->validate($rules);
        $input = $request->all();
        $input['slug']    = $input['slug'] == '' ? Str::slug($input['name'], '-') : $input['slug'];
        // $input['password'] =  Hash::make($request->record['password']);  
        if ($request->hasFile('image')) {

            $image       = $request->file('image');
            $filename    = uniqid() . $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            // $image_resize->resize(750, 500);
            $image_resize->save(public_path('imgs/category/' . $filename));
            $input['image']   = $filename;
        }

        $obj = Category::find($category->id);
        // $obj->save($input);
        if ($obj->update($input)) {
            return redirect(url('admin/category'))->with('success', 'Success! New record has been added.');
        } else {
            return redirect(url('admin/category'))->with('danger', 'Error! Something going wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $row)
    {
        $row->delete();
        return redirect()->back()->with('success', 'Success! Record has been deleted');
    }

    public function destroyAll(Request $request)
    {
        $ids = $request->sub_chk;
        // dd($ids);
        Category::whereIn('id', $ids)->delete();
        return redirect()->back()->with('success', 'Success! Select record(s) have been deleted');
    }
}
