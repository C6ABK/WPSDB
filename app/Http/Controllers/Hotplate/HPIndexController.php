<?php

namespace App\Http\Controllers\Hotplate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HPIndexController extends Controller {
    public function index(){
        return view('hotplate.index');
    }
}
