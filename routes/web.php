<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Home', function () {
    return view('dashboard');
});

Route::get('/Pelaporan', function () {
    return view('data_pelaporan');
});

Route::get('/edit_Pelaporan', function () {
    return view('edit_data_pelaporan');
});

Route::get('/Login', function () {
    return view('login');
});

Route::get('/Register', function () {
    return view('register');
});

Route::get('/Isidataregister', function () {
    return view('isidata_register');
});

Route::get('/Databencana', function () {
    return view('data_bencana');
});

Route::get('/Dataadmin', function () {
    return view('data_admin');
});

Route::get('/Datapengguna', function () {
    return view('data_pengguna');
});