<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Hotplate\HPCoolingController;
// use App\Http\Controllers\ExcelController;
use App\Http\Controllers\Hotplate\HPIndexController;
use App\Http\Controllers\Hotplate\HPMixerController;
use App\Http\Controllers\Hotplate\Specifications\HPMixerSpecController;
use App\Http\Controllers\SchedulerController;
use App\Http\Controllers\SelectProductController;
use App\Http\Controllers\Settings\ProductController;
use App\Http\Controllers\Settings\RegularUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/scheduler', [SchedulerController::class, 'index'])->name('scheduler');
Route::post('/scheduler', [SchedulerController::class, 'store']);
Route::delete('/scheduler/{item}', [SchedulerController::class, 'destroy'])->name('scheduler.destroy');

// Route::post('/importExcel', [ExcelController::class, 'store'])->name('importExcel'); //Scheduler Excel import route - revisit later

Route::get('/hotplate', [HPIndexController::class, 'index'])->name('hotplate.index');
Route::get('/hotplate/mixer', [HPMixerController::class, 'index'])->name('hotplate.mixer');
Route::post('/hotplate/mixer', [HPMixerController::class, 'store']);

Route::get('/hotplate/cooling', [HPCoolingController::class, 'index'])->name('hotplate.cooling');

Route::get('/hotplate/specifications', [HPMixerSpecController::class, 'index'])->name('hotplate.specifications.hpmixerspec');
Route::post('/hotplate/specifications', [HPMixerSpecController::class, 'store']);

Route::get('/settings', [ProductController::class, 'index'])->name('settings.product');
Route::post('/settings', [ProductController::class, 'store']);

Route::get('/settings/adduser', [RegularUserController::class, 'index'])->name('settings.adduser');
Route::post('/settings/adduser', [RegularUserController::class, 'store']);
