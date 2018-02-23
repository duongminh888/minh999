<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\member;
use App\hoso;
use App\trangthaihoso;
use App\thongtinkhachhang;
use Illuminate\Database\Eloquent\Model;


class MyController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function test()
    { 
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
        $loaivay = DB::table('loaivay')->get();
        $trangthaihoso = DB::table('trangthaihoso')->get();
        foreach ($hoso as $key) {
            $idmember = $key->idmember;
        }
        $thongtinkhachhang = DB::table('thongtinkhachhang')->where('idmember',$idmember)->get();
        $member = DB::table('member')->select('id','hoten','sdt','cmt')->where('id',$idmember)->get();
        return view('hoadon',['member'=>$member,'hoso'=>$hoso,'trangthaihoso'=>$trangthaihoso,'loaivay'=>$loaivay,'thongtinkhachhang'=>$thongtinkhachhang]);
    }
    public function edithoso(Request $request)
    {
        $id = $request['idhoso'];
        $sotienvay = $request['sotienvay'];
        $loaivay = $request['loaivay'];
        $sotienphaitra = $request['sotienphaitra'];
        $laimoingay = $request['laimoingay'];
        $songay = $request['songay'];
        $trangthaihopdong = $request['trangthaihopdong'];
        hoso::where('id', $id)
            ->update([
            'sotienvay' => $sotienvay,
            'sotienphaitra' => $sotienphaitra,
            'laimoingay' => $laimoingay,
            'loaivay' => $loaivay,
            'songay' => $songay,
            'trangthaihopdong' => $trangthaihopdong,
        ]);
        return redirect()->back()->with('message', 'Chỉnh sửa hợp đồng thành công.');
    }
    public function editthongtin(Request $request)
    {
        
    }
}
