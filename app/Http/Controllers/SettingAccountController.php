<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SettingAccountController extends Controller
{
    //
    public function show(Request $request)
    {
        $id = session()->get('userId');
        return view('settingAcount', ['user' => User::where('user_id','=',$id)->first()]);
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
            
            }
        $request->session()->put('notice',$error);
        return redirect()->route('userManagementView');
    }

}
