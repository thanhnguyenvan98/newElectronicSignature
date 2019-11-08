<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\teacher;
use App\Subject;
use App\TheFileSignatured;
use PHPExcel;
use PHPExcel_IOFactory;
use App\Calendar;

class CalendarManagementController extends Controller
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
        $teachers = teacher::all();
        $subjects = Subject::all();
        return view('calendarManagement',compact('teachers','subjects'));
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
        //
        $nameUniversity = $request->nameUniversity;
        $heKhoa = $request->heKhoa;
        $session = $request->session;
        $year = $request->year;
        $teacher = $request->teacher;
        $teacherInfor = teacher::where('teacher_id','=',$teacher)->get()->toArray();
        $subject = $request->subject;
        $subjectInfor = Subject::where('subject_id','=',$subject)->get()->toArray();
        $error = "";
        if ($nameUniversity == "") {
            $error .= "Tên trường đại học không được bỏ trống";
        }elseif ($heKhoa == "") {
            $error .= "Khóa học không được bỏ trống";
        }elseif ($session == "") {
            $error .= "Kỳ học không được bỏ trống";
        }elseif ($year == "") {
            $error .= "Năm học không được bỏ trống";
        }elseif ($teacher == "null") {
            $error .= "Chưa chọn giáo viên";
        }elseif ($subject == "null") {
            $error .= "Chưa chọn môn học";
        }else{

            //Khởi tạo đối tượng
            $excel = new PHPExcel();
            //Chọn trang cần ghi (là số từ 0->n)
            $excel->setActiveSheetIndex(0);
            //Tạo tiêu đề cho trang. (có thể không cần)
            $excel->getActiveSheet()->setTitle('Lịch giảng dạy');

            //Xét chiều rộng cho từng, nếu muốn set height thì dùng setRowHeight()
            //$excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
            //$excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
            //$excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);

            //Xét in đậm cho khoảng cột
            $excel->getActiveSheet()->getStyle('A1:P1')->getFont()->setBold(true);
            $excel->getActiveSheet()->getStyle('B7:O8')->getFont()->setBold(true);
            $excel->getActiveSheet()->getStyle('A2:B4')->getFont()->setBold(true);
            $excel->getActiveSheet()->getStyle('F3:G3')->getFont()->setBold(true);
            $excel->getActiveSheet()->getStyle('L2:M4')->getFont()->setBold(true);
            $excel->getActiveSheet()->getStyle('R1:R4')->getFont()->setBold(true);
            //xét nối 2 ô cạnh nhau
            //$excel->getActiveSheet()->mergeCells('A6:C7');

            //Tạo tiêu đề cho từng cột
            //Vị trí có dạng như sau:
            /**
             * |A1|B1|C1|..|n1|
             * |A2|B2|C2|..|n1|
             * |..|..|..|..|..|
             * |An|Bn|Cn|..|nn|
             */
            $excel->getActiveSheet()->setCellValue('A1', 'Trường '.$nameUniversity);
            $excel->getActiveSheet()->mergeCells('A1:D1');
            $excel->getActiveSheet()->setCellValue('A2', 'Hệ-Khóa :');
            $excel->getActiveSheet()->mergeCells('A2:B2');
            $excel->getActiveSheet()->setCellValue('C2', $heKhoa);
            $excel->getActiveSheet()->mergeCells('C2:D2');
            $excel->getActiveSheet()->setCellValue('A3', 'Học kỳ :');
            $excel->getActiveSheet()->mergeCells('A3:B3');
            $excel->getActiveSheet()->setCellValue('C3', $session);
            $excel->getActiveSheet()->mergeCells('C3:D3');
            $excel->getActiveSheet()->setCellValue('A4', 'Năm học :');
            $excel->getActiveSheet()->mergeCells('A4:B4');
            $excel->getActiveSheet()->setCellValue('C4', $year);
            $excel->getActiveSheet()->mergeCells('C4:D4');

            $excel->getActiveSheet()->setCellValue('F1', 'LỊCH GIẢNG DẠY');
            $excel->getActiveSheet()->mergeCells('F1:J1');
            $excel->getActiveSheet()->setCellValue('F3', 'Giảng viên :');
            $excel->getActiveSheet()->mergeCells('F3:G3');
            $excel->getActiveSheet()->setCellValue('H3', $teacherInfor[0]['teacher_name']);
            $excel->getActiveSheet()->mergeCells('H3:J3');

            $excel->getActiveSheet()->setCellValue('L1', 'THÔNG TIN HỌC PHẦN/MÔN HỌC');
            $excel->getActiveSheet()->mergeCells('L1:P1');
            $excel->getActiveSheet()->setCellValue('L2', 'Tên học phần :');
            $excel->getActiveSheet()->mergeCells('L2:M2');
            $excel->getActiveSheet()->setCellValue('N2', $subjectInfor[0]['subject_name']);
            $excel->getActiveSheet()->mergeCells('N2:P2');
            $excel->getActiveSheet()->setCellValue('L3', 'Mã số :');
            $excel->getActiveSheet()->mergeCells('L3:M3');
            $excel->getActiveSheet()->setCellValue('N3', $teacherInfor[0]['teacher_id'].date('His'));
            $excel->getActiveSheet()->mergeCells('N3:P3');
            $excel->getActiveSheet()->setCellValue('L4', 'Số tín chỉ :');
            $excel->getActiveSheet()->mergeCells('L4:M4');
            $excel->getActiveSheet()->setCellValue('N4', $subjectInfor[0]['subject_numberCredit']);
            $excel->getActiveSheet()->mergeCells('N4:P4');

            $excel->getActiveSheet()->setCellValue('R1', 'THÔNG TIN CHỮ KÝ');
            $excel->getActiveSheet()->mergeCells('R1:U1');
            $excel->getActiveSheet()->setCellValue('R2', 'Giáo viên:');
            $excel->getActiveSheet()->mergeCells('R2:S2');
            $excel->getActiveSheet()->setCellValue('R3', 'Tổ trưởng:');
            $excel->getActiveSheet()->mergeCells('R3:S3');
            $excel->getActiveSheet()->setCellValue('R4', 'Trưởng khoa:');
            $excel->getActiveSheet()->mergeCells('R4:S4');

            $excel->getActiveSheet()->setCellValue('B7', 'STT');
            $excel->getActiveSheet()->mergeCells('B7:B8');
            $excel->getActiveSheet()->setCellValue('C7', 'Tên bài giảng (Ghi tóm tắt nội dung)');
            $excel->getActiveSheet()->mergeCells('C7:G8');
            $excel->getActiveSheet()->setCellValue('H7', 'Số tiết');
            $excel->getActiveSheet()->mergeCells('H7:H8');
            $excel->getActiveSheet()->setCellValue('I7', 'Thực hiện');
            $excel->getActiveSheet()->mergeCells('I7:L7');
            $excel->getActiveSheet()->setCellValue('I8', 'Kế hoạch');
            $excel->getActiveSheet()->mergeCells('I8:J8');
            $excel->getActiveSheet()->setCellValue('K8', 'Thực hiện');
            $excel->getActiveSheet()->mergeCells('K8:L8');
            $excel->getActiveSheet()->setCellValue('M7', 'Ghi chú');
            $excel->getActiveSheet()->mergeCells('M7:O8');

            // thực hiện thêm dữ liệu vào từng ô bằng vòng lặp
            // dòng bắt đầu = 2
            //$numRow = 2;
            //foreach ($data as $row) {
            //    $excel->getActiveSheet()->setCellValue('A' . $numRow, $row[0]);
            //    $excel->getActiveSheet()->setCellValue('B' . $numRow, $row[1]);
            //    $excel->getActiveSheet()->setCellValue('C' . $numRow, $row[2]);
            //    $numRow++;
            //}
            // Khởi tạo đối tượng PHPExcel_IOFactory để thực hiện ghi file
            // lưu file dưới dạng excel2007
            PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save(base_path('public\excel\\'.$teacherInfor[0]['teacher_id'].date('His').'.xlsx'));

            $TheFileSignatured = new TheFileSignatured;
            $TheFileSignatured->thefilesignatured_date = date('Y-m-d');
            $TheFileSignatured->thefilesignatured_path = $teacherInfor[0]['teacher_id'].date('His').'.xlsx';
            $TheFileSignatured->save();

            $TheFileSignaturedInfor = TheFileSignatured::where('theFileSignatured_path','=',$teacherInfor[0]['teacher_id'].date('His').'.xlsx')->get()->toArray();

            $calendar = new Calendar;
            $calendar->teacher_id = $teacher;
            $calendar->subject_id = $subject;
            $calendar->theFileSignatured_id = $TheFileSignaturedInfor[0]['theFileSignatured_id'];
            $calendar->save();

            $request->session()->put('notice',"Thành công");
            return redirect()->route('calendarManegementView');

        }

        $request->session()->put('notice',$error);
        return redirect()->route('calendarManegementView');
        
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
