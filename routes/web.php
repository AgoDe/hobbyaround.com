<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Home', [
            'name' => 'Agostino'
        ]);
});

Route::get('/contatti', function () {
    //sleep(1); // per poter aspettare qualche secondo prima del rendering
    return Inertia::render('Contatti');
});

Route::post('/logout', function () {
   dd('logout');
});
