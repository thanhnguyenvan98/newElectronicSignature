<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\teacher;
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
        else if (Session()->has('login') && Session()->get('login') == false) {
            return view('login');
        }
        else if (!Session()->has('login')) {
            return view('login');
        }
        else {
            $teacher = teacher::where('user_id','=',session()->get('userId'))->get()->toArray();
            $teacher_id = $teacher[0]['teacher_id'];
            $calendars = Calendar::where('teacher_id','=',$teacher_id)->get()->toArray();
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
                
                $calendarDatas[$i] = array('stt' => $i+1,
                                        'subject_name' => ($sheet->getCellByColumnAndRow(13,2)->getValue()),
                                        'theFileSignatured_date' => ($theFileSignatured[0]['theFileSignatured_date']),
                                        'ngayHoanThanh' => ($theFileSignatured[0]['theFileSignatured_signatureDeanAt']),
                                        'leaderSignature' => ($theFileSignatured[0]['theFileSignatured_signatureLeaderAt']),
                                        'deanSignature' => ($theFileSignatured[0]['theFileSignatured_signatureDeanAt']),
                                        'theFileSignatured_path' => $theFileSignatured_path,
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
        //

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

            $objPHPExcel->setActiveSheetIndex(0)->setCellValue("T2", 'Đã ký');
 
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

            //tạo chữ ký bằng RSA
            $signature = $rsa->encrypt($hashData);
            //var_dump($signature);
            //exit();

            $TheFileSignatured = TheFileSignatured::where('theFileSignatured_path','=',$fileSignaturePath)->update(['theFileSignatured_signatureTeacherAt'=>date('Y/m/d'),'theFileSignatured_signatureTeacher'=>$signature]);

            session()->put('notice','Lịch giảng dạy đã được lý');
            return redirect()->back()->withInput();
        }
        else{
            session()->put('notice','Dữ liệu không được để trống');
            return redirect()->back()->withInput();
        }
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
