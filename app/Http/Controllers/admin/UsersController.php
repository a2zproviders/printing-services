<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\City;
use Illuminate\Support\Str;
use App\User;
use Hash;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $lists = User::where('role_id',2)->orderBy('id', 'desc')->paginate(10);
        $page  = 'user.list';
        $title = 'User list';
        $data  = compact('lists', 'page', 'title');
        return view('admin.layout', $data);
    }

    public function create()
    {
        $page  = 'user.add';
        $title = 'Add User';

        $city = City::get();
        $cityArr  = ['' => 'Select City'];
        if (!$city->isEmpty()) {
            foreach ($city as $mcat) {
                $cityArr[$mcat->id] = $mcat->name;
            }
        }

        $data  = compact('page', 'title','cityArr');
        return view('admin.layout', $data);
    }

    public function store(Request $request)
    {
        $rules = [
            'name'      => 'required',
            'mobile'     => 'required|unique:users',
            'password'     => 'required|min:6',
        ];
        $messages = [
            'name.required'  => 'Please Enter Name.',
            'mobile.required'  => 'Please Enter Mobile.',
            'password.required'  => 'Please Enter Password.'
        ];
        $request->validate($rules, $messages);
        
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['role_id'] = 2;
        
        $obj = new User($input);
        $obj->save();

        return redirect(url('admin/user'))->with('success', 'Success! New record has been added.');
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user, Request $request)
    {
        $edit = $user;
        $request->replace($edit->toArray());
        $request->flash();
        $page  = 'user.edit';
        $title = 'User Edit';

        $city = City::get();
        $cityArr  = ['' => 'Select City'];
        if (!$city->isEmpty()) {
            foreach ($city as $mcat) {
                $cityArr[$mcat->id] = $mcat->name;
            }
        }

        $data  = compact('page', 'title', 'edit', 'request','cityArr');

        // return data to view
        return view('admin.layout', $data);
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'name'      => 'required',
            'mobile'     => 'required|unique:users,mobile,'.$user->id,
        ];
        $messages = [
            'name.required'  => 'Please Enter Name.',
            'mobile.required'  => 'Please Enter Mobile.',
        ];
        $request->validate($rules, $messages);
        $input = $request->all();
        if ($input['password']) {
            $input['password'] = Hash::make($input['password']);
        }else{
            $input['password'] = $user->password;
        }
        
        $obj = $user;
        $obj->fill($input);
        $obj->update();

        return redirect(url('admin/user'))->with('success', 'Success! New record has been added.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'Success! Record has been deleted');
    }

    public function status(User $user)
    {
        if ($user->status == 'enable') {
            $user->status = 'disable';
        }else{
            $user->status = 'enable';
        }
        $user->save();
        return redirect()->back()->with('success', 'Success! Status has been changed');
    }

    public function destroyAll(Request $request)
    {
        $ids = $request->sub_chk;
        User::whereIn('id', $ids)->delete();
        return redirect()->back()->with('success', 'Success! Select record(s) have been deleted');
    }
}
