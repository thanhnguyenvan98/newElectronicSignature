<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\teacher;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teacher_id = teacher::where('user_id','=',session()->get('userId'))->get('teacher_id')->toArray();

        $Subjects = Subject::join('calendar','subject.subject_id','=','calendar.subject_id')->where('teacher_id','=',$teacher_id[0]['teacher_id'])->get();
        return view('createCalendar',compact('Subjects'));
    }

    public function ajax(Request $request)
    {
        if ($request->ajax()) {
            # code...
            $SubjectNumberCredit = $request->SubjectNumberCredit;
            $soTietHoc = $request->soTietHoc;
            
            if (($SubjectNumberCredit*15)%$soTietHoc == 0) {
                $n = ($SubjectNumberCredit*15)/$soTietHoc;
            }else
                $n = ($SubjectNumberCredit*15)/$soTietHoc+1;
            $output = '';
            //session()->put('soBuoi',$n);

            for($i = 0 ; $i < $n ; $i++){
                $output.= '<tr>
                                <td scope="row" style="width: 20px">'.($i+1).'</td>
                                <td>
                                    <div class="col-md-12 mb-12">
                                        <textarea name="unit'.($i+1).'" id="" class="form-control"></textarea>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </td>
                                <td  style="width: 50px">
                                    <div class="col-md-12 mb-12">
                                        
                                        <input type="date" class="form-control" id="" value="" required name = "date'.($i+1).'">
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="col-md-12 mb-12">
                                        <textarea name="notice'.($i+1).'" id="" class="form-control"></textarea>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </td>
                            </tr>';
            }
        }
        return Response($output);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        echo "Create Calenda";
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
