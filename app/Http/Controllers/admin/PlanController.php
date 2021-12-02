<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Model\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $lists = Plan::orderBy('id', 'desc')->paginate(10);
        $page  = 'plan.list';
        $title = 'Plan list';
        $data  = compact('lists', 'page', 'title');
        return view('admin.layout', $data);
    }

    public function create()
    {
        $page  = 'plan.add';
        $title = 'Add Plan';
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

        $obj = new Plan($input);
        $obj->save();

        return redirect(url('admin/plan'))->with('success', 'Success! New record has been added.');
    }

    public function show(Plan $plan)
    {
        //
    }

    public function edit(Plan $plan, Request $request)
    {
        $edit = $plan;
        $request->replace($edit->toArray());
        $request->flash();
        $page  = 'plan.edit';
        $title = 'Plan Edit';
        $data  = compact('page', 'title', 'edit', 'request');

        // return data to view
        return view('admin.layout', $data);
    }

    public function update(Request $request, Plan $plan)
    {
        $rules = [
            'name'        => 'required',
        ];
        $request->validate($rules);

        $obj = $plan;
        $obj->name = $request->name;
        $obj->update();

        return redirect(url('admin/plan'))->with('success', 'Success! New record has been added.');
    }

    public function destroy(plan $plan)
    {
        $plan->delete();
        return redirect()->back()->with('success', 'Success! Record has been deleted');
    }

    public function destroyAll(Request $request)
    {
        $ids = $request->sub_chk;
        Plan::whereIn('id', $ids)->delete();
        return redirect()->back()->with('success', 'Success! Select record(s) have been deleted');
    }
}
