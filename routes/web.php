<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/logout', function () {
    return view('login');
})->name('logout');

Route::get('/actionLogin', function () {
    return view('index');
})->name('actionLogin');

