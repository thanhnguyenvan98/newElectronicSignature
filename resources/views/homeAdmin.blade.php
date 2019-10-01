@extends('master.master')

@section('title','Home')

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-folder fas fa-home">
                        </i>
                    </div>
                    <div>Tổng quan
                    </div>
                </div>    
            </div>
        </div>            
        <div class="row">
            <div class="col-md-6 col-xl-4">
                <a href="" style="text-decoration: none;">
                    <div class="card mb-3 widget-content bg-midnight-bloom">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Thông báo</div>
                                <div class="widget-subheading">Thông báo mới</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><span>1</span></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-4">
                <a href="" style="text-decoration: none;">
                    <div class="card mb-3 widget-content bg-arielle-smile">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Thu nhập</div>
                                <div class="widget-subheading">Thu nhập trong tháng</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><span>1tr</span></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-4">
                <a href="" style="text-decoration: none;">
                    <div class="card mb-3 widget-content bg-grow-early">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Tin nhắn</div>
                                <div class="widget-subheading">Tin nhắn mới</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><span>4</span></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-premium-dark">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Products Sold</div>
                            <div class="widget-subheading">Revenue streams</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-warning"><span>$14M</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12" style="margin-top: 40px">
                <div class="card-header" style="height: 130px">
                    <ul id="menuHome" style="margin-left: -20px" class="col-md-12">
                        <li style="padding-bottom: 5px;padding-top: 20px"><h4>Doanh thu</h4></li>
                        
                        <li style="float: right;">
                            <div class="search-wrapper">
                                <div class="input-holder">
                                    <input type="text" class="search-input" placeholder="Nhập vào tháng">
                                    <button class="search-icon"><span></span></button>
                                </div>
                                <button class="close"></button>
                            </div>
                        </li>
                        <li style="float: right; padding-top: 11px;padding-right: 20px">Tìm kiếm theo tháng</li>
                    </ul>
                    
                </div>
                
                <div class="tab-content">
                            
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="main-card mb-12 card">
                                            <div class="card-body">
                                                <h5 class="card-title">Năm 2019</h5>
                                                <canvas id="canvas"></canvas>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
            </div>

            <div class="col-md-6" style="margin-top: 40px">
                <div class="main-card mb-3 card">
                    <div class="card-header">Tin nhắn trong ngày
                        
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Name</th>
                                <th class="text-center">Thời gian</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center text-muted">#345</td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img width="40" class="rounded-circle" src="assets/images/avatars/4.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">John Doe</div>
                                                <div class="widget-subheading opacity-7">Web Developer</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">Madrid</td>
                                <td class="text-center">
                                    <div class="badge badge-warning">Pending</div>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg1">Chi tiết</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center text-muted">#347</td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img width="40" class="rounded-circle" src="assets/images/avatars/3.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">Ruben Tillman</div>
                                                <div class="widget-subheading opacity-7">Etiam sit amet orci eget</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">Berlin</td>
                                <td class="text-center">
                                    <div class="badge badge-success">Completed</div>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg1">Chi tiết</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center text-muted">#321</td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img width="40" class="rounded-circle" src="assets/images/avatars/2.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">Elliot Huber</div>
                                                <div class="widget-subheading opacity-7">Lorem ipsum dolor sic</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">London</td>
                                <td class="text-center">
                                    <div class="badge badge-danger">In Progress</div>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg1">Chi tiết</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center text-muted">#55</td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img width="40" class="rounded-circle" src="assets/images/avatars/1.jpg" alt=""></div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">Vinnie Wagstaff</div>
                                                <div class="widget-subheading opacity-7">UI Designer</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">Amsterdam</td>
                                <td class="text-center">
                                    <div class="badge badge-info">On Hold</div>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg1">Chi tiết</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>

            <div class="col-lg-6"  style="margin-top: 40px">
                <div class="main-card mb-3 card">
                    <div class="card-body"> 
                        <h5 class="card-title">Danh sách tài khoản manager mới trong ngày</h5>
                        
                        
                        <table class="mb-0 table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Ảnh</th>
                                <th>Tài khoản</th>
                                <th>Mật khẩu</th>
                                <th>Tác vụ</th>
                            </tr>
                            </thead>
                            <tbody id="tableDKL">
                            <tr>
                                <th scope="row">1</th>
                                 <td> <img width="42" class="rounded-circle" src="assets/images/avatars/1.jpg" alt=""></td>
                                <td>NguyenThanh131</td>
                                <td>anhboyvip9x</td>
                                <td>
                                    <center>
                                    <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Chi tiết</button>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td> <img width="42" class="rounded-circle" src="assets/images/avatars/1.jpg" alt=""></td>
                                <td>NguyenThanh131</td>
                                <td>anhboyvip9x</td>
                                <td>
                                    <center>
                                    <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Chi tiết</button>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                 <td> <img width="42" class="rounded-circle" src="assets/images/avatars/1.jpg" alt=""></td>
                                <td>NguyenThanh131</td>
                                <td>anhboyvip9x</td>
                                <td>
                                    <center>
                                    <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Chi tiết</button>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                 <td> <img width="42" class="rounded-circle" src="assets/images/avatars/1.jpg" alt=""></td>
                                <td>NguyenThanh131</td>
                                <td>anhboyvip9x</td>
                                <td>
                                    <center>
                                    <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Chi tiết</button>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                 <td> <img width="42" class="rounded-circle" src="assets/images/avatars/1.jpg" alt=""></td>
                                <td>NguyenThanh131</td>
                                <td>anhboyvip9x</td>
                                <td>
                                    <center>
                                    <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Chi tiết</button>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                 <td> <img width="42" class="rounded-circle" src="assets/images/avatars/1.jpg" alt=""></td>
                                <td>NguyenThanh131</td>
                                <td>anhboyvip9x</td>
                                <td>
                                    <center>
                                    <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Chi tiết</button>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                 <td> <img width="42" class="rounded-circle" src="assets/images/avatars/1.jpg" alt=""></td>
                                <td>NguyenThanh131</td>
                                <td>anhboyvip9x</td>
                                <td>
                                    <center>
                                    <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Chi tiết</button>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                 <td> <img width="42" class="rounded-circle" src="assets/images/avatars/1.jpg" alt=""></td>
                                <td>NguyenThanh131</td>
                                <td>anhboyvip9x</td>
                                <td>
                                    <center>
                                    <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Chi tiết</button>
                                    </center>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Thông báo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="margin-left: 20px">
                <div class="main-card mb-12 card" >
                    <center>
                    
                    <div class="col-md-8"> 
                        <div class="card-body">
                            <h5 class="card-title">Thông tin</h5>
                            <form class="needs-validation" novalidate>
                                <div class="form-row">
                                    <div class="col-md-12 mb-12">
                                        <label for="validationCustom01" style="float: left; margin-top: 20px">Họ tên</label>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-12">
                                        <label for="validationCustom02" style="float: left;margin-top: 20px">CMND</label>
                                        <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-12">
                                        <label for="validationCustom02" style="float: left;margin-top: 20px">Địa chỉ</label>
                                        <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-12">
                                        <label for="validationCustom02" style="float: left;margin-top: 20px">Ngày sinh</label>
                                        <input type="date" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-12">
                                        <label for="validationCustom02" style="float: left;margin-top: 20px">SĐT</label>
                                        <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-12">
                                        <label for="validationCustom02" style="float: left;margin-top: 20px">Email</label>
                                        <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 mb-12">
                                        <label for="validationCustom02" style="float: left;margin-top: 20px">Giới tính</label>
                                        
                                        <select class="form-control" id="validationCustom02">
                                            <option>Nam</option>
                                            <option>Nữ</option>
                                        </select>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-12">
                                        <label for="validationCustom02" style="float: left;margin-top: 20px">Chuyên ngành</label>
                                        <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-12">
                                        <label for="validationCustom02" style="float: left;margin-top: 20px">Lương</label>
                                        <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                 <!--   
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                        <label class="form-check-label" for="invalidCheck">
                                            Agree to terms and conditions
                                        </label>
                                        <div class="invalid-feedback">
                                            You must agree before submitting.
                                        </div>
                                    </div>
                                </div>-->
                                

                            </form>

                            
                        </div>
                    </div>
                    
                    </center>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
                
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
                <h5 class="modal-title" id="exampleModalLongTitle">Thông báo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="margin-left: 20px">
                <p>Người gửi : John Doe Web Developer</p>
                <p>Ngày gửi : 1/1/09</p>
                <p>Nội dung:</p>
                <p>Có những ứng dụng sẽ luôn luôn chạy ngầm nên chiếm rất nhiều tài nguyên của máy. Điển hình như Facebook, Messenger, Snapchat,... Việc gỡ đi những ứng dụng này sẽ làm cho chiếc smartphone của bạn nhanh lên 1 cách rõ rệt. Thay vì dùng các ứng dụng nặng nề đó các bạn có thể lựa chọn trình duyệt web để sử dụng cho cả Facebook và Messenger.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
                
            </div>
        </div>
    </div>
</div>
@endSection