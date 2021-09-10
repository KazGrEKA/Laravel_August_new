<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $users = [];

    public function auth() {
        return view('auth');
    }
}
