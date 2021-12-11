<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function index()
    {
        if (auth()->user()) {
            return redirect(url('/admin/home'));
        }else{
            // dd('home');
            // return redirect(url('/admin'));
            
            $page = 'login';
            $title = 'Login  page';
            $data = compact('page', 'title');

            return view('admin.layout', $data);
        }
        // return view('welcome');
    }
}
