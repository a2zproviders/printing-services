<?php

namespace App\Http\Controllers\admin;

use Illuminate\Routing\Controller as BaseController;
use App\User;
use App\Model\Category;
use Illuminate\Support\Facades\Auth;

class DashboardController extends BaseController
{
    public function index()
    {
        if (!Auth::user()) {
            return redirect(url('admin'));
        } else {
            $page = 'dashboard';
            $title = 'Master Admin Dashboard';
            $user  = User::count();
            $category  = Category::count();


            $data = compact('page', 'title',  'category', 'user');

            return view('admin.layout', $data);
        }
    }
}
