<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('home', function () {
	if (Session::has('login') && Session::get('login') == false) {
    # code...
    return view('login');
    }
    else if (!Session::has('login')) {
        return view('login');
    }
    else return view('home');
})->name('homeView');

Route::get('logout', function () {
    
    Session()->flush();
    return redirect()->route('loginView');
    
    return view('home');
});

route::get('/',function(){
    if (Session::has('login') && Session::get('login') == true) {
        if (Session::get('category') == 0) {
            return  redirect()->route('homeView');
        }elseif (Session::get('category') == 1) {
            # code...
            return redirect()->route('homeLeaderView');
        }elseif (Session::get('category') == 2) {
            # code...
            return redirect()->route('homeDeanView');
        }elseif (Session::get('category') == 3) {
            # code...
            return redirect()->route('homeManagerView');
        }elseif (Session::get('category') == 4) {
            # code...
            return redirect()->route('homeAdminView');
        }
    }
    else
	   return view('login');
})->name('loginView');


Route::post('postLogin',['as'=>'postLogin','uses'=>'loginController@check']);



route::get('calendar',function(){
	if (Session::has('login') && Session::get('login') == false) {
    # code...
    return view('login');
    }
    else if (!Session::has('login')) {
        return view('login');
    }
    else 
		return view('calendar');
})->name('calendarView');

route::get('editCalendar',function(){
	if (Session::has('login') && Session::get('login') == false) {
    # code...
    return view('login');
    }
    else if (!Session::has('login')) {
        return view('login');
    }
    else 
		return view('editCalendar');
})->name('editCalendarView');

route::get('signatureCalendar',function(){
	if (Session::has('login') && Session::get('login') == false) {
    # code...
    return view('login');
    }
    else if (!Session::has('login')) {
        return view('login');
    }
    else 
		return view('signatureCalendar');
})->name('signatureCalendarView');

route::get('notification',function(){
	if (Session::has('login') && Session::get('login') == false) {
    # code...
    return view('login');
    }
    else if (!Session::has('login')) {
        return view('login');
    }
    else 
		return view('notification');
})->name('notificationView');

route::get('homeLeader',function(){
	if (Session::has('login') && Session::get('login') == false) {
    # code...
    return view('login');
    }
    else if (!Session::has('login')) {
        return view('login');
    }
    else 
		return view('homeLeader');
})->name('homeLeaderView');

route::get('signatureCalendarLeader',function(){
	if (Session::has('login') && Session::get('login') == false) {
    # code...
    return view('login');
    }
    else if (!Session::has('login')) {
        return view('login');
    }
    else 
		return view('signatureCalendarLeader');
})->name('signatureCalendarLeaderView');

route::get('inforUser',function(){
	if (Session::has('login') && Session::get('login') == false) {
    # code...
    return view('login');
    }
    else if (!Session::has('login')) {
        return view('login');
    }
    else 
		return view('inforUser');
})->name('inforUserView');

route::get('settingAcount',function(){
	if (Session::has('login') && Session::get('login') == false) {
    # code...
    return view('login');
    }
    else if (!Session::has('login')) {
        return view('login');
    }
    else 
		return view('settingAcount');
})->name('settingAcountView');

route::get('homeDean',function(){
	if (Session::has('login') && Session::get('login') == false) {
    # code...
    return view('login');
    }
    else if (!Session::has('login')) {
        return view('login');
    }
    else 
		return view('homeDean');
})->name('homeDeanView');

route::get('homeAdmin',function(){
	if (Session::has('login') && Session::get('login') == false) {
    # code...
    return view('login');
    }
    else if (!Session::has('login')) {
        return view('login');
    }
    else 
		return view('homeAdmin');
})->name('homeAdminView');

route::get('signatureCalendarDean',function(){
	if (Session::has('login') && Session::get('login') == false) {
    # code...
    return view('login');
    }
    else if (!Session::has('login')) {
        return view('login');
    }
    else 
		return view('signatureCalendarDean');
})->name('signatureCalendarDeanView');

route::get('homeManage',function(){
	if (Session::has('login') && Session::get('login') == false) {
    # code...
    return view('login');
    }
    else if (!Session::has('login')) {
        return view('login');
    }
    else 
		return view('homeManage');
})->name('homeManagerView');

route::get('calendarManagement',function(){
	if (Session::has('login') && Session::get('login') == false) {
    # code...
    return view('login');
    }
    else if (!Session::has('login')) {
        return view('login');
    }
    else 
		return view('calendarManagement');
})->name('calendarManegementView');

route::get('calendarManagementAdmin',function(){
	if (Session::has('login') && Session::get('login') == false) {
    # code...
    return view('login');
    }
    else if (!Session::has('login')) {
        return view('login');
    }
    else 
		return view('calendarManagementAdmin');
})->name('calendarManegermentAdminView');

route::get('userManagement',function(){
	if (Session::has('login') && Session::get('login') == false) {
    # code...
    return view('login');
    }
    else if (!Session::has('login')) {
        return view('login');
    }
    else 
		return view('userManagement');
})->name('userManagementView');

route::get('userManagementAdmin',function(){
	if (Session::has('login') && Session::get('login') == false) {
    # code...
    return view('login');
    }
    else if (!Session::has('login')) {
        return view('login');
    }
    else 
		return view('userManagementAdmin');
})->name('userManagementAdminView');

route::get('createCalendar',function(){
	if (Session::has('login') && Session::get('login') == false) {
    # code...
    return view('login');
    }
    else if (!Session::has('login')) {
        return view('login');
    }
    else 
		return view('createCalendar');
})->name('createCalendarView');

route::get('userManagement','TeacherController@index');

route::get('createCalendar','TeacherController@index');


route::get('editCalendar',function(){
	if (Session::has('login') && Session::get('login') == false) {
    # code...
    return view('login');
    }
    else if (!Session::has('login')) {
        return view('login');
    }
    else 
		return view('editCalendar');
})->name('editCalendarView');

route::get('bank',function(){
	if (Session::has('login') && Session::get('login') == false) {
    # code...
    return view('login');
    }
    else if (!Session::has('login')) {
        return view('login');
    }
    else 
		return view('bank');
})->name('bankView');