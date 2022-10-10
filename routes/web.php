<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FacultieController;
use App\Http\Controllers\Admin\ClassRoomController;
use App\Http\Livewire\Admin\University\ShowUniversity;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
    Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified' ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::resource('facultie', FacultieController::class);
        Route::resource('classroom', ClassRoomController::class);
    });
});