<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditInformationController extends Controller
{
    //
    public function edit(Request $request)
    {
        //
        $userName = $request->userName;
        $newPassword = $request->newPassword;
        $reNewPassword = $request->reNewPassword;
        $category = $request->category;
        $id = User::where('user_userName','=',$userName)->get('user_id');

        //var_dump($id);

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
        }else{
            $userNew = User::where('user_id','=',$id[0]['user_id'])->update(['user_password'=>$newPassword,'user_category'=>$category,]);
            $request->session()->put('notice', 'Sửa thành công');
            return redirect()->route('userManagementView');
        }
        $request->session()->put('notice',$error);
        return redirect()->route('userManagementView');
    }
}
