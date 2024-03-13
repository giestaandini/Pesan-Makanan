<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function index() {
        return view('user');
    }

    // function user() {
    //     echo "Halo, Selamat Datang User";
    //     echo "<h1>". Auth::user()->name ."</h1>";
    //     echo "<a href='/logout'> Logout >> </a>";
    // }
    function user() {
        return view('user');
    }

    function admin() {
        return view('admin');
    }
}
