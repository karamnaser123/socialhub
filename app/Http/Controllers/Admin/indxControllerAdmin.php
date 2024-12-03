<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indxControllerAdmin extends Controller
{
    public function dashboard()
    {
        return view('admin.index');
    }
    public function login()
    {
        return view('admin.auth.login');
    }
}
