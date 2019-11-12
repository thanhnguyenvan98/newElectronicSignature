<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\teacher;
use App\dean;
use App\leader;
use App\manager;

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
                        //tao session luu thong tin cua tai khoan vua dang nhap vao he thong
                        session()->put('login', true);
                        session()->put('userId',$userId);
                        session()->put('category', $category);
                    }
        		}
        	}


        	if ($dem == 1 && $category == 0) {
                //kiem tra xem tai khoan nay da cap rnhap thong tin tai khoan hay chua
                //neu chua chuyen den trang cap nhap tai khoan thong tin ca nhan
                $teachers = teacher::all();
                foreach ($teachers as $teacher) {
                    if ($userId == $teacher->user_id) {
                        $teacher = teacher::where('user_id',$userId)->get();
                        $image = $teacher->teacher_image;
                        $url = Storage::url($image);
                        session()->put('image', $url);
                        return  redirect()->route('homeView');
                    }
                }
                return redirect()->route('inforView');
        		
        	}elseif ($dem == 1 && $category == 1) {
                # code...
                $leaders = leader::all();
                foreach ($leaders as $leader) {
                    if ($userId == $leader->user_id) {
                        $leader = leader::where('user_id',$userId)->get();
                        $image = $leader->leader_image;
                        $url = Storage::url($image);
                        session()->put('image', $url);
                        return  redirect()->route('homeLeaderView');
                    }
                }
                return redirect()->route('inforView');

            }elseif ($dem == 1 && $category == 2) {
                # code...
                $deans = dean::all();
                foreach ($deans as $dean) {
                    if ($userId == $dean->user_id) {
                        $dean = dean::where('user_id',$userId)->get();
                        $image = $dean->dean_image;
                        $url = Storage::url($image);
                        session()->put('image', $url);
                        return  redirect()->route('homeDeanView');
                    }
                }
                return redirect()->route('inforView');
            }elseif ($dem == 1 && $category == 3) {
                # code...
                $managers = manager::all();
                foreach ($managers as $manager) {
                    if ($userId == $manager->user_id) {
                        $manager = manager::where('user_id',$userId)->get();
                        $image = $manager[0]->manage_image;
                        $url = Storage::url($image);
                        session()->put('image', $url);
                        return  redirect()->route('homeManagerView');
                    }
                }
                return redirect()->route('inforView');
            }elseif ($dem == 1 && $category == 4) {
                # code...
                $image = 'admin.jpg';
                session()->put('image', $image);
                return redirect()->route('homeAdminView');
            }
        	else{
        		# code...
        		$error = "Tài khoản hoặc mật khẩu không chính xác";
                $data['error'] = $error;
        		return view('login',compact('data'));
        	}
    }
}
