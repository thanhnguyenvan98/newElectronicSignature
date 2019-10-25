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
                    <a href="home" class="mm-active bg-midnight-bloom" style="color: white">
                        Tổng quan 
                    </a>
                </li>
                @endif
                @if(Session::has('category')&&Session::get('category') == 1)
                <li class="app-sidebar__heading ">
                    <a href="homeLeader" class="mm-active bg-midnight-bloom" style="color: white">
                        
                        Tổng quan
                    </a>
                </li>
                @endif
                @if(Session::has('category')&&Session::get('category') == 2)
                <li class="app-sidebar__heading ">
                    <a href="homeDean" class="mm-active bg-midnight-bloom" style="color: white">
                        
                        Tổng quan
                    </a>
                </li>
                @endif
                @if(Session::has('category')&&Session::get('category') == 3)                
                <li class="app-sidebar__heading ">
                    <a href="homeManage" class="mm-active bg-midnight-bloom" style="color: white">
                        
                        Tổng quan
                    </a>
                </li>
                @endif

                @if(Session::has('category')&&Session::get('category') == 0)
                <li class="app-sidebar__heading ">
                    <a href="calendar" class="bg-grow-early" style="color: white">
                        
                        Lịch trình giảng dạy
                    </a>
                </li>
                @endif
                
                @if(Session::has('category')&&Session::get('category') == 0)
                <li class="app-sidebar__heading ">
                    <a href="signatureCalendar" class="bg-love-kiss" style="color: white">
                        
                        Ký & gửi lịch giảng dạy
                    </a>
                </li>
                @endif

                @if(Session::has('category')&&Session::get('category') == 1)
                <li class="app-sidebar__heading ">
                    <a href="signatureCalendarLeader" class="bg-love-kiss" style="color: white">
                        Ký & gửi lịch
                    </a>
                </li>
                @endif
                @if(Session::has('category')&&Session::get('category') == 2)
                <li class="app-sidebar__heading ">
                    <a href="signatureCalendarDean" class="bg-love-kiss" style="color: white">
                        Ký & gửi lịch
                    </a>
                </li>
                @endif

                @if(Session::has('login') && Session::get('login') == true)
                <li class="app-sidebar__heading ">
                    <a href="message" class="bg-plum-plate" style="color: white">
                        Tin nhắn
                    </a>
                </li>
                @endif

                @if(Session::has('category') && Session::get('category') != 0 && Session::get('category') != 4 )
                <li class="app-sidebar__heading ">
                    <a href="userManagement" class="bg-plum-plate" style="color: white">
                        Quản lý tài khoản
                    </a>
                </li>
                @endif

                @if(Session::has('category') && Session::get('category') != 0 && Session::get('category') != 4 )
                <li class="app-sidebar__heading ">
<!-- <<<<<< HEAD
                    <a href="subjectManagement" class="bg-plum-plate" style="color: white">
                        Quản lý môn học
=======-->
                    <a href="SpecializedManagement" class="bg-plum-plate" style="color: white">
                        Quản lý khoa
                    </a>
                </li>
                @endif

                @if(Session::has('category') && Session::get('category') == 4)
                <li class="app-sidebar__heading ">
                    <a href="userManagementAdmin" class="bg-plum-plate" style="color: white">
                        Quản lý tài khoản
                    </a>
                </li>
                @endif

                @if(Session::has('category') && Session::get('category') == 3)
                <li class="app-sidebar__heading ">
                    <a href="calendarManagement" class="bg-plum-plate" style="color: white">
                        Quản lý lịch giảng dạy
                    </a>
                </li>
                @endif

                

                @if(Session::has('category') && Session::get('category') == 4)
                <li class="app-sidebar__heading ">
                    <a href="calendarManagementAdmin" class="bg-plum-plate" style="color: white">
                        Quản lý lịch giảng dạy
                    </a>
                </li>
                @endif
                @if(Session::has('category') && Session::get('category') == 4)
                <li class="app-sidebar__heading ">
                    <a href="bank" class="bg-plum-plate" style="color: white">
                        Quản lý liên kết ngân hàng
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>