<?php

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
// Route::resource('/', 'WebController');

//Get web tracking form front page
Route::get('/', 'WebController@index');
Route::get('/web/tracking', 'WebController@tracking');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/status', 'StatusController')->middleware('auth');


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
