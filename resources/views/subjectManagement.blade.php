@extends('master.master')

@section('title','Subject Management')

<!-- view -->
@section('content')
	<div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-folder icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Quản lý danh sách môn học
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
                            <li style="float: left;padding-top: 5px"><button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg-add">Thêm môn học</button></li>

                            @if(Session::has('notice'))
                                <li style="color: red;padding-left: 100px; float: left; padding-top: 10px">
                                    {{Session::pull('notice')}}
                                </li>
                            @endif
                            <li>
                            <li style="float: right; padding-bottom:10px">
                                <form action="ShowSubject" method="post">
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
                                <th>Tên</th>
                                <th>Số tín chỉ</th>
                                <th>Tên Khoa</th>
                                <th>Tác vụ</th>
                            </tr>
                            </thead>
                            <tbody id="tableDKL">
                                <?php $i = 1; ?>
                                @foreach($subjects as $subject)
                                <tr>
                                    <td scope="row" style="width: 20px">{{$i}}</td>
                                    <td>{{$subject->subject_name}}</td>
                                    <td>{{$subject->subject_numberCredit}}</td>
                                    <?php $id = $subject->Specialized_id; ?>
                                    <td>{{$nameSpecialized[$id]}}</td>
                                    <td>
                                        <button type="button" class="btn mr-2 mb-2 btn-primary"  data-number-credit="{{$subject->subject_numberCredit}}" data-spec-id="{{$subject->Specialized_id}}" data-form-action="{{route('EditSpecialized',['id'=>$subject->subject_id])}}" data-subject-name="{{$subject->subject_name}}" onclick="onEditButtonClick(this)" data-toggle="modal" data-target=".bd-example-modal-lg-edit" style="">Sửa</button>
                                        <button type="button" onclick="onDeleteButtonClick(this)" class="btn mr-2 mb-2 btn-secondary" data-id="{{$subject->subject_id}}" data-toggle="modal" data-target=".bd-delete-modal" style="">Xóa</button>
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
    <script>
        function onEditButtonClick(elm) {
            console.log(elm);
            $('.bd-example-modal-lg-edit #number_credit').val($(elm).attr('data-number-credit'));
            $('.bd-example-modal-lg-edit #subject_name').val($(elm).attr('data-subject-name'));
            $('.bd-example-modal-lg-edit #specialized_name').val($(elm).attr('data-spec-id'));
            //console.log();
            $('.EditSubject').attr('action', $(elm).attr('data-form-action'));

        }
        function onDeleteButtonClick(elm) {
            console.log(elm);
            let link = $('.bd-delete-modal a').attr('href') + $(elm).attr('data-id');
            $('.bd-delete-modal a').attr('href', link);
        }
    </script>
@endSection

<!-- edit -->
@section('LargeModal')
    <div class="modal fade bd-example-modal-lg-edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Chỉnh sửa thông tin môn học</h5>
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
                                        
                                        <form class="EditSubject" method="post" action="EditSubject">
                                            @csrf
                                            <h5 class="card-title">Thông tin môn học</h5>

                                            <div class="position-relative form-group">
                                                <label for="exampleSelect" class="">Tên Khoa</label>
                                                <input type="text"  name="subject_name" id="subject_name" class="form-control" value="">
                                            </div>
                                            <div class="position-relative form-group">
                                                <label for="exampleSelect" class="">Số Tín Chỉ</label>
                                                <input type="text"  name="number_credit" id="number_credit" class="form-control" value="">
                                            </div>
                                            <div class="position-relative form-group">
                                                <label for="exampleSelect" class="">Tên khoa</label>
                                                <select class="form-control" name= "specialized_name" id="specialized_name">
                                                @foreach($specializeds as $specialized)
                                                    <option value="{{$specialized->specialized_id}}">{{$specialized->specialized_name}}
                                                    </option>
                                                @endforeach
										        </select>
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
@endSection

<!-- delete -->
@section('SmallModal')
<!-- Small modal -->
    <div class="modal fade bd-delete-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="dialog">
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
                    <a href="DestroySubject/" class="btn btn-primary">Xóa</a>
                </div>
            </div>
        </div>
    </div>
@endSection

<!-- add -->
@section('LargeModal1')
<div class="modal fade bd-example-modal-lg-add" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Thêm môn học</h5>
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
                                    
                                    <form class="" method="post" action="CreateSubject">
                                        @csrf
                                        <h5 class="card-title">Thông tin môn học</h5>

                                        <div class="position-relative form-group">
                                            <label for="exampleSelect" class="">Tên Môn Học</label>
                                            <input type="text"  name="subject_name"id="exampleSelect" class="form-control">
                                        </div>
                                        
                                        <div class="position-relative form-group">
                                            <label for="exampleSelect" class="">Số Tín Chỉ</label>
                                            <input type="text"  name="number_credit"id="exampleSelect" class="form-control">
                                        </div>

                                        <div class="position-relative form-group">
                                            <label for="exampleSelect" class="">Tên khoa</label>
                                            <select class="form-control" name= "specialized_name" id="specialized_name">
                                            @foreach($specializeds as $specialized)
                                                <option>{{$specialized->specialized_name}}</option>
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
            </div>
        </div>
    </div>
</div>
@endSection