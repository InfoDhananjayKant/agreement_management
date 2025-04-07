<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\AgreementController;


Route::view('/','super_admin.login');
Route::post('/login',[Usercontroller::class,'loginadmin'])->name('admin.login');

Route::view('/signup','super_admin.signup')->name('admin.signup');
Route::post('/signup',[Usercontroller::class,'signup'])->name('admin.signup');

Route::view('dashboard','admin.dashboard')->name('dashboard');
Route::get('user',[UserController::class,'user'])->name('admin.user');

Route::put('edit/{id}',[UserController::class,'editUser'])->name('admin.user.update');
Route::get('edit/{id}',[UserController::class,'edit'])->name('admin.user.edit');

Route::view('agreementview','admin.agreementview')->name('admin.agreementview');
Route::get('agreementform',[AgreementController::class,'agreementform'])->name('admin.agreementform');

Route::post('saveagreement',[AgreementController::class,'saveAgreement'])->name('admin.saveagreement');
Route::get('agreementlist',[AgreementController::class,'showAgreementList'])->name('admin.agreementlist');