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

Route::get('/home', function () {
    return view('home');
});


route::get('/','loginController@getView');

Route::post('postLogin',['as'=>'postLogin','uses'=>'loginController@check']);

route::get('calendar',function(){
	return view('calendar');
});

route::get('editCalendar',function(){
	return view('editCalendar');
});

route::get('signatureCalendar',function(){
	return view('signatureCalendar');
});

route::get('notification',function(){
	return view('notification');
});

route::get('homeLeader',function(){
	return view('homeLeader');
});

route::get('signatureCalendarLeader',function(){
	return view('signatureCalendarLeader');
});

route::get('inforUser',function(){
	return view('inforUser');
});

route::get('settingAcount',function(){
	return view('settingAcount');
});

route::get('homeDean',function(){
	return view('homeDean');
});

route::get('signatureCalendarDean',function(){
	return view('signatureCalendarDean');
});

route::get('homeManage',function(){
	return view('homeManage');
});

route::get('calendarManagement',function(){
	return view('calendarManagement');
});

route::get('userManagement',function(){
	return view('userManagement');
});

route::get('createCalendar',function(){
	return view('createCalendar');
});

route::get('editCalendar',function(){
	return view('editCalendar');
});