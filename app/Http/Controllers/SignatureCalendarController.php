<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\teacher;
use App\User;
use App\leader;
use App\dean;
use App\Calendar;
use App\TheFileSignatured;
use PHPExcel;
use PHPExcel_IOFactory;
use App\signature;
use phpseclib\Crypt\RSA;

class SignatureCalendarController extends Controller
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
        return view('login');
        }
        else if (!Session()->has('login')) {
            return view('login');
        }
        else {
            if(session()->get('category') == 0){
                $teacher = teacher::where('user_id','=',session()->get('userId'))->get()->toArray();
                $teacher_id = $teacher[0]['teacher_id'];
                $calendars = Calendar::where('teacher_id','=',$teacher_id)->get()->toArray();
            }elseif(session()->get('category') == 1){
                $leader = leader::where('user_id','=',session()->get('userId'))->get()->toArray();
                $specialized_id = $leader[0]['specialized_id'];
                $calendars = Calendar::join('teacher', 'calendar.teacher_id', '=', 'teacher.teacher_id')->where('teacher.specialized_id','=',$specialized_id)->get()->toArray();
            }elseif(session()->get('category') == 2){
                $dean = dean::where('user_id','=',session()->get('userId'))->get()->toArray();
                $specialized_id = $dean[0]['specialized_id'];
                $calendars = Calendar::join('teacher', 'calendar.teacher_id', '=', 'teacher.teacher_id')->where('teacher.specialized_id','=',$specialized_id)->get()->toArray();
            }
            $i=0;
            $calendarDatas = [];
            
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
                $theFileSignaturedData = [];
                for ($j=0; $j < $Totalrow - 8; $j++) { 
                    $theFileSignaturedData[$j] = array('stt' => $j+1,
                                                'unit' => ($sheet->getCellByColumnAndRow(2,$j+9)->getValue()),
                                                'lesson' => ($sheet->getCellByColumnAndRow(7,$j+9)->getValue()),
                                                'keHoach' => ($sheet->getCellByColumnAndRow(8,$j+9)->getValue()),
                                                'thucHien' => ($sheet->getCellByColumnAndRow(10,$j+9)->getValue()),
                                                'chuThich' => ($sheet->getCellByColumnAndRow(12,$j+9)->getValue()),
                    );
                }

                $calendarDatas[$i] = array('stt' => $i+1,
                                        'subject_name' => ($sheet->getCellByColumnAndRow(13,2)->getValue()),
                                        'subject_code' => ($sheet->getCellByColumnAndRow(13,3)->getValue()),
                                        'teacher_name' => ($sheet->getCellByColumnAndRow(7,3)->getValue()),
                                        'heKhoa' => ($sheet->getCellByColumnAndRow(2,2)->getValue()),
                                        'hocKy' => ($sheet->getCellByColumnAndRow(2,3)->getValue()),
                                        'namHoc' => ($sheet->getCellByColumnAndRow(2,4)->getValue()),
                                        'theFileSignatured_date' => ($theFileSignatured[0]['theFileSignatured_date']),
                                        'teacherSignature' => ($theFileSignatured[0]['theFileSignatured_signatureTeacher']),
                                        'leaderSignature' => ($theFileSignatured[0]['theFileSignatured_signatureLeaderAt']),
                                        'deanSignature' => ($theFileSignatured[0]['theFileSignatured_signatureDeanAt']),
                                        'theFileSignatured_path' => $theFileSignatured_path,
                                        'theFileSignaturedDatas' => $theFileSignaturedData
                    );
                $i++;
            }
            return view('signatureCalendar',compact('calendarDatas'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function signature(Request $request,$fileSignaturePath)
    {
        if(session()->has('test'.$fileSignaturePath) && session()->get('category') != 0) {
            $privateKey = '';
            $data = '';
            $rsa = new RSA();
            if ($request->has('filePrivateKey')) {
                # code...
                //mở file chữ kí .text
                $file = @fopen($request->file('filePrivateKey'), 'r');
                //nhận chữ kí vào biến $privateKey
                while (!feof($file)) { // hàm feof sẽ trả về true nếu ở vị trí cuối cùng của file
                    $privateKey .= fgetc($file);  // đọc ra từng ký tự trong file
                }
                //cập nhập lại file lịch giảng dạy
                $fileType = 'Excel2007';
                // Tên file cần ghi
                $fileName = 'excel\\'.$fileSignaturePath;
                // Load file product_import.xlsx lên để tiến hành ghi file
                $objPHPExcel = PHPExcel_IOFactory::load('excel\\'.$fileSignaturePath);
                if(session()->get('category') == 0)
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue("T2", 'Đã ký');
                elseif (session()->get('category') == 1) {
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue("T3", 'Đã ký');
                }elseif (session()->get('category') == 2) {
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue("T4", 'Đã ký');
                }
                $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
                // Tiến hành ghi file
                $objWriter->save($fileName);
                //mở file dữ liệu lịch giảng dạy
                $fileData = @fopen('excel/'.$fileSignaturePath, 'r');
                //nhận dữ liệu từ file lịch giảng dạy vào biến $data
                while (!feof($fileData)) {
                    $data .= fgetc($fileData);
                }
                //băm file dữ liệu lịch giảng dạy
                $hashData = md5($data);
                //load private key vào thuật toán RSA
                $rsa->loadKey($privateKey);
                //tạo chữ ký bằng RSA sau đó mã hóa bằng hàm encrypt
                $signature = encrypt($rsa->encrypt($hashData));
                if(session()->get('category') == 0)
                    $sql = "update thefilesignatured set theFileSignatured_signatureTeacherAt = '".date('Y/m/d')."' ,theFileSignatured_signatureTeacher = N'".$signature."'  where theFileSignatured_path = '".$fileSignaturePath."'";
                elseif (session()->get('category') == 1) {
                    $sql = "update thefilesignatured set theFileSignatured_signatureLeaderAt = '".date('Y/m/d')."' ,theFileSignatured_signatureLeader = N'".$signature."'  where theFileSignatured_path = '".$fileSignaturePath."'";
                }elseif (session()->get('category') == 2) {
                    $sql = "update thefilesignatured set theFileSignatured_signatureDeanAt = '".date('Y/m/d')."' ,theFileSignatured_signatureDean = N'".$signature."'  where theFileSignatured_path = '".$fileSignaturePath."'";
                }
                
                $updated = DB::update($sql);
                session()->forget('test'.$fileSignaturePath);
                session()->put('notice','Lịch giảng dạy đã được lý');
                return redirect()->back()->withInput();
            }
            else{
                session()->put('notice','Dữ liệu không được để trống');
                return redirect()->back()->withInput();
            }
        }elseif (session()->get('category') == 0) {
            $privateKey = '';
            $data = '';
            $rsa = new RSA();
            if ($request->has('filePrivateKey')) {
                # code...
                //mở file chữ kí .text
                $file = @fopen($request->file('filePrivateKey'), 'r');
                //nhận chữ kí vào biến $privateKey
                while (!feof($file)) { // hàm feof sẽ trả về true nếu ở vị trí cuối cùng của file
                    $privateKey .= fgetc($file);  // đọc ra từng ký tự trong file
                }
                //cập nhập lại file lịch giảng dạy
                $fileType = 'Excel2007';
                // Tên file cần ghi
                $fileName = 'excel\\'.$fileSignaturePath;
                // Load file product_import.xlsx lên để tiến hành ghi file
                $objPHPExcel = PHPExcel_IOFactory::load('excel\\'.$fileSignaturePath);
                if(session()->get('category') == 0)
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue("T2", 'Đã ký');
                elseif (session()->get('category') == 1) {
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue("T3", 'Đã ký');
                }elseif (session()->get('category') == 2) {
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue("T4", 'Đã ký');
                }
                $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
                // Tiến hành ghi file
                $objWriter->save($fileName);
                //mở file dữ liệu lịch giảng dạy
                $fileData = @fopen('excel/'.$fileSignaturePath, 'r');
                //nhận dữ liệu từ file lịch giảng dạy vào biến $data
                while (!feof($fileData)) {
                    $data .= fgetc($fileData);
                }
                //băm file dữ liệu lịch giảng dạy
                $hashData = md5($data);
                //load private key vào thuật toán RSA
                $rsa->loadKey($privateKey);
                //tạo chữ ký bằng RSA sau đó mã hóa bằng hàm encrypt
                $signature = encrypt($rsa->encrypt($hashData));
                if(session()->get('category') == 0)
                    $sql = "update thefilesignatured set theFileSignatured_signatureTeacherAt = '".date('Y/m/d')."' ,theFileSignatured_signatureTeacher = N'".$signature."'  where theFileSignatured_path = '".$fileSignaturePath."'";
                elseif (session()->get('category') == 1) {
                    $sql = "update thefilesignatured set theFileSignatured_signatureLeaderAt = '".date('Y/m/d')."' ,theFileSignatured_signatureLeader = N'".$signature."'  where theFileSignatured_path = '".$fileSignaturePath."'";
                }elseif (session()->get('category') == 2) {
                    $sql = "update thefilesignatured set theFileSignatured_signatureDeanAt = '".date('Y/m/d')."' ,theFileSignatured_signatureDean = N'".$signature."'  where theFileSignatured_path = '".$fileSignaturePath."'";
                }
                
                $updated = DB::update($sql);
                session()->forget('test'.$fileSignaturePath);
                session()->put('notice','Lịch giảng dạy đã được lý');
                return redirect()->back()->withInput();
            }
            else{
                session()->put('notice','Dữ liệu không được để trống');
                return redirect()->back()->withInput();
            }
        }else{
            $notice = 'File không hợp lệ , không cho phép ký duyệt';
            session()->put('notice',$notice);
            return redirect()->back()->withInput();
        }
    }

    public function test($theFileSignatured_path){
        //lấy ra chữ ký của giáo viên
        $theFileSignatured = TheFileSignatured::where('theFileSignatured_path',$theFileSignatured_path)->get()->toArray();
        $signatureTeacher = decrypt($theFileSignatured[0]['theFileSignatured_signatureTeacher']);
        //giải mã chữ ký
        $rsa = new RSA();
        //lấy ra khóa công khai
        $theFileSignatured_id = $theFileSignatured[0]['theFileSignatured_id'];
        $calendar = Calendar::where('theFileSignatured_id',$theFileSignatured_id)->get()->toArray();
        $user = User::join('teacher','user.user_id','=','teacher.user_id')->where('teacher_id',$calendar[0]['teacher_id'])->get()->toArray();
        $userTeacher_id = $user[0]['user_id'];
        $signature = signature::where('user_id',$userTeacher_id)->get()->toArray();
        $privateKey = $signature[0]['signature_privateKey'];
        //load privateKey vào thuật toán RSA
        $rsa->loadKey($privateKey);
        $decryptSignature =  $rsa->decrypt($signatureTeacher);
        $data = '';
        //mở file dữ liệu lịch giảng dạy
        $fileData = @fopen('excel/'.$theFileSignatured_path, 'r');
        //nhận dữ liệu từ file lịch giảng dạy vào biến $data
        while (!feof($fileData)) {
            $data .= fgetc($fileData);
        }
        //băm file dữ liệu lịch giảng dạy
        $hashData = md5($data);
        $notice = 'File không hợp lệ, có vấn đề xảy ra trong quá trình ký duyệt';
        if ($hashData == $decryptSignature) {
            $notice = 'File đã được xác nhận, chữ ký của giáo viên hợp lệ';
            session()->put('test'.$theFileSignatured_path,$theFileSignatured_path);
        }
        session()->put('notice',$notice);
        return redirect()->route('signatureCalendarView');
    }

    public function create()
    {
        //
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
