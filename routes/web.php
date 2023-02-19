<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\RegisterController;
use \App\Http\Controllers\CommentController;
use App\Http\Controllers\ArticleController;

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

Route::get('/articoli', [SiteController::class, 'articles']);
Route::get('/articoli/{article}', [SiteController::class, 'article']);


Route::middleware('guest')->group(function () {

    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/login',[SessionController::class, 'create'])->name('login');
    Route::post('/login',[SessionController::class, 'store'])->name('login.store');

});

Route::middleware('auth')->group(function () {

    Route::post('/logout',[SessionController::class, 'destroy'])->name('logout')->middleware('auth');
    Route::resources([
        'comments' => CommentController::class,
        'articles' => ArticleController::class,
    ]);

});

