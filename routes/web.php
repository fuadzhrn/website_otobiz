<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

Route::get('/mekanisme', function () {
    return view('mekanisme');
})->name('mekanisme');

Route::get('/produk', function () {
    return view('produk');
})->name('produk');

Route::get('/gabung', function () {
    return view('gabung');
})->name('gabung');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');
