<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index()
    {
    	return view('index');
    }
    public function gioithieu()
    {
    	return view('gioithieu');
    }
    public function help()
    {
    	return view('help');
    }
    public function lienhe()
    {
    	return view('lienhe');
    }
}
