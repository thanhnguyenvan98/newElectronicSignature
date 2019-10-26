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
                                <th>Ngày tạo</th>
                                <th>Ngày hoàn thành ký gửi</th>
                                <th>Chữ ký của tổ trưởng</th>
                                <th>Chữ ký của trưởng khoa</th>
                                <th>Tác vụ</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($calendarDatas as $calendarData)
                            <tr>
                                <th scope="row">{{$calendarData['stt']}}</th>
                                <td>{{$calendarData['subject_name']}}</td>
                                <td>{{$calendarData['theFileSignatured_date']}}</td>
                                <td>{{$calendarData['ngayHoanThanh']}}</td>
                                @if($calendarData['leaderSignature'] != '')
                                <td><div class="badge badge-info">Đã ký</div></td>
                                @endif
                                @if($calendarData['leaderSignature'] == '')
                                <td><div class="badge badge-danger">Chưa ký</div></td>
                                @endif
                                @if($calendarData['deanSignature'] != '')
                                <td><div class="badge badge-info">Đã ký</div></td>
                                @endif
                                @if($calendarData['deanSignature'] == '')
                                <td><div class="badge badge-danger">Chưa ký</div></td>
                                @endif
                                @if($calendarData['ngayHoanThanh'] != '')
                                <td><div class="badge badge-info">Đã ký</div></td>
                                @endif
                                @if($calendarData['ngayHoanThanh'] == '')
                                <td><button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg{{$calendarData['stt']}}">Ký & Gửi</button></td>
                                @endif
                                
                            </tr>
                            @endforeach

                            
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
                            <h5 class="card-title" style="margin-top: 30px">Nhập khóa</h5>
                            <div>
                                <div class="input-group">
                                    <!--<input type="text" class="form-control" id="textPrivateKey" name="privateKey" style="height: 42px" placeholder="Nhập khóa của bạn hoặc chọn file(txt) chứa khóa">-->
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <input name="filePrivateKey" id="exampleFile" type="file" class="form-control-file" onchange="change()">
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary" >Gửi</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endforeach

@endSection

