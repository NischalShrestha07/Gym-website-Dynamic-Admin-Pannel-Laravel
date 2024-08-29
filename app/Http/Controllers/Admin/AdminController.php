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
        return view('admin.trainers.trainer');
    }
    public function membership()
    {
        return view('admin.memberships.membership');
    }
    public function class()
    {
        return view('admin.class_schedules.class');
    }
    public function billing()
    {
        return view('admin.billings.billing');
    }
    public function setting()
    {
        return view('admin.setting');
    }
}
