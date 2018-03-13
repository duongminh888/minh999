<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\nhanvien_donvay;
use App\member;
use App\comment;
use App\shophoso;
use App\User;
use App\hoso;
use App\phonggiaodich;
use App\chucvu;
use App\nhanvien_pgd;
use Illuminate\Support\Facades\Auth;
use App\fileupload;
use App\trangthaihoso;
use Image;
use Input,File;
use App\Http\Requests\thayavatar;
use App\thongtinkhachhang;
use Illuminate\Database\Eloquent\Model;


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
    public function dashboard()
    {
    	return view('dashboard',['menu'=>'dashboard']);
    }
    public function chart()
    {
    	// return view('morris');
    }
    public function demomember()
    {
    	return view('demomember',['menu'=>'demomember']);
    }
    public function thanhvien()
    {
        $user = DB::table('users')->select('id','name','email','rule','hoten','sdt','avatar','gioitinh','phong')->get();
        $chucvu = DB::table('chucvu')->get();
        $phonggiaodich = DB::table('phonggiaodich')->get();
        return view('thanhvien',['user'=>$user,'chucvu'=>$chucvu,'menu'=>'thanhvien','phonggiaodich'=>$phonggiaodich]);
    }
    public function donxinvay()
    {
        $trangthaihoso= DB::table('trangthaihoso')->get();
        $chucvu= DB::table('chucvu')->get();
        $users= DB::table('users')->select('id','hoten')->get();
        $nhanvien_donvay= DB::table('nhanvien_donvay')->get();
        $ttkh = DB::table('thongtinkhachhang')->select('id','idmember')->get();
        $member = DB::table('member')->select('id','hoten','sdt','cmt')->get();
        $phong = Auth::user()->phong;
        if (Auth::user()->rule == 1 || Auth::user()->rule == 2) {
            $hoso = DB::table('hoso')->paginate(20);
        }elseif (Auth::user()->rule == 3) {
            $hoso = DB::table('hoso')->where('pgd',$phong)->paginate(20);
        }elseif (Auth::user()->rule == 4) {
            $checkmem = DB::table('users')->select('hoten','id','avatar','rule')->where('phong',$phong)->whereIn('rule',[6,3])->get();
            $hoso = DB::table('hoso')->where('pgd',$phong)->paginate(20);
            return view('donxinvay',['member'=>$member,'hoso'=>$hoso,'ttkh'=>$ttkh,'trangthaihoso'=>$trangthaihoso,'menu'=>'donxinvay','checkmem'=>$checkmem,'chucvu'=>$chucvu,'nhanvien_donvay'=>$nhanvien_donvay,'users'=>$users]);
        }elseif (Auth::user()->rule == 5) {
            $hoso = DB::table('hoso')->where('trangthaihopdong',4)->where('pgd',$phong)->paginate(20);
        }elseif (Auth::user()->rule == 6) {
            $hoso = DB::table('hoso')->where('trangthaihopdong',1)->where('pgd',$phong)->paginate(20);
            return view('donxinvay',['member'=>$member,'hoso'=>$hoso,'ttkh'=>$ttkh,'trangthaihoso'=>$trangthaihoso,'menu'=>'donxinvay','nhanvien_donvay'=>$nhanvien_donvay,'users'=>$users]);
        }
        return view('donxinvay',['member'=>$member,'hoso'=>$hoso,'ttkh'=>$ttkh,'trangthaihoso'=>$trangthaihoso,'nhanvien_donvay'=>$nhanvien_donvay,'menu'=>'donxinvay','users'=>$users]);
    }
    public function hoadon($id)
    {
        $idcomment='pos'.$id;
        $users = DB::table('users')->select('name','hoten','id','avatar','sdt')->get();
        $hoso = DB::table('hoso')->where('id',$id)->get();
        foreach ($hoso as $key) {
            $idmember = $key->idmember;
            $pgd = $key->pgd;
        }
        $checkmem = DB::table('users')->select('hoten','id','avatar')->where('phong',$pgd)->get();
        $nhanvien_donvay = DB::table('nhanvien_donvay')->where('idhoso',$id)->get();
        if (Auth::user()->rule == 3 || Auth::user()->rule == 4 || Auth::user()->rule == 5) {
            if (Auth::user()->phong != $pgd) {
                return redirect()->route('donxinvay');
            }
        }
        if (Auth::user()->rule == 6) {
            $checkuser = DB::table('nhanvien_donvay')->where('idnhanvien',Auth::user()->id)->where('idhoso',$id)->get();
            if (Auth::user()->phong != $pgd || count($checkuser) == 0) {
                return redirect()->route('donxinvay');
            }
        }
        if (Auth::user()->rule == 7) {
            return redirect()->route('tatcadonvay');
        }
        $loaivay = DB::table('loaivay')->get();
        $trangthaihoso = DB::table('trangthaihoso')->get();
        $thongtinkhachhang = DB::table('thongtinkhachhang')->where('idmember',$idmember)->get();
        $member = DB::table('member')->select('id','hoten','sdt','cmt')->where('id',$idmember)->get();
        $comment = DB::table('comment')->where('idpost',$idcomment)->get();
        $fileupload = DB::table('fileupload')->where('idhoso',$id)->get();
        return view('hoadon',['member'=>$member,'hoso'=>$hoso,'trangthaihoso'=>$trangthaihoso,'loaivay'=>$loaivay,'thongtinkhachhang'=>$thongtinkhachhang,'comment'=>$comment,'users'=>$users,'fileupload'=>$fileupload,'nhanvien_donvay'=>$nhanvien_donvay,'checkmem'=>$checkmem,'checkid'=>$id,'menu'=>'donxinvay']);
    }
    public function edithoso(Request $request)
    {
        if (auth::user()->rule == 4 || auth::user()->rule == 6) {
            $id = $request['idhoso'];
            $sotienvay = $request['sotienvay'];
            $loaivay = $request['loaivay'];
            $sotienphaitra = $request['sotienphaitra'];
            $laimoingay = $request['laimoingay'];
            $songay = $request['songay'];
            hoso::where('id', $id)
                ->update([
                'sotienvay' => $sotienvay,
                'sotienphaitra' => $sotienphaitra,
                'laimoingay' => $laimoingay,
                'loaivay' => $loaivay,
                'songay' => $songay,
            ]);
            $noidung = '"'.Auth::user()->hoten.'" '.' đã chỉnh sửa chi tiết hợp đồng';
            $comment = new comment(); 
            $comment->idpost = 'pos'.$id;
            $comment->iduser = Auth::user()->id;
            $comment->noidung = $noidung;
            $comment->save(); 
        }
        return redirect()->back()->with('message', 'Chỉnh sửa hợp đồng thành công.');
    }
    public function editthongtin(Request $request)
    {
        $id = $request['idthongtinkh'];
        $idhoso = $request['idhoso'];
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
        member::where('id', $id)
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
        $noidung = '"'.Auth::user()->hoten.'" '.' Đã sửa thông tin khách hàng';
        $comment = new comment(); 
        $comment->idpost = 'pos'.$idhoso;
        $comment->iduser = Auth::user()->id;
        $comment->noidung = $noidung;
        $comment->save(); 
        return redirect()->back()->with('message2', 'Chỉnh sửa hợp đồng thành công.');
    }
    public function editmember($id)
    {
        $user = DB::table('users')->select('id','name','email','rule','hoten','sdt','avatar','gioitinh')->where('id',$id)->get();
        $chucvu = DB::table('chucvu')->get();
        return view('editmember',['id'=>$id,'user'=>$user,'chucvu'=>$chucvu,'menu'=>'thanhvien']);
    }
    public function posteditmember(Request $request)
    {
        $id = $request['id'];
        $hoten = $request['hoten'];
        $sdt = $request['sdt'];
        $email = $request['email'];
        $gioitinh = $request['gioitinh'];
        $chucvu = $request['chucvu'];
        user::where('id', $id)
            ->update([
            'hoten' => $hoten,
            'sdt' => $sdt,
            'email' => $email,
            'gioitinh' => $gioitinh,
            'rule' => $chucvu,
        ]);
        return redirect()->back()->with('message', 'Chỉnh sửa thông tin thành công.');
    }
    public function themthanhvien()
    {
        $chucvu = DB::table('chucvu')->get();
        return view('themthanhvien',['chucvu'=>$chucvu]);
    }
    public function postthemthanhvien(Request $request)
    {
        $username = $request['username'];
        $password = $request['password'];
        $hoten = $request['hoten'];
        $sdt = $request['sdt'];
        $email = $request['email'];
        $gioitinh = $request['gioitinh'];
        $chucvu = $request['chucvu'];
        DB::table('users')->insert([
            'name' => $username,
            'password' => bcrypt('123456'),
            'hoten' => $hoten,
            'sdt' => $sdt,
            'email' => $email,
            'gioitinh' => $gioitinh,
            'rule' => $chucvu,
            'avatar' => 'user2-160x160.jpg',
        ]);
        return redirect()->back()->with('message', 'Thêm tài khoản '.$username.' thành công.');
    }
    public function khachhang()
    {
        $member = DB::table('member')->select('id','hoten','sdt','cmt')->get();
        return view('khachhang',['member'=>$member,'menu'=>'khachhang']);
    }
    public function chitietkhachhang($id)
    {
        $member = DB::table('member')->select('id','hoten','sdt','cmt')->where('id',$id)->get();
        $thongtinkhachhang = DB::table('thongtinkhachhang')->where('idmember',$id)->get();
        $hoso = DB::table('hoso')->get();
        return view('chitietkhachhang',['member'=>$member,'thongtinkhachhang'=>$thongtinkhachhang,'hoso'=>$hoso,'menu'=>'khachhang']);
    }
    public function profile($name)
    {
        $user = DB::table('users')->select('id','name','email','rule','hoten','sdt','avatar','gioitinh','diachi','mota')->where('name',$name)->get();
        foreach ($user as $key) {
            $id=$key->id;
        }
        $idcomment='mem'.$id;
        $comment = DB::table('comment')->where('idpost',$idcomment)->get();
        $users = DB::table('users')->select('hoten','id','avatar')->get();

        $chucvu = DB::table('chucvu')->get();
        return view('profile',['user'=>$user,'chucvu'=>$chucvu,'comment'=>$comment,'users'=>$users,'menu'=>'profile']);
    }
    public function thayavatar(thayavatar $request)
    {
        $id = $request->id;
        if ($request->hasFile('myfile')) {
            $file = $request->file('myfile');
            $link = DB::table('users')->select('avatar')->where('id',$id)->get();
            foreach ($link as $key) {
                $a = $key->avatar;
            }
            if ($a != 'user2-160x160.jpg') {
                File::delete('public/avatar/'.$a);
            }
            $fileName = $file -> getClientOriginalName('myfile');
            $fileName = str_slug($fileName, '-');
            $fileName = $fileName.'.'.$file -> getClientOriginalExtension('myfile');
            $t=time();
            $a =  $t.'_'.$fileName;
            $file->move('public/avatar',$a);
            $doiten = 'public/avatar/'.$a;
            $img = Image::make($doiten)->resize(300, 300)->save($doiten);
            user::where('id', $id)
                ->update([
                'avatar' => $a,
            ]);

            return redirect()->back()->with('message', 'Chỉnh sửa avatar thành công.');
        }else{
            return redirect()->back();
        }
    }
    public function thaythongtincanhan(Request $request)
    {
        $hoten = $request['hoten'];
        $sdt = $request['sdt'];
        $diachi = $request['diachi'];
        $motangan = $request['motangan'];
        $id = $request['id'];
        user::where('id', $id)
            ->update([
            'hoten' => $hoten,
            'sdt' => $sdt,
            'diachi' => $diachi,
            'mota' => $motangan,
        ]);
        return redirect()->back()->with('message', 'Chỉnh sửa thông tin thành công.');
    }
    public function doimatkhau(Request $request)
    {
        $mk1 = $request['password1'];
        $id = $request['id'];
        user::where('id', $id)
            ->update([
            'password' => bcrypt($mk1)
        ]);
        return redirect()->back()->with('message', 'Đổi mật khẩu thành công.');
    }
    public function deletefile($id)
    {
        $fileupload = DB::table('fileupload')->where('id',$id)->SELECT('link','name','idhoso')->get();
        foreach ($fileupload as $key) {
            $tenfilecu =  $key->link;
            $namefile =  $key->name;
            $idhoso =  $key->idhoso;
            File::delete('public/file/'.$tenfilecu);
        }
        fileupload::where('id', '=', $id)->delete();
        $noidung = '"'.Auth::user()->hoten.'" '.' Đã xóa file '.$namefile;
        if (substr($idhoso,0,3) == 'sop') {
            $comment = new comment(); 
            $comment->idpost = $idhoso;
            $comment->iduser = Auth::user()->id;
            $comment->noidung = $noidung;
            $comment->save(); 
        }else{
            $comment = new comment(); 
            $comment->idpost = 'pos'.$idhoso;
            $comment->iduser = Auth::user()->id;
            $comment->noidung = $noidung;
            $comment->save(); 
        }
        return redirect()->back()->with('message', 'Xóa file thành công.');
    }
    public function uploadfile(Request $request)
    {
        $id=$request['idhoso'];
        $fileupload = DB::table('fileupload')->where('idhoso',$id)->count();
        if ($fileupload >= 5) {
            return redirect()->back()->with('loifile', 'Hồ sơ này đã đạt giới hạn 5 File đính kèm.');
            # code...
        }
        if($request->hasFile('myfile')){
            $file = $request->myfile;
            if ($file->getSize() > 5000000) {
                return redirect()->back()->with('loifile', 'File dung lượng không được vượt quá 5mb.');
            }
            $t= time();
            $linkcai = $t.'-'.$file->getClientOriginalName();
            $namefile = $file->getClientOriginalName();
            // $linkcai = str_slug($linkcai, "-");
            $file->move('public/file',$linkcai); 
            $fileupload = new fileupload(); 
            $fileupload->idhoso = $id;
            $fileupload->name = $namefile;
            $fileupload->link = $linkcai;
            $fileupload->save();   
            $noidung = '"'.Auth::user()->hoten.'" '.' Đã tải lên file '.$namefile;
            if (substr($id,0,3) == 'sop') {
                $comment = new comment(); 
                $comment->idpost = $id;
                $comment->iduser = Auth::user()->id;
                $comment->noidung = $noidung;
                $comment->save(); 
            }
            $comment = new comment(); 
            $comment->idpost = 'pos'.$id;
            $comment->iduser = Auth::user()->id;
            $comment->noidung = $noidung;
            $comment->save(); 
            return redirect()->back()->with('message', 'Thêm file đính kèm thành công.');
        }
            return redirect()->back();
    }
    public function phonggiaodich()
    {
        if (Auth::user()->rule >2) {
            $phong = Auth::user()->phong;
            $phonggiaodich = DB::table('phonggiaodich')->where('id',$phong)->get();
        }else{
            $phonggiaodich = DB::table('phonggiaodich')->get();
        }

        $user = DB::table('users')->select('id','name','email','hoten','rule')->get();
        return view('phonggiaodich',['phonggiaodich'=>$phonggiaodich,'user'=>$user,'menu'=>'phonggiaodich']);
    }
    public function addpgd(Request $request)
    {
        $name = $request['tenpgd'];
        $giamdoc = $request['giamdoc'];
        $diachi = $request['diachi'];
        $phonggiaodich = new phonggiaodich(); 
        $phonggiaodich->name = $name;
        $phonggiaodich->giamdoc = $giamdoc;
        $phonggiaodich->diachi = $diachi;
        $phonggiaodich->save();   
        $lastid =  DB::getPdo()->lastInsertId();
        user::where('id', $giamdoc)
            ->update([
            'rule' => '4',
            'phong' => $lastid,
        ]);
        return redirect()->back()->with('message', 'Thêm phòng giao dịch thành công.');
    }
    public function editpgd(Request $request)
    {
        $id = $request['id'];
        $name = $request['tenpgd'];
        $giamdoc = $request['giamdoc'];
        $giamdocc = $request['giamdocc'];
        $diachi = $request['diachi'];
        if ($giamdoc == null) {
            return redirect()->back();
        }
        phonggiaodich::where('id', $id)
            ->update([
            'name' => $name,
            'giamdoc' => $giamdoc,
            'diachi' => $diachi,
        ]);
        user::where('id', $giamdocc)
            ->update([
            'phong' => null,
            'rule' => 6,
        ]);
        user::where('id', $giamdoc)
            ->update([
            'rule' => 4,
            'phong' => $id,
        ]);
        return redirect()->back()->with('message', 'Chỉnh sửa phòng giao dịch thành công.');
    }
    public function edittrangthai(Request $request)
    {
        $idhoso =$request['idhoso'];
        $trangthai =$request['trangthai'];
        if (substr($idhoso,0,3) == 'sop') {
            shophoso::where('id', substr($idhoso,3,4))
                ->update([
                'trangthaihopdong' => $trangthai,
            ]);
            $trangthaihoso = DB::table('trangthaihoso')->where('id',$trangthai)->select('name')->get();
            foreach ($trangthaihoso as $key) {
                $tentrangthai= $key->name;
            }
            $noidung = '"'.Auth::user()->hoten.'" '.' đã chọn trạng thái "'. $tentrangthai.'"';
            $comment = new comment(); 
            $comment->idpost = $idhoso;
            $comment->iduser = Auth::user()->id;
            $comment->noidung = $noidung;
            $comment->save(); 
        }else{
            if (Auth::user()->rule != 5 && $trangthai == 2) {
                return redirect()->back();
            }elseif(Auth::user()->rule != 6 && $trangthai == 3) {
                return redirect()->back();
            }elseif(Auth::user()->rule > 4 && $trangthai == 4) {
                return redirect()->back();
            }elseif(Auth::user()->rule > 4 && $trangthai == 5) {
                return redirect()->back();
            }elseif((Auth::user()->rule != 6 && $trangthai == 6) && (Auth::user()->rule != 4 && $trangthai == 6)) {
                return redirect()->back();
            }
            hoso::where('id', $idhoso)
                ->update([
                'trangthaihopdong' => $trangthai,
            ]);
            $trangthaihoso = DB::table('trangthaihoso')->where('id',$trangthai)->select('name')->get();
            foreach ($trangthaihoso as $key) {
                $tentrangthai= $key->name;
            }
            $noidung = '"'.Auth::user()->hoten.'" '.' đã chọn trạng thái "'. $tentrangthai.'"';
            $comment = new comment(); 
            $comment->idpost = 'pos'.$idhoso;
            $comment->iduser = Auth::user()->id;
            $comment->noidung = $noidung;
            $comment->save(); 
        }

        return redirect()->back()->with('message', 'Thay đổi trạng thái thành công.');
    }
    public function pgd($id)
    {
        $idcomment='pgd'.$id;
        $comment = DB::table('comment')->where('idpost',$idcomment)->get();
        $chucvu = DB::table('chucvu')->get();
        $giamdoc = DB::table('phonggiaodich')->where('id',$id)->select('giamdoc')->get();
        $users = DB::table('users')->select('name','hoten','id','avatar','sdt','rule','phong','email')->get();
        foreach ($giamdoc as $key) {
            $giamdoc = $key->giamdoc;
        }
        return view('pgd',['comment'=>$comment,'users'=>$users,'idpgd'=>$id,'giamdoc'=>$giamdoc,'chucvu'=>$chucvu]);
    }
    public function xoaphong($id)
    {
        user::where('id', $id)
            ->update([
            'phong' => null,
        ]);
        return redirect()->back()->with('message', 'Xóa nhân viên thành công.');
    }
    public function adduserpgd(Request $request)
    {
        $idpgd = $request['idpgd'];
        $iduser = $request['iduser'];
        //gogogogogogogo
        if ($iduser == 0) {
            return redirect()->back()->with('message', 'Bạn chưa chọn nhân viên.');
        }
        user::where('id', $iduser)
            ->update([
            'phong' => $idpgd,
        ]);
        return redirect()->back()->with('message', 'Thêm nhân viên thành công.');
    }
    public function addnhanvien(Request $request)
    {
        if (auth::user()->rule != 4) {
            return redirect()->back();
        }
        $user = $request['user'];
        $idpgd = $request['idpgd'];
        $nhanvien_donvay = new nhanvien_donvay(); 
        $nhanvien_donvay->idnhanvien = $user;
        $nhanvien_donvay->idhoso = $idpgd;
        $nhanvien_donvay->save();
        return redirect()->back()->with('message', 'Thêm nhân viên thành công.');
    }
    public function addmemhoso(Request $request)
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
            $nhanvien_donvay = DB::table('nhanvien_donvay')->where('idnhanvien',$memvalue)->where('idhoso',$value)->get();
            if (count($nhanvien_donvay) == 0) {
                $noidung = '"'.Auth::user()->hoten.'" '.' đã thêm "'.$hoten.'" vào quản lý hồ sơ ';
                $nhanvien_donvay = new nhanvien_donvay(); 
                $nhanvien_donvay->idnhanvien = $memvalue;
                $nhanvien_donvay->idhoso = $value;
                $nhanvien_donvay->save();
                $comment = new comment(); 
                $comment->idpost = 'pos'.$value;
                $comment->iduser = Auth::user()->id;
                $comment->noidung = $noidung;
                $comment->save(); 
            }
        }
        return redirect()->back()->with('message', 'Thêm nhân viên thành công.');
    }
    public function deletenvhs($id,$id2s)
    {
        if (Auth::user()->rule != 4) {
            return redirect()->back();
        }
        if (substr($id2s,0,3) == 'sop') {
            DB::table('nhanvien_donvay')->where('idnhanvien',$id)->where('idhoso',$id2s)->delete();
            $users = DB::table('users')->where('id',$id)->select('hoten')->get();
            foreach ($users as $key) {
                $hoten = $key->hoten;
            }
            $noidung = '"'.Auth::user()->hoten.'" '.' đã XÓA "'.$hoten.'" khỏi quản lý hồ sơ ';
            $comment = new comment(); 
            $comment->idpost = $id2s;
            $comment->iduser = Auth::user()->id;
            $comment->noidung = $noidung;
            $comment->save(); 
        }else{
            DB::table('nhanvien_donvay')->where('idnhanvien',$id)->where('idhoso',$id2s)->delete();
            $users = DB::table('users')->where('id',$id)->select('hoten')->get();
            foreach ($users as $key) {
                $hoten = $key->hoten;
            }
            $noidung = '"'.Auth::user()->hoten.'" '.' đã XÓA "'.$hoten.'" khỏi quản lý hồ sơ ';
            $comment = new comment(); 
            $comment->idpost = 'pos'.$id2s;
            $comment->iduser = Auth::user()->id;
            $comment->noidung = $noidung;
            $comment->save(); 
        }
        return redirect()->back()->with('message', 'Xóa nhân viên thành công.');
    }
}
