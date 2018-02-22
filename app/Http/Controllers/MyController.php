<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\member;
use App\hoso;
use App\trangthaihoso;
use Illuminate\Database\Eloquent\Model;

use App\thongtinkhachhang;

class MyController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function test()
    {
        // hoso::where('laimoingay', null)
        //   ->update(['trangthaihopdong' => 1]);
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
    public function thanhvien()
    {
        return view('thanhvien');
    }
    public function donxinvay()
    {
        $ttkh = DB::table('thongtinkhachhang')->select('id','idmember')->get();
        $member = DB::table('member')->select('id','hoten','sdt','cmt')->get();
        $hoso = DB::table('hoso')->get();
        return view('donxinvay',['member'=>$member,'hoso'=>$hoso,'ttkh'=>$ttkh]);
    }
    public function hoadon($id)
    {
        $hoso = DB::table('hoso')->where('id',$id)->get();
        $trangthaihoso = DB::table('trangthaihoso')->get();
        foreach ($hoso as $key) {
            $idmember = $key->idmember;
        }
        $member = DB::table('member')->select('id','hoten','sdt','cmt')->where('id',$idmember)->get();
        return view('hoadon',['member'=>$member,'hoso'=>$hoso,'trangthaihoso'=>$trangthaihoso]);
    }
    public function edithoso(Request $request)
    {
        $id = $request['idhoso'];
        $sotienvay = $request['sotienvay'];
        $sotienphaitra = $request['sotienphaitra'];
        $laimoingay = $request['laimoingay'];
        $songay = $request['songay'];
        $trangthaihopdong = $request['trangthaihopdong'];
        hoso::where('id', $id)
            ->update([
            'sotienvay' => $sotienvay,
            'sotienphaitra' => $sotienphaitra,
            'laimoingay' => $laimoingay,
            'songay' => $songay,
            'trangthaihopdong' => $trangthaihopdong,
        ]);
    }
}
