<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function login()
    {
        return view('giris');
    }

    public function register()
    {
        return view('kayit');
    }

    public function home()
    {
        return view('home');
    }

    public function forgotPassword()
    {
        return view('sifre');
    }
}
