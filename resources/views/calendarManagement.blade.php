@extends('master.master')

@section('title','Calendar Management')

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
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Lịch giảng dạy</h5>
                        <ul id="menuHome" style="list-style-type: none;">
                            <li style="float: left;padding-top: 5px"><button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg1">Phân bổ môn học</button></li>

                            @if(Session::has('notice'))
                                <li style="color: red;padding-left: 100px; float: left; padding-top: 10px">
                                    {{Session::pull('notice')}}
                                </li>
                            @endif
                            <li>
                            <li style="float: right; padding-bottom:10px">
                                <form action="showUser" method="post">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" name="name" class="form-control" placeholder="Tìm kiếm theo tên GV">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary" type="submit">Tìm kiếm</button>
                                        </div>
                                    </div>
                                </form>
                            </li>
                        </ul>
                        <table class="mb-0 table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Giáo viên</th>
                                <th>Môn</th>
                                <th>Ngày ký gửi</th>
                                <th>Ngày hoàn thành ký gửi</th>
                                <th>Chữ ký của giáo viên</th>
                                <th>Chữ ký của tổ trưởng</th>
                                <th>Chữ ký của trưởng khoa</th>
                                <th>Tác vụ</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Nguyễn Văn A</td>
                                <td>Lập trình java</td>
                                <td>01-10-2019</td>
                                <td></td>
                                <td><div class="badge badge-info">Đã ký</div></td>
                                <td><div class="badge badge-info">Đã ký</div></td>
                                <td><div class="badge badge-danger">Chưa ký</div></td>
                                <td><button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Chi tiết</button></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Nguyễn Văn B</td>
                                <td>Phát triển phần mềm hướng dịch vụ</td>
                                <td>01-10-2019</td>
                                <td>03-10-2019</td>
                                <td><div class="badge badge-info">Đã ký</div></td>
                                <td><div class="badge badge-info">Đã ký</div></td>
                                <td><div class="badge badge-info">Đã ký</div></td>
                                <td><button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Chi tiết</td>
                            </tr>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endSection

@section('LargeModal')
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Thông tin chi tiết & ký gửi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="card-body">
                    
                        <div>
                        	 <h5 class="card-title" style="margin-top: 20px">Thông tin lịch giảng dạy</h5>

                        	 <button class="mb-2 mr-2 btn-transition btn btn-outline-danger" style="float: right;">Download lịch giảng dạy</button>
                        	 <p>Tiêu đề: </p>
                        	 <p>Lịch giảng dạy mông lập trình Java lớp KTPM2 Kỳ học thứ 3</p>

                            
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
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Tổng quan</td>
                                        <td>28-10-2019</td>
                                        <td></td>
                                        
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Tổng quan</td>
                                        <td>28-10-2019</td>
                                        <td></td>
                                        
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Tổng quan</td>
                                        <td>28-10-2019</td>
                                        <td></td>
                                        
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Tổng quan</td>
                                        <td>28-10-2019</td>
                                        <td></td>
                                       
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Tổng quan</td>
                                        <td>28-10-2019</td>
                                        <td></td>
                                        
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Tổng quan</td>
                                        <td>28-10-2019</td>
                                        <td></td>
                                       
                                    </tr>
                                    
                                </tbody>
                            </table>
                            

                            

                        </div>
                        <hr>
                        <h5 class="card-title" style="margin-top: 20px">Giáo viên   : Đã ký</h5>
                        <h5 class="card-title" style="margin-top: 20px">Tổ trưởng : Đã ký</h5>
                        <h5 class="card-title" style="margin-top: 20px">Trưởng khoa : Đã ký</h5>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endSection

@section('LargeModal1')
<div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Phân bổ môn học</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <div class="card-body">
                    
                        <form class="" method="post" action="createCalendarManagement">
                            @csrf

                            <div class="position-relative form-group col-md-6" style="float: left;">
                                <label for="exampleSelect" class="">Trường</label>
                                <input type="text"  name="nameUniversity" id="exampleSelect" class="form-control">
                            </div>
                            
                            <div class="position-relative form-group col-md-6" style="float: left;">
                                <label for="exampleSelect" class="">Hệ khóa</label>
                                <input type="text"  name="heKhoa" id="exampleSelect" class="form-control">
                            </div>
                            <div class="position-relative form-group col-md-6" style="float: left;">
                                <label for="exampleSelect" class="">Học kỳ</label>
                                <input type="text"  name="session"id="exampleSelect" class="form-control">
                            </div>
                            <div class="position-relative form-group col-md-6" style="float: left;">
                                <label for="exampleSelect" class="">Năm học</label>
                                <input type="number"  name="year" id="exampleSelect" class="form-control">
                            </div>
                            <div class="position-relative form-group col-md-6" style="float: left;">
                                <label for="exampleSelect" class="">Chọn Giáo viên</label>
                                <select name="teacher" id="exampleSelect" class="form-control">
                                    <option value="null"></option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{$teacher->teacher_id}}">{{$teacher->teacher_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="position-relative form-group col-md-6" style="float: left;">
                                <label for="exampleSelect" class="">Chọn môn học</label>
                                <select name="subject" id="exampleSelect" class="form-control">
                                    <option value="null"></option>
                                    @foreach($subjects as $subject)
                                        <option value="{{$subject->subject_id}}">{{$subject->subject_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="modal-footer" style="background-color: white ">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </div>

                        </form>
                        
                    </div>
                </div>
        </div>
    </div>
</div>
@endSection