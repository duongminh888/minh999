<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\shophoso;
use App\comment;
use App\users;
use App\trangthaihoso;
use App\nhanvien_donvay;
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
        $nameshop = DB::table('users')->where('rule','7')->select('id','name')->get();
        $trangthaihoso = Db::table('trangthaihoso')->get();
        $id= Auth::user()->id;
        if (Auth::user()->rule == 7) {
            $shophoso = Db::table('shophoso')->where('idmember',$id)->get();
        }elseif(Auth::user()->rule < 4){
            $shophoso = Db::table('shophoso')->get();
        }
        elseif(Auth::user()->rule == 4){
            $phong = Auth::user()->phong;
            $idshop = Db::table('users')->where('phong',$phong)->where('rule',7)->select('id')->get();
            $shophoso = Db::table('shophoso')->get();
            return view('shop/tatcadonvay',['shophoso'=>$shophoso,'trangthaihoso'=>$trangthaihoso,'menu'=>'tatcadonvay','nameshop'=>$nameshop,'idshop'=>$idshop]);
        }
        return view('shop/tatcadonvay',['shophoso'=>$shophoso,'trangthaihoso'=>$trangthaihoso,'menu'=>'tatcadonvay','nameshop'=>$nameshop]);
    }
    public function tatcadonvay2()
    {
        $nameshop = DB::table('users')->where('rule','7')->select('id','name')->get();
        $trangthaihoso = Db::table('trangthaihoso')->get();
        $id= Auth::user()->id;
        if (Auth::user()->rule == 7) {
            $shophoso = Db::table('shophoso')->where('idmember',$id)->paginate(20);
        }elseif(Auth::user()->rule < 4){
            $shophoso = Db::table('shophoso')->paginate(20);
        }
        elseif(Auth::user()->rule == 4){
            $phong = Auth::user()->phong;
            $idshop = Db::table('users')->where('phong',$phong)->where('rule',7)->select('id')->get();
            $shophoso = Db::table('shophoso')->paginate(20);
        }
        $checkmem = DB::table('users')->select('hoten','id','avatar','rule')->where('phong',$phong)->whereIn('rule',[6,3])->get();
        $users= DB::table('users')->select('id','hoten')->get();
        $member = DB::table('member')->select('id','hoten','sdt','cmt')->get();
        $chucvu= DB::table('chucvu')->get();
        $nhanvien_donvay= DB::table('nhanvien_donvay')->get();
        return view('shop/tatcadonvay2',['shophoso'=>$shophoso,'trangthaihoso'=>$trangthaihoso,'menu'=>'tatcadonvay','nameshop'=>$nameshop,'member'=>$member,'nhanvien_donvay'=>$nhanvien_donvay,'users'=>$users,'checkmem'=>$checkmem,'chucvu'=>$chucvu]);
    }

    public function addmemshop(Request $request)
    {
        if (auth::user()->rule != 4) {
            return redirect()->back();
        }
        $hosovalue = $request['hosovalue'];
        $memvalue = $request['memvalue'];
        if ($memvalue == 'Chọn nhân viên' || $memvalue == null) {
            return redirect()->back()->with('danger', 'Bạn chưa chọn nhân viên.');
        }
        $mang = explode (',', $hosovalue);
        if ($hosovalue == null) {
            return redirect()->back()->with('danger', 'Bạn chưa chọn hồ sơ.');
        }
        $users = DB::table('users')->where('id',$memvalue)->select('hoten')->get();
        foreach ($users as $key) {
            $hoten = $key->hoten;
        }
        foreach ($mang as $key => $value) {
            $value = 'sop'.$value;
            $nhanvien_donvay = DB::table('nhanvien_donvay')->where('idnhanvien',$memvalue)->where('idhoso',$value)->get();
            if (count($nhanvien_donvay) == 0) {
                $noidung = '"'.Auth::user()->hoten.'" '.' đã thêm "'.$hoten.'" vào quản lý hồ sơ ';
                $nhanvien_donvay = new nhanvien_donvay(); 
                $nhanvien_donvay->idnhanvien = $memvalue;
                $nhanvien_donvay->idhoso = $value;
                $nhanvien_donvay->save();
                $comment = new comment(); 
                $comment->idpost = $value;
                $comment->iduser = Auth::user()->id;
                $comment->noidung = $noidung;
                $comment->save(); 
            }
        }
        return redirect()->back()->with('message', 'Thêm nhân viên thành công.');
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
