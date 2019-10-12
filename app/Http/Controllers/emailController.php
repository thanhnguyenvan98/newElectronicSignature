<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\mail\sendMail;
use Mail;

class emailController extends Controller
{
    //

    public function sendMail($privateKey){


    	session()->put('privateKeyEmail', $privateKey);
    	$data = [];
    	Mail::send('mailfb',$data, function($msg){
    		$msg->from('n.v.thanh.26.10@gmail.com','Thanh Nguyen');
    		$msg->to('n.v.thanh.26.10@gmail.com','thanhNguyenVan')->subject('privateKey');
    	});
    	session()->put('feedBackSendEmail', 'Khóa cá nhân của bạn đã được gửi về Gmail');
    }
}
