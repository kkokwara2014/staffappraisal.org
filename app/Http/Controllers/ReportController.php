<?php

namespace App\Http\Controllers;

use App\Appraisal;
use App\Appraisalreport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    

    public function allreports(){

        $allreports=Appraisalreport::latest()->get();
        return view('admin.appraisal.reports.allreports',array('user'=>Auth::user()),compact('allreports'));
    }

    public function printreport($reportid){
        $report=Appraisalreport::where('id',$reportid)->first();
        return view('admin.appraisal.reports.printreport',array('user'=>Auth::user()),compact('report'));
    }

    public function getappraisalyear(){

        $appraisalyears=[];
        for ($year=1900; $year <= 2050 ; $year++)  
            $appraisalyears[$year]=$year;
        
        return view('admin.appraisal.reports.getappraisalyear',array('user'=>Auth::user()),compact('appraisalyears'));
    }

    public function getyearlyappraisalreport(Request $request){
        $this->validate($request,[
            'appraisalyear'=>'required'
        ]);

        $appyear=$request->appraisalyear;


        $appraisal=Appraisal::where('appraisalyear',$appyear)->where('ispublished','1')->first();

        if ($appraisal['appraisalyear']==$appyear) {
            $appraisalreports=Appraisalreport::where('appraisal_id',$appraisal->id)->orderBy('id','asc')->get();
            
            return view('admin.appraisal.reports.printallreports',array('user'=>Auth::user()),compact('appraisalreports','appyear'));
        } else {

            $errormsg='The selected Appraisal year ('. $appyear .') does not match our records';
            return redirect()->back()->with('deleted',$errormsg);
        }
        
    }

    public function generalreport($reportyear){
        $appraisal=Appraisal::where('appraisalyear',$reportyear)->where('ispublished','1')->first();

        $appraisalreports=Appraisalreport::where('appraisal_id',$appraisal->id)->orderBy('id','asc')->get();

        return view('admin.appraisal.reports.generalreport',array('user'=>Auth::user()),compact('appraisalreports','appraisal'));


    }
}
