<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonvayController extends Controller
{
    //
    public function test()
    { 
        // $data = App\nhanvien_donvay::find(1)->hoso->toArray();
        // $data = DB::table('nhanvien_donvay')->find(1)->hoso->toArray();
        $comments = App\nhanvien_donvay::find(1)->comments;
    }
}
