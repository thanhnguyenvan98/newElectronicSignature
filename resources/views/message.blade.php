@extends('master.master')

@section('title','Message')

@section('content')
	<div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-folder icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Tin nhắn
                    </div>
                </div>    
            </div>
        </div>            
        
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Danh sách người dùng
                        
                    </div>
                    <div class="table-responsive">
                        <div class="scroll-area-md" style="height: 400px">
                            <div class="scrollbar-container ps--active-y ps" >
                                <!--message view-->
                                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center">STT</th>
                                        <th>Name</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>

                                        @foreach($deans as $dean)
                                        <tr>
                                            <td class="text-center text-muted">{{$i}}</td>
                                            <td>
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left mr-3">
                                                            <div class="widget-content-left">
                                                                <img width="40" class="rounded-circle" src="assets/image/{{$dean->dean_image}}" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="widget-content-left flex2">
                                                            <div class="widget-heading">{{$dean->dean_name}}</div>
                                                            <div class="widget-subheading opacity-7">Trưởng Khoa</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <a href="messageInfor/{{$dean->user_id}}" class="btn mr-2 mb-2 btn-primary">Chi tiết</a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        @endforeach

                                        @foreach($teachers as $teacher)
                                        <tr>
                                            <td class="text-center text-muted">{{$i}}</td>
                                            <td>
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left mr-3">
                                                            <div class="widget-content-left">
                                                                <img width="40" class="rounded-circle" src="assets/image/{{$teacher->teacher_image}}" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="widget-content-left flex2">
                                                            <div class="widget-heading">{{$teacher->teacher_name}}</div>
                                                            <div class="widget-subheading opacity-7">Giáo viên</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <a href="messageInfor/{{$teacher->user_id}}" class="btn mr-2 mb-2 btn-primary">Chi tiết</a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        @endforeach

                                        @foreach($leaders as $leader)
                                        <tr>
                                            <td class="text-center text-muted">{{$i}}</td>
                                            <td>
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left mr-3">
                                                            <div class="widget-content-left">
                                                                <img width="40" class="rounded-circle" src="assets/image/{{$leader->leader_image}}" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="widget-content-left flex2">
                                                            <div class="widget-heading">{{$leader->leader_name}}</div>
                                                            <div class="widget-subheading opacity-7">Tổ trưởng</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <a href="messageInfor/{{$leader->user_id}}" class="btn mr-2 mb-2 btn-primary">Chi tiết</a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        @endforeach
                                        
                                    </tbody>
                        </table>

                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                </div>
                                <div class="ps__rail-y" style="top: 0px; height: 300px; right: 0px;">
                                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 125px;"></div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="row">
            
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
                <div class="row">
                    <div class="main-card col-md-12 card">
                        <div class="card-body">
                            <h5 class="card-title">Tin nhắn</h5>
                            <div class="scroll-area-md">
                                <div class="scrollbar-container ps--active-y ps" >
                                    <!--message view-->
                                    <div style="float: left; width: 100%">
                                        <img width="40" class="rounded-circle" src="assets/images/avatars/4.jpg" alt="" style="float: left;margin: 10px;">
                                        <p style="float: left;width: 70%;text-align: left; border-radius: 5px; border: 1px solid black ; padding: 10px ; margin-bottom: 10px; background-color: #1877F2; color: white">hahaha Bạn đang xem tag html textarea, là tag có thể nhập được văn bản, và có thể chứa được rất nhiều dòng Bạn đang xem tag html textarea, là tag có thể nhập được văn bản, và có thể chứa được rất nhiều dòngBạn đang xem tag html textarea, là tag có thể nhập được văn bản, và có thể chứa được rất nhiều dòng</p>
                                        <small style="float: left;margin: 10px;"><?php echo date('d/m/Y - H:i:s'); ?></small>
                                    </div>
                                    <div style="float: left; width: 100%">

                                        <p style="float: right;width: 70%; background-color:#DADDE1 ;text-align: right; border-radius: 5px; border: 1px solid black ; padding: 10px ; margin-bottom: 10px">sdfhsdfhsdfs</p>
                                        <small style="float: right;margin: 10px;"><?php echo date('d/m/Y - H:i:s'); ?></small>
                                    </div>

                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                    </div>
                                    <div class="ps__rail-y" style="top: 0px; height: 300px; right: 0px;">
                                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 125px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-card col-md-12 card" style="padding-top: 20px">
                        <form action="sendMessage" method="post">
                            
                           @csrf
                            
                            <div class="position-relative row form-group">
                                <div class="col-md-12"><textarea name="content" id="exampleText" class="form-control"></textarea></div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-secondary" style="float: right;">Gửi</button>
                            </div>
                        </form>
                             
                    </div>

                </div>
                
            </div>
        </div>
    </div>
</div>
@endSection