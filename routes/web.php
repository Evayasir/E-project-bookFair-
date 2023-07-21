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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        if(auth()->user()->role==1)
        {
        // return view ("customer");

            return View("customer");
        }

       else if(auth()->user()->role==2)
        {
        return view ("publisher");

        }

        else if(auth()->user()->role==3)
        {
        return view ("admin");

        }
        //return view('dashboard');
    })->name('dashboard');
});
