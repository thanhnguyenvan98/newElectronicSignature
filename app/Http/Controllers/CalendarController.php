<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\teacher;
use App\Calendar;
use App\TheFileSignatured;
use PHPExcel;
use PHPExcel_IOFactory;

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
        if (Session()->has('login') && Session()->get('login') == false) {
        # code...
        return redirect()->route('loginView');
        }
        else if (!Session()->has('login')) {
            return redirect()->route('loginView');
        }
        else {
        $teacher_id = teacher::where('user_id','=',session()->get('userId'))->get('teacher_id')->toArray();

        $Subjects = Subject::join('calendar','subject.subject_id','=','calendar.subject_id')->where('teacher_id','=',$teacher_id[0]['teacher_id'])->get();
        
        return view('createCalendar',compact('Subjects'));
        }
    }

    public function ajax(Request $request)
    {
        if ($request->ajax()) {
            # code...
            $SubjectId = $request->SubjectNumberCredit;
            $Subjects = Subject::where('subject_id','=',$SubjectId)->get()->toArray();
            $SubjectNumberCredit = $Subjects[0]['subject_numberCredit'];
            $soTietHoc = $request->soTietHoc;
            
            if (($SubjectNumberCredit*15)%$soTietHoc == 0) {
                $n = ($SubjectNumberCredit*15)/$soTietHoc;
            }else
                $n = ($SubjectNumberCredit*15)/$soTietHoc+1;

            session()->put('soBuoi',$n);

            $output = '';
            

            for($i = 0 ; $i < $n ; $i++){
                $output.= ' <tr>
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
    public function create(Request $request)
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
        $soBuoi = session()->get('soBuoi');
        $unit = [];
        $date = [];
        $notice = [];
        $units = '';
        $dates = '';
        $notices = '';
        $subjectId = $request->Subject;
        $userId = session()->get('userId');
        $teacher = teacher::where('user_id','=',$userId)->get()->toArray();
        $teacher_id = $teacher[0]['teacher_id'];
        $calendar = Calendar::where('teacher_id','=',$teacher_id)->where('subject_id','=',$subjectId)->get()->toArray();
        $theFileSignatured_id = $calendar[0]['theFileSignatured_id'];
        $theFileSignatured = TheFileSignatured::where('theFileSignatured_id','=',$theFileSignatured_id)->get()->toArray();
        $theFileSignatured_path = $theFileSignatured[0]['theFileSignatured_path'];

        for ($i=0; $i < $soBuoi ; $i++) {
            $units = 'unit'.($i+1);
            $dates = 'date'.($i+1);
            $notices = 'notice'.($i+1);
            $unit[''.($i+1)] = $request->$units;
            $date[''.($i+1)] = $request->$dates;
            $notice[''.($i+1)] = $request->$notices;
        }
        
        $kt = 0;
        for ($j=0; $j < $soBuoi ; $j++) { 
            if (!isset($unit[$j+1])) {
                $kt = 1;
                break;
            }
            if (!isset($date[$j+1])) {
                $kt = 1;
                break;
            }
            
        }

        if ($kt == 1) {
            session()->put('notice','Dữ liệu không được để trống');
            return redirect()->back()->withInput();
        }else{


            $fileType = 'Excel2007';
            // Tên file cần ghi
            $fileName = 'excel\\'.$theFileSignatured_path;
            // Load file product_import.xlsx lên để tiến hành ghi file
            $objPHPExcel = PHPExcel_IOFactory::load('excel\\'.$theFileSignatured_path);
 
            //đưa dữ liệu vào file
            for ($k=9; $k < ($soBuoi+9) ; $k++) { 
                $objPHPExcel->setActiveSheetIndex(0) 
                                ->setCellValue("B$k", $k-8)
                                ->setCellValue("C$k", $unit[$k-8])
                                ->setCellValue("H$k", $request->soTietHoc)
                                ->setCellValue("I$k", $date[$k-8])
                                ->setCellValue("K$k", '')
                                ->setCellValue("M$k", $notice[$k-8]);
                $objPHPExcel->getActiveSheet()->mergeCells('C'.$k.':G'.$k);
                $objPHPExcel->getActiveSheet()->mergeCells('I'.$k.':J'.$k);
                $objPHPExcel->getActiveSheet()->mergeCells('K'.$k.':L'.$k);
                $objPHPExcel->getActiveSheet()->mergeCells('M'.$k.':O'.$k);
            }
            
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
            // Tiến hành ghi file
            $objWriter->save($fileName);

            session()->put('notice','Thêm thành công');
            return redirect()->back()->withInput();
        }
            
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
    public function show()
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
            $teacher = teacher::where('user_id','=',session()->get('userId'))->get()->toArray();
            $teacher_id = $teacher[0]['teacher_id'];
            $calendars = Calendar::where('teacher_id','=',$teacher_id)->get()->toArray();
            $i=0;
            $datas = [];
            $Totalrow = 0;
            $x = 9; 
            foreach ($calendars as $calendar) {
                $theFileSignatured_id = $calendar['theFileSignatured_id'];
                $theFileSignatured = TheFileSignatured::where('theFileSignatured_id','=',$theFileSignatured_id)->get()->toArray();
                $theFileSignatured_path = $theFileSignatured[0]['theFileSignatured_path'];
                $file = 'excel/'.$theFileSignatured_path;
                $objFile = PHPExcel_IOFactory::identify($file);//Tiến hành xác thực file
                $objData = PHPExcel_IOFactory::createReader($objFile);//Chỉ đọc dữ liệu
                $objData->setReadDataOnly(true);// Load dữ liệu sang dạng đối tượng
                $objPHPExcel = $objData->load($file);
                $sheet = $objPHPExcel->setActiveSheetIndex(0);//Chọn trang cần truy xuất//Lấy ra số trang sử dụng phương thức getSheetCount();// Lấy Ra tên trang sử dụng getSheetNames();
                
                $Totalrow = $sheet->getHighestRow();
                $calendarData = [];

                
                for ($j=0; $j < $Totalrow - 8; $j++) { 
                    $calendarData[$j] = array('stt' => $j+1,
                                                'unit' => ($sheet->getCellByColumnAndRow(2,$j+9)->getValue()),
                                                'lesson' => ($sheet->getCellByColumnAndRow(7,$j+9)->getValue()),
                                                'keHoach' => ($sheet->getCellByColumnAndRow(8,$j+9)->getValue()),
                                                'thucHien' => ($sheet->getCellByColumnAndRow(10,$j+9)->getValue()),
                                                'chuThich' => ($sheet->getCellByColumnAndRow(12,$j+9)->getValue()),
                    );
                }
                
                $datas[$i] = array('maSo' => $sheet->getCellByColumnAndRow(13,3)->getValue(),
                                'subject_name' => $sheet->getCellByColumnAndRow(13,2)->getValue(),
                                'subject_numberCredit' => $sheet->getCellByColumnAndRow(13,4)->getValue(),
                                'theFileSignatured_path' => $theFileSignatured_path,
                                'teacherSignature' => $sheet->getCellByColumnAndRow(19,2)->getValue(),
                                'deanSignature' => $sheet->getCellByColumnAndRow(19,4)->getValue(),
                                'leaderSignature' => $sheet->getCellByColumnAndRow(19,3)->getValue(),
                                'calendarData' => $calendarData
                );
                $i++;
            }
            return view('calendar',compact('datas'));
        }
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
