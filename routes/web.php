<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JobAttributsController;
use App\Http\Controllers\Employer\EmployerDashboardController;

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
    return view('welcome');
});

Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::get('admin/login', [App\Http\Controllers\Auth\LoginController::class, 'AdminLoginForm'])->name('admin.login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

Route::get('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('password/confirm', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('password/confirm', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'confirm']);

Route::get('email/verify', [App\Http\Controllers\Auth\VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [App\Http\Controllers\Auth\VerificationController::class, 'resend'])->name('verification.resend');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Admin
Route::group(['middleware'=>'role:admin','prefix'=>'admin'],function () {
    Route::group(['namespace'=>'Admin'],function () {
        Route::get('/', [DashboardController::class,'index'])->name('admin.dashboard');
        Route::get('/jobAttribute/show/{type}', [JobAttributsController::class,'index'])->name('admin.jobAttrib.show');
        Route::post('/jobAttribute/store/{type}', [JobAttributsController::class,'store'])->name('admin.jobAttrib.store');
        Route::patch('/jobAttribute/update/{type}/{id}',[JobAttributsController::class,'update'])->name('admin.jobAttrib.update');
        Route::delete('/jobAttribute/delete/{type}/{id}', [JobAttributsController::class,'destroy'])->name('admin.jobAttrib.delete');
    });
});

// Candidate
Route::group(['prefix'=>'candidate'],function(){

    Route::group(['middleware'=>'role:candidate'],function(){
        Route::get('/', [App\Http\Controllers\Candidate\CandidateDashboardController::class,'index'])->name('candidate.dashboard');

        // Route::post('/about-me/create', 'AboutMeController@store')->name('aboutme.create');
        // Route::post('/experience/create', 'WorkExperienceController@store')->name('experience.create');
        // Route::post('/education/create', 'EducationController@store')->name('education.create');
        // Route::post('/skill/create', 'JobSkillController@store')->name('skill.create');
        // Route::post('/resume/create', 'ResumeController@store')->name('resume.create');

    });

});

// Employer


Route::group(['prefix'=>'employer'],function(){

    Route::group(['middleware'=>'role:employer'],function(){
        Route::get('/', [EmployerDashboardController::class,'index'])->name('employer.dashboard');


    });

});

