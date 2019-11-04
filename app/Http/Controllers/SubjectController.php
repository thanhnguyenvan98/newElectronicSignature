<?php

namespace App\Http\Controllers;

use App\Subject;
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
        $subjects = Subject::all();
        return view('subjectManagement',compact('subjects'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
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
        return redirect()->route('SubjectMangementView');
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
        $subjects = Subject::Where('subject_name','like','%'.$request->name.'%')->get();
        return view('subjectManagement',compact('subjects'));
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
        $subjectName = $request->subject_name;
        $numberCredit = $request->number_credit;

        //$id = Subject::where('subject_name','=',$subjectName)->get('subject_id');

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
        return redirect()->route('SubjectMangementView');
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
        $subjects = Subject::where('subject_id','=',$id)->delete();
        $request->session()->put('notice', 'Xóa thành công');
        return redirect()->route('SubjectMangementView');
    }
}
