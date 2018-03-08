<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\shophoso;
use App\comment;
use App\users;
use App\trangthaihoso;
use App\thongtinkhachhang;
use App\fileupload;
use Image;
use Input,File;
use App\Http\Requests\thayavatar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class ShopController extends Controller
{
    //
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function themdonvay()
    {
    	return view('shop/themdonvay',['menu'=>'themdonvay']);
    }
    public function tatcadonvay()
    {
        if (Auth::user()->rule==4) {
            $giamdoc = Db::table('phonggiaodich')->where('giamdoc',auth::user()->id)->get();
            
        }
        $id= Auth::user()->id;
        if (Auth::user()->rule == 7) {
            $shophoso = Db::table('shophoso')->where('idmember',$id)->get();
        }elseif(Auth::user()->rule < 4){
            $shophoso = Db::table('shophoso')->get();
        }
        $nameshop = DB::table('users')->where('rule','7')->select('id','name')->get();
        $trangthaihoso = Db::table('trangthaihoso')->get();
        return view('shop/tatcadonvay',['shophoso'=>$shophoso,'trangthaihoso'=>$trangthaihoso,'menu'=>'tatcadonvay','nameshop'=>$nameshop]);
    }
    public function shopadddonvay(Request $request)
    {
        $hoten = $request['hoten'];
        $cmt = $request['cmt'];
        $sdt = $request['sdt'];
        $sotien = $request['sotien'];
        $songayvay = $request['songayvay'];
        if($request->hasFile('myfile')){
            $file = $request->myfile;
            if ($file->getSize() > 5000000) {
                return redirect()->back()->with('canhbao', 'File dung lượng không được vượt quá 5mb.');
            }    
        }elseif (Auth::user()->rule == 7) {
            return redirect()->back()->with('canhbao', 'Chức năng này chỉ dành cho tài khoản shop.');
        }
        $shophoso = new shophoso(); 
        $shophoso->idmember = Auth::user()->id;
        $shophoso->trangthaihopdong = 1;
        $shophoso->loaivay = 1;
        $shophoso->hoten = $hoten;
        $shophoso->cmt = $cmt;
        $shophoso->sdt = $sdt;
        $shophoso->sotienvay = $sotien;
        $shophoso->songay = $songayvay;
        $shophoso->save();
        $lastidhoso =  DB::getPdo()->lastInsertId();
        if($request->hasFile('myfile')){
            $t= time();
            $linkcai = $t.'-'.$file->getClientOriginalName();
            $namefile = $file->getClientOriginalName();
            // $linkcai = str_slug($linkcai, "-");
            $file->move('public/file',$linkcai); 
            $fileupload = new fileupload(); 
            $fileupload->idhoso = 'sop'.$lastidhoso;
            $fileupload->name = $namefile;
            $fileupload->link = $linkcai;
            $fileupload->save();
        }
        return redirect()->back()->with('thongbao', 'Thêm đơn vay thành công.');
    }
    public function hoadonshop($id)
    {
        $idcomment='sop'.$id;
        $idmember='sop'.Auth::user()->id;
        $shophoso = DB::table('shophoso')->where('id',$id)->get();
        $loaivay = DB::table('loaivay')->get();
        $trangthaihoso = DB::table('trangthaihoso')->get();

        $thongtinkhachhang = DB::table('thongtinkhachhang')->where('idmember',$idmember)->get();
        if (count($thongtinkhachhang) == 0) {
            $thongtinkhachhang = new thongtinkhachhang(); 
            $thongtinkhachhang->idmember = $idmember;
            $thongtinkhachhang->save();
        }
        $thongtinkhachhang = DB::table('thongtinkhachhang')->where('idmember',$idmember)->get();

        $comment = DB::table('comment')->where('idpost',$idcomment)->get();
        $users = DB::table('users')->select('hoten','id','avatar')->get();
        $fileupload = DB::table('fileupload')->where('idhoso','sop'.$id)->get();
        return view('shop/hoadonshop',['shophoso'=>$shophoso,'trangthaihoso'=>$trangthaihoso,'loaivay'=>$loaivay,'thongtinkhachhang'=>$thongtinkhachhang,'comment'=>$comment,'users'=>$users,'fileupload'=>$fileupload]);
    }
    public function editshophoso(Request $request)
    {
        $id = $request['idhoso'];
        $sotienvay = $request['sotienvay'];
        $loaivay = $request['loaivay'];
        $sotienphaitra = $request['sotienphaitra'];
        $laimoingay = $request['laimoingay'];
        $songay = $request['songay'];
        $trangthaihopdong = $request['trangthaihopdong'];
        shophoso::where('id', $id)
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
    public function editshopthongtin(Request $request)
    {
        $id = $request['idthongtinkh'];
        $hoten = $request['hoten'];
        $cmt = $request['cmt'];
        $ngaysinh = $request['ngaysinh'];
        $ngaycap = $request['ngaycap'];
        $gioitinh = $request['gioitinh'];
        $email = $request['email'];
        $loaidienthoai = $request['loaidienthoai'];
        $quanhenguoithan = $request['quanhenguoithan'];
        $luongtb = $request['luongtb'];
        $hopdong = $request['hopdong'];
        $mathenh = $request['mathenh'];
        $nghenghiep = $request['nghenghiep'];
        $sdtnoilam = $request['sdtnoilam'];
        $loaithanhtoan = $request['loaithanhtoan'];
        $tennganhang = $request['tennganhang'];
        $chinhanh = $request['chinhanh'];
        shophoso::where('id', substr($id,3,4))
            ->update([
            'hoten' => $hoten,
            'cmt' => $cmt,
        ]);
        thongtinkhachhang::where('idmember', $id)
            ->update([
            'ngaysinh' => $ngaysinh,
            'ngaycap' => $ngaycap,
            'gioitinh' => $gioitinh,
            'email' => $email,
            'loaidienthoai' => $loaidienthoai,
            'quanhenguoithan' => $quanhenguoithan,
            'luongtb' => $luongtb,
            'hopdong' => $hopdong,
            'mathenh' => $mathenh,
            'nghenghiep' => $nghenghiep,
            'sdtnoilam' => $sdtnoilam,
            'loaithanhtoan' => $loaithanhtoan,
            'tennganhang' => $tennganhang,
            'chinhanh' => $chinhanh,
        ]);
        return redirect()->back()->with('message2', 'Chỉnh sửa hợp đồng thành công.');
    }
    public function giaingan($id)
    {
        $shophoso = DB::table('shophoso')->select('giaingan')->where('id',$id)->get();
        foreach ($shophoso as $key) {
            $giaingan = $key->giaingan;
        }
        if ($giaingan < 1) {
            shophoso::where('id', $id)
                ->update([
                'giaingan' => '1',
            ]);
            return redirect()->back()->with('message2', 'Giải ngân thành công.');
        }else{
            shophoso::where('id', $id)
                ->update([
                'giaingan' => null,
            ]);
            return redirect()->back()->with('message2', 'Hủy giải ngân thành công.');
        }
    }
}
