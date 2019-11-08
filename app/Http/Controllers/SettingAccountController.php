<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SettingAccountController extends Controller
{
    //
    public function show(Request $request)
    {
        if (Session()->has('login') && Session()->get('login') == false) {
        # code...
        return redirect()->route('loginView');
        }
        else if (!Session()->has('login')) {
            return redirect()->route('loginView');
        }
        else {
            $id = session()->get('userId');
            return view('settingAcount', ['user' => User::where('user_id','=',$id)->first()]);
        }
    }

    public function edit(Request $request)
    {
        $id = session()->get('userId');
        //
        $newPassword = $request->NewPassword;
        $confirmPassword = $request->ConfirmPassword;
        if ($newPassword == "") {
            $error = 'Nhập mới password';
        }
        else if ($confirmPassword == "") {
            $error = 'Nhập lại passwords';
        }else{
            $newPass = User::where('user_id','=',$id)->update(['user_password'=>$confirmPassword]);
            $request->session()->put('notice', 'Sửa thành công');
            return redirect()->route('ShowPassword');
        }
        $request->session()->put('notice',$error);
        return redirect()->route('userManagementView');
    }

}
