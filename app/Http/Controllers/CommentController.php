<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\comment;
use Input,File;


class CommentController extends Controller
{
    public function pustcomment(Request $request)
    {
    	$idpost = $request['idpost'];
    	$iduser = $request['iduser'];
    	$noidung = $request['message'];
    	$check =substr($idpost,0,3);
        $comment = new comment(); 
        $comment->idpost = $idpost;
        $comment->iduser = $iduser;
        $comment->noidung = $noidung;
        $comment->save(); 
        return redirect()->back();
    }
}
