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
            @if(Session::has('notice'))
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header">{{Session::pull('notice')}}
                        </div>
                    </div>
                </div>
            @endif
            @if(Session::has('feedBackSendEmail'))
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header">{{Session::pull('feedBackSendEmail')}}
                        </div>
                    </div>
                </div>
            @endif
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
                                <div class="widget-heading">Tình trạng ký duyệt</div>
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
                        <li style="padding-bottom: 5px;padding-top: 20px"><h4>Tiến trình giảng dạy của giáo viên</h4></li>
                        
                        <li style="float: right;">
                            <div class="search-wrapper">
                                <div class="input-holder">
                                    <input type="text" class="search-input" placeholder="Nguyễn Văn A">
                                    <button class="search-icon"><span></span></button>
                                </div>
                                <button class="close"></button>
                            </div>
                        </li>
                        <li style="float: right; padding-top: 11px;padding-right: 20px">Tìm kiếm theo tên của giảng viên</li>
                        <li><h4 style="float: left;">Nguyễn Văn A</h4></li>
                    </ul>
                    
                </div>
                
                <div class="main-card mb-12 card">
                    <div class="card-body">
                        <h5 class="card-title">Phát triển phần mềm hướng dịch vụ</h5>

                        <div class="collapse" id="collapseExample1"> 
                            
                            <p>Mã lớp: KTPM2K11</p>
                            <p>Trạng thái ký duyệt: Đã đợc ký duyệt</p>
                            <p>Tiến độ: 10%</p>
                            <div class="mb-3 progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%;"></div>
                            </div>
                            <p>Bảng tiến trình</p>
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
                                        
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Tổng quan</td>
                                        <td>28-10-2019</td>
                                        <td></td>
                                        <td style="color: green"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Tổng quan</td>
                                        <td>28-10-2019</td>
                                        <td></td>
                                        <td style="color: green"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Tổng quan</td>
                                        <td>28-10-2019</td>
                                        <td></td>
                                        <td style="color: green"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Tổng quan</td>
                                        <td>28-10-2019</td>
                                        <td></td>
                                        <td style="color: green"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Tổng quan</td>
                                        <td>28-10-2019</td>
                                        <td></td>
                                        <td style="color: green"></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        
                        </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" data-toggle="collapse" href="#collapseExample1" class="btn btn-primary">Chi tiết</button>
                    </div>
                </div>
                <div class="main-card mb-12 card">
                    <div class="card-body">
                        <h5 class="card-title">Lập trình Java</h5>
                        <div class="collapse" id="collapseExample2">
                            
                            <p>Mã lớp: KTPM2K11</p>
                            <p>Trạng thái ký duyệt: Đã đợc ký duyệt</p>
                            <p>Tiến độ: 10%</p>
                            <div class="mb-3 progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%;"></div>
                            </div>
                            <p>Bảng tiến trình</p>
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
                                    <!--<td style="color: green"><div class="custom-checkbox custom-control"><input type="checkbox" id="exampleCustomCheckbox1" class="custom-control-input" checked="checked"><label class="custom-control-label" for="exampleCustomCheckbox1"></label></div></td>-->
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Tổng quan</td>
                                    <td>28-10-2019</td>
                                    <td></td>
                                    <td style="color: green"></td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Tổng quan</td>
                                    <td>28-10-2019</td>
                                    <td></td>
                                    <td style="color: green"></td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Tổng quan</td>
                                    <td>28-10-2019</td>
                                    <td></td>
                                    <td style="color: green"></td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Tổng quan</td>
                                    <td>28-10-2019</td>
                                    <td></td>
                                    <td style="color: green"></td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Tổng quan</td>
                                    <td>28-10-2019</td>
                                    <td></td>
                                    <td style="color: green"></td>
                                </tr>
                                
                            </tbody>
                        </table>
                        
                        </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" data-toggle="collapse" href="#collapseExample2" class="btn btn-primary">Chi tiết</button>
                    </div>
                </div>
            </div>

            <div class="col-md-12" style="margin-top: 40px">
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
                                    <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Chi tiết</button>
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
                                    <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Chi tiết</button>
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
                                    <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Chi tiết</button>
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
                                    <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Chi tiết</button>
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