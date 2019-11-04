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

// Route::resource('specializeds','SpecializedController');

route::get('HAHA',function(){
       return view('signatureCalendarLeader');
});

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

//login
Route::post('postLogin',['as'=>'postLogin','uses'=>'loginController@check']);

//user
//Edit informaion user
    route::get('EditInformation','EditInformationController@edit');
    route::get('ShowInfor', 'EditInformationController@show');

route::get('userManagement','UserController@index')->name('userManagementView');

Route::post('createUser',['as'=>'createUser','uses'=>'UserController@create']);

Route::post('editUser',['as'=>'editUser','uses'=>'UserController@edit']);

Route::get('destroyUser/{id}','UserController@destroy')->name('destroyUser');

Route::post('showUser',['as'=>'showUser','uses'=>'UserController@show']);

// Specialized

route::get('SpecializedManagement','SpecializedController@index')->name('SpecializedManagementView');

Route::post('createSpecialized',['as'=>'createSpecialized','uses'=>'SpecializedController@create']);

Route::post('editSpecialized',['as'=>'editSpecialized','uses'=>'SpecializedController@edit']);

Route::get('destroySpecialized/{id}','SpecializedController@destroy')->name('destroySpecialized');

Route::post('showSpecialized',['as'=>'showSpecialized','uses'=>'SpecializedController@show']);

// Teacher

Route::get('infor', 'TeacherController@showInforBeforLogin')->name('inforView');

Route::post('editInforTeacher',['as'=>'editInforTeacher','uses'=>'TeacherController@create']);

Route::post('editInforLeader',['as'=>'editInforLeader','uses'=>'LeaderController@create']);

Route::post('editInforDean',['as'=>'editInforDean','uses'=>'DeanController@create']);

// Subject

Route::get('SubjectManagement', 'SubjectController@index')->name('SubjectMangementView');

Route::post('CreateSubject',['as'=>'CreateSubject','uses'=>'SubjectController@create']);

Route::post('EditSubject/{id}',['as'=>'EditSpecialized','uses'=>'SubjectController@edit']);

Route::get('DestroySubject/{id}','SubjectController@destroy')->name('destroySubject');

Route::post('ShowSubject',['as'=>'ShowSubject','uses'=>'SubjectController@show']);



route::get('calendar','CalendarController@show')->name('calendarView');
// Calendar

route::get('createCalendarView','CalendarController@index')->name('createCalendarView');

route::get('ajaxCreateCalendar','CalendarController@ajax');

route::post('createCalendar','CalendarController@create')->name('createCalendar');




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

route::get('calendarManagement','CalendarManagementController@index')->name('calendarManegementView');

route::post('createCalendarManagement','CalendarManagementController@create');


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


route::get('signatureCalendar','signatureCalendarController@index')->name('signatureCalendarView');

route::get('signatureCalendarTest/{theFileSignatured_path}','signatureCalendarController@test');

route::post('postSignatureCalendar/{fileSignaturePath}','signatureCalendarController@signature');

route::get('message',function(){
	if (Session::has('login') && Session::get('login') == false) {
    # code...
    return view('login');
    }
    else if (!Session::has('login')) {
        return view('login');
    }
    else 
		return view('message');
})->name('messageView');

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

//RSA
route::get('RSA','RSAController@createKey');



//Gmail
Route::get('/gmail', function () {
    return view('testGmail');
});

Route::post('testGmail', ['uses' => 'emailController@addFeedback', 'as' => 'front.fb'])->name('testGmail');

Route::get('sendMail','emailController@sendMail');