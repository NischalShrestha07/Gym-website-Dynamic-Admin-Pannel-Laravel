<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // Fetch the currently authenticated user
        // $user = Auth::user();
        // return view('admin.profile', compact('user'));
        return view('admin.profile');
    }
}
