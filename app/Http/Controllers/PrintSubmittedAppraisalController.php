<?php

namespace App\Http\Controllers;

use App\Additionalqualif;
use App\Adhocperfduty;
use App\Adminresponsibility;
use App\Anyotherinfo;
use App\Appraisal;
use App\Appraisalscore;
use App\Appraisaluser;
use App\Coursetaught;
use App\Institution;
use App\Juniorqualification;
use App\Performedduty;
use App\Postqualiexperience;
use App\Production;
use App\Profmembership;
use App\Promotion;
use App\Publication;
use App\Qualification;
use App\Salaryscale;
use App\Teachingloadsummary;
use App\Training;
use App\Uploadedfile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrintSubmittedAppraisalController extends Controller
{
    
    public function printsubmittedappraisal($appraisal_id,$staff_id){

        $appraisal=Appraisal::find($appraisal_id);
        $staff=User::find($staff_id);

        $staffappraisalscore=Appraisalscore::where('appraisal_id',$appraisal_id)->where('user_id',$staff_id)->first();

        
        $the_appraiser=Appraisaluser::where('appraisal_id',$appraisal_id)->where('user_id',$staff_id)->where('sentto_id',Auth::user()->id)->first();

        if ($staff->category_id==2) {
            //for academic staff
            $lastqualID=Qualification::max('appraisal_id');
        $lastprofID=Profmembership::max('appraisal_id');
        $lastpromoID=Promotion::max('appraisal_id');
        $lastsalscaleID=Salaryscale::max('appraisal_id');
        $lastTrainingID=Training::max('appraisal_id');
        $lastAddiQualID=Additionalqualif::max('appraisal_id');
        $lastPerfdutyID=Performedduty::max('appraisal_id');
        $lastPublicaID=Publication::max('appraisal_id');
        $lastProdID=Production::max('appraisal_id');
        $lastAdminResID=Adminresponsibility::max('appraisal_id');
        $lastCTaughtID=Coursetaught::max('appraisal_id');
        $lastTLSID=Teachingloadsummary::max('appraisal_id');
        $lastAnyInfoID=Anyotherinfo::max('appraisal_id');
        $lastAppScoreID=Appraisalscore::max('appraisal_id');
        $lastUploadedFileID=Uploadedfile::max('appraisal_id');

        $qualifications=Qualification::where('appraisal_id',$lastqualID)->where('user_id',$staff_id)->get();
        $profmemberships=Profmembership::where('appraisal_id',$lastprofID)->where('user_id',$staff_id)->get();
        $promotions=Promotion::where('appraisal_id',$lastpromoID)->where('user_id',$staff_id)->get();
        $salaryscales=Salaryscale::where('appraisal_id',$lastsalscaleID)->where('user_id',$staff_id)->get();
        $trainings=Training::where('appraisal_id',$lastTrainingID)->where('user_id',$staff_id)->get();
        $additionalqualifs=Additionalqualif::where('appraisal_id',$lastAddiQualID)->where('user_id',$staff_id)->get();
        $performedduties=Performedduty::where('appraisal_id',$lastPerfdutyID)->where('user_id',$staff_id)->get();
        $publications=Publication::where('appraisal_id',$lastPublicaID)->where('user_id',$staff_id)->get();
        $productions=Production::where('appraisal_id',$lastProdID)->where('user_id',$staff_id)->get();
        $adminrespons=Adminresponsibility::where('appraisal_id',$lastAdminResID)->where('user_id',$staff_id)->get();
        $taughtcourses=Coursetaught::where('appraisal_id',$lastCTaughtID)->where('user_id',$staff_id)->get();
        $teachingloadsummaries=Teachingloadsummary::where('appraisal_id',$lastTLSID)->where('user_id',$staff_id)->get();
        $anyotherinfos=Anyotherinfo::where('appraisal_id',$lastAnyInfoID)->where('user_id',$staff_id)->get();
        $uploadedfiles=Uploadedfile::where('appraisal_id',$lastUploadedFileID)->where('user_id',$staff_id)->get();
                
        return view('admin.print.academicsubmitteddetails',array('user'=>Auth::user()),compact('qualifications','salaryscales','staff','profmemberships','promotions','trainings','additionalqualifs','performedduties','publications','productions','adminrespons','taughtcourses','teachingloadsummaries','anyotherinfos','uploadedfiles','staff_id','staffappraisalscore','the_appraiser','appraisal_id','appraisal'));

        } elseif($staff->category_id==3) {
            //for non-academic staff
            $lastqualID=Qualification::max('appraisal_id');
        $lastprofID=Profmembership::max('appraisal_id');
        $lastpromoID=Promotion::max('appraisal_id');
        $lastsalscaleID=Salaryscale::max('appraisal_id');
        $lastTrainingID=Training::max('appraisal_id');
        $lastAddiQualID=Additionalqualif::max('appraisal_id');
        $lastPerfdutyID=Performedduty::max('appraisal_id');
        $lastPublicaID=Publication::max('appraisal_id');
        $lastProdID=Production::max('appraisal_id');
        $lastAdminResID=Adminresponsibility::max('appraisal_id');
        $lastCTaughtID=Coursetaught::max('appraisal_id');
        $lastTLSID=Teachingloadsummary::max('appraisal_id');
        $lastAnyInfoID=Anyotherinfo::max('appraisal_id');
        $lastAppScoreID=Appraisalscore::max('appraisal_id');
        $lastUploadedFileID=Uploadedfile::max('appraisal_id');

        $qualifications=Qualification::where('appraisal_id',$lastqualID)->where('user_id',$staff_id)->get();
        $profmemberships=Profmembership::where('appraisal_id',$lastprofID)->where('user_id',$staff_id)->get();
        $promotions=Promotion::where('appraisal_id',$lastpromoID)->where('user_id',$staff_id)->get();
        $salaryscales=Salaryscale::where('appraisal_id',$lastsalscaleID)->where('user_id',$staff_id)->get();
        $trainings=Training::where('appraisal_id',$lastTrainingID)->where('user_id',$staff_id)->get();
        $additionalqualifs=Additionalqualif::where('appraisal_id',$lastAddiQualID)->where('user_id',$staff_id)->get();
        $performedduties=Performedduty::where('appraisal_id',$lastPerfdutyID)->where('user_id',$staff_id)->get();
        $publications=Publication::where('appraisal_id',$lastPublicaID)->where('user_id',$staff_id)->get();
        $productions=Production::where('appraisal_id',$lastProdID)->where('user_id',$staff_id)->get();
        $adminrespons=Adminresponsibility::where('appraisal_id',$lastAdminResID)->where('user_id',$staff_id)->get();
        $anyotherinfos=Anyotherinfo::where('appraisal_id',$lastAnyInfoID)->where('user_id',$staff_id)->get();
        $uploadedfiles=Uploadedfile::where('appraisal_id',$lastUploadedFileID)->where('user_id',$staff_id)->get();
                
        return view('admin.print.nonacademicsubmittedapp',array('user'=>Auth::user()),compact(
            'qualifications',
            'salaryscales',
            'staff',
            'profmemberships',
            'promotions',
            'trainings',
            'additionalqualifs',
            'performedduties',
            'publications',
            'productions',
            'adminrespons',
            'anyotherinfos',
            'uploadedfiles',
            'staff_id',
            'staffappraisalscore',
            'the_appraiser',
            'appraisal_id',
            'appraisal'
        ));

        }elseif($staff->category_id==4){
            //for junior staff
            $lastqualID=Qualification::max('appraisal_id');
            $lastprofID=Profmembership::max('appraisal_id');
            $lastpromoID=Promotion::max('appraisal_id');
            $lastsalscaleID=Salaryscale::max('appraisal_id');
            $lastTrainingID=Training::max('appraisal_id');
            $lastAddiQualID=Additionalqualif::max('appraisal_id');
            $lastPerfdutyID=Performedduty::max('appraisal_id');
            $lastPublicaID=Publication::max('appraisal_id');
            $lastProdID=Production::max('appraisal_id');
            $lastAdminResID=Adminresponsibility::max('appraisal_id');
            $lastCTaughtID=Coursetaught::max('appraisal_id');
            $lastTLSID=Teachingloadsummary::max('appraisal_id');
            $lastAnyInfoID=Anyotherinfo::max('appraisal_id');
            $lastAppScoreID=Appraisalscore::max('appraisal_id');
            $lastUploadedFileID=Uploadedfile::max('appraisal_id');
            
            $lastInstitutionID=Institution::max('appraisal_id');
            $lastJuniorqualifID=Juniorqualification::max('appraisal_id');
            $lastPostqualiexpID=Postqualiexperience::max('appraisal_id');
            $lastAdhocperfdutyID=Adhocperfduty::max('appraisal_id');
    
            $qualifications=Qualification::where('appraisal_id',$lastqualID)->where('user_id',$staff_id)->get();
            $profmemberships=Profmembership::where('appraisal_id',$lastprofID)->where('user_id',$staff_id)->get();
            $promotions=Promotion::where('appraisal_id',$lastpromoID)->where('user_id',$staff_id)->get();
            $salaryscales=Salaryscale::where('appraisal_id',$lastsalscaleID)->where('user_id',$staff_id)->get();
            $trainings=Training::where('appraisal_id',$lastTrainingID)->where('user_id',$staff_id)->get();
            $additionalqualifs=Additionalqualif::where('appraisal_id',$lastAddiQualID)->where('user_id',$staff_id)->get();
            $performedduties=Performedduty::where('appraisal_id',$lastPerfdutyID)->where('user_id',$staff_id)->get();
            $publications=Publication::where('appraisal_id',$lastPublicaID)->where('user_id',$staff_id)->get();
            $productions=Production::where('appraisal_id',$lastProdID)->where('user_id',$staff_id)->get();
            $adminrespons=Adminresponsibility::where('appraisal_id',$lastAdminResID)->where('user_id',$staff_id)->get();
            $anyotherinfos=Anyotherinfo::where('appraisal_id',$lastAnyInfoID)->where('user_id',$staff_id)->get();
            $uploadedfiles=Uploadedfile::where('appraisal_id',$lastUploadedFileID)->where('user_id',$staff_id)->get();
            
            $institutions=Institution::where('appraisal_id',$lastInstitutionID)->where('user_id',$staff_id)->get();
            $juniorqualifs=Juniorqualification::where('appraisal_id',$lastJuniorqualifID)->where('user_id',$staff_id)->get();
            $postqualiexps=Postqualiexperience::where('appraisal_id',$lastPostqualiexpID)->where('user_id',$staff_id)->get();
            $adhocperfduties=Adhocperfduty::where('appraisal_id',$lastAdhocperfdutyID)->where('user_id',$staff_id)->get();
                    
            return view('admin.print.juniorstaffsubmittedapp',array('user'=>Auth::user()),compact(
                'qualifications',
                'salaryscales',
                'staff',
                'profmemberships',
                'promotions',
                'trainings',
                'additionalqualifs',
                'performedduties',
                'publications',
                'productions',
                'adminrespons',
                'anyotherinfos',
                'uploadedfiles',
                'staff_id',
                'staffappraisalscore',
                'the_appraiser',
                'appraisal_id',
                'institutions',
                'juniorqualifs',
                'postqualiexps',
                'adhocperfduties',
                'appraisal'  
            ));
        }
    }
}
