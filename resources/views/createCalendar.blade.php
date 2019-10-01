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
        <!--
            <form>

                <table class="mb-0 table">
                    <thead>
                    <tr>
                        <th>Buổi</th>
                        <th>Bài giảng</th>
                        <th>Dự kiến tiến độ</th>
                        <th>Ghi chú</th>
                        <th>Tiến độ</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Tổng quan</td>
                            <td>28-10-2019</td>
                            <td></td>
                            <td>Hoàn thành ngày 21-10-2019</td>
                            <td style="color: green"><div class="custom-checkbox custom-control"><input type="checkbox" id="exampleCustomCheckbox1" class="custom-control-input" checked="checked"><label class="custom-control-label" for="exampleCustomCheckbox1"></label></div></td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Tổng quan</td>
                            <td>28-10-2019</td>
                            <td></td>
                            <td style="color: green"><div class="custom-checkbox custom-control"><input type="checkbox" id="exampleCustomCheckbox1" class="custom-control-input" checked="checked"><label class="custom-control-label" for="exampleCustomCheckbox1"></label></div></td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Tổng quan</td>
                            <td>28-10-2019</td>
                            <td></td>
                            <td style="color: green"><div class="custom-checkbox custom-control"><input type="checkbox" id="exampleCustomCheckbox2" class="custom-control-input"><label class="custom-control-label" for="exampleCustomCheckbox2"></label></div></td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Tổng quan</td>
                            <td>28-10-2019</td>
                            <td></td>
                            <td style="color: green"><div class="custom-checkbox custom-control"><input type="checkbox" id="exampleCustomCheckbox3" class="custom-control-input"><label class="custom-control-label" for="exampleCustomCheckbox3"></label></div></td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Tổng quan</td>
                            <td>28-10-2019</td>
                            <td></td>
                            <td style="color: green"><div class="custom-checkbox custom-control"><input type="checkbox" id="exampleCustomCheckbox4" class="custom-control-input"><label class="custom-control-label" for="exampleCustomCheckbox4"></label></div></td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Tổng quan</td>
                            <td>28-10-2019</td>
                            <td></td>
                            <td style="color: green"><div class="custom-checkbox custom-control"><input type="checkbox" id="exampleCustomCheckbox5" class="custom-control-input"><label class="custom-control-label" for="exampleCustomCheckbox5"></label></div></td>
                        </tr>
                        
                    </tbody>
                </table>
                <center>
                    <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" style="margin-top: 20px">Lưu thay đổi</button>
                </center>
            </form>
        -->
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Nhập thông tin lịch học</h5>
                        <form  class="needs-validation" novalidate>
                            <div class="col-md-12 mb-12">
                                <label for="validationCustom02" style="float: left;margin-top: 20px">Chọn môn học</label>
                                
                                <select class="form-control" id="validationCustom02">
                                    <option>Lập trình Windown</option>
                                    <option>Phát triển phần mềm hướng dịch vụ</option>
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <table class="mb-0 table" style="margin-top: 40px">

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
                                        <th scope="row">1</th>
                                        <td>
                                            <div class="col-md-12 mb-12">
                                                <textarea name="text" id="exampleText" class="form-control"></textarea>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-md-12 mb-12">
                                                
                                                <input type="date" class="form-control" id="validationCustom02" value="" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-md-12 mb-12">
                                                <textarea name="text" id="exampleText" class="form-control"></textarea>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>
                                            <div class="col-md-12 mb-12">
                                                <textarea name="text" id="exampleText" class="form-control"></textarea>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-md-12 mb-12">
                                                
                                                <input type="date" class="form-control" id="validationCustom02" value="" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-md-12 mb-12">
                                                <textarea name="text" id="exampleText" class="form-control"></textarea>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">3</td>
                                        <td>
                                            <div class="col-md-12 mb-12">
                                                <textarea name="text" id="exampleText" class="form-control"></textarea>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-md-12 mb-12">
                                                
                                                <input type="date" class="form-control" id="validationCustom02" value="" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-md-12 mb-12">
                                                <textarea name="text" id="exampleText" class="form-control"></textarea>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">4</td>
                                        <td>
                                            <div class="col-md-12 mb-12">
                                                <textarea name="text" id="exampleText" class="form-control"></textarea>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-md-12 mb-12">
                                                
                                                <input type="date" class="form-control" id="validationCustom02" value="" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-md-12 mb-12">
                                                <textarea name="text" id="exampleText" class="form-control"></textarea>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">5</td>
                                        <td>
                                            <div class="col-md-12 mb-12">
                                                <textarea name="text" id="exampleText" class="form-control"></textarea>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-md-12 mb-12">
                                                
                                                <input type="date" class="form-control" id="validationCustom02" value="" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-md-12 mb-12">
                                                <textarea name="text" id="exampleText" class="form-control"></textarea>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">6</td>
                                        <td>
                                            <div class="col-md-12 mb-12">
                                                <textarea name="text" id="exampleText" class="form-control"></textarea>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-md-12 mb-12">
                                                
                                                <input type="date" class="form-control" id="validationCustom02" value="" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-md-12 mb-12">
                                                <textarea name="text" id="exampleText" class="form-control"></textarea>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    
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