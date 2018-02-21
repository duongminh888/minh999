<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\member;
use App\hoso;
use App\thongtinkhachhang;

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
    public function donxinvay()
    {
        $ttkh = DB::table('thongtinkhachhang')->select('id','idmember')->get();
        $member = DB::table('member')->select('id','hoten','sdt','cmt')->get();
        $hoso = DB::table('hoso')->get();
        return view('donxinvay',['member'=>$member,'hoso'=>$hoso,'ttkh'=>$ttkh]);
    }
    public function viewmember($id)
    {
        $member = DB::table('member')->select('id','hoten','sdt','cmt')->where('id',$id)->get();
        foreach ($member as $key) {
            $idmember = $key->id;
        }
        $hoso = DB::table('hoso')->where('idmember',$idmember)->get();
        return view('view-member',['member'=>$member,'hoso'=>$hoso]);
    }
}
