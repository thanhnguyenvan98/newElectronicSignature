<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\manager;
use App\dean;
use App\teacher;
use App\admin;
use App\leader;
use App\Specialized;

class EditInformationController extends Controller
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
                "manage_birthDay",
                "manage_telephoneNumber",
                "manage_email",
                "manage_image",
                "manage_gender",
            ),
            array(
                "admin_name",
                "admin_peopleId",
                "admin_address",
                "admin_birthday",
                "admin_telephoneNumber",
                "admin_email",
                "admin_image",
                "admin_gender",
            ),
        );

        $id = session()->get('userId');
        $roleID = session()->get('category');
        switch ($roleID) {
            case 0:
                return view('inforUser', [
                    'user' => teacher::where('user_id','=',$id)->first(), 'specializeds' => specialized::all(), 'name' => $nameInfor[$roleID]
                ]);
            case 1:
                return view('inforUser', [
                    'user' => leader::where('user_id','=',$id)->first(), 'specializeds' => specialized::all(), 'name' => $nameInfor[$roleID]
                ]);
            case 2:
                return view('inforUser', [
                    'user' => dean::where('user_id','=',$id)->first(), 'specializeds' => specialized::all(), 'name' => $nameInfor[$roleID]
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
    }

    public function edit(Request $request)
    {
        if (Session()->has('login') && Session()->get('login') == false) {
        # code...
            return redirect()->route('loginView');
        }else if (!Session()->has('login')) {
                return redirect()->route('loginView');
        }else {
            $id = session()->get('userId');
            $roleID = session()->get('category');
            $specialized = "";
            $salary= "";
            //
            $nameUser = $request->NameUser;
            $peopleID = $request->PeopleID;
            $address = $request->Address;
            $brith = $request->Birth;
            $phone = $request->Phone;
            $email = $request->Email;
            $avata = $request->Avata;
            if($request->Gender == "Nam")   
                    $gender = 1;
            else    $gender = 0;

            if ($roleID!=3&&$roleID!=4) {
                $specialized = $request->Specialized;
                $specialized_object = Specialized::where('specialized_name','=',$specialized)->first('specialized_id');
                $specialized_id = $specialized_object->specialized_id;
                $salary = $request->Salary;
            }
            if ($nameUser == "") {
                $error = 'Không được bỏ trống tên';
            }
            else if ($peopleID == "") {
                $error = 'Không được bỏ trống số chứng minh thư (số căn cước)';
            }  
            else if ($address == "") {
                $error = 'không được bỏ trống địa chỉ.';
            }
            else if ($brith == "") {
                $error = 'không được bỏ trống ngày sinh';
            }else if ($phone == "") {
                $error = 'Không được bỏ trống số điện thoại';
            }else if ($email == "") {
                $error = 'Không được bỏ trống email';
            }else if ($gender == "") {
                $error = 'Không được bỏ trống phần giới tính';
            }else if ($specialized == "" && $roleID != 3 && $roleID !=4) {
                $error = 'Không được bỏ trống phần khoa';
            }else if ($salary == "" && $roleID != 3 && $roleID !=4) {
                $error = 'Không được bỏ trống phần lương';
            }else{
                switch ($roleID) {
                    case 0:
                        $newInfo = teacher::where('user_id','=',$id)->update(['teacher_name'=>$nameUser,'teacher_peopleId'=>$peopleID,
                        'teacher_address'=>$address,'teacher_birthday'=>$brith,'teacher_telephoneNumber'=>$phone,'teacher_email'=>$email,
                        'teacher_image'=>$avata,'teacher_gender'=>$gender,'specialized_id'=>$specialized_id,'teacher_salary'=>$salary]);
                        $request->session()->put('notice', 'Sửa thành công');
                        return redirect()->route('Information');
                        break;
                    case 1:
                        $newInfo = leader::where('user_id','=',$id)->update(['leader_name'=>$nameUser,'leader_peopleId'=>$peopleID,
                        'leader_address'=>$address,'leader_birthday'=>$brith,'leader_telephoneNumber'=>$phone,'leader_email'=>$email,
                        'leader_image'=>$avata,'leader_gender'=>$gender,'specialized_id'=>$specialized_id,'leader_salary'=>$salary]);
                        $request->session()->put('notice', 'Sửa thành công');
                        return redirect()->route('Information');
                        break;
                    case 2:
                        $newInfo = dean::where('user_id','=',$id)->update(['dean_name'=>$nameUser,'dean_peopleId'=>$peopleID,
                        'dean_address'=>$address,'dean_birthday'=>$brith,'dean_telephoneNumber'=>$phone,'dean_email'=>$email,
                        'dean_image'=>$avata,'dean_gender'=>$gender,'specialized_id'=>$specialized_id,'dean_salary'=>$salary]);
                        $request->session()->put('notice', 'Sửa thành công');
                        return redirect()->route('Information');
                        break;
                    case 3: 
                        $newInfo = manager::where('user_id','=',$id)->update(['manager_name'=>$nameUser,'manager_peopleId'=>$peopleID,
                        'manage_birthDay'=>$brith,'manage_address'=>$address,'manage_image'=>$avata,'manage_telephoneNumber'=>$phone,
                        'manage_email'=>$email,'manage_gender'=>$gender]);
                        $request->session()->put('notice', 'Sửa thành công');
                        return redirect()->route('Information');
                        break;
                    default:
                        $newInfo = admin::where('user_id','=',$id)->update(['admin_name'=>$nameUser,'admin_birthday'=>$brith,
                        'admin_address'=>$address,'admin_email'=>$email,'admin_telephoneNumber'=>$phone,'admin_image'=>$avata,
                        'admin_gender'=>$gender,'admin_peopleId'=>$peopleID]);
                        $request->session()->put('notice', 'Sửa thành công');
                        return redirect()->route('Information');
                        break;
                }
            }
                $request->session()->put('notice',$error);
                return redirect()->route('Information');
        }
    }
}
