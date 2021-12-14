<?php

namespace App\Http\Controllers\admin;

use Illuminate\Routing\Controller as BaseController;
use App\User;
use App\Model\Category;
use App\Model\Color;
use App\Model\Inquery;
use App\Model\Setting;
use App\Model\Size;
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
            $setting = Setting::find(1);
            if (Auth::user()->role_id == 1) {
                $user  = User::count();
                $category  = Category::count();
                $inquery  = Inquery::count();
                $color  = Color::count();
                $size  = Size::count();

                $data = compact('page', 'title',  'category', 'user', 'inquery', 'color', 'size', 'setting');
            } else {
                $lists  = Inquery::with('category', 'size', 'color')->where('user_id', Auth::user()->id)->paginate(10);

                $data = compact('page', 'title',  'lists', 'setting');
            }

            return view('admin.layout', $data);
        }
    }
}
