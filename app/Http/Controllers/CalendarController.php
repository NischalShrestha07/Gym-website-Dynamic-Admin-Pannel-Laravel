<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    public function index()
    {
        return view('admin.calendar');
        // if (Auth::user()->roleName === 'Admin') {
        //     return view('admin.calendar');
        // } elseif (Auth::user()->roleName === 'Trainer') {
        //     return view('admin.calendar');
        // } elseif (Auth::user()->roleName === 'Member') {
        //     return view('admin.calendar');
        // }
    }
}
