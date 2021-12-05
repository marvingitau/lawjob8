<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\JobListingController;
use App\Http\Controllers\Admin\TokensController;
use App\Http\Controllers\Employer\CartController;
use App\Http\Controllers\Admin\EmployerController;
use App\Http\Controllers\Candidate\JobsController;
use App\Http\Controllers\Employer\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Employer\ProfileController;
use App\Http\Controllers\Candidate\AboutMeController;
use App\Http\Controllers\Employer\SettingsController;
use App\Http\Controllers\Admin\JobAttributsController;
use App\Http\Controllers\Employer\AppliedJobsController;
use App\Http\Controllers\Employer\JobPostingsController;
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


Route::get('/', [PublicController::class, 'index'])->name('welcome');
Route::get('/contacts', [PublicController::class, 'contact'])->name('contact');
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/user/verify/{token}', [PublicController::class, 'verifyUser']);



Route::get('joblist', [JobListingController::class, 'index'])->name('listing');
Route::get('job/{id}/view', [JobListingController::class, 'show'])->name('jobSpecific');
Route::post('search', [JobListingController::class, 'search'])->name('jobSearch');
Route::get('searchByCat/{id}', [JobListingController::class, 'searchCat'])->name('jobSearchCat');


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
        // Employer
        Route::get('/employers',[EmployerController::class,'index'])->name('view.employers');
        Route::get('/create/employer',[EmployerController::class,'create'])->name('create.employer');
        Route::post('/store/employer',[EmployerController::class,'store'])->name('store.employer');
        Route::get('/delete/employer/{id}/',[EmployerController::class,'destroy'])->name('delete.employer');
        Route::get('/view/employer/{id}/',[EmployerController::class,'show'])->name('view.employer');
        Route::get('/Approve/employer/{id}/',[EmployerController::class,'approve'])->name('approve.employer');
        Route::get('/Disable/employer/{id}/',[EmployerController::class,'disable'])->name('disable.employer');
        // Candidates
        Route::get('/candidates',[EmployerController::class,'indexCanditate'])->name('view.candidates');
        Route::get('/delete/candidates/{id}/',[EmployerController::class,'destroyCandidate'])->name('delete.candidate');
        Route::get('/view/candidate/{id}/',[EmployerController::class,'showCandidate'])->name('view.candidate');
        // Tokens
        Route::get('/tokens',[TokensController::class,'index'])->name('show.tokens');
        Route::post('/tokens/create',[TokensController::class,'store'])->name('create.token');
        Route::get('/tokens/delete/{id}/',[TokensController::class,'destroy'])->name('delete.token');


    });
});

