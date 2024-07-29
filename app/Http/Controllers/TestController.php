<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function index(){
        return view('Home');
    }
    public function projTest(){
        return view('projTest');
    }
    public function debug(){
        return view('debug');
    }
    public function syntaxPract(){
        return view('syntaxPract');
    }
}
