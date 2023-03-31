<?php

use App\Http\Controllers\AdminCompanyController;
use App\Http\Controllers\DynamicController;
use App\Http\Controllers\StudentController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\AdminDynamicController;
use App\Http\Controllers\AdminStudentController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminLeaveRequestController;
use App\Http\Controllers\AdminStudentDashboardController;
use App\Http\Controllers\AdminStudentAttendenceController;
use App\Http\Controllers\ApiRequestHandleController;
use App\Http\Controllers\student\StudentProfileController;
use App\Http\Controllers\student\StudentDashboardController;
use App\Http\Controllers\student\StudentAttendanceController;
use App\Http\Controllers\student\StudentLeaveRequestController;
use App\Http\Controllers\auth\StudentRegisterationController;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\QrCodeController;
use Illuminate\Support\Facades\Route;

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
Route::controller(LoginController::class)->middleware(RedirectIfAuthenticated::class)->group(function () {
    Route::get('/', 'view')->name('home');
    Route::post('/check/qr', [QrCodeController::class, 'check_qr'])->name('qr.scan.check');
    Route::get('/login', 'view')->name('login');
    Route::post('/login', 'login');
    Route::get('employee/register', [AdminStudentController::class, 'create'])->name('admin.student.create');
    Route::post('employee/register', [AdminStudentController::class, 'store'])->name('admin.student.create');

});

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');


// Route::post('/user/scan', [AdminStudentController::class, 'user_scan'])->name('user.scan');


    Route::controller(AdminStudentController::class)->name('admin.')->middleware(Authenticate::class)->group(function () {
        Route::get('employee/{user}/registered', 'registeration_success')->name('registeration_success');
        Route::get('employee/{id}/profile', 'show')->name('student.profile');
        Route::get('edit/{student}/employee', 'edit')->name('student.edit');
        Route::post('edit/{student}/employee', 'update')->name('student.edit');

    });


