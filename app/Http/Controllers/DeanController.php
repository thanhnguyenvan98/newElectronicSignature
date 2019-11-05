<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mail\sendMail;
use Illuminate\Support\Facades\Session;
use Mail;
use App\User;
use App\dean;
use App\Specialized;
use App\signature;

class DeanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showInforBeforLogin()
    {
        //
        $specializeds = Specialized::All();
        return view('infor',compact('specializeds'));
    }

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
        $image = $request->image;
        $gender = $request->gender;
        $specialized_id = $request->specialized_id;
        $salary = $request->salary;

        $deanNew = new dean; 
        $deanNew->dean_name = $name;
        $deanNew->dean_peopleId = $peopleId;
        $deanNew->dean_address = $address;
        $deanNew->dean_birthday = $brithday;
        $deanNew->dean_telephoneNumber = $telephoneNumber;
        $deanNew->dean_email = $email;
        $deanNew->dean_image = $image;
        
        //luu anh vao sever
        if ($request->hasFile('image')) {
            if($request->file('image')->getClientOriginalExtension() == 'PNG' || $request->file('image')->getClientOriginalExtension() == 'jpg' || $request->file('image')->getClientOriginalExtension() == 'png' || $request->file('image')->getClientOriginalExtension() == 'JPG') {
                
                $request->file('image')->move('image',$userId.'Avata.png');
                //$request->file('image')->store('image');
            
            }else{
                $request->session()->put('notice','file ảnh đại diện không đúng định dạng');
                return redirect()->route('inforView');
            }
        }

        $deanNew->dean_gender = $gender;
        $deanNew->specialized_id = $specialized_id;
        $deanNew->dean_salary = $salary;
        $deanNew->user_id = $userId;
        $deanNew->save();

        //gửi email về email mà người dùng nhập
        $signature = signature::where('user_id','=',$userId)->get()->toArray();
        session()->put('privateKeyEmail', $signature[0]['signature_publicKey']);
        $data = [];
        session()->put('email', $email);
        session()->put('name', $name);
        Mail::send('mailfb',$data, function($msg){
            $msg->from('n.v.thanh.26.10@gmail.com','Electronic Signature');
            $msg->to(session()->pull('email'),session()->pull('name'))->subject('privateKey');
        });
        session()->put('feedBackSendEmail', 'Khóa cá nhân của bạn đã được gửi về Gmail');
        $request->session()->put('notice', 'Đã cập nhập thông tin cá nhân');

        return redirect()->route('homeDeanView');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
