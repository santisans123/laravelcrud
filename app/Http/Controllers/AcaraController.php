<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\acara;
use App\view;
use Auth;

class AcaraController extends Controller
{
    public function index() {
        return view('admin.acara.tambah');
    }
    public function view() {
        return view('posts.view');
    }
}
