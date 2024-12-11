<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function dashboard1()
    {
        return view('admin.dashboard1');
    }

    public function dashboard2()
    {
        return view('admin.dashboard2.dashboard2');
    }
}
