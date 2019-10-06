@extends('master.master')

@section('title','User Management')

@section('content')
	<div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-folder icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Quản lý tài khoản người dùng
                    </div>
                </div>    
            </div>
        </div>            
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách tài khoản</h5>
                        
                        <ul id="menuHome" style="list-style-type: none;">
                            <li style="float: left;padding-top: 5px"><button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Thêm tài khoản</button></li>

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
                                        <input type="text" name="name" class="form-control" placeholder="Tìm kiếm theo tên">
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
                                <th>Tài khoản</th>
                                <th>Mật khẩu</th>
                                <th>Chức vụ</th>
                                <th>Tác vụ</th>
                            </tr>
                            </thead>
                            <tbody id="tableDKL">
                            

                            <?php $i = 1 ?>
                            

                            @foreach($users as $user)
                                <tr>
                                    <td scope="row"> {{$i}} </td>
                                    <td>{{$user->user_userName}}</td>
                                    <td>{{md5($user->user_password)}}</td>
                                    <td>
                                        <?php
                                            switch ($user->user_category) {
                                                case '0':
                                                    # code...
                                                    echo "Giáo viên";
                                                    break;
                                                case '1':
                                                    # code...
                                                    echo "Tổ trưởng";
                                                    break;
                                                case '2':
                                                    # code...
                                                    echo "Trưởng khoa";
                                                    break;

                                                default:

                                                    break;
                                            }

                                        ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg{{$user->user_id}}" style="">Sửa</button>
                                        <button type="button" class="btn mr-2 mb-2 btn-secondary" data-toggle="modal" data-target=".bd-example-modal-sm{{$user->user_id}}" style="">Xóa</button>
                                    </td>
                                </tr>
                                <?php $i++; ?>

                                
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
    @foreach ($users as $user)
    <div class="modal fade bd-example-modal-lg{{$user->user_id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Chỉnh sửa tài khoản</h5>
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
                                        
                                        <form class="" method="post" action="editUser">
                                            @csrf
                                            <h5 class="card-title">Thông tin tài khoản</h5>

                                            <div class="position-relative form-group">
                                                <label for="exampleSelect" class="">Tên đăng nhập</label>
                                                <input type="text"  name="userName"id="exampleSelect" class="form-control" value="{{$user->user_userName}}">
                                            </div>
                                            <div class="position-relative form-group">
                                                <label for="exampleSelect" class="">Mật khẩu mới</label>
                                                <input type="password"  name="newPassword"id="exampleSelect" class="form-control">
                                            </div>
                                            <div class="position-relative form-group">
                                                <label for="exampleSelect" class="">Xác nhận mật khẩu</label>
                                                <input type="password"  name="reNewPassword"id="exampleSelect" class="form-control">
                                            </div>
                                            <label for="exampleSelect" class="">Chọn chức vụ</label>
                                                <select name="category" id="exampleSelect" class="form-control">
                                                    <option value="0" <?php if ($user->user_category == 0) {
                                                        # code...
                                                        echo 'selected="selected"';
                                                    } ?>>Giáo viên</option>
                                                    <option value="1"<?php if ($user->user_category == 1) {
                                                        # code...
                                                        echo 'selected="selected"';
                                                    } ?>>Tổ trưởng</option>
                                                    <option value="2"<?php if ($user->user_category == 2) {
                                                        # code...
                                                        echo 'selected="selected"';
                                                    } ?>>Trưởng khoa</option>
                                                </select>
                                            

                                            <div class="modal-footer" style="background-color: white ">
                                                <button type="button" class="btn btn-primary">Đặt lại</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                                <button type="submit" class="btn btn-primary">Lưu</button>
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
    @endforeach
@endSection

@section('SmallModal')
<!-- Small modal -->
    @foreach($users as $user)
    <div class="modal fade bd-example-modal-sm{{$user->user_id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="dialog">
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
                    <a href="destroyUser/{{$user->user_id}}"class="btn btn-primary">Xóa</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endSection

@section('LargeModal1')
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tạo tài khoản</h5>
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
                                    
                                    <form class="" method="post" action="createUser">
                                        @csrf
                                        <h5 class="card-title">Thông tin tài khoản</h5>

                                        <div class="position-relative form-group">
                                            <label for="exampleSelect" class="">Tên đăng nhập</label>
                                            <input type="text"  name="userName"id="exampleSelect" class="form-control">
                                        </div>
                                        
                                        <div class="position-relative form-group">
                                            <label for="exampleSelect" class="">Mật khẩu</label>
                                            <input type="password"  name="password"id="exampleSelect" class="form-control">
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="exampleSelect" class="">Xác nhận mật khẩu</label>
                                            <input type="password"  name="rePassword"id="exampleSelect" class="form-control">
                                        </div>
                                        <label for="exampleSelect" class="">Chọn chức vụ</label>
                                            <select name="category" id="exampleSelect" class="form-control">
                                                <option value="0">Giáo viên</option>
                                                <option value="1">Tổ trưởng</option>
                                                <option value="2">Trưởng khoa</option>
                                            </select>
                                        

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

            </div>
            
        </div>
    </div>
</div>
@endSection