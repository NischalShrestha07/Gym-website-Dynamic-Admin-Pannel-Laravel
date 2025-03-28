
<?php

use App\Http\Controllers\Admin\AdminController as AdminAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AttendanceDetailsController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ContactController as ControllersContactController;
use App\Http\Controllers\DataTrainerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FooterbarController;
use App\Http\Controllers\Frontend\ContactController as FrontendContactController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\HeaderController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Frontend\LogoutController;
use App\Http\Controllers\Frontend\RegisterController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Frontend\TrainersController;
use App\Http\Controllers\Frontend\WhyusController as FrontendWhyusController;
use App\Http\Controllers\GeoAttendanceController;
use App\Http\Controllers\GymNameController;
use App\Http\Controllers\ManageAdminController;
use App\Http\Controllers\ManageAttendanceController;
use App\Http\Controllers\ManageClientController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WhyusController;
use App\Models\Admin\Trainer;
use App\Models\Employee;
use App\Models\Membership;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;


// Route::group(
//     ['prefix' => 'admin'],
//     function () {
Route::group(['middleware' => 'admin.guest'], function () {
    Route::get('login', [AdminAdminController::class, 'index'])->name('admin.login');
    Route::post('/dashboards', [AdminAdminController::class, 'userLogin'])->name('admin.authenticate');
    Route::get('register/create', [AdminAdminController::class, 'loadregister'])->name('admin.loadregister');
    Route::post('register', [AdminAdminController::class, 'register'])->name('admin.register');
});
Route::group(
    ['middleware' => 'admin.auth'],
    function () {

        Route::get('logout', [AdminAdminController::class, 'logout'])->name('admin.logout');

        Route::get('dashboard', [AdminAdminController::class, 'redirectToDashboard'])->name('admin.dashboard');

        Route::get('form', [AdminAdminController::class, 'form'])->name('admin.form');

        Route::get('table', [AdminAdminController::class, 'table'])->name('admin.table');
        Route::get('trainers', [DataTrainerController::class, 'index'])->name('admin.trainer');

        // Route::get('trainer', [DataTrainerController::class, 'index'])->name('admin.trainer');
        Route::get('admin/membership', [AdminAdminController::class, 'membership'])->name('admin.membership');
        Route::get('admin/class', [AdminAdminController::class, 'class'])->name('admin.class');
        Route::get('admin/billing', [AdminAdminController::class, 'billing'])->name('admin.billing');
        Route::get('admin/setting', [AdminAdminController::class, 'setting'])->name('admin.setting');



        // Route::get(
        //     'admin/dashboard',
        //     [AdminAdminController::class, 'redirectToDashboard']
        // )->name('dashboard');



        // Route::get('admin/dashboard', function () {
        //     return view('admin.dashboard.adminDashboard');
        // })->name('dashboard')->middleware('role:Admin');

        // Route::get('trainer/dashboard', function () {
        //     return view('admin.dashboard.trainerDashboard');
        // })->name('trainerDashboard')->middleware('role:Trainer');


        // Route::get('staff/dashboard', function () {
        //     return view('admin.dashboard.staffDashboard');
        // })->name('staffDashboard')->middleware('role:Staff');

        // Route::get('member/dashboard', function () {
        //     return view('admin.dashboard.memberDashboard');
        // })->name('memberDashboard')->middleware('role:Member');
    }
);

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
Route::put('/UpdateMembership/{id}', [MembershipController::class, 'update'])->name('membership.update');
Route::delete('/membership/{id}', [MembershipController::class, 'destroy'])->name('membership.destroy');




Route::get('/profile', [UserController::class, 'showProfile'])->name('view.profile');
Route::put('/profile', [UserController::class, 'updateProfile'])->name('user.profile.update');
Route::put('/profile/change-password', [UserController::class, 'changePassword'])->name('user.change-password');


Route::get('/member-dashboard', function () {
    return view('admin.dashboard.memberDashboard');
})->name('memberDash');

Route::get('/trainer-dashboard', function () {
    return view('admin.dashboard.trainerDashboard');
})->name('trainerDash');

Route::get('/staff-dashboard', function () {
    return view('admin.dashboard.staffDashboard');
})->name('staffDash');

Route::get('/admin-dashboard', function () {
    $employee = Employee::all();
    $memberships = Membership::all();
    return view('admin.dashboard.adminDashboard', compact('employee', 'memberships'));
})->name('adminDash');

