@extends('master.master')

@section('title','Infor User')

@section('content')
	<div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-folder icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Thông tin cá nhân
                    </div>
                </div>    
        </div>
        <div class="row">
        	
        	<div class="col-md-12">
        		<div class="main-card mb-12 card" >
        			<center>
        			<div class="col-md-8"> 
						<div class="card-body">
					
				            <h5 class="card-title">Thông tin</h5>
				            <form class="needs-validation" novalidate action='EditInformation'>
				                <div class="form-row">
				                    <div class="col-md-12 mb-12">
				                        <label for="validationCustom01" style="float: left; margin-top: 20px">Họ tên</label>
										<?php $ten = $name[0];?>
				                        <input type="text" class="form-control" name= "NameUser" id="NameUser" placeholder="First name" value="{{$user->$ten}}" required>
				                        <div class="valid-feedback">
				                            Looks good!
				                        </div>
				                    </div>
				                    <div class="col-md-12 mb-12">
				                        <label for="validationCustom02" style="float: left;margin-top: 20px">CMND</label>
										<?php $SCMT = $name[1];?>
				                        <input type="text" class="form-control" name= "PeopleID" id="PeopleID" placeholder="Last name" value="{{$user->$SCMT}}" required>
				                        <div class="valid-feedback">
				                            Looks good!
				                        </div>
				                    </div>
				                    <div class="col-md-12 mb-12">
				                        <label for="validationCustom02" style="float: left;margin-top: 20px">Địa chỉ</label>
										<?php $diaChi = $name[2];?>
				                        <input type="text" class="form-control" name= "Address" id="Address" placeholder="Last name" value="{{$user->$diaChi}}" required>
				                        <div class="valid-feedback">
				                            Looks good!
				                        </div>
				                    </div>
				                    <div class="col-md-12 mb-12">
				                        <label for="validationCustom02" style="float: left;margin-top: 20px">Ngày sinh</label>
										<?php $ngaySinh = $name[3];?>
				                        <input type="date" class="form-control" name= "Birth" id="Birth" placeholder="Last name" value="{{$user->$ngaySinh}}" required>
				                        <div class="valid-feedback">
				                            Looks good!
				                        </div>
				                    </div>
				                    <div class="col-md-12 mb-12">
				                        <label for="validationCustom02" style="float: left;margin-top: 20px">SĐT</label>
										<?php $SDT = $name[4];?>
				                        <input type="text" class="form-control" name= "Phone" id="Phone" placeholder="Last name" value="{{$user->$SDT}}" required>
				                        <div class="valid-feedback">
				                            Looks good!
				                        </div>
				                    </div>
				                    <div class="col-md-12 mb-12">
				                        <label for="validationCustom02" style="float: left;margin-top: 20px">Email</label>
										<?php $email = $name[5];?>
				                        <input type="text" class="form-control" name= "Email" id="Email" placeholder="Last name" value="{{$user->$email}}" required>
				                        <div class="valid-feedback">
				                            Looks good!
				                        </div>
				                    </div>
				                    <div class="col-md-12 mb-12">
				                        <label for="validationCustom02" style="float: left;margin-top: 20px">Ảnh đại diện</label>
										<?php $anh = $name[6];?>
				                        <input type="file" class="form-control" name= "Avata" id="Avata" placeholder="Last name" required>
										<img src="{{ url('/image/'.$user->$anh) }}" height="100px" width="100px">
				                        <div class="valid-feedback">
				                            Looks good!
				                        </div>
				                    </div>
				                    <div class="col-md-12 mb-12">
				                        <label for="validationCustom02" style="float: left;margin-top: 20px">Giới tính</label>
				                        <?php $gioiTinh = $user[7]?>
				                        <select class="form-control" name= "Gender" id="Gender">
				                        	<option>Nam</option>
				                        	<option 
												<?php 
													if ($gioiTinh == 0) {
														echo('selected = "selected"');
													}
												?>>
												Nữ
											</option>
				                        </select>
				                        <div class="valid-feedback">
				                            Looks good!
				                        </div>
				                    </div>
									@if(Session::has('category')&&Session::get('category') == 0||Session::get('category') == 1||Session::get('category') == 2)
				                    <div class="col-md-12 mb-12">
				                        <label for="validationCustom02" style="float: left;margin-top: 20px">Chuyên ngành</label>
										<?php $chuyenNganh = $name[8];?>
				                        <input type="text" class="form-control" name= "Specialized" id="Specialized" placeholder="Last name" value="{{$user->$chuyenNganh}}" required>
				                        <div class="valid-feedback">
				                            Looks good!
				                        </div>
				                    </div>
									@endif
									@if(Session::has('category')&&Session::get('category') == 0||Session::get('category') == 1||Session::get('category') == 2)
				                    <div class="col-md-12 mb-12">
				                        <label for="validationCustom02" style="float: left;margin-top: 20px">Lương</label>
										<?php $luong = $name[9];?>
				                        <input type="text" class="form-control" name= "Salary" id="Salary" placeholder="Last name" value="{{$user->$luong}}" required>
				                        <div class="valid-feedback">
				                            Looks good!
				                        </div>
				                    </div>
									@endif
				                <button class="btn btn-primary" type="submit" style="margin-top: 20px;">Lưu thay đổi</button>

				            </form>

				            <script>
				                // Example starter JavaScript for disabling form submissions if there are invalid fields
				                (function() {
				                    'use strict';
				                    window.addEventListener('load', function() {
				                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
				                        var forms = document.getElementsByClassName('needs-validation');
				                        // Loop over them and prevent submission
				                        var validation = Array.prototype.filter.call(forms, function(form) {
				                            form.addEventListener('submit', function(event) {
				                                if (form.checkValidity() === false) {
				                                    event.preventDefault();
				                                    event.stopPropagation();
				                                }
				                                form.classList.add('was-validated');
				                            }, false);
				                        });
				                    }, false);
				                })();
				            </script>
				        </div>
					</div>
					
					</center>
		        </div>
			</div>
        	
    		
    	</div>
	</div>
@endSection

@section('LargeModal')

@endSection