<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Specialized;

class SpecializedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session()->has('login') && Session()->get('login') == false) {
        # code...
        return redirect()->route('loginView');
        }
        else if (!Session()->has('login')) {
            return redirect()->route('loginView');
        }
        else {
        $specializeds = Specialized::all();
        return view('SpecializedManager',compact('specializeds'));
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (Session()->has('login') && Session()->get('login') == false) {
        # code...
        return redirect()->route('loginView');
        }
        else if (!Session()->has('login')) {
            return redirect()->route('loginView');
        }
        else {
            $specializedName = $request->specialized_name;
            $specializedAcronym = $request->specialized_acronym;
            $specializedDescription = $request->specialized_description;

            $specializeds = Specialized::all();
            $kt = 0;

            foreach ($specializeds as $specialized) {
                if ($specialized->specialized_name == $specializedName) {
                    # code...
                    $kt = 1;
                }
            }

            if ($specializedName == "") {
                $error = 'Tên khoa không được bỏ trống';
            }
            else if ($specializedAcronym == "") {
                $error = 'Viết tắt khoa không được bỏ trống';
            }  
            else if ($specializedDescription == "") {
                $error = 'Mô tả không được bỏ trống';
            }
            else if ($kt == 1) {
                $error = 'Tên khoa đã tồn tại';
            }else{
                $SpecializedNew = new Specialized;
                $SpecializedNew->timestamps = false;
                $SpecializedNew->specialized_name=$specializedName;
                $SpecializedNew->specialized_acronym=$specializedAcronym;
                $SpecializedNew->specialized_description=$specializedDescription;
                $SpecializedNew->save();

                //quay tro lai giao dien voi thong bao thanh cong
                $request->session()->put('notice', 'thêm thành công');
                return redirect()->route('SpecializedManagementView');
            }
            $request->session()->put('notice',$error);
            return redirect()->route('SpecializedManagementView');
        }
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
        if (Session()->has('login') && Session()->get('login') == false) {
        # code...
        return redirect()->route('loginView');
        }
        else if (!Session()->has('login')) {
            return redirect()->route('loginView');
        }
        else {
            $specializeds = Specialized::Where('specialized_Name','like','%'.$request->name.'%')->get();
            return view('SpecializedManager',compact('specializeds'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if (Session()->has('login') && Session()->get('login') == false) {
        # code...
        return redirect()->route('loginView');
        }
        else if (!Session()->has('login')) {
            return redirect()->route('loginView');
        }
        else {
            $specializedName = $request->specialized_name;
            $specializedAcronym = $request->specialized_acronym;
            $specializedDescription = $request->specialized_description;

            $id = Specialized::where('specialized_name','=',$specializedName)->get('specialized_id');

            $specializeds = Specialized::all();
            $kt = 0;
            foreach ($specializeds as $specialized) {
                if ($specialized->specialized_name == $specializedName) {
                    # code...
                    $kt = 1;
                }
        foreach ($specializeds as $specialized) {
            if ($specialized->specialized_name == $specializedName) {
                # code...
                $kt++;
            }

            if ($specializedName == "") {
                $error = 'Tên khoa không được bỏ trống';
            }
            else if ($specializedAcronym == "") {
                $error = 'Viết tắt khoa không được bỏ trống';
            }  
            else if ($specializedDescription == "") {
                $error = 'Mô tả không được bỏ trống';
            }
            else if ($kt == 0) {
                $error = 'Tên khoa đã tồn tại';
            }else{
                $specializedNew = Specialized::where('specialized_id','=',$id[0]['specialized_id'])->update(['specialized_name'=>$specializedName,'specialized_acronym'=>$specializedAcronym,'specialized_description'=>$specializedDescription,]);
                $request->session()->put('notice', 'Sửa thành công');
                return redirect()->route('SpecializedManagementView');
            }
            $request->session()->put('notice',$error);
        if ($specializedName == "") {
            $error = 'Tên khoa không được bỏ trống';
        }
        else if ($specializedAcronym == "") {
            $error = 'Viết tắt khoa không được bỏ trống';
        }  
        else if ($specializedDescription == "") {
            $error = 'Mô tả không được bỏ trống';
        }
        else if ($kt >1) {
            $error = 'Tên khoa đã tồn tại';
        }else{
            $specializedNew = Specialized::where('specialized_id','=',$id[0]['specialized_id'])->update(['specialized_name'=>$specializedName,'specialized_acronym'=>$specializedAcronym,'specialized_description'=>$specializedDescription,]);
            $request->session()->put('notice', 'Sửa thành công');
            return redirect()->route('SpecializedManagementView');
        }
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
    public function destroy(Request $request, $id)
    {
        if (Session()->has('login') && Session()->get('login') == false) {
        # code...
        return redirect()->route('loginView');
        }
        else if (!Session()->has('login')) {
            return redirect()->route('loginView');
        }
        else {
            $specializeds = Specialized::where('specialized_id','=',$id)->delete();
            $request->session()->put('notice', 'Xóa thành công');
            return redirect()->route('SpecializedManagementView');
        }
    }
}
