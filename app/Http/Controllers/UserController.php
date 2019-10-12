<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\signature;
use App\teacher;
use phpseclib\Crypt\RSA;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->session()->has('login') && $request->session()->get('login') == false) {
        # code..
        return view('login');
        }
        else if (!$request->session()->has('login')) {
            return view('login');
        }
        else{
            $users = User::Where('user_category','<','3')->get();
            return view('userManagement',compact('users'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $userName = $request->userName;
        $password = $request->password;
        $rePassword = $request->rePassword;
        $category = $request->category;

        $users = User::all();
        $kt = 0;

        foreach ($users as $user) {
            if ($user->user_userName == $userName) {
                # code...
                $kt = 1;
            }
        }

        if ($userName == "") {
            $error = 'Tên đăng nhập không được bỏ trống';
        }
        else if ($password == "") {
            $error = 'Mật khẩu không được bỏ trống';
        }  
        else if ($rePassword == "") {
            $error = 'Xác nhận mật khẩu';
        }
        else if ($password != $rePassword) {
            $error = 'Xác nhận lại mật khẩu';
        }else if ($kt == 1) {
            $error = 'Tên đăng nhập đã tồn tại';
        }else{
            $userNew = new User;
            $userNew->timestamps = false;
            $userNew->user_userName = $userName;
            $userNew->user_password = $password;
            $userNew->user_category = $category;
            $userNew->save();

            //lay ra id cua tai khoan vua them
            $idUserNew = User::where('user_userName','=',$userName)->where('user_password','=',$password)->get()->toArray();
            $id = $idUserNew[0]['user_id'];

            //tao publicKey & privateKey
            $rsa = new RSA();
            $array = $rsa->createKey(1024);
            $publicKey = $array['publickey'];
            $privateKey = $array['privatekey'];

            //them ban ghi vao bang signature cho tai khoan vua duoc tao
            $signature = new signature;
            $signature->timestamps = false;
            $signature->signature_publicKey = $publicKey;
            $signature->signature_privateKey = $privateKey;
            $signature->user_id = $id;
            $signature->save();

            //quay tro lai giao dien voi thong bao thanh cong
            $request->session()->put('notice', 'thêm thành công');
            return redirect()->route('userManagementView');
        }
        $request->session()->put('notice',$error);
        return redirect()->route('userManagementView');
        
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $users = User::Where('user_userName','like','%'.$request->name.'%')->Where('user_category','<','3')->get();
        return view('userManagement',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $userName = $request->userName;
        $newPassword = $request->newPassword;
        $reNewPassword = $request->reNewPassword;
        $category = $request->category;
        $id = User::where('user_userName','=',$userName)->get('user_id');

        //var_dump($id);
        $users = User::all();
        $kt = 0;

        foreach ($users as $user) {
            if ($user->user_userName == $userName) {
                # code...
                $kt = 1;
            }
        }

        if ($userName == "") {
            $error = 'Tên đăng nhập không được bỏ trống';
        }
        else if ($newPassword == "") {
            $error = 'Mật khẩu mới không được bỏ trống';
        }  
        else if ($reNewPassword == "") {
            $error = 'Xác nhận mật khẩu mới';
        }
        else if ($newPassword != $reNewPassword) {
            $error = 'Xác nhận lại mật khẩu';
        }else if ($kt == 0) {
            $error = 'Tài khoản không tồn tại';
        }else{
            $userNew = User::where('user_id','=',$id[0]['user_id'])->update(['user_userName'=>$userName,'user_password'=>$newPassword,'user_category'=>$category,]);
            $request->session()->put('notice', 'Sửa thành công');
            return redirect()->route('userManagementView');
        }
        $request->session()->put('notice',$error);
        return redirect()->route('userManagementView');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //
        $signature = signature::where('user_id','=',$id)->delete();
        $teacher = teacher::where('user_id','=',$id)->delete();
        $userNew = User::where('user_id','=',$id)->delete();

        $request->session()->put('notice', 'Xóa thành công');
        return redirect()->route('userManagementView');
    }
}
