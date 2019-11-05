@extends('master.master')

@section('title','Setting Account')

@section('content')
	<div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-folder icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Thay đổi mật khẩu
                    </div>
                </div>    
            </div>
        </div>
        <div class="row">
        	
        	<div class="col-md-12">
        		<div class="main-card mb-12 card" >
        			<center>
        			
        			<div class="col-md-8"> 
						<div class="card-body">
						<?php $user;?>
				            <h5 class="card-title">Thông tin</h5>
				            <form class="needs-validation" action="EditPassword" novalidate>
				                <div class="form-row">
				                    <div class="col-md-12 mb-12">
				                        <label for="validationCustom01" style="float: left; margin-top: 20px">Tài khoản</label>
				                        <input type="text" class="form-control" name= "Username" id="Username" placeholder="User Name" value="{{$user->user_userName}}" required>
				                        <div class="valid-feedback">
				                            Looks good!
				                        </div>
				                    </div>
				                    <div class="col-md-12 mb-12">
				                        <label for="validationCustom02" style="float: left;margin-top: 20px">Mật khẩu cũ</label>
				                        <input type="password" class="form-control" name= "Password" id="Password" placeholder="password" value="{md5({$user->user_passwords})}" required>
				                        <div class="valid-feedback">
				                            Looks good!
				                        </div>
				                    </div>
				                    <div class="col-md-12 mb-12">
				                        <label for="validationCustom02" style="float: left;margin-top: 20px">Mật khẩu mới</label>
				                        <input type="password" class="form-control" name= "NewPassword" id="NewPassword" placeholder="New Password" required>
				                        <div class="valid-feedback">NewPassword
				                            Looks good!
				                        </div>
				                    </div>
				                    <div class="col-md-12 mb-12">
				                        <label for="validationCustom02" style="float: left;margin-top: 20px">Nhập lại mật khẩu</label>
				                        <input type="password" class="form-control" name= "ConfirmPassword" id="ConfirmPassword" placeholder="Confirm Password" required>
				                        <div class="valid-feedback">
				                            Looks good!
				                        </div>
				                    </div>
				                    
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