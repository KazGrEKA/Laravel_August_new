<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin() {
        return view('admin.admin');
    }
    public function add() {
        return view('admin.add');
    }

    public function show() {
        echo "<h3>Admin Panel</h3>
        <p>show news</p>";
        exit;
    }

    // update ..
    public function update() {
        echo "<h3>Admin Panel</h3>
                <p>update news</p>";
        exit;
    }
    public function delete() {
        echo "<h3>Admin Panel</h3>
        <p>delete news</p>";
        exit;
    }
}
