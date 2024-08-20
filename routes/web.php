
<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController as ControllersContactController;
use App\Http\Controllers\FooterbarController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\HeaderController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Frontend\LogoutController;
use App\Http\Controllers\Frontend\RegisterController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Frontend\TrainersController;
use App\Http\Controllers\Frontend\WhyusController as FrontendWhyusController;
use App\Http\Controllers\GymNameController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\WhyusController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;

// routes for the login




//Admin Routes of Home
Route::get('/manageAdmin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/adminDatas', [AdminController::class, 'datas']);
Route::post('/AddNewData', [AdminController::class, 'AddNewData']);
Route::put('/UpdateData', [AdminController::class, 'UpdateData']);
Route::delete('/datas/{id}', [AdminController::class, 'DeleteData'])->name('datas.destroy');


//Admin Routes of Trainers
Route::get('/trainers', [TrainerController::class, 'trainers'])->name('trainers.index');
Route::post('/AddNewTrainer', [TrainerController::class, 'AddNewTrainer']);
Route::put('/UpdateTrainer', [TrainerController::class, 'UpdateTrainer']);
Route::delete('/trainers/{id}', [TrainerController::class, 'DeleteTrainer'])->name('trainers.destroy');



//Admin Routes of Whyus
Route::get('/whyuss', [WhyusController::class, 'whyuss'])->name('whyuss.index');
Route::post('/AddNewWhyus', [WhyusController::class, 'AddNewWhyus']);
Route::put('/UpdateWhyus', [WhyusController::class, 'UpdateWhyus']);
// Route::delete('/DeleteWhyus', [WhyusController::class, 'DeleteWhyus'])->name('whyuss.destroy');
Route::delete('/whyuss/{id}', [WhyusController::class, 'DeleteWhyus'])->name('whyuss.destroy');



//Admin Routes of Footerbars
Route::get('/footerbars', [FooterbarController::class, 'footerbars'])->name('footerbars.index');
Route::post('/AddNewFooterbar', [FooterbarController::class, 'AddNewFooterbar']);
Route::put('/UpdateFooterbar', [FooterbarController::class, 'UpdateFooterbar']);
Route::delete('/footerbars/{id}', [FooterbarController::class, 'DeleteFooterbar'])->name('footerbar.destroy');



//Admin Routes of GymNames
Route::get('/gymnames', [GymNameController::class, 'gymnames'])->name('gymnames.index');
Route::post('/AddNewGymName', [GymNameController::class, 'AddNewGymName']);
Route::put('/UpdateGymName', [GymNameController::class, 'UpdateGymName']);
Route::delete('/gymnames/{id}', [GymNameController::class, 'DeleteGymName'])->name('gymnames.destroy');


//Admin Routes of Contacts
Route::get('/contacts', [ControllersContactController::class, 'contacts'])->name('contacts.index');
Route::post('/AddNewContact', [ControllersContactController::class, 'AddNewContact']);
Route::get('/UpdateContact', [ControllersContactController::class, 'UpdateContact']);
Route::get('/contacts/{id}', [ControllersContactController::class, 'DeleteContact'])->name('contacts.destroy');

//Customer Routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);
Route::post('/loginUser', [LoginController::class, 'loginUser']);
Route::get('/logoutUser', [LogoutController::class, 'logoutUser']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/registerUser', [RegisterController::class, 'registerUser']);
Route::get('/whyus', [FrontendWhyusController::class, 'index']);
Route::get('/trainer', [TrainersController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);

Route::get('/board', [DashboardController::class, 'index'])->name('dashboards');


//Search Operation Route
Route::get('/search', [SearchController::class, 'search'])->name('search');
