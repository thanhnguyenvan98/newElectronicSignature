@extends('master.master')

@section('title','Subjecct Management')

@section('content')
	<div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-folder icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Quản lý môn học
                    </div>
                </div>    
            </div>
        </div>            
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách môn học</h5>
                        <ul id="menuHome" style="list-style-type: none;">
                            <li style="float: left;padding-top: 5px"><button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg1">Thêm môn học</button></li>
                            
                            <li style="float: right; padding-bottom:10px">
                                <div class="search-wrapper">
                                    <div class="input-holder">
                                        <input type="text" class="search-input" placeholder="điền tên môn học">
                                        <button class="search-icon"><span></span></button>
                                    </div>
                                    <button class="close"></button>
                                </div>
                            </li>
                            <li style="padding-right: 20px; float: right;padding-top: 10px">Tìm kiếm môn học</li>
                        </ul>
                        
                        <table class="mb-0 table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Số tín chỉ</th>
                                <th>Số tiết trong ngày</th>
                                <th>Môn thực hành</th>
                                <th>Tác vụ</th>
                            </tr>
                            </thead>
                            <tbody id="tableDKL">
                            <tr>
                                <th scope="row">1</th>
                                
                                <td>Lập trình java</td>
                                <td>3</td>
                                <td>3</td>
                                <td>Có</td>
                                <td>
                                    <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" style="float: left; width: 50px">Sửa</button>
                                    <button type="button" class="btn mr-2 mb-2 btn-secondary" data-toggle="modal" data-target=".bd-example-modal-sm " style="float: left;">Xóa</button>
                                </td>
                            	<tr>
	                                <th scope="row">1</th>
	                                
	                                <td>Lập trình java</td>
	                                <td>3</td>
	                                <td>3</td>
	                                <td>Có</td>
	                                <td>
	                                    <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" style="float: left; width: 50px">Sửa</button>
	                                    <button type="button" class="btn mr-2 mb-2 btn-secondary" data-toggle="modal" data-target=".bd-example-modal-sm " style="float: left;">Xóa</button>
	                                </td>
	                            </tr>
	                            <tr>
	                                <th scope="row">1</th>
	                                
	                                <td>Lập trình java</td>
	                                <td>3</td>
	                                <td>3</td>
	                                <td>Có</td>
	                                <td>
	                                    <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" style="float: left; width: 50px">Sửa</button>
	                                    <button type="button" class="btn mr-2 mb-2 btn-secondary" data-toggle="modal" data-target=".bd-example-modal-sm " style="float: left;">Xóa</button>
	                                </td>
	                            </tr>
	                            <tr>
	                                <th scope="row">1</th>
	                                
	                                <td>Lập trình java</td>
	                                <td>3</td>
	                                <td>3</td>
	                                <td>Có</td>
	                                <td>
	                                    <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" style="float: left; width: 50px">Sửa</button>
	                                    <button type="button" class="btn mr-2 mb-2 btn-secondary" data-toggle="modal" data-target=".bd-example-modal-sm " style="float: left;">Xóa</button>
	                                </td>
	                            </tr>
	                            <tr>
	                                <th scope="row">1</th>
	                                
	                                <td>Lập trình java</td>
	                                <td>3</td>
	                                <td>3</td>
	                                <td>Có</td>
	                                <td>
	                                    <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" style="float: left; width: 50px">Sửa</button>
	                                    <button type="button" class="btn mr-2 mb-2 btn-secondary" data-toggle="modal" data-target=".bd-example-modal-sm " style="float: left;">Xóa</button>
	                                </td>
	                            </tr>
	                            <tr>
	                                <th scope="row">1</th>
	                                
	                                <td>Lập trình java</td>
	                                <td>3</td>
	                                <td>3</td>
	                                <td>Có</td>
	                                <td>
	                                    <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" style="float: left; width: 50px">Sửa</button>
	                                    <button type="button" class="btn mr-2 mb-2 btn-secondary" data-toggle="modal" data-target=".bd-example-modal-sm " style="float: left;">Xóa</button>
	                                </td>
	                            </tr>
	                            <tr>
	                                <th scope="row">1</th>
	                                
	                                <td>Lập trình java</td>
	                                <td>3</td>
	                                <td>3</td>
	                                <td>Có</td>
	                                <td>
	                                    <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" style="float: left; width: 50px">Sửa</button>
	                                    <button type="button" class="btn mr-2 mb-2 btn-secondary" data-toggle="modal" data-target=".bd-example-modal-sm " style="float: left;">Xóa</button>
	                                </td>
	                            </tr>
	                            <tr>
	                                <th scope="row">1</th>
	                                
	                                <td>Lập trình java</td>
	                                <td>3</td>
	                                <td>3</td>
	                                <td>Có</td>
	                                <td>
	                                    <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" style="float: left; width: 50px">Sửa</button>
	                                    <button type="button" class="btn mr-2 mb-2 btn-secondary" data-toggle="modal" data-target=".bd-example-modal-sm " style="float: left;">Xóa</button>
	                                </td>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Chỉnh sửa môn học</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    
                                    <form class="">
                                        <h5 class="card-title">Thông tin môn học</h5>

                                        <div class="position-relative form-group">
                                            <label for="exampleSelect" class="">Tên</label>
                                            <input type="text"  name=""id="exampleSelect" class="form-control" >
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="exampleSelect" class="">Số tín chỉ</label>
                                            <input type="number"  name=""id="exampleSelect" class="form-control">
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="exampleSelect" class="">Số tiết trong ngày</label>
                                            <input type="number"  name=""id="exampleSelect" class="form-control">
                                        </div>
                                        
                                        <label for="exampleSelect" class="">Loại học phần</label>
                                            <select name="select" id="exampleSelect" class="form-control">
                                                
                                                <option>Có thực hành</option>
                                                <option>Không có thực hành</option>
                                            </select>
                                        

                                        <div class="modal-footer" style="background-color: white ">
                                            <button type="button" class="btn btn-primary">Đặt lại</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                            <button type="button" class="btn btn-primary">Lưu</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
        </div>
    </div>
</div>
@endSection

@section('SmallModal')
<!-- Small modal -->

<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Thông báo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Bạn có chắc chắn muốn xóa</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-primary">Xóa</button>
            </div>
        </div>
    </div>
</div>

@endSection

@section('LargeModal1')
<div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tạo mới môn học</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    
                                    <form class="">
                                        <h5 class="card-title">Thông tin môn học</h5>

                                        <div class="position-relative form-group">
                                            <label for="exampleSelect" class="">Tên</label>
                                            <input type="text"  name=""id="exampleSelect" class="form-control" >
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="exampleSelect" class="">Số tín chỉ</label>
                                            <input type="number"  name=""id="exampleSelect" class="form-control">
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="exampleSelect" class="">Số tiết trong ngày</label>
                                            <input type="number"  name=""id="exampleSelect" class="form-control">
                                        </div>
                                        
                                        <label for="exampleSelect" class="">Loại học phần</label>
                                            <select name="select" id="exampleSelect" class="form-control">
                                                
                                                <option>Có thực hành</option>
                                                <option>Không có thực hành</option>
                                            </select>
                                        

                                        <div class="modal-footer" style="background-color: white ">
                                            <button type="button" class="btn btn-primary">Đặt lại</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                            <button type="button" class="btn btn-primary">Lưu</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
        </div>
    </div>
</div>
@endSection