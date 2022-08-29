<?php

use Illuminate\Support\Facades\Route;
Route::view('/', 'home')->name('home');
Route::resource('categoria', 'App\Http\Controllers\CategoryController')->names('categories')->parameters(['categoria' => 'category']);

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


