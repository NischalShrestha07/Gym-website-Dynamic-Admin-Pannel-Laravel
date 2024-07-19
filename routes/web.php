<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\TrainersController;
use App\Http\Controllers\Frontend\WhyusController;
use App\Http\Controllers\TrainerController;
use Illuminate\Support\Facades\Route;

//Admin Routes of Home
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/adminDatas', [AdminController::class, 'datas']);
Route::post('/AddNewData', [AdminController::class, 'AddNewData']);
Route::put('/UpdateData', [AdminController::class, 'UpdateData']);


//Admin Routes of Trainers
Route::get('/trainers', [TrainerController::class, 'trainers']);
Route::get('/AddNewTrainer', [TrainerController::class, 'AddNewData']);



//Customer Routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/whyus', [WhyusController::class, 'index']);
Route::get('/trainer', [TrainersController::class, 'index']);
// Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contact', [ContactController::class, 'index']);
