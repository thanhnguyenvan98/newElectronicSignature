

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
    <script type="text/javascript" src="{{asset('assets/scripts/jquery-3.4.1.min.js')}}"></script>
    
    @yield('script')
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

    {{--gọi code phần header--}}
    @include('master.header')

        <div class="app-main">
                
            {{--gọi code phần header--}}
            @include('master.menuLeft')


            <div class="app-main__outer" >

                
                {{--code content thay đổi theo từng controler--}}
                @yield('content')


                {{--gọi code phần footer--}}
                @include('master.footer')

                    
            </div>
            
            <script src="http://maps.google.com/maps/api/js?sensor=true"></script>

        </div>
    </div>

<script type="text/javascript" src="{{asset('assets/scripts/main.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/myScript.js')}}"></script>
</body>
</html>



{{--code phan mo rong LargeModal--}}
@yield('LargeModal')
@yield('LargeModal1')

{{--code phan mo rong SmallModal--}}
@yield('SmallModal')

