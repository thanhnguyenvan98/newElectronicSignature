<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\teacher;

class loginController extends Controller
{
    //
    public function getView(){
    	return view('login');
    }

    public function check(Request $request){

    	$username = $request->username;
    	$pass = $request->pass;

    	//echo $username . " ---- " . $pass;

    	$teacher = teacher::all()->toArray();
    	//var_dump($teacher);
    	$dem = 0;
    	foreach ($teacher as $key => $value) {
    		if ($value['teacher_userName'] == $username && $value['teacher_password'] == $pass) {
    			# code...
    			$dem = 1;
    		}
    	}
    	if ($dem == 1) {
			return view('home');
			
    	}
    	else{
    		# code...
    		$error = "tai khoan hoac mat khau khong chinh xac";
    		return view('login',compact($error));
    	}
    }
}
