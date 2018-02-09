<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function simple()
    {
    	return view('simple');
    }
    public function index()
    {
    	return view('index');
    }
    public function chart()
    {
    	return view('morris');
    }
    public function demomember()
    {
    	return view('demomember');
    }
}
