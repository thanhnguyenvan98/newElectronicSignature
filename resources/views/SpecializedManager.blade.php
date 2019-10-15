@extends('master.master')

@section('title','Specialized Management')

@section('content')
	<div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-folder icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Quản lý danh sách khoa
                    </div>
                </div>    
            </div>
        </div>            
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách khoa</h5>
                        
                        <ul id="menuHome" style="list-style-type: none;">
                            <li style="float: left;padding-top: 5px"><button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Thêm khoa</button></li>

                            @if(Session::has('notice'))
                                <li style="color: red;padding-left: 100px; float: left; padding-top: 10px">
                                    {{Session::pull('notice')}}
                                </li>
                            @endif
                            <li>
                            <li style="float: right; padding-bottom:10px">
                                <form action="showSpecialized" method="post">
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
                                <th>Mã Khoa</th>
                                <th>Tên Khoa</th>
                                <th>Viết tắt</th>
                                <th>Miêu tả</th>
                                <th>Tác vụ</th>
                            </tr>
                            </thead>
                            <tbody id="tableDKL">
                            <?php $i = 1; ?>
                            
                            @foreach($specializeds as $specialized)
                                <tr>
                                    <td scope="row"> {{$i}} </td>
                                    <td>{{$specialized->specialized_id}}</td>
                                    <td>{{$specialized->specialized_name}}</td>
                                    <td>{{$specialized->specialized_acronym}}</td>
                                    <td>{{$specialized->specialized_description}}</td>
                                    <td>
                                        <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg{{$specialized->specialized_id}}" style="">Sửa</button>
                                        <!-- <button type="button" class="btn mr-2 mb-2 btn-secondary" data-toggle="modal" data-target=".bd-example-modal-sm{{$specialized->specialized_id}}" style="">Xóa</button> -->
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
    @foreach ($specializeds as $specialized)
    <div class="modal fade bd-example-modal-lg{{$specialized->specialized_id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Chỉnh sửa thông tin khoa</h5>
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
                                        
                                        <form class="" method="post" action="editSpecialized">
                                            @csrf
                                            <h5 class="card-title">Thông tin khoa</h5>

                                            <div class="position-relative form-group">
                                                <label for="exampleSelect" class="">Tên khoa</label>
                                                <input type="text"  name="specialized_name"id="exampleSelect" class="form-control" value="{{$specialized->specialized_name}}">
                                            </div>
                                            <div class="position-relative form-group">
                                                <label for="exampleSelect" class="">Viết tắt</label>
                                                <input type="text"  name="specialized_acronym"id="exampleSelect" class="form-control" value="{{$specialized->specialized_acronym}}">
                                            </div>
                                            <div class="position-relative form-group">
                                                <label for="exampleSelect" class="">mô tả</label>
                                                <input type="text"  name="specialized_description"id="exampleSelect" class="form-control" value="{{$specialized->specialized_description}}">
                                            </div>

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
    @foreach($specializeds as $specialized)
    <div class="modal fade bd-example-modal-sm{{$specialized->specialized_id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="dialog">
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
                    <a href="destroySpecialized/{{$specialized->specialized_id}}"class="btn btn-primary">Xóa</a>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Thêm khoa</h5>
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
                                    
                                    <form class="" method="post" action="createSpecialized">
                                        @csrf
                                        <h5 class="card-title">Thông tin khoa</h5>

                                        <div class="position-relative form-group">
                                            <label for="exampleSelect" class="">Tên khoa</label>
                                            <input type="text"  name="specialized_name"id="exampleSelect" class="form-control">
                                        </div>
                                        
                                        <div class="position-relative form-group">
                                            <label for="exampleSelect" class="">Viết tắt</label>
                                            <input type="text"  name="specialized_acronym"id="exampleSelect" class="form-control">
                                        </div>

                                        <div class="position-relative form-group">
                                            <label for="exampleSelect" class="">Mô tả</label>
                                            <input type="text"  name="specialized_description"id="exampleSelect" class="form-control">
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

            </div>
            
        </div>
    </div>
</div>
@endSection