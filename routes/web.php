<?php

use App\Http\Controllers\AppraisalscoreController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Impersonate;
use App\Http\Controllers\RecommendationController;
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
Route::get('download/usermanual/{filename}', [FrontendController::class,'downloadusermanual'])->name('download.usermanual');

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
    // Route::middleware(['adminaccess'])->group(function () {
    Route::middleware(['staffaccess'])->group(function () {
        Route::resource('roles', 'RoleController');
        Route::resource('schools', 'SchoolController');
        Route::resource('departments', 'DepartmentController');
        Route::resource('manageusers', 'ManageuserController',['except'=>['show','create','store']]);
        Route::resource('ranks', 'RankController');
        
        Route::get('dashboard/impersonate/destroy',[Impersonate::class,'destroy'])->name('staff.impersonate.destroy');
    });
    
    Route::resource('staffs', 'StaffController');
    Route::get('staff/modify/{id}','StaffController@modifystaff')->name('staff.modify');
    Route::put('staff/updatedetails/{id}','StaffController@updatemodifiedstaff')->name('staff.updatestaffdetail');

    Route::resource('adhocstaffs', 'AdhocStaffController');

    Route::post('addnew-adhocstaff','StaffController@storeAdhocStaff')->name('createnew.adhocstaff');

    Route::get('myform/ajax/{id}','HomeController@myformAjax')->name('myform.ajax');
    Route::get('myform/ajax2/{id}','HomeController@myformAjax2')->name('myform.ajax2');
    Route::get('myform/ajax3/{id}','HomeController@myformAjax3')->name('myform.ajax3');

    Route::post('update/profile','ProfileController@store')->name('update.profile');
    Route::get('/profile','ProfileController@profile')->name('my.profile');
    //adhoc staff profile
    Route::post('/adhoc-staff/update/profile','ProfileController@storeadhocstaff')->name('update.adhocstaffprofile');
    
    Route::get('/adhoc-staff/edit/profile/{id}','ProfileController@editadhocstaffprofile')->name('edit.adhocstaffprofile');
    Route::post('/update/adhoc-staff/profile','ProfileController@updateadhocstaffprofile')->name('adhocstaffprofileupdate');
    
    
    Route::resource('users', 'UserController');
   
    Route::post('staff/{id}/activate', 'StaffController@activate')->name('staffs.activate');
    Route::post('staff/{id}/deactivate', 'StaffController@deactivate')->name('staffs.deactivate');
    Route::get('staff-by-department', 'StaffController@staffbydepartment')->name('staffsbydept');
    Route::get('department/{id}', 'StaffController@departmentalstaff')->name('departmentalstaff');
    Route::get('my-department', 'MyDepartmentController@mydepartment')->name('mydepartment');
    Route::get('my-departmental-staff/{id}', 'MyDepartmentController@mydepartmentalstaff')->name('mydepartmental.staff');
    
    Route::get('my-school', 'MySchoolController@myschool')->name('myschool');
    Route::get('my-school/departments/{id}', 'MySchoolController@myschooldepartment')->name('myschool.departments');
    Route::get('my-school/staff/{id}', 'MySchoolController@myschoolstaff')->name('myschool.staffs');
    
    Route::resource('appraisals', 'AppraisalController');
    
    /**getting staff appraisal details based on staff category */
    Route::get('/staff-appraisal/details/{appraisal_id}/{staffid}','StaffController@showappraisal')->name('staffappraisal.show');
    
    Route::get('/staff-created-by/{id}','StaffController@showPeopleCreatedByOthers')->name('peoplecreatedbyothers');
    // Route::post('/staff-appraisal/details/{appraisal_id}','StaffController@showappraisal')->name('staffappraisal.show');
    Route::get('/download/uploaded-appraisal-document/{filename}', 'StaffController@uploadedfiledownload')->name('uploadedfile.download');
    Route::get('/view/uploaded-appraisal-document/{filename}', 'StaffController@viewuploadedfile')->name('view.uploadedfile');


    Route::get('/my-appraisals','MyAppraisalController@index')->name('myappraisal.index');
    Route::get('/my-appraisal/details/{id}','MyAppraisalController@show')->name('myappraisal.show');

    Route::get('/published/appraisals','AppraisalController@published')->name('appraisals.published');
    Route::get('appraisal/{id}/publish', 'AppraisalController@publish')->name('appraisal.publish');
    Route::get('appraisal/{id}/unpublish', 'AppraisalController@unpublish')->name('appraisal.unpublish');

    Route::get('/appraisal/form/{slug}','AppraisalController@appraisalform')->name('appraisalform');

    Route::post('/appraisal-form','AppraisalController@getappraisalform')->name('getappraisalform');

    Route::get('/submitted-appraisals','AppraisalController@allsubmittedappraisals')->name('submitted.appraisals');
    Route::delete('/delete/submitted-appraisals/{appraisal_id}/{user_id}','AppraisalController@deletesubmittedappraisal')->name('delete.submitted.appraisal');
    Route::get('/delete/submitted-appraisals/{appraisal_id}/{position}','AppraisalController@destroyAppraisal')->name('delete.appraisals');
    Route::get('/fetch/submitted-appraisals/data/{appraisal_id}/{position}','AppraisalController@fetchData')->name('appraisal.data');

    //submitting each appraisal details
    Route::group(['prefix' => 'appraisal'], function() {
        Route::post('/qualification','QualificationController@store')->name('qualification.store');
        Route::post('/professional/membership','ProfessionalMembershipController@store')->name('profmembership.store');
        Route::post('/promotion','PromotionController@store')->name('promotion.store');
        Route::post('/salaryscale','SalaryscaleController@store')->name('salaryscale.store');
        Route::post('/training','TrainingController@store')->name('training.store');
        Route::post('/additionalqualification','AdditionalQualificationController@store')->name('additionalqualif.store');
        Route::post('/performedduty','PerformedDutiesController@store')->name('performedduty.store');
        Route::post('/publication','PublicationController@store')->name('publication.store');
        Route::post('/production','ProductionController@store')->name('production.store');
        Route::post('/adminresponsibility','AdminResponsibilityController@store')->name('adminrespons.store');
        Route::post('/coursetaught','CourseTaughtController@store')->name('coursetaught.store');
        Route::post('/tloadsummary','TeachingLoadSummaryController@store')->name('tloadsummary.store');
        Route::post('/anyotherinfo','AnyOtherInfoController@store')->name('anyotherinfo.store');
        Route::post('/supporting-documents','SupportingDocumentController@store')->name('supportingdoc.store');
        Route::post('/more-supporting-documents','SupportingDocumentController@storemoredocument')->name('moresupportingdoc.store');

    //addendum for junior staff
        Route::post('/institution','InstitutionController@store')->name('institution.store');
        Route::post('/junior-staff-qualification','JuniorQualificationController@store')->name('juniorqualification.store');
        Route::post('/post-qualification-experience','PostQualiExperienceController@store')->name('postqualiexperience.store');
        Route::post('/adhoc-peformed-duty','AdhocPerfDutyController@store')->name('adhocperfduty.store');
        

        //printing submitted appraisal
        Route::get('print/submitted/appraisal/{appraisal_id}/{user_id}','PrintSubmittedAppraisalController@printsubmittedappraisal')->name('print.submitted.appraisal');

        //appraisal reports
        Route::get('appraisal/reports','ReportController@allreports')->name('appraisal.reports');
        Route::get('print/appraisal/report/{id}','ReportController@printreport')->name('print.report');
        Route::get('generate/yearly/appraisal/report','ReportController@getappraisalyear')->name('getappraisal.year');
        Route::post('yearly/appraisal/report','ReportController@getyearlyappraisalreport')->name('getyearlyappraisal.report');
        Route::get('print/yearly/appraisal/report/{appyear}','ReportController@generalreport')->name('printyearlyappraisal.report');
        
    });
    
    Route::resource('user', 'UserController');
    
    //uploading signature
    Route::post('upload/signature','SignatureController@staffsignature')->name('upload.signature');

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
    
    Route::get('staff/appraisal/score-form/{appraisalid}/{staffid}',[AppraisalscoreController::class,'getscoreform'])->name('getappraisalscoreform');

    /**getting the appraisal score forms based on the staff category */
    Route::get('staff/appraisal/academic-score-form/{appraisalid}/{staffid}',[AppraisalscoreController::class,'getacademicscoreform'])->name('getacademicscoreform');
    Route::get('staff/appraisal/nonacademic-score-form/{appraisalid}/{staffid}',[AppraisalscoreController::class,'getnonacademicscoreform'])->name('getnonacademicscoreform');
    Route::get('staff/appraisal/juniorstaff-score-form/{appraisalid}/{staffid}',[AppraisalscoreController::class,'juniorstaffscoreform'])->name('juniorstaffscoreform');
    
    
    Route::post('staff/appraisal/acceptorreject/{appraisalid}/{staffid}',[ScoreAppraisalController::class,'acceptorrejectcomment'])->name('appraisalscore.acceptorreject');
    
    
    
    Route::post('save/appraisal/score',[ScoreAppraisalController::class,'store'])->name('store.appraisal.score');
    Route::post('save/nonacademic/appraisal/score',[ScoreAppraisalController::class,'storenonacademicscore'])->name('store.nonacademicappraisal.score');
    Route::post('save/juniorstaff/appraisal/score',[ScoreAppraisalController::class,'storejuniorstaffscore'])->name('store.juniorstaffappraisal.score');


    Route::get('/login/details','LoginAuditController@index')->name('login.details');

    //change password
    Route::post('/change-password','PasswordController@store')->name('password.change');

    Route::get('/appraisal/upload-documents','AcademicDocumentUploadController@getuploadpage')->name('upload.documents');
    Route::post('/documents-uploaded','AcademicDocumentUploadController@uploaddoc')->name('upload.appraisal.docs');

    //appraisal recommendations
    Route::post('staff/appraisal/schboardrecommendation/{appraisalid}/{staffid}',[RecommendationController::class,'byschoolboard'])->name('schboardrecomm');
    Route::post('staff/appraisal/managementrecommendation/{appraisalid}/{staffid}',[RecommendationController::class,'bymanagement'])->name('managementrecomm');
    Route::post('staff/appraisal/ssapcrecommendation/{appraisalid}/{staffid}',[RecommendationController::class,'byssapc'])->name('ssapcrecomm');
    Route::post('staff/appraisal/councilrecommendation/{appraisalid}/{staffid}',[RecommendationController::class,'bycouncil'])->name('councilrecomm');

    //scored appraisals by Appraisers
    Route::get('hod/scored-appraisals','ScoredAppraisalController@scoredbyhod')->name('hod.scoredappraisals');
    Route::get('dean/scored-appraisals','ScoredAppraisalController@scoredbydean')->name('dean.scoredappraisals');
    Route::get('management/scored-appraisals','ScoredAppraisalController@scoredbymanagement')->name('management.scoredappraisals');
    Route::get('ssapc/scored-appraisals','ScoredAppraisalController@scoredbyssapc')->name('ssapc.scoredappraisals');
    Route::get('council/scored-appraisals','ScoredAppraisalController@scoredbycouncil')->name('council.scoredappraisals');
    Route::get('completely/scored-appraisals','ScoredAppraisalController@allscoredappraisals')->name('all.scoredappraisals');

    // access denied
    Route::get('access-denied','AccessDeniedController@index')->name('access.denied');
});

Route::get('/impersonate/user/{id}',[Impersonate::class,'index'])->name('staff.impersonate');

