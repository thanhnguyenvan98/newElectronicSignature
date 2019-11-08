@extends('master.master')

@section('title','Calendar')

@section('content')
	<div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-folder icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Lịch trình giảng dạy từng môn học
                    </div>

                </div>    
            </div>
        </div>            
        <div class="row">
            <div class="col-md-12" style="height: 60px">
                <a href="createCalendarView" class="btn-transition btn btn-outline-primary" style="margin-left: 40px;"><h4>Tạo Lịch</h4></a>
            </div>
            <div class="col-md-12">
                @foreach($datas as $data)
                <div class="main-card mb-12 card" style="margin-top: 20px">
                    <div class="card-body">
                        <h5 class="card-title">{{$data['subject_name']}}</h5>

                        <div class="collapse" id="collapseExample1{{$data['maSo']}}"> 
                            <a href="excel/{{$data['theFileSignatured_path']}}" class="mb-2 mr-2 btn-transition btn btn-outline-danger" style="float: right;">Download lịch giảng dạy</a>
                            <p>Mã lớp: {{$data['maSo']}}</p>
                            <p>Trạng thái ký duyệt : <?php if($data['teacherSignature'] == 'Đã ký' && $data['deanSignature'] == 'Đã ký' && $data['leaderSignature'] == 'Đã ký')
                                    echo "Đã được ký duyệt";
                                else echo "Chưa được ký duyệt";
                            ?></p>
                            <p>Bảng tiến trình</p>
                            <form>

                            <table class="mb-0 table">
                                <thead>
                                <tr>
                                    <th>Buổi</th>
                                    <th>Bài giảng</th>
                                    <th>Dự kiến tiến độ</th>
                                    <th>Ghi chú</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['calendarData'] as $calendarData)
                                    <tr>
                                        <td scope="row">{{$calendarData['stt']}}</td>
                                        <td>{{$calendarData['unit']}}</td>
                                        <td>{{$calendarData['keHoach']}}</td>
                                        <td>{{$calendarData['chuThich']}}</td>
                                        @if($calendarData['thucHien'] != '')
                                            <td>{{$calendarData['thucHien']}}</td>
                                        @endif
                                        <!---->
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                       
                        </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" data-toggle="collapse" href="#collapseExample1{{$data['maSo']}}" class="btn btn-primary">Chi tiết</button>
                    </div>
                </div>
                @endforeach
            </div>
                
        </div>
    </div>

@endSection