@extends('master.master')

@section('title','Create Calendar')

@section('content')
	<div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-folder icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Tạo Lịch giảng dạy
                    </div>

                </div>    
            </div>
        </div>            
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Nhập thông tin lịch học</h5>
                        <form  class="needs-validation" action="createCalendar" method="post">
                            @csrf
                            <div class="col-md-6 mb-6" style="float: left;">
                                <label for="validationCustom02" style="float: left;margin-top: 20px">Chọn môn học</label>
                                
                                <select class="form-control" id="Subject" onchange="">
                                    @foreach ($Subjects as $Subject)
                                    <option value="{{$Subject->subject_numberCredit}}">{{$Subject->subject_name}}</option>
                                    
                                    @endforeach
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <div class="col-md-6 mb-6" style="float: left; margin-bottom: 40px">
                                <label for="validationCustom02" style="float: left;margin-top: 20px">Chọn số tiết học / 1 buổi</label>
                                
                                <select class="form-control" id="soTietHoc" onchange="test()">
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="6">6</option>
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>

                            <table class="mb-0 table" style="margin-top: 40px">

                                <thead>
                                <tr>
                                    <th style="width: 20px !important">Buổi</th>
                                    <th>Bài giảng</th>
                                    <th>Dự kiến tiến độ</th>
                                    <th>Ghi chú</th>
                                </tr>
                                </thead>
                                <tbody id="tbody">
                                    
                                </tbody>
                            </table>
                            <center><button class="btn btn-primary" type="submit" style="margin-top: 20px;">Tạo</button></center>
                        </form>
                    </div>
                </div>
            </div>
                
        </div>
    </div>

@endSection