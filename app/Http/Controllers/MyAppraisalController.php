<?php

namespace App\Http\Controllers;

use App\Additionalqualif;
use App\Adminresponsibility;
use App\Anyotherinfo;
use App\Appraisal;
use App\Coursetaught;
use App\Performedduty;
use App\Production;
use App\Profmembership;
use App\Promotion;
use App\Publication;
use App\Qualification;
use App\Salaryscale;
use App\Teachingloadsummary;
use App\Training;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyAppraisalController extends Controller
{
    

    public function index(){
        $myappraisals=Appraisal::where('ispublished','1')->latest()->simplePaginate(5);

        return view('admin.appraisal.myappraisals',array('user'=>Auth::user()),compact('myappraisals'));

    }

    public function show($id){
        //last order details
        // $lastID=Qualification::max('appraisal_id');
        // $orderreceipts=Orderdetail::where('customer_id',$lastID)->get();

        $appraisal=Appraisal::find($id);
        
        $qualifications=Qualification::where('appraisal_id',$id)->get();
        $profmemberships=Profmembership::where('appraisal_id',$id)->get();
        $promotions=Promotion::where('appraisal_id',$id)->get();
        $salaryscales=Salaryscale::where('appraisal_id',$id)->get();
        $trainings=Training::where('appraisal_id',$id)->get();
        $additionalqualifs=Additionalqualif::where('appraisal_id',$id)->get();
        $performedduties=Performedduty::where('appraisal_id',$id)->get();
        $publications=Publication::where('appraisal_id',$id)->get();
        $productions=Production::where('appraisal_id',$id)->get();
        $adminrespons=Adminresponsibility::where('appraisal_id',$id)->get();
        $taughtcourses=Coursetaught::where('appraisal_id',$id)->get();
        $teachingloadsummaries=Teachingloadsummary::where('appraisal_id',$id)->get();
        $anyotherinfos=Anyotherinfo::where('appraisal_id',$id)->get();

        $staffs=User::where('profileupdated','1')->get();
        
        return view('admin.appraisal.showmyappraisaldetails',array('user'=>Auth::user()),compact('qualifications','salaryscales','staffs','profmemberships','promotions','trainings','additionalqualifs','performedduties','publications','productions','adminrespons','taughtcourses','teachingloadsummaries','anyotherinfos'));
    }
}
