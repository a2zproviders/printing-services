<?php

namespace App\Http\Controllers\admin;

use Illuminate\Routing\Controller as BaseController;
use App\User;
use App\Model\Category;

class DashboardController extends BaseController
{
    public function index()
    {
        $page = 'dashboard';
        $title = 'Master Admin Dashboard';
        $user  = User::count();
        $category  = Category::count();


        $data = compact('page', 'title',  'category', 'user');

        return view('admin.layout', $data);
    }
}
