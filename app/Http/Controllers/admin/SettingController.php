<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\Setting;
use Illuminate\Http\Request;
use Image;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Setting $setting)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting, Request $request)
    {
        $edit = Setting::findOrFail(1);
        $request->replace($edit->toArray());
        $request->flash();
        $page = 'setting.edit';
        $title = 'Setting';
        $data = compact('page', 'title', 'edit');
        // return data to view

        return view('admin.layout', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $obj =  Setting::findOrFail(1);
        $input = $request->all();
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');

            $path = public_path() . '/imgs/logo/';
            if (!file_exists($path)) {
                mkdir($path, 0775, true);
            }
            $optimizeImage = Image::make($file);
            $optimizePath = public_path() . '/imgs/logo/';
            $filename = time() . $file->getClientOriginalName();
            $optimizeImage->save($optimizePath . $filename, 72);

            $input['logo'] = $filename;
        }
        if ($request->hasFile('favicon')) {
            $file = $request->file('favicon');

            $path = public_path() . '/imgs/favicon/';
            if (!file_exists($path)) {
                mkdir($path, 0775, true);
            }
            $optimizeImage = Image::make($file);
            $optimizePath = public_path() . '/imgs/favicon/';
            $filename = time() . $file->getClientOriginalName();
            $optimizeImage->save($optimizePath . $filename, 72);

            $input['favicon'] = $filename;
        }

        if ($request->hasFile('video')) {
            $file = $request->file('video');

            $path = public_path() . '/imgs/video/';
            if (!file_exists($path)) {
                mkdir($path, 0775, true);
            }
            // $optimizeImage = Image::make($file);
            $optimizePath = public_path() . '/imgs/video/';
            $filename = time() . $file->getClientOriginalName();
            // $optimizeImage->save($optimizePath . $filename, 72);
            $file->move($optimizePath, $filename);

            $input['video'] = $filename;
        }

        if ($request->hasFile('header_image')) {
            $file = $request->file('header_image');

            $path = public_path() . '/imgs/headerimage/';
            if (!file_exists($path)) {
                mkdir($path, 0775, true);
            }
            $optimizeImage = Image::make($file);
            $optimizePath = public_path() . '/imgs/headerimage/';
            $filename = time() . $file->getClientOriginalName();
            $optimizeImage->save($optimizePath . $filename, 72);

            $input['header_image'] = $filename;
        }


        $obj->update($input);

        return redirect()->back()->with('success', 'Success! Record has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        $setting->delete();
        return redirect()->back()->with('success', 'Success! Record has been deleted');
    }

    public function destroyAll(Request $request)
    {
        $ids = $request->sub_chk;
        // dd($ids);
        Setting::whereIn('id', $ids)->delete();
        return redirect()->back()->with('success', 'Success! Select record(s) have been deleted');
    }
}