// Candidate
Route::group(['prefix'=>'candidate'],function(){

    Route::group(['middleware'=>'role:candidate'],function(){
        Route::get('/', [App\Http\Controllers\Candidate\CandidateDashboardController::class,'index'])->name('candidate.dashboard');
        Route::get('/Profile/View', [AboutMeController::class,'index'])->name('candidate.profile');
        Route::get('/Profile/Create', [AboutMeController::class,'create'])->name('candidate.profile.create');
        Route::post('/Profile/Store', [AboutMeController::class,'store'])->name('candidate.profile.store');
        Route::post('/Profile/Update/{cat}', [AboutMeController::class,'update'])->name('candidate.profile.update');
        Route::post('/Profile/New/{cat}', [AboutMeController::class,'additional_inclusion'])->name('candidate.profile.new');

        Route::get('/Applied/Jobs', [JobsController::class,'index'])->name('applied.jobs');
        Route::get('/Applied/Job/{id}', [JobsController::class,'AppliedJob'])->name('applied.job');
        Route::get('/Apply/Job/{id}', [JobsController::class,'ApplyJob'])->name('apply.job');
        Route::get('/Job/List', [JobsController::class,'jobList'])->name('backend.job.list');
        Route::get('/Job/View/{id}', [JobsController::class,'JobView'])->name('backend.job.view');
        Route::post('/Job/Apply/{id}', [JobsController::class,'JobApply'])->name('backend.job.apply');

        Route::post('/Cart/Add/{days}', [CartController::class,'store'])->name('candidate.add.cart');
        Route::get('/Cart/View',[CartController::class,'index'])->name('candidate.view.cart');
        Route::get('/Cart/Update-quantity/{id}/{value}',[CartController::class,'update'])->name('cart.update');
        Route::get('/Cart/Delete/{id}',[CartController::class,'destroy'])->name('cart.delete');
        Route::get('/Order/Forms', [OrderController::class,'index'])->name('candidate.order.forms');
        Route::post('/Order/Checkout', [OrderController::class,'create'])->name('candidate.checkout.cart');
        Route::get('/Order/Approved', [OrderController::class,'approved'])->name('candidate.checkout.approved');
        Route::group(['prefix' => '/payment'], function () {
            //PESAPAL
            Route::get('/', [App\Http\Controllers\Employer\PaymentController::class,'payment']);
            Route::get('donepayment',[App\Http\Controllers\Employer\PaymentController::class,'paymentsuccess'])->name('paymentsuccess');
            Route::get('paymentconfirmation', [OrderController::class,'store'])->name('payment.confirmation');
        });

    });

});

// Employer


Route::group(['prefix'=>'employer'],function(){

    Route::group(['middleware'=>'role:employer'],function(){
        Route::get('/', [EmployerDashboardController::class,'index'])->name('employer.dashboard');
        Route::post('/Cart/Add/{days}', [CartController::class,'store'])->name('add.cart');
        Route::get('/Cart/View',[CartController::class,'index'])->name('view.cart');
        Route::get('/Cart/Update-quantity/{id}/{value}',[CartController::class,'update'])->name('cart.update');
        Route::get('/Cart/Delete/{id}',[CartController::class,'destroy'])->name('cart.delete');
        Route::get('/Order/Forms', [OrderController::class,'index'])->name('order.forms');
        Route::post('/Order/Checkout', [OrderController::class,'create'])->name('checkout.cart');
        Route::get('/Order/Approved', [OrderController::class,'approved'])->name('checkout.approved');
        Route::get('/Profile/View', [ProfileController::class,'index'])->name('profile.view');
        Route::get('/Profile/Create', [ProfileController::class,'createProfile'])->name('profile.create');
        Route::post('/Profile/Store', [ProfileController::class,'store'])->name('profile.store');
        Route::post('/Password/Change', [ProfileController::class,'changePassword'])->name('change.password');
        Route::post('/HR/Store', [UserDataController::class,'store'])->name('hr.store');
        Route::get('/Job/Create', [JobPostingsController::class,'create'])->name('job.create');
        Route::post('/Job/Post', [JobPostingsController::class,'store'])->name('job.post');
        Route::get('/Job/List', [JobPostingsController::class,'index'])->name('job.list');
        Route::get('/Job/Delete/{id}', [JobPostingsController::class,'destroy'])->name('job.delete');
        Route::get('/Settings', [SettingsController::class,'index'])->name('settings');
        Route::get('/Applications', [AppliedJobsController::class,'index'])->name('job.application');
        Route::get('/Application/View/{id}', [AppliedJobsController::class,'viewCandidate'])->name('application.view.candidate');
        Route::get('/Application/CSV', [AppliedJobsController::class,'downloadtargetApplicantCSV'])->name('application.csv');



    });

    Route::group(['prefix' => '/payment'], function () {
        //PESAPAL
        Route::get('/', [App\Http\Controllers\Employer\PaymentController::class,'payment']);
        Route::get('donepayment',[App\Http\Controllers\Employer\PaymentController::class,'paymentsuccess'])->name('paymentsuccess');
        Route::get('paymentconfirmation', [OrderController::class,'store'])->name('payment.confirmation');
    });

});

