@extends('master.master')

@section('title','Tổng quan')

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
                        <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Ký & Gửi</button>
                        <table class="mb-0 table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Môn</th>
                                <th>Ngày ký gửi</th>
                                <th>Ngày hoàn thành ký gửi</th>
                                <th>Chữ ký của tổ trưởng</th>
                                <th>Chữ ký của trưởng khoa</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Lập trình java</td>
                                <td>01-10-2019</td>
                                <td></td>
                                <td><div class="badge badge-info">Đã ký</div></td>
                                <td><div class="badge badge-danger">Chưa ký</div></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Phát triển phần mềm hướng dịch vụ</td>
                                <td>01-10-2019</td>
                                <td>03-10-2019</td>
                                <td><div class="badge badge-info">Đã ký</div></td>
                                <td><div class="badge badge-info">Đã ký</div></td>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Ký gửi lich giảng dạy</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="card-body">
                        <h5 class="card-title">Nhập tiêu đề</h5>
                        <textarea name="text" id="exampleText" class="form-control"></textarea>
                        <h5 class="card-title" style="margin-top: 30px">Nhập file lịch học</h5>
                        <div>
                            <div class="input-group">

                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <input name="file" id="exampleFile" type="file" class="form-control-file">
                                    </span>
                                </div>
                            </div>
                        </div>

                        <h5 class="card-title" style="margin-top: 30px">Nhập khóa</h5>
                        <div>
                            <div class="input-group">
                                <input type="text" class="form-control" style="height: 42px" placeholder="Nhập khóa của bạn hoặc chọn file(txt) chứa khóa">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <input name="file" id="exampleFile" type="file" class="form-control-file">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary">Gửi</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endSection