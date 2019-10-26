<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\manager;
use App\dean;
use App\teacher;
use App\admin;
use App\leader;

class EditInformationController extends Controller
{
    //

    public function show(Request $request)
    {
        $nameInfor  = array(
            array(
                "teacher_name",
                "teacher_peopleId",
                "teacher_address",
                "teacher_birthday",
                "teacher_telephoneNumber",
                "teacher_email",
                "teacher_image",
                "teacher_gender",
                "specialized_id",
                "teacher_salary",
            ),
            array(
                "leader_name",
                "leader_peopleId",
                "leader_address",
                "leader_birthday",
                "leader_telephoneNumber",
                "leader_email",
                "leader_image",
                "leader_gender",
                "specialized_id",
                "leader_salary",
            ),
            array(
                "dean_name",
                "dean_peopleId",    
                "dean_address",
                "dean_birthday",
                "dean_telephoneNumber",
                "dean_email",
                "dean_image",
                "dean_gender",
                "specialized_id",
                "dean_salary",
            ),
            array(
                "manager_name",
                "manager_peopleId",
                "manage_address",
                "manage_birthday",
                "manage_telephoneNumber",
                "manage_email",
                "manage_image",
            ),
            array(
                "admin_name",
                "admin_peopleId",
                "admin_address",
                "admin_birthday",
                "admin_telephoneNumber",
                "admin_email",
                "admin_image",
            ),
        );

        $id = session()->get('userId');
        $roleID = session()->get('category');
        switch ($roleID) {
            case 0:
                return view('inforUser', [
                    'user' => teacher::where('user_id','=',$id)->first(), 'name' => $nameInfor[$roleID]
                ]);
            case 1:
                return view('inforUser', [
                    'user' => leader::where('user_id','=',$id)->first(), 'name' => $nameInfor[$roleID]
                ]);
            case 2:
                return view('inforUser', [
                    'user' => dean::where('user_id','=',$id)->first(), 'name' => $nameInfor[$roleID]
                ]);
            case 3:
                return view('inforUser', [
                    'user' => manager::where('user_id','=',$id)->first(), 'name' => $nameInfor[$roleID]
                ]);
            default:
                return view('inforUser', [
                    'user' => admin::where('user_id','=',$id)->first(), 'name' => $nameInfor[$roleID]
                ]);
        }
    }

    public function edit(Request $request)
    {
        //
        $userName = $request->userName;
        $newPassword = $request->newPassword;
        $reNewPassword = $request->reNewPassword;
        $category = $request->category;
        $id = User::where('user_userName','=',$userName)->get('user_id');

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
