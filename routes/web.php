<?php

use App\Http\Controllers\AppraisalscoreController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Impersonate;
use App\Http\Controllers\ScoreAppraisalController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[FrontendController::class,'index'])->name('index');

// Auth::routes(['register'=>false]);
// Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');


Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');


Route::get('/logout', 'Auth\LoginController@userLogout')->name('user.logout');


Route::group(['prefix' => 'dashboard','middleware'=>['auth','staffaccess']], function() {
    Route::get('/', 'HomeController@index')->name('home');
    // Route::get('/profile', 'HomeController@profile')->name('profile');
    Route::middleware(['adminaccess'])->group(function () {
        Route::resource('roles', 'RoleController');
        Route::resource('schools', 'SchoolController');
        Route::resource('departments', 'DepartmentController');
        Route::resource('manageusers', 'ManageuserController',['except'=>['show','create','store']]);
        Route::resource('ranks', 'RankController');
        
        Route::get('dashboard/impersonate/destroy',[Impersonate::class,'destroy'])->name('staff.impersonate.destroy');
    });
    
    Route::resource('staffs', 'StaffController');

    Route::get('myform/ajax/{id}','HomeController@myformAjax')->name('myform.ajax');
    Route::get('myform/ajax2/{id}','HomeController@myformAjax2')->name('myform.ajax2');
    Route::get('myform/ajax3/{id}','HomeController@myformAjax3')->name('myform.ajax3');

    Route::post('update/profile','ProfileController@store')->name('update.profile');
    Route::get('/profile','ProfileController@profile')->name('my.profile');
    
    Route::resource('users', 'UserController');
   
    Route::post('staff/{id}/activate', 'StaffController@activate')->name('staffs.activate');
    Route::post('staff/{id}/deactivate', 'StaffController@deactivate')->name('staffs.deactivate');
    Route::get('staff-by-department', 'StaffController@staffbydepartment')->name('staffsbydept');
    Route::get('department/{id}', 'StaffController@departmentalstaff')->name('departmentalstaff');
    Route::resource('appraisals', 'AppraisalController');
    Route::get('/staff-appraisal/details/{appraisal_id}/{staffid}','StaffController@showappraisal')->name('staffappraisal.show');
    // Route::post('/staff-appraisal/details/{appraisal_id}','StaffController@showappraisal')->name('staffappraisal.show');

    Route::get('/my-appraisals','MyAppraisalController@index')->name('myappraisal.index');
    Route::get('/my-appraisal/details/{id}','MyAppraisalController@show')->name('myappraisal.show');

    Route::get('/published/appraisals','AppraisalController@published')->name('appraisals.published');
    Route::get('appraisal/{id}/publish', 'AppraisalController@publish')->name('appraisal.publish');
    Route::get('appraisal/{id}/unpublish', 'AppraisalController@unpublish')->name('appraisal.unpublish');

    Route::get('/appraisal/form/{id?}','AppraisalController@appraisalform')->name('appraisalform');

    Route::post('/appraisal-form','AppraisalController@getappraisalform')->name('getappraisalform');

    Route::get('/submitted-appraisals','AppraisalController@allsubmittedappraisals')->name('submitted.appraisals');
    Route::delete('/delete/submitted-appraisals/{id}','AppraisalController@deletesubmittedappraisal')->name('delete.submitted.appraisal');

    
    
    

    //route for storing details from various appraisal forms
    Route::post('/save/acad-appraisal','AcademicStaffAppraisalController@store')->name('store.acad.appraisal');
    Route::get('/acad-appraisal/success','AcademicStaffAppraisalController@thankyoupage')->name('acad.thankyoupage');

    //download attached appraisal documents
    Route::get('/download/qualification/{filename}', [DownloadController::class,'qualificationfile'])->name('download.qualification');
    Route::get('/download/publication/{filename}', [DownloadController::class,'publicationfile'])->name('download.publication');
    Route::get('/download/production/{filename}', [DownloadController::class,'productionfile'])->name('download.production');


    Route::post('/save/nonacad-appraisal','NonAcademicStaffAppraisalController@store')->name('store.nonacad.appraisal');
    Route::post('/save/juniorstaff-appraisal','JuniorStaffAppraisalController@store')->name('store.juniorstaff.appraisal');
    
    Route::get('/acad-appraisal/submitted','AppraisalController@acadsuccess')->name('acad.aparaisal.success');



    Route::post('appraisal/score-form/{staff_id?}',[AppraisalscoreController::class,'scoreform'])->name('appraisalscoreform');
    
    Route::post('save/appraisal/score',[ScoreAppraisalController::class,'store'])->name('store.appraisal.score');


    Route::get('/login/details','LoginAuditController@index')->name('login.details');

    //change password
    Route::post('/change-password','PasswordController@store')->name('password.change');

    Route::get('/appraisal/upload-documents','AcademicDocumentUploadController@getuploadpage')->name('upload.documents');
    Route::post('/documents-uploaded','AcademicDocumentUploadController@uploaddoc')->name('upload.appraisal.docs');
});

Route::get('/impersonate/user/{id}',[Impersonate::class,'index'])->name('staff.impersonate');

// Route::livewire('/dashboard', 'home')->name('home');

// Route::livewire('/login','login')->name('login');
