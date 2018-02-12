<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\member;
use Input,File;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    //
    public function vaylaicheck(Request $request)
    {
    	$sdt = $request['sdt'];
    	$check = DB::table('member')->select('id')->where('sdt',$sdt)->get();
        if(count($check) == 1){
            $mem = DB::table('member')->select('id','hoten','sdt','cmt')->where('sdt',$sdt)->get();
            return view('mcontrol',['mem'=>$mem]);
        }
    }
    public function uploadpassmember(Request $request)
    {
    	$sdt = $request['sdt'];
    	$pass1 = $request['pass1'];
    	$pass2 = $request['pass2'];
    	if($pass1 == $pass2){
	        DB::table('member')->where('sdt',$sdt)->update(['password'=>bcrypt($pass1)]);
	        return 1;
    	}else{
    		return redirect()->back()->with('message', 'Mật khẩu bạn vừa nhập không khớp.');
    	}
    }
    public function ploginmemsdt(Request $request)
    {
    	# code...
    	$sdtmember = $request['sdtmember'];
    	$check = DB::table('member')->select('id','hoten','password')->where('sdt',$sdtmember)->get();
    	foreach ($check as $key) {
    		$hoten = $key->hoten;
    		$password = $key->password;
    	}
    	if (count($check) == 1) {
    		if (is_null($password)) {
	    		return view('loginmember2',['sdtmember'=>$sdtmember,'hoten'=>$hoten,'password'=>'1']);
	    	}else{
	    		return view('loginmember3',['sdtmember'=>$sdtmember,'hoten'=>$hoten,'password'=>'2']);
	    	}
    	}else{
    		return redirect()->back()->with('message', 'Số điện thoại không tồn tại.');
    	}
    }
    public function loginmember()
    {
    	return view('loginmember');
    }
    public function vaymoicheck(Request $request)
    {
    	$hoten = $request['hoten'];
    	$cmt = $request['cmt'];
    	$sdt = $request['sdt'];
    	$sotien = $request['sotien'];
    	$songayvay = $request['songayvay'];
    	$check = DB::table('member')->where('sdt',$sdt)->get();
    	if (count($check) == 0) {
            $member = new member(); 
            $member->hoten = $hoten;
            $member->cmt = $cmt;
            $member->sdt = $sdt;
            $member->save(); 
            $lastid =  DB::getPdo()->lastInsertId();
    		DB::table('hoso')->insert([
                'idmember' => $lastid,
                'sotienvay' => $sotien,
                'songay' => $songayvay,
            ]);
            $mem = DB::table('member')->select('id','hoten','sdt','cmt')->where('sdt',$sdt)->get();
            return view('mcontrol',['mem'=>$mem]);
    	}else if(count($check) == 1){
    		//nhap pass
    		// foreach ($check as $key) {
    		// 	$checkidmember = $key->id;
    		// }
    		// DB::table('hoso')->insert([
      //           'idmember' => $checkidmember,
      //           'sotienvay' => $sotien,
      //           'songay' => $songayvay,
      //       ]); 
    	}
    	return redirect()->back();
    }
    public function mcontrol()
    {
        return view('mcontrol');
    }
}
