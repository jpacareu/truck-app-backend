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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/auth', function () {
	$user = DB::connection('mongodb')->collection('users')->where('email','jdoe@mail.com')->first();
    return json_encode(['status' => true, 'user' => $user]);
});

Route::post('/api/phone','UserCtrl@index');
Route::post('/api/user','UserCtrl@newUser');