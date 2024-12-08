<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/logout', function () {
    return view('login');
})->name('logout');

Route::get('/index', function () {
    return view('index');
})->name('index');

Route::get('/register', function () {
    return view('register');
});

Route::post('/actionRegister', 'App\Http\Controllers\RegisterController@index')->name('actionRegister');
Route::post('/actionLogin', 'App\Http\Controllers\LoginController@index')->name('actionLogin');