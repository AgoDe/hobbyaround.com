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

    $name = 'Mario';

    if (auth()->check()) {
        $name = auth()->user()->username;
    }
    return Inertia::render('Home', [
            'name' => $name,
        ]);
});

Route::get('/about', function () {
    return Inertia::render('About');
});

Route::get('/contatti', function () {
    //sleep(1); // per poter aspettare qualche secondo prima del rendering
    return Inertia::render('Contatti');
});

Route::get('/login', function () {
    return Inertia::render('Login');
});

Route::post('/login', function () {
    sleep(3);

    $attributes = request()->validate([
       'username' => 'required|max:255',
       'password' => 'required'
    ]);

    auth()->attempt($attributes);

    return redirect('/');


});

Route::post('/logout', function () {
   dd('logout');
});
