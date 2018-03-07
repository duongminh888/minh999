<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Requests\login;

class LoginController extends Controller
{
    //
    public function login()
    {
    	return view('login');
    }
    public function plogin(login $request)
    {
    	$email = $request['email'];
    	$password = $request['password'];
    	if (Auth::attempt(['email'=>$email,'password'=>$password])) {
            if (Auth::user()->rule == 7) {
                return redirect()->route('tatcadonvay');
            }
            return redirect()->route('index');
        }else{
        	$messages = 'Tên đăng nhập hoặc tài khoản không đúng!';
            return redirect()->back();
    	}
    }
}
