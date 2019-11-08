@extends('master.master')

@section('title','Signature Calendar')

@section('content')
	<div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-folder icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Ký & gửi lịch giảng dạy
                    </div>
                </div>    
            </div>
        </div>
        <div class="row">
            @if(Session::has('notice'))
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header">{{Session::pull('notice')}}
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Lịch giảng dạy</h5>
                        
                        <table class="mb-0 table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Môn</th>
                                <th>Mã số</th>
                                @if(session()->get('category') != 0)
                                    <th>Giáo viên</th>
                                @endif
                                <th>Ngày tạo lịch</th>
                                @if(session()->get('category') != 1)
                                    <th>Tổ trưởng</th>
                                @endif
                                @if(session()->get('category') != 2)
                                    <th>Trưởng khoa</th>
                                @endif
                                <th>Tác vụ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(session()->get('category') == 0)
                                <?php $i=1; ?>
                                @foreach($calendarDatas as $calendarData)
                                    <tr>
                                        <td scope="row">{{$i++}}</td>
                                        <td>{{$calendarData['subject_name']}}</td>
                                        <td>{{$calendarData['subject_code']}}</td>
                                        
                                        <td>{{$calendarData['theFileSignatured_date']}}</td>
                                        @if($calendarData['leaderSignature'] != '')
                                            <td><div class="badge badge-success">Đã ký</div></td>
                                        @endif
                                        @if($calendarData['leaderSignature'] == '')
                                            <td><div class="badge badge-danger">Chưa ký</div></td>
                                        @endif
                                        @if($calendarData['deanSignature'] != '')
                                            <td><div class="badge badge-success">Đã ký</div></td>
                                        @endif
                                        @if($calendarData['deanSignature'] == '')
                                            <td><div class="badge badge-danger">Chưa ký</div></td>
                                        @endif

                                        @if($calendarData['teacherSignature'] != '')
                                            <td><div class="badge badge-success">Đã ký</div></td>
                                        @endif
                                        @if($calendarData['teacherSignature'] == '')
                                            <td>

                                                <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg{{$calendarData['stt']}}">Ký & Gửi</button></td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                            @if(session()->get('category') != 0)
                                <?php $i = 1; ?>
                                @foreach($calendarDatas as $calendarData)
                                    @if($calendarData['teacherSignature'] != '')
                                        <tr>
                                            <td scope="row">{{$i++}}</td>
                                            <td>{{$calendarData['subject_name']}}</td>
                                            <td>{{$calendarData['subject_code']}}</td>
                                            <td>{{$calendarData['teacher_name']}}</td>
                                            <td>{{$calendarData['theFileSignatured_date']}}</td>
                                            
                                            @if(session()->get('category') != 1)
                                                @if($calendarData['leaderSignature'] == '')
                                                    <td><div class="badge badge-danger">Chưa ký</div></td>
                                                @endif
                                                @if($calendarData['leaderSignature'] != '')
                                                    <td><div class="badge badge-success">Đã ký</div></td>
                                                @endif
                                            @endif
                                            @if(session()->get('category') != 2)
                                                @if($calendarData['deanSignature'] != '')
                                                    <td><div class="badge badge-success">Đã ký</div></td>
                                                @endif
                                                @if($calendarData['deanSignature'] == '')
                                                    <td><div class="badge badge-danger">Chưa ký</div></td>
                                                @endif
                                            @endif

                                            @if(session()->get('category') == 1)
                                                @if($calendarData['leaderSignature'] != '')
                                                <td>
                                                    <a href="#" class="btn-wide btn btn-success" style="width: 80px">Đã ký</a>
                                                    
                                                    <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg{{$calendarData['stt']}}" style="margin-top: 8px; width: 80px; margin-left: 5px">Chi tiết</button>
                                                </td>
                                                
                                                @endif
                                                @if($calendarData['leaderSignature'] == '')
                                                    <td>
                                                        <a href="signatureCalendarTest/{{$calendarData['theFileSignatured_path']}}" class="btn-transition btn btn-outline-primary" style="width: 80px">Kiểm tra</a>
                                                        <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg{{$calendarData['stt']}}" style="margin-top: 8px; width: 80px; margin-left: 5px">Chi tiết</button>
                                                    </td>
                                                @endif
                                            @endif

                                            @if(session()->get('category') == 2)
                                                @if($calendarData['deanSignature'] != '')
                                                    <td>
                                                        <a href="#" class="btn-wide btn btn-success" style="width: 80px">Đã ký</a>
                                                        <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg{{$calendarData['stt']}}" style="margin-top: 8px; width: 80px; margin-left: 5px">Chi tiết</button>
                                                    </td>

                                                @endif
                                                @if($calendarData['deanSignature'] == '')
                                                <td>
                                                     <a href="signatureCalendarTest/{{$calendarData['theFileSignatured_path']}}" class="btn-transition btn btn-outline-primary">Kiểm tra</a>
                                                    <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg{{$calendarData['stt']}}" style="margin-top: 8px; width: 80px; margin-left: 5px">Chi tiết</button>
                                                </td>
                                                @endif
                                            @endif
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endSection

@section('LargeModal')

@foreach($calendarDatas as $calendarData)
    <div class="modal fade bd-example-modal-lg{{$calendarData['stt']}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ký gửi lich giảng dạy</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="postSignatureCalendar/{{$calendarData['theFileSignatured_path']}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="card-body">
                            @if(session()->get('category') != 0)
                                <div>
                                    <h5 class="card-title" style="margin-top: 20px">Thông tin lịch giảng dạy</h5>

                                    <a href="excel/{{$calendarData['theFileSignatured_path']}}" class="mb-2 mr-2 btn-transition btn btn-outline-danger" style="float: right;">Download lịch giảng dạy</a>
                                    <p>Giáo viên : {{$calendarData['teacher_name']}}</p>
                                    <p>Môn học : {{$calendarData['subject_name']}}</p>
                                    <p>Hệ khóa : {{$calendarData['heKhoa']}}</p>
                                    <p>Học kỳ : {{$calendarData['hocKy']}}</p>
                                    <p>Năm học : {{$calendarData['namHoc']}}</p>
                                    <table class="mb-0 table" style="margin-top: 30px">
                                        <thead>
                                        <tr>
                                            <th>Buổi</th>
                                            <th>Bài giảng</th>
                                            <th>Dự kiến tiến độ</th>
                                            <th>Ghi chú</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($calendarData['theFileSignaturedDatas'] as $theFileSignaturedData)
                                            <tr>
                                                <td scope="row">{{$theFileSignaturedData['stt']}}</td>
                                                <td>{{$theFileSignaturedData['unit']}}</td>
                                                <td>{{$theFileSignaturedData['keHoach']}}</td>
                                                <td>{{$theFileSignaturedData['chuThich']}}</td>
                                                <!---->
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                            <h5 class="card-title" style="margin-top: 30px">Ký lịch giảng dạy</h5>
                            <div>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            Nhập file khóa của bạn (.txt)<input name="filePrivateKey" id="exampleFile" type="file" class="form-control-file col-md-12" onchange="" >
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary" >Ký</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endforeach

@endSection

