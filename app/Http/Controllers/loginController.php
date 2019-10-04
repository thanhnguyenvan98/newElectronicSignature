<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class loginController extends Controller
{
    //
    

    public function check(Request $request){

    	$username = $request->username;
    	$pass = $request->pass;
        $user = User::all()->toArray();
    	$dem = 0;
        $category = null;
        
    	foreach ($user as $key => $value) {
    		if ($value['user_userName'] == $username && $value['user_password'] == $pass) {
    			# code...
    			$dem = 1;
                if($dem = 1){
                    $userId = $value['user_id'];
                    $category = $value['user_category'];
                    session()->put('login', true);
                    session()->put('userId',$userId);
                    session()->put('category', $category);
                }
    		}
    	}


    	if ($dem == 1 && $category == 0) {
    		return  redirect()->route('homeView');
    	}elseif ($dem == 1 && $category == 1) {
            # code...
            return redirect()->route('homeLeaderView');
        }elseif ($dem == 1 && $category == 2) {
            # code...
            return redirect()->route('homeDeanView');
        }elseif ($dem == 1 && $category == 3) {
            # code...
            return redirect()->route('homeManagerView');
        }elseif ($dem == 1 && $category == 4) {
            # code...
            return redirect()->route('homeAdminView');
        }
    	if ($dem == 1) {
			return view('home');
			
    	}
        
    	else{
    		# code...
    		$error = "Tài khoản hoặc mật khẩu không chính xác";
            $data['error'] = $error;
    		return redirect()->route('loginView');
    	}
    }
}
