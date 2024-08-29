<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function form()
    {
        return view('admin.form');
    }
    public function trainer()
    {
        return view('admin.trainer');
    }
    public function membership()
    {
        return view('admin.membership');
    }
    public function class()
    {
        return view('admin.class');
    }
    public function billing()
    {
        return view('admin.billing');
    }
    public function setting()
    {
        return view('admin.setting');
    }
}
