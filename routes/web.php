<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\JobController;
use App\Http\Controllers\Admin\AluminiController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Alumini\ProjectController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Alumini\JobVacancyController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Student\ProjectListController;
use App\Http\Controllers\Student\RequestListController;
use App\Http\Controllers\Alumini\ProjectRequestController;
use App\Http\Controllers\Authentication\RegisterController;
use App\Http\Controllers\Alumini\ProfileController as AluminProfileController;
use App\Http\Controllers\Student\ProfileController as StudentProfileController;
use App\Http\Controllers\Alumini\DashBoardController as AluminDashBoardController;
use App\Http\Controllers\Student\DashBoardController as StudentDashBoardController;
use App\Http\Controllers\Authentication\ResetPasswordController as CustomResetPassword;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/email', function(){
    return view('Email.adminMail');
});



Auth::routes();

Route::get('/user-register',[RegisterController::class,'register']);
Route::post('/create-user',[RegisterController::class,'creatUser']);

Route::get('/forgot-password',[CustomResetPassword::class,'forgotpassword']);
Route::get('/requestOTP',[CustomResetPassword::class,'RequestOTP']);
Route::get('/verifyOTP',[CustomResetPassword::class,'VerifyOTP']);
Route::get('/NewPass',[CustomResetPassword::class,'EnterNewPassword']);

// Route::post('/departmentadd',[DepartmentController::class,'addDepartment']);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth','ADMIN']],function(){

        Route::get('admin/dashboard',[DashBoardController::class,'dashboard']);

        Route::get('admin/alumini',[AluminiController::class,'aluminiview']);
        Route::post('/importfile',[AluminiController::class,'fileImport']);

        Route::get('admin/student',[StudentController::class,'studentview']);
        // Route::post('/importstudent',[StudentController::class,'fileImport']);

        Route::get('admin/department',[DepartmentController::class,'departmentview']);
        Route::post('/departmentadd',[DepartmentController::class,'addDepartment']);

        Route::get('admin/profile',[ProfileController::class,'profile']);
        Route::post('/addprofile',[ProfileController::class,'updateProfile']);

});

Route::group(['middleware' => ['auth','ALUMINI']],function(){

    Route::get('/alumini/dashboard',[AluminDashBoardController::class,'dashboardview']);

    Route::get('/alumini/project', [ProjectController::class,'aluminiprojectdetails']);
    Route::post('/addProjectDetails',[ProjectController::class,'addProjectDetails']);

    Route::get('/alumini/workdetails',[JobVacancyController::class,'aluminiJobVacancyDetails']);
    Route::post('/addjobvacancy',[JobVacancyController::class,'addJobVacancy']);

    Route::get('/alumini/requestlist',[ProjectRequestController::class,'aluminiProjectRequestDetails']);
    Route::Post('/replyrequest',[ProjectRequestController::class,'ReplyRequest']);

    Route::get('/alumini/profile',[AluminProfileController::class,'profile']);
    Route::post('/addprofile',[AluminProfileController::class,'addProfile']);
    Route::post('/addjob',[AluminProfileController::class,'addJob']);

});

Route::group(['middleware' => ['auth','STUDENT']],function(){

    Route::get('/student/dashboard',[StudentDashBoardController::class,'dashboardview']);

    Route::get('/student/requestlist',[RequestListController::class,'ProjectRequestDetails']);

    Route::get('/student/projectlist', [ProjectListController::class,'ProjectDetails']);
    Route::post('/requestproject',[ProjectListController::class,'RequestDetails']);

    Route::get('/student/joblist', [JobController::class,'studentJobVacancyDetails']);

    Route::get('/student/profile', [StudentProfileController::class,'profileview']);
    Route::post('/updateProfile',[StudentProfileController::class,'prfileUpdate']);

});
