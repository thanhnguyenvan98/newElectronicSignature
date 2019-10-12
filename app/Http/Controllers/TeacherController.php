<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mail\sendMail;
use Illuminate\Support\Facades\Session;
use Mail;
use App\User;
use App\Teacher;
use App\Specialized;
use App\signature;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create(Request $request)
    {
        //
        $userId = session()->get('userId');
        $name = $request->name;
        $peopleId = $request->peopleId;
        $address = $request->address;
        $brithday = $request->brithday;
        $telephoneNumber = $request->telephoneNumber;
        $email = $request->email;
        $image = $request->file('image')->getClientOriginalExtension();
        $gender = $request->gender;
        $specialized_id = $request->specialized_id;
        $salary = $request->salary;

        $teacherNew = new Teacher; 
        $teacherNew->teacher_name = $name;
        $teacherNew->teacher_peopleId = $peopleId;
        $teacherNew->teacher_address = $address;
        $teacherNew->teacher_birthday = $brithday;
        $teacherNew->teacher_telephoneNumber = $telephoneNumber;
        $teacherNew->teacher_email = $email;
        $teacherNew->teacher_image = $image;
        
        //luu anh vao sever
        if ($request->hasFile('image')) {
            if($request->file('image')->getClientOriginalExtension() == 'PNG' || $request->file('image')->getClientOriginalExtension() == 'jpg' || $request->file('image')->getClientOriginalExtension() == 'png' || $request->file('image')->getClientOriginalExtension() == 'JPG') {
                
                //$request->file('image')->move('image',$userId.'Avata.png');
                $request->file('image')->store('image');
            
            }else{
                $request->session()->put('notice','file ảnh đại diện không đúng định dạng');
                return redirect()->route('inforView');
            }
        }

        $teacherNew->teacher_gender = $gender;
        $teacherNew->specialized_id = $specialized_id;
        $teacherNew->teacher_salary = $salary;
        $teacherNew->user_id = $userId;
        $teacherNew->save();

        //gửi email về email mà người dùng nhập
        $signature = signature::where('user_id','=',$userId)->get()->toArray();
        session()->put('privateKeyEmail', $signature[0]['signature_privateKey']);
        $data = [];
        session()->put('email', $email);
        session()->put('name', $name);
        Mail::send('mailfb',$data, function($msg){
            $msg->from('n.v.thanh.26.10@gmail.com','Electronic Signature');
            $msg->to(session()->pull('email'),session()->pull('name'))->subject('privateKey');
        });
        session()->put('feedBackSendEmail', 'Khóa cá nhân của bạn đã được gửi về Gmail');


        $request->session()->put('notice', 'Đã cập nhập thông tin cá nhân');
        return redirect()->route('homeView');
               
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
    public function show($id)
    {
        //
    }

    public function showInforBeforLogin()
    {
        //
        $specializeds = Specialized::All();
        return view('infor',compact('specializeds'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        
        
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
    public function destroy($id)
    {
        //
    }
}
