<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Model\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = Role::orderBy('id', 'desc')->paginate(10);
        $page  = 'role.list';
        $title = 'Role list';
        $data  = compact('lists','page','title');
        return view('admin.layout',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page  = 'role.add';
        $title = 'Add role';
        $data  = compact('page', 'title');
        return view('admin.layout',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'        => 'required',
        ];
        
        $request->validate($rules);
        $input = $request->all();

        $obj = new Role($input);
        $obj->save();

        return redirect(url('admin/role'))->with('success', 'Success! New record has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function show(Role $pages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role, Request $request)
    {
        $edit = $role;
        $request->replace($edit->toArray());       
        $request->flash();
        $page  = 'role.edit';
        $title = 'Role Edit';
        $data  = compact('page', 'title','edit','request');

        // return data to view
        return view('admin.layout', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $rules = [
            'name'        => 'required',
        ];
        $request->validate($rules);

        $obj = $role;
        $obj->name = $request->name;
        $obj->update();

        return redirect(url('admin/role'))->with('success', 'Success! New record has been added.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->back()->with('success', 'Success! Record has been deleted');
    }

    public function destroyAll(Request $request)
    {
        
        $ids = $request->sub_chk;
        // dd($ids);
        Role::whereIn('id', $ids)->delete();
        return redirect()->back()->with('success', 'Success! Select record(s) have been deleted');
    }
}