Route::get('/details', function () {
    return view('admin.royal');
})->name('manageAdmins');

// Route::get('/member', function () {
//     return view('admin.dashboard.memberDashboard');
// })->name('memberDash');


// Route::post('/attendance/login', [ManageAttendanceController::class, 'loginAttendance'])->name('attendance.login');
// Route::post('/attendance/logout', [ManageAttendanceController::class, 'logoutAttendance'])->name('attendance.logout');



Route::get('/attendance/create', [AttendanceController::class, 'index'])->name('attendance.index');
Route::post('/addAttendance', [AttendanceController::class, 'addAttendance'])->name('addAttendance');
Route::put('UpdateAttendance', [AttendanceController::class, 'UpdateAttendance']);
Route::delete('/deleteAttendance/{id}', [AttendanceController::class, 'destroy'])->name('attendance.destroy');


Route::get('/attendance', [ManageAttendanceController::class, 'index'])->name('manageAttendance.index');
Route::post('/attendance/store', [ManageAttendanceController::class, 'store'])->name('attendance.store');



Route::middleware('auth')->group(function () {
    Route::post('/attendance/checkin', [GeoAttendanceController::class, 'checkIn'])->name('attendance.checkin');
    Route::post('/attendance/checkout', [GeoAttendanceController::class, 'checkOut'])->name('attendance.checkout');
    Route::get('/attendance/summary', [GeoAttendanceController::class, 'summary'])->name('attendance.summary');


    //Attendance Coordinates
    Route::get('/admin/attendance-coordinates', [GeoAttendanceController::class, 'showAttendanceCoordinates'])->name('attendance.coordinate');


    // Route::post('/coordinate/attendance/checkin', [AttendCoordController::class, 'checkIns']);
    // Route::post('/coordinate/attendance/checkout', [AttendCoordController::class, 'checkOuts']);


    //manage Employee
    Route::get('/employee/create', [EmployeeController::class, 'index'])->name('employee.create');
    Route::post('/AddNewEmployee', [EmployeeController::class, 'AddNewEmployee'])->name('employee.add');
    Route::put('/UpdateEmployee', [EmployeeController::class, 'UpdateEmployee']);
    Route::delete('/employee/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');







    //attendance details(This has been Hidden )
    Route::get('/admin/attendance-details', [AttendanceDetailsController::class, 'index'])->name('attendance.details.index');
});










Route::get('/announcements', [AnnouncementController::class, 'index'])->name('view.announcements');
Route::post('/announcements', [AnnouncementController::class, 'store'])->name('announcements.store');
Route::put('/announcements/{id}', [AnnouncementController::class, 'update'])->name('announcements.update');
Route::delete('/announcements/{id}', [AnnouncementController::class, 'destroy'])->name('announcements.destroy');









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


// Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/contact', [FrontendContactController::class, 'hello'])->name('contact.store');
Route::get('/admin/contacts', [FrontendContactController::class, 'manageContact'])->name('admin.contacts.index');



//Customer Routes
Route::get('/', [HomeController::class, 'index'])->name('frontend.home');
// Route::get('/login', [LoginController::class, 'index']);
// Route::post('/loginUser', [LoginController::class, 'loginUser']);
Route::get('/logoutUser', [LogoutController::class, 'logoutUser']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/registerUser', [RegisterController::class, 'registerUser']);
Route::get('/whyus', [FrontendWhyusController::class, 'index'])->name('frontend.whyus');
Route::get('/trainer', [TrainersController::class, 'index'])->name('frontend.trainers');
// Route::get('/contact', [ContactController::class, 'index'])->name('frontend.contact');
Route::get('/contact', [FrontendContactController::class, 'index'])->name('frontend.contact');

Route::get('/board', [DashboardController::class, 'index'])->name('dashboards');




// Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.show');

Route::get('/calendar', [EventController::class, 'index'])->name('calendar.show');
Route::get('/fetch-events', [EventController::class, 'fetchEvents']);
Route::post('/store-event', [EventController::class, 'store']);
Route::get('/event/{id}', [EventController::class, 'show']);
Route::put('/update-event/{id}', [EventController::class, 'update']);
Route::delete('/delete-event/{id}', [EventController::class, 'destroy']);
