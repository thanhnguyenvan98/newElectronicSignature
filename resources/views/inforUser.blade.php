@extends('master.master')

@section('title','Tổng quan')

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
        </div>
        <div class="row">
        	
        	<div class="col-md-12">
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
				                        <label for="validationCustom02" style="float: left;margin-top: 20px">Ảnh đại diện</label>
				                        <input type="file" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
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