<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Specialized;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Session()->has('login') && Session()->get('login') == false) {
        # code...
        return redirect()->route('loginView');
        }
        else if (!Session()->has('login')) {
            return redirect()->route('loginView');
        }
        else {
            $subjects = Subject::all();
            return view('subjectManagement',compact('subjects'));
        }
        $specializeds = Specialized::all();
        $nameSpecialized = array();
        foreach ($specializeds as $specialized) {
            $nameSpecialized[$specialized->specialized_id]=$specialized->specialized_name;
        }
        $subjects = Subject::all();
        return view('subjectManagement',compact('subjects','nameSpecialized','specializeds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        if (Session()->has('login') && Session()->get('login') == false) {
        # code...
        return redirect()->route('loginView');
        $subjectName = $request->subject_name;
        $numberCredit = $request->number_credit;
        $numberSpecialized = $request->specialized_name;

        $id = Specialized::where('specialized_name','=',$numberSpecialized)->first('specialized_id');
        $idSpecialized = $id->specialized_id;

        $subjects = Subject::all();
        $kt = 0;

        foreach ($subjects as $subject) {
            if ($subject->subject_name == $subjectName) {
                # code...
                $kt = 1;
            }
        }
        else if (!Session()->has('login')) {
            return redirect()->route('loginView');
        }
        else {
            $subjectName = $request->subject_name;
            $numberCredit = $request->number_credit;

            $subjects = Subject::all();
            $kt = 0;

            foreach ($subjects as $subject) {
                if ($subject->subject_name == $subjectName) {
                    # code...
                    $kt = 1;
                }
            }

            if ($subjectName == "") {
                $error = 'Tên môn không được bỏ trống';
            }
            else if ($numberCredit == "") {
                $error = 'số tín chỉ không được bỏ trống';
            }  
            else if ($kt !=0) {
                $error = 'Tên môn đã tồn tại';
            }else{
                $subjectNew = new Subject;
                $subjectNew->timestamps = false;
                $subjectNew->subject_name=$subjectName;
                $subjectNew->subject_numberCredit=$numberCredit;
                $subjectNew->save();

                //quay tro lai giao dien voi thong bao thanh cong
                $request->session()->put('notice', 'thêm thành công');
                return redirect()->route('SubjectMangementView');
            }
            $request->session()->put('notice',$error);
        else if ($numberCredit == "") {
            $error = 'số tín chỉ không được bỏ trống';
        }  
        else if ($kt !=0) {
            $error = 'Tên môn đã tồn tại';
        }else{
            $subjectNew = new Subject;
            $subjectNew->timestamps = false;
            $subjectNew->subject_name=$subjectName;
            $subjectNew->subject_numberCredit=$numberCredit;
            $subjectNew->Specialized_id = $idSpecialized;
            $subjectNew->save();

            //quay tro lai giao dien voi thong bao thanh cong
            $request->session()->put('notice', 'thêm thành công');
            return redirect()->route('SubjectMangementView');
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
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        if (Session()->has('login') && Session()->get('login') == false) {
        # code...
        return redirect()->route('loginView');
        }
        else if (!Session()->has('login')) {
            return redirect()->route('loginView');
        }
        else {
            $subjects = Subject::Where('subject_name','like','%'.$request->name.'%')->get();
            return view('subjectManagement',compact('subjects'));
        }
        $specializeds = Specialized::all();
        $nameSpecialized = array();
        foreach ($specializeds as $specialized) {
            $nameSpecialized[$specialized->specialized_id]=$specialized->specialized_name;
        }
        $subjects = Subject::Where('subject_name','like','%'.$request->name.'%')->get();
        return view('subjectManagement',compact('subjects','nameSpecialized','specializeds'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        if (Session()->has('login') && Session()->get('login') == false) {
        # code...
        return redirect()->route('loginView');
        }
        else if (!Session()->has('login')) {
            return redirect()->route('loginView');
        }
        else {
            $subjectName = $request->subject_name;
            $numberCredit = $request->number_credit;

            //$id = Subject::where('subject_name','=',$subjectName)->get('subject_id');
        $subjectName = $request->subject_name;
        $numberCredit = $request->number_credit;
        $idSpecialized = $request->specialized_name;

            $subjects = Subject::all();
            $kt = 0;
            foreach ($subjects as $subject) {
                if ($subject->subject_name == $subjectName) {
                    # code...
                    $kt = 1;
                }
        foreach ($subjects as $subject) {
            if ($subject->subject_name == $subjectName) {
                # code...
                $kt++;
            }

            if ($subjectName == "") {
                $error = 'Tên môn không được bỏ trống';
            }
            else if ($numberCredit == "") {
                $error = 'Số tín chỉ không được bỏ trống';
            }  
            else if ($kt != 0) {
                $error = 'Tên môn đã tồn tại';
            }else{
                $subjectNew = Subject::where('subject_id','=',$ids)->update(['subject_name'=>$subjectName,'subject_numberCredit'=>$numberCredit,]);
                $request->session()->put('notice', 'Sửa thành công');
                return redirect()->route('SubjectMangementView');
            }
            $request->session()->put('notice',$error);
        if ($subjectName == "") {
            $error = 'Tên môn không được bỏ trống';
        }
        else if ($numberCredit == "") {
            $error = 'Số tín chỉ không được bỏ trống';
        }  
        else if ($kt > 1) {
            $error = 'Tên môn đã tồn tại';
        }else{
            $subjectNew = Subject::where('subject_id','=',$id)->update(['subject_name'=>$subjectName,'subject_numberCredit'=>$numberCredit,'Specialized_id'=>$idSpecialized]);
            $request->session()->put('notice', 'Sửa thành công');

            return redirect()->route('SubjectMangementView');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        if (Session()->has('login') && Session()->get('login') == false) {
        # code...
        return redirect()->route('loginView');
        }
        else if (!Session()->has('login')) {
            return redirect()->route('loginView');
        }
        else {
            $subjects = Subject::where('subject_id','=',$id)->delete();
            $request->session()->put('notice', 'Xóa thành công');
            return redirect()->route('SubjectMangementView');
        }
    }
}
