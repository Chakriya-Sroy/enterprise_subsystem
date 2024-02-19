<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JournalController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




// Authentication
Route::get('/',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'loginstore'])->name('store-login');
Route::get('/signup',[AuthController::class,'signup'])->name('signup');
Route::post('/signup',[AuthController::class,'store'])->name('store-signup');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

// Home 
Route::get('/homepage',[HomeController::class,'index'])->name('homepage')->middleware(['auth.check']);


// Journal
Route::get('/newentry',[JournalController::class,'index'])->name('new-entry');




// Goal 
Route::get('/create-goal',[GoalController::class,'index'])->name('goal');


// Profile

Route::get('/profile',[JournalController::class,'profile'])->name('profile');