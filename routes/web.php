<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/web/about-us', function () {
    return view('web.about-us');
});
Route::get('/web/courier-service', function () {
    return view('web.courier-service');
});
Route::get('/web/cnf-solution', function () {
    return view('web.cnf-solution');
});
Route::get('/web/corporate-clients', function () {
    return view('web.corporate-clients');
});
Route::get('/web/contact-us', function () {
    return view('web.contact-us');
});
Route::get('/web/why-us', function () {
    return view('web.why-us');
});
Route::get('/web/mission', function () {
    return view('web.mission');
});

Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::resource('/tracking', 'TrackingController');
Route::get('/tracking-lists', 'TrackingController@trackingList')->name('tracking.tracking_list')->middleware('auth');
// Route::resource('/', 'WebController');

//Get web tracking form front page
Route::get('/', 'WebController@index');
Route::get('/web/tracking', 'WebController@tracking');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/status', 'StatusController')->middleware('auth');
Route::get('/awblist', 'StatusController@awblist')->name('status.awblist')->middleware('auth');
Route::get('/statuslist', 'StatusController@statuslist')->name('status.statuslist')->middleware('auth');
Route::post('/chgstatusmodal', 'StatusController@chgstatusmodal')->name('status.chgstatusmodal')->middleware('auth');

//Search & Update
Route::get('/search/manifest', 'SearchController@manifest')->name('search.manifest')->middleware('auth');
Route::get('/search/getmanifest', 'SearchController@getmanifest')->name('search.getmanifest')->middleware('auth');
Route::post('/search/change-manifest', 'SearchController@changemanifest')->name('search.changemanifest')->middleware('auth');
Route::resource('/search', 'SearchController')->middleware('auth');
Route::get('/getawb', 'SearchController@getawb')->name('search.getawb')->middleware('auth');
Route::post('/update-area', 'SearchController@updatearea')->name('search.updatearea')->middleware('auth');
Route::post('/update-awb', 'SearchController@updateawb')->name('search.updateawb')->middleware('auth');
Route::get('/multipleawb', 'SearchController@multipleawb')->name('search.multipleawb')->middleware('auth');
Route::put('/update-multiple-awb', 'SearchController@updateMultipleAwb')->name('search.updatemultipleawb')->middleware('auth');



//Area Codes
Route::resource('/area_code', 'AreaCodeController')->middleware('auth');

//Employee
Route::resource('/employee', 'EmployeeController')->middleware('auth');
Route::get('userlist', 'EmployeeController@userlist')->name('employee.userlist');


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
