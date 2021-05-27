<?php

namespace App\Http\Controllers;

use App\Appraisalscore;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppraisalscoreController extends Controller
{

    public function getscoreform($appraisalid,$staffid){
        $appraisalscore=Appraisalscore::where('appraisal_id',$appraisalid)->where('user_id',$staffid)->first();
        
        if($appraisalscore!=NULL && Auth::user()->hasAnyRole(['Admin','HOD','Dean'])){
            $appraisal_id=$appraisalid;
            $staff_id=$staffid;

            $staff=User::find($staff_id);

            // return view('admin.staff.scoreform',array('user'=>Auth::user()),compact('appraisal_id','staff_id','staff'))->with('success','This Staff has been scored!');
            return redirect()->route('staffappraisal.show',[$appraisalscore->appraisal_id,$appraisalscore->user_id])->with('success','This Staff has already been scored! Kindly proceed to scoring other Staff under you. Thank you.');

        }elseif ($appraisalscore==NULL && Auth::user()->hasAnyRole(['Admin','HOD','Dean'])) {
            $appraisal_id=$appraisalid;
            $staff_id=$staffid;

            $staff=User::find($staff_id);

            return view('admin.staff.scoreform',array('user'=>Auth::user()),compact('appraisal_id','staff_id','staff'));
        } else {
            return redirect()->route('access.denied');
        }
    }

    public function scoreform(Request $request,$staff_id){

        

        if (Auth::user()->hasAnyRole(['Admin','HOD','Dean'])) {
            $staff_id=$request->user_id;
            $appraisal_id=$request->appraisal_id;

            $staff=User::find($staff_id);

            return view('admin.staff.scoreform',array('user'=>Auth::user()),compact('staff','staff_id','appraisal_id'));
        } else {
            return redirect()->route('access.denied');
        }
        
    }

    
    
}
