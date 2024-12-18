<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

// Route::get('/logout', function () {
//     return view('login');
// })->name('logout');

Route::get('/index', function () {
    return view('index');
})->name('index')->middleware('auth');

Route::get('/register', function () {
    return view('register');
});

Route::post('/actionRegister', 'App\Http\Controllers\RegisterController@insert')->name('actionRegister');
Route::post('/actionEdit', 'App\Http\Controllers\RegisterController@insert')->name('actionEdit');
Route::post('/actionLogin', 'App\Http\Controllers\LoginController@actionlogin')->name('actionLogin');
Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');