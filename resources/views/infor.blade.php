
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
    <link href="{{asset('css/myCss.css')}}" rel="stylesheet">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
    @yield('script')
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

    {{--gọi code phần header--}}
	<div class="app-header header-shadow">
	    <div class="app-header__logo">
	        <div class="logo-src"></div>
	        <div class="header__pane ml-auto">
	            <div>
	                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
	                    <span class="hamburger-box">
	                        <span class="hamburger-inner"></span>
	                    </span>
	                </button>
	            </div>
	        </div>
	    </div>
	    <div class="app-header__mobile-menu">
	        <div>
	            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
	                <span class="hamburger-box">
	                    <span class="hamburger-inner"></span>
	                </span>
	            </button>
	        </div>
	    </div>
	    <div class="app-header__menu">
	        <span>
	            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
	                <span class="btn-icon-wrapper">
	                    <i class="fa fa-ellipsis-v fa-w-6"></i>
	                </span>
	            </button>
	        </span>
	    </div>    
	    <div class="app-header__content">
	        <!--<div class="app-header-left">
	            <div class="search-wrapper">
	                <div class="input-holder">
	                    <input type="text" class="search-input" placeholder="Type to search">
	                    <button class="search-icon"><span></span></button>
	                </div>
	                <button class="close"></button>
	            </div>  
	        </div>-->
	        <div class="app-header-right">
	            <div class="header-btn-lg pr-0">
	                <div class="widget-content p-0">
	                    <div class="widget-content-wrapper">
	                        <div class="widget-content-left">
	                            <div class="btn-group">
	                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
	                                    <img width="42" class="rounded-circle" src="assets/images/avatars/1.jpg" alt="">
	                                    <i class="fa fa-angle-down ml-2 opacity-8"></i>
	                                </a>
	                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
	                                    
	                                    <ul class="vertical-nav-menu">
	                                        
	                                        <li class="app-sidebar__heading ">
	                                            <a href="logout" class="" style="color: black">
	                                                Logout
	                                            </a>
	                                        </li>
	                                        
	                                    </ul>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="widget-content-left  ml-3 header-user-info">
	                            <div class="widget-heading">
	                                Alina Mclourd
	                            </div>
	                            <div class="widget-subheading">
	                                VP People Manager
	                            </div>
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>        
	        </div>
	    </div>
	</div>

        <div class="app-main">
                
            {{--gọi code phần menuleft--}}
			<div class="app-sidebar sidebar-shadow">
			    <div class="app-header__logo">
			        <div class="logo-src"></div>
			        <div class="header__pane ml-auto">
			            <div>
			                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
			                    <span class="hamburger-box">
			                        <span class="hamburger-inner"></span>
			                    </span>
			                </button>
			            </div>
			        </div>
			    </div>
			    <div class="app-header__mobile-menu">
			        <div>
			            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
			                <span class="hamburger-box">
			                    <span class="hamburger-inner"></span>
			                </span>
			            </button>
			        </div>
			    </div>
			    <div class="app-header__menu">
			        <span>
			            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
			                <span class="btn-icon-wrapper">
			                    <i class="fa fa-ellipsis-v fa-w-6"></i>
			                </span>
			            </button>
			        </span>
			    </div>    <div class="scrollbar-sidebar">
			        <div class="app-sidebar__inner">
			            <ul class="vertical-nav-menu">
			                @if(Session::has('category')&&Session::get('category') == 4)
			                <li class="app-sidebar__heading ">
			                    <a href="homeAdmin" class="mm-active bg-midnight-bloom" style="color: white">
			                        Tổng quan
			                    </a>
			                </li>
			                @endif

			                @if(Session::has('category')&&Session::get('category') == 0)
			                <li class="app-sidebar__heading ">
			                    <a href="#" class="mm-active bg-midnight-bloom" style="color: white">
			                        Tổng quan
			                    </a>
			                </li>
			                @endif
			                @if(Session::has('category')&&Session::get('category') == 1)
			                <li class="app-sidebar__heading ">
			                    <a href="#" class="mm-active bg-midnight-bloom" style="color: white">
			                        
			                        Tổng quan
			                    </a>
			                </li>
			                @endif
			                @if(Session::has('category')&&Session::get('category') == 2)
			                <li class="app-sidebar__heading ">
			                    <a href="#" class="mm-active bg-midnight-bloom" style="color: white">
			                        
			                        Tổng quan
			                    </a>
			                </li>
			                @endif
			                @if(Session::has('category')&&Session::get('category') == 3)                
			                <li class="app-sidebar__heading ">
			                    <a href="#" class="mm-active bg-midnight-bloom" style="color: white">
			                        
			                        Tổng quan
			                    </a>
			                </li>
			                @endif

			                @if(Session::has('category')&&Session::get('category') == 0)
			                <li class="app-sidebar__heading ">
			                    <a href="#" class="bg-grow-early" style="color: white">
			                        
			                        Lịch trình giảng dạy
			                    </a>
			                </li>
			                @endif
			                
			                @if(Session::has('category')&&Session::get('category') == 0)
			                <li class="app-sidebar__heading ">
			                    <a href="#" class="bg-love-kiss" style="color: white">
			                        
			                        Ký & gửi lịch giảng dạy
			                    </a>
			                </li>
			                @endif

			                @if(Session::has('category')&&Session::get('category') == 1)
			                <li class="app-sidebar__heading ">
			                    <a href="#" class="bg-love-kiss" style="color: white">
			                        Ký & gửi lịch
			                    </a>
			                </li>
			                @endif
			                @if(Session::has('category')&&Session::get('category') == 2)
			                <li class="app-sidebar__heading ">
			                    <a href="#" class="bg-love-kiss" style="color: white">
			                        Ký & gửi lịch
			                    </a>
			                </li>
			                @endif

			                @if(Session::has('login') && Session::get('login') == true)
			                <li class="app-sidebar__heading ">
			                    <a href="#" class="bg-plum-plate" style="color: white">
			                        
			                        Tin nhắn
			                    </a>
			                </li>
			                @endif

			                @if(Session::has('category') && Session::get('category') != 0 && Session::get('category') != 4 )
			                <li class="app-sidebar__heading ">
			                    <a href="#" class="bg-plum-plate" style="color: white">
			                        Quản lý tài khoản
			                    </a>
			                </li>
			                @endif

			                @if(Session::has('category') && Session::get('category') == 4)
			                <li class="app-sidebar__heading ">
			                    <a href="#" class="bg-plum-plate" style="color: white">
			                        Quản lý tài khoản
			                    </a>
			                </li>
			                @endif

			                @if(Session::has('category') && Session::get('category') == 3)
			                <li class="app-sidebar__heading ">
			                    <a href="#" class="bg-plum-plate" style="color: white">
			                        Quản lý lịch giảng dạy
			                    </a>
			                </li>
			                @endif

			                @if(Session::has('category') && Session::get('category') == 4)
			                <li class="app-sidebar__heading ">
			                    <a href="#" class="bg-plum-plate" style="color: white">
			                        Quản lý lịch giảng dạy
			                    </a>
			                </li>
			                @endif
			                @if(Session::has('category') && Session::get('category') == 4)
			                <li class="app-sidebar__heading ">
			                    <a href="#" class="bg-plum-plate" style="color: white">
			                        Quản lý liên kết ngân hàng
			                    </a>
			                </li>
			                @endif
			            </ul>
			        </div>
			    </div>
			</div>


            <div class="app-main__outer">

                
                {{--code content thay đổi theo từng controler--}}
			    <div class="app-main__inner">
			        <div class="app-page-title">
			            <div class="page-title-wrapper">
			                <div class="page-title-heading">
			                    <div class="page-title-icon">
			                        <i class="pe-7s-folder icon-gradient bg-mean-fruit">
			                        </i>
			                    </div>
			                    <div>Hãy nhập thông tin cá nhân trước khi sử dụng hệ thống
			                    </div>
			                    <br>
			                    @if(Session::has('notice'))
			                        <div style="color: red;padding-left: 100px; float: left; padding-top: 10px">
			                            {{Session::pull('notice')}}
			                        </div>
			                    @endif
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

							            

							            <form class="needs-validation" action="editInforTeacher" method="post" enctype="multipart/form-data" novalidate>
							            	{!! csrf_field() !!}
							                <div class="form-row">
							                    <div class="col-md-12 mb-12">
							                        <label for="validationCustom01" style="float: left; margin-top: 20px">Họ tên</label>
							                        <input type="text" class="form-control" id="validationCustom01" placeholder="Nhập vào họ tên" name="name">
							                        <div class="valid-feedback">
							                            Looks good!
							                        </div>
							                    </div>
							                    <div class="col-md-12 mb-12">
							                        <label for="validationCustom02" style="float: left;margin-top: 20px">CMND</label>
							                        <input type="text" class="form-control" id="validationCustom02" placeholder="Nhập vào số chứng minh thư nhân dân" name="peopleId" value="" required>
							                        <div class="valid-feedback">
							                            Looks good!
							                        </div>
							                    </div>
							                    <div class="col-md-12 mb-12">
							                        <label for="validationCustom02" style="float: left;margin-top: 20px">Địa chỉ</label>
							                        <input type="text" class="form-control" id="validationCustom02" placeholder="Nhập vào địa chỉ" name="address" value="" required>
							                        <div class="valid-feedback">
							                            Looks good!
							                        </div>
							                    </div>
							                    <div class="col-md-12 mb-12">
							                        <label for="validationCustom02" style="float: left;margin-top: 20px">Ngày sinh</label>
							                        <input type="date" class="form-control" id="validationCustom02" placeholder="Nhập vào ngày sinh" name="brithday" value="" required>
							                        <div class="valid-feedback">
							                            Looks good!
							                        </div>
							                    </div>
							                    <div class="col-md-12 mb-12">
							                        <label for="validationCustom02" style="float: left;margin-top: 20px">SĐT</label>
							                        <input type="text" class="form-control" id="validationCustom02" placeholder="Nhập vào số điện thoại" name="telephoneNumber" value="" required>
							                        <div class="valid-feedback">
							                            Looks good!
							                        </div>
							                    </div>
							                    <div class="col-md-12 mb-12">
							                        <label for="validationCustom02" style="float: left;margin-top: 20px">Email</label>
							                        <input type="email" class="form-control" id="validationCustom02" placeholder="Nhập vào email" name="email" value="" required>
							                        <div class="valid-feedback">
							                            Looks good!
							                        </div>
							                    </div>
							                    <div class="col-md-12 mb-12">
							                        <label for="validationCustom02" style="float: left;margin-top: 20px">Ảnh đại diện</label>
							                        <input type="file" class="form-control" id="image" name="image" value="" required = "true">
							                        <div class="valid-feedback">
							                            Looks good!
							                        </div>
							                    </div>
							                    <div class="col-md-12 mb-12">
							                        <label for="validationCustom02" style="float: left;margin-top: 20px">Giới tính</label>
							                        
							                        <select class="form-control" id="validationCustom02" name="gender">
							                        	<option value="1">Nam</option>
							                        	<option value="0">Nữ</option>
							                        </select>
							                        <div class="valid-feedback">
							                            Looks good!
							                        </div>
							                    </div>
							                    <div class="col-md-12 mb-12">
							                        <label for="validationCustom02" style="float: left;margin-top: 20px">Chuyên ngành</label>
							                        <select class="form-control" id="validationCustom02"  name="specialized_id">
							                        	@foreach ($specializeds as $specialized)
							                        		<option value="{{$specialized->specialized_id}}">{{$specialized->specialized_name}}</option>
							                        	@endforeach
							                        </select>
							                        
							                        <div class="valid-feedback">
							                            Looks good!
							                        </div>
							                    </div>
							                    <div class="col-md-12 mb-12">
							                        <label for="validationCustom02" style="float: left;margin-top: 20px">Lương</label>
							                        <input type="text" class="form-control" id="validationCustom02" placeholder="Nhập vào lương" name="salary" value="" required>
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


                {{--gọi code phần footer--}}
				<div class="app-wrapper-footer">
				    <div class="app-footer">
				        <div class="app-footer__inner">
				            
				            <div class="app-footer-right">
				                <ul class="nav">
				                    <li class="nav-item">
				                        <a href="javascript:void(0);" class="nav-link">
				                            Liên hệ nhóm thiết kế
				                        </a>
				                    </li>
				                    
				                </ul>
				            </div>
				        </div>
				    </div>
				</div>

                    
            </div>
            
            <script src="http://maps.google.com/maps/api/js?sensor=true"></script>

        </div>
    </div>
<script type="text/javascript" src="{{asset('assets/scripts/main.js')}}"></script>




</body>
</html>

