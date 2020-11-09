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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/add-to-log', 'LogController@myTestAddToLog');
Route::get('/logActivity', 'LogController@logActivity');



Auth::routes(['register'=> false, 'reset'=>false]);

   

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'middleware' => ['role:administrator|superadministrator'], 'namespace' => 'Admin'], function () {
    Route::resource('users', 'UsersController');
    Route::resource('permission', 'PermissionController');
    Route::resource('roles', 'RolesController');

});

Route::group(['middleware' => ['auth']], function() {
    Route::group(['middleware' => ['role:superadministrator|administrator']], function() {
		Route::get('/home', 'HomeController@index')->name('home');		
		Route::resource('/company', 'CompanyController');
		Route::resource('/visitor', 'VisitorController');
		Route::resource('/member', 'MemberController');
        Route::resource('/absensi', 'AbsensiController');
        Route::get('komisi1', 'KomisiController@komisi1');
        Route::get('komisi2', 'KomisiController@komisi2');
        Route::get('komisi3', 'KomisiController@komisi3');
        Route::get('/history', 'AbsensiController@history');
    });
});