<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CameraImageController;
use App\Http\Controllers\CameraImageGroupController;
use App\Http\Controllers\HomeController;

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

// https://stackoverflow.com/questions/29912997/laravel-routes-behind-reverse-proxy
if (config('app.url_scheme') === 'https') {                                        
    URL::forceScheme('https');                                                     
}                                                                                  

Auth::routes();

Route::redirect('/home', '/');

// authenicated routes
Route::middleware(['auth'])->group(function() {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/logout', [LoginController::class, 'logout']);
});
