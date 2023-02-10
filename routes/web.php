<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\LoginController;

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
})->middleware('auth');

Route::get('/contatti', function () {
    //sleep(1); // per poter aspettare qualche secondo prima del rendering
    return Inertia::render('Contatti');
});

Route::get('/login',[LoginController::class, 'create'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class, 'store'])->name('login.store')->middleware('guest');
Route::post('/logout',[LoginController::class, 'destroy'])->name('logout')->middleware('auth');
