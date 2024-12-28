<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactPageController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RecruiterPostController;
use Illuminate\Support\Facades\Route;

Route::get('/home',[HomePageController::class,'showHomePage'])->name('Home');
Route::view('/about','about')->name('About');
Route::get('/contact',[ContactPageController::class,'showContactPage'])->name('Contact');
Route::resource('job',JobController::class)->except(['store'])
->name('index','Joblist')
->name('show','Jobshow')
->name('create','Jobcreate');
Route::resource('recruiter',RecruiterPostController::class)->except(['store'])
->name('index','JobPostlist');
Route::get('/auth',[AuthController::class,'showAuth'])->name('Auth');
