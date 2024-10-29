
<?php

use App\Http\Controllers\Admin\AdminController as AdminAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController as ControllersContactController;
use App\Http\Controllers\DataTrainerController;
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
use App\Http\Controllers\ManageAdminController;
use App\Http\Controllers\ManageClientController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\WhyusController;
use App\Models\Admin\Trainer;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;


Route::group(
    ['prefix' => 'admin'],
    function () {
        Route::group(['middleware' => 'admin.guest'], function () {
            Route::get('login', [AdminAdminController::class, 'index'])->name('admin.login');
            Route::post('login', [AdminAdminController::class, 'authenticate'])->name('admin.authenticate');
            Route::get('register/create', [AdminAdminController::class, 'loadregister'])->name('admin.loadregister');
            Route::post('register', [AdminAdminController::class, 'register'])->name('admin.register');
        });
        Route::group(
            ['middleware' => 'admin.auth'],
            function () {

                Route::get('logout', [AdminAdminController::class, 'logout'])->name('admin.logout');

                Route::get('dashboard', [AdminAdminController::class, 'dashboard'])->name('admin.dashboard');

                Route::get('form', [AdminAdminController::class, 'form'])->name('admin.form');

                Route::get('table', [AdminAdminController::class, 'table'])->name('admin.table');
                Route::get('trainers', [DataTrainerController::class, 'index'])->name('admin.trainer');

                // Route::get('trainer', [DataTrainerController::class, 'index'])->name('admin.trainer');
                Route::get('admin/membership', [AdminAdminController::class, 'membership'])->name('admin.membership');
                Route::get('admin/class', [AdminAdminController::class, 'class'])->name('admin.class');
                Route::get('admin/billing', [AdminAdminController::class, 'billing'])->name('admin.billing');
                Route::get('admin/setting', [AdminAdminController::class, 'setting'])->name('admin.setting');
            }
        );
    }
);
// Route::get('admin/login', [AdminAdminController::class, 'index'])->name('admin.login');
// Route::get('admin/logout', [AdminAdminController::class, 'logout'])->name('admin.logout');
// Route::get('admin/register', [AdminAdminController::class, 'register'])->name('admin.register');
// Route::post('admin/login', [AdminAdminController::class, 'authenticate'])->name('admin.authenticate');
// Route::get('admin/dashboard', [AdminAdminController::class, 'dashboard'])->name('admin.dashboard');
// // Route::get('admin/form', [AdminAdminController::class, 'form'])->name('admin.form');
// Route::get('admin/trainer', [AdminAdminController::class, 'trainer'])->name('admin.trainer');
// Route::get('admin/membership', [AdminAdminController::class, 'membership'])->name('admin.membership');
// Route::get('admin/class', [AdminAdminController::class, 'class'])->name('admin.class');
// Route::get('admin/billing', [AdminAdminController::class, 'billing'])->name('admin.billing');
// Route::get('admin/setting', [AdminAdminController::class, 'setting'])->name('admin.setting');



//Data admins details Route

Route::get('/datatrainer/create', [DataTrainerController::class, 'index'])->name('datatrainer.create');
Route::post('/AddNewDataTrainer', [DataTrainerController::class, 'AddNewDataTrainer'])->name('datatrainer.add');
Route::put('/UpdateDataTrainer', [DataTrainerController::class, 'UpdateDataTrainer']);
Route::delete('/datatrainer/{id}', [DataTrainerController::class, 'destroy'])->name('datatrainer.destroy');
// Route::get('/supplierFilter', [SupplierController::class, 'index'])->name('supplier.index');


Route::get('/client/create', [ManageClientController::class, 'index'])->name('client.create');
Route::post('/AddNewClient', [ManageClientController::class, 'AddNewClient'])->name('client.add');
Route::put('/UpdateClient', [ManageClientController::class, 'UpdateClient']);
Route::delete('/client/{id}', [ManageClientController::class, 'destroy'])->name('client.destroy');
// Route::get('/supplierFilter', [SupplierController::class, 'index'])->name('supplier.index');

Route::get('/membership/create', [MembershipController::class, 'index'])->name('membership.create');
Route::post('/AddMembership', [MembershipController::class, 'AddMembership'])->name('membership.add');
Route::put('/UpdateMembership', [MembershipController::class, 'UpdateMembership']);
Route::delete('/membership/{id}', [MembershipController::class, 'destroy'])->name('membership.destroy');



































//manageAdmins
//Admin Routes of Home
Route::get('/manageAdmin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/adminDatas', [AdminController::class, 'datas'])->name('datas.index');
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
