<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactPageController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobCreateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecruiterPostController;
use Illuminate\Support\Facades\Route;

Route::get('/home',[HomePageController::class,'showHomePage'])->name('Home');
Route::view('/about','about')->name('About');
Route::get('/contact',[ContactPageController::class,'showContactPage'])->name('Contact');
Route::get('/joblist',[JobCreateController::class,'index'])->name('Joblist');
Route::get('/joblist/{id}',[JobCreateController::class,'showJob'])->name('Jobshow');
Route::post('/jobcreate',[JobCreateController::class,'store'])->name('JobStore');
Route::get('/jobcreate',[JobCreateController::class,'create'])->name('JobCreate');
Route::resource('recruiter',RecruiterPostController::class)->except(['store'])
->name('index','JobPostlist')
->name('show','JobPostview');
Route::get('/auth',[AuthController::class,'showAuth'])->name('Auth');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/profile/{id}',[ProfileController::class,'show'])->name('ProfileShow');
Route::post('/profile/{id}',[ProfileController::class,'update'])->name('ProfileUpdate');