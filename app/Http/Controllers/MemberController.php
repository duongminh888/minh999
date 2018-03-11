<?php

namespace App\Http\Controllers;

use App\Http\Requests\checkvaymoi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use Validator;
use App\member;
use App\fileupload;
use App\thongtinkhachhang;
use App\hoso;
use Input,File;

class MemberController extends Controller
{
    //
    public function vaylaicheck(Request $request)
    {
    	$sdt = $request['sdt'];
    	$check = DB::table('member')->select('id')->where('sdt',$sdt)->get();
        if(count($check) == 1){
            foreach ($check as $key) {
                $idmember = $key->id;
            }
            return redirect()->route('mcontrol')->withCookie(cookie('idmember', $idmember, 60));
        }else{
            return redirect()->back()->with('message', 'Bạn nhập sai số điện thoại, Vui lòng nhập lại.');
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
    public function vaymoicheck(checkvaymoi $request)
    {
        $hoten = $request['hoten'];
        $cmt = $request['cmt'];
        $sdt = $request['sdt'];
        $sotien = $request['sotien'];
        $songayvay = $request['songayvay'];
    	$check = DB::table('member')->where('sdt',$sdt)->select('pgd','id')->get();
        if($request->hasFile('myfile')){
            $file = $request->myfile;
            if ($file->getSize() > 5000000) {
                return redirect()->back()->with('loifile', 'File dung lượng không được vượt quá 5mb.');
            }    
        }
    	if (count($check) == 0) {
            $member = new member(); 
            $member->hoten = $hoten;
            $member->cmt = $cmt;
            $member->pgd = 0;
            $member->sdt = $sdt;
            $member->save(); 
            $lastid =  DB::getPdo()->lastInsertId();
            $hoso = new hoso(); 
            $hoso->idmember = $lastid;
            $hoso->stt = 1;
            $hoso->trangthaihopdong = 1;
            $hoso->loaivay = 1;
            $hoso->pgd = 0;
            $hoso->sotienvay = $sotien;
            $hoso->songay = $songayvay;
            $hoso->save(); 
            $lastidhoso =  DB::getPdo()->lastInsertId();

            $thongtinkhachhang = new thongtinkhachhang(); 
            $thongtinkhachhang->idmember = $lastid;
            $thongtinkhachhang->save();
    	}else if(count($check) == 1){
            foreach ($check as $key) {
                $checkidmember = $key->id;
                $pgd = $key->pgd;
            }
            if ($pgd==0) {
                return redirect()->route('mcontrol')->withCookie(cookie('idmember', $checkidmember, 60));
            }
            $checkhoso = DB::table('hoso')->select('idmember')->where('idmember',$checkidmember)->get();
            $hoso = new hoso(); 
            $hoso->idmember = $checkidmember;
            $hoso->stt = count($checkhoso)+1;
            $hoso->trangthaihopdong = 1;
            $hoso->pgd = $pgd;
            $hoso->loaivay = 1;
            $hoso->sotienvay = $sotien;
            $hoso->songay = $songayvay;
            $hoso->save();
            $lastidhoso =  DB::getPdo()->lastInsertId();
            $lastid = $checkidmember;
    	}else{
        	return redirect()->back();
        }
        if($request->hasFile('myfile')){
            $t= time();
            $linkcai = $t.'-'.$file->getClientOriginalName();
            $namefile = $file->getClientOriginalName();
            // $linkcai = str_slug($linkcai, "-");
            $file->move('public/file',$linkcai); 
            $fileupload = new fileupload(); 
            $fileupload->idhoso = $lastidhoso;
            $fileupload->name = $namefile;
            $fileupload->link = $linkcai;
            $fileupload->save();
        }
        return redirect()->route('mcontrol')->withCookie(cookie('idmember', $lastid, 60));
    }
    public function mcontrol(Request $request)
    {
        $idmember = $request->cookie('idmember');
        $member = DB::table('member')->select('pgd')->where('id',$idmember)->get();
        foreach ($member as $key) {
            $pgd = $key->pgd;
        }
        $phonggiaodich = DB::table('phonggiaodich')->get();
        $hoso = DB::table('hoso')->where('idmember',$idmember)->get();
        $trangthaihoso = DB::table('trangthaihoso')->get();
        return view('mcontrol',['pgd'=>$pgd,'phonggiaodich'=>$phonggiaodich,'hoso'=>$hoso,'trangthaihoso'=>$trangthaihoso]);
    }
    public function picpgd(Request $request, $id)
    {
        $idmember = $request->cookie('idmember');
        $check = DB::table('member')->where('id',$idmember)->select('pgd','id')->get();
        foreach ($check as $key) {
            $checkidmember = $key->id;
            $pgd = $key->pgd;
        }
        if ($pgd != 0) {
            return redirect()->route('mcontrol')->withCookie(cookie('idmember', $checkidmember, 60));
        }
        $hoso = DB::table('hoso')->where('idmember',$idmember)->select('id')->get();
        foreach ($hoso as $key) {
            hoso::where('id', $key->id)
                ->update([
                'pgd' => $id,
            ]);
        }
        member::where('id', $idmember)
            ->update([
            'pgd' => $id,
        ]);
        return redirect()->route('mcontrol');
    }
}
