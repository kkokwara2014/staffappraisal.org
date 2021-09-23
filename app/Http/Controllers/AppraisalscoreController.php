<?php

namespace App\Http\Controllers;

use App\Appraisalscore;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppraisalscoreController extends Controller
{

    public function getscoreform($appraisalid,$staffid){

        $stafftobeappraised=User::where('id',$staffid)->first();
        $appraisalscore=Appraisalscore::where('appraisal_id',$appraisalid)->where('user_id',$staffid)->first();
        
        if($appraisalscore!=NULL && (Auth::user()->hasAnyRole(['HOD']) || Auth::user()->hasAnyRole(['Dean']) || Auth::user()->hasAnyRole(['Admin']))){
            $appraisal_id=$appraisalid;
            $staff_id=$staffid;

            $staff=User::find($staff_id);

            return redirect()->route('staffappraisal.show',[$appraisalscore->appraisal_id,$appraisalscore->user_id])->with('success','This Staff has already been scored! Kindly proceed to scoring other Staff under you. Thank you.');

        }elseif ($appraisalscore==NULL && (Auth::user()->hasAnyRole(['HOD']) || Auth::user()->hasAnyRole(['Dean']) || Auth::user()->hasAnyRole(['Admin']))) {
            
            if ($stafftobeappraised->category_id==2) {
                $appraisal_id=$appraisalid;
                $staff_id=$staffid;

                $staff=User::find($staff_id);

                return view('admin.staff.scoreform',array('user'=>Auth::user()),compact('appraisal_id','staff_id','staff'));
            
            } elseif ($stafftobeappraised->category_id==3) {
                $appraisal_id=$appraisalid;
                $staff_id=$staffid;

                $staff=User::find($staff_id);

                return view('admin.staff.nonacademicscoreform',array('user'=>Auth::user()),compact('appraisal_id','staff_id','staff'));
            
            } elseif($stafftobeappraised->category_id==4) {
                
                $appraisal_id=$appraisalid;
                $staff_id=$staffid;

                $staff=User::find($staff_id);

                return view('admin.staff.juniorstaffscoreform',array('user'=>Auth::user()),compact('appraisal_id','staff_id','staff'));
            }

        } else {
            return redirect()->route('access.denied');
        }
    }

    public function getacademicscoreform($appraisalid,$staffid){
        $stafftobeappraised=User::where('id',$staffid)->first();
        $appraisalscore=Appraisalscore::where('appraisal_id',$appraisalid)->where('user_id',$staffid)->first();
        
        if($appraisalscore!=NULL && (Auth::user()->hasAnyRole(['HOD']) || Auth::user()->hasAnyRole(['Dean']) || Auth::user()->hasAnyRole(['Admin']))){
            $appraisal_id=$appraisalid;
            $staff_id=$staffid;

            $staff=User::find($staff_id);

            return redirect()->route('staffappraisal.show',[$appraisalscore->appraisal_id,$appraisalscore->user_id])->with('success','This Staff has already been scored! Kindly proceed to scoring other Staff under you. Thank you.');

        }

        if ($appraisalscore==NULL && (Auth::user()->hasAnyRole(['HOD']) || Auth::user()->hasAnyRole(['Dean']) || Auth::user()->hasAnyRole(['Admin']))) {
            
            if ($stafftobeappraised->category_id==2) {
                $appraisal_id=$appraisalid;
                $staff_id=$staffid;

                $staff=User::find($staff_id);

                return view('admin.staff.scoreform',array('user'=>Auth::user()),compact('appraisal_id','staff_id','staff'));
            } 

        } else {
            return redirect()->route('access.denied');
        }


    }

    public function getnonacademicscoreform($appraisalid,$staffid){

        $stafftobeappraised=User::where('id',$staffid)->first();
        $appraisalscore=Appraisalscore::where('appraisal_id',$appraisalid)->where('user_id',$staffid)->first();
        
        if($appraisalscore!=NULL && (Auth::user()->hasAnyRole(['HOD']) || Auth::user()->hasAnyRole(['Dean']) || Auth::user()->hasAnyRole(['Admin']))){
            $appraisal_id=$appraisalid;
            $staff_id=$staffid;

            $staff=User::find($staff_id);

            return redirect()->route('staffappraisal.show',[$appraisalscore->appraisal_id,$appraisalscore->user_id])->with('success','This Staff has already been scored! Kindly proceed to scoring other Staff under you. Thank you.');
        }

        if ($appraisalscore==NULL && (Auth::user()->hasAnyRole(['HOD']) || Auth::user()->hasAnyRole(['Dean']) || Auth::user()->hasAnyRole(['Admin']))) {
            
            if ($stafftobeappraised->category_id==3) {
                $appraisal_id=$appraisalid;
                $staff_id=$staffid;

                $staff=User::find($staff_id);

                return view('admin.staff.nonacademicscoreform',array('user'=>Auth::user()),compact('appraisal_id','staff_id','staff'));
            
            } 

        } else {
            return redirect()->route('access.denied');
        }
    }

    public function juniorstaffscoreform($appraisalid,$staffid){
        $stafftobeappraised=User::where('id',$staffid)->first();
        $appraisalscore=Appraisalscore::where('appraisal_id',$appraisalid)->where('user_id',$staffid)->first();
        
        if($appraisalscore!=NULL && (Auth::user()->hasAnyRole(['HOD']) || Auth::user()->hasAnyRole(['Dean']) || Auth::user()->hasAnyRole(['Admin']))){
            $appraisal_id=$appraisalid;
            $staff_id=$staffid;

            $staff=User::find($staff_id);

            return redirect()->route('staffappraisal.show',[$appraisalscore->appraisal_id,$appraisalscore->user_id])->with('success','This Staff has already been scored! Kindly proceed to scoring other Staff under you. Thank you.');
        }

        if ($appraisalscore==NULL && (Auth::user()->hasAnyRole(['HOD']) || Auth::user()->hasAnyRole(['Dean']) || Auth::user()->hasAnyRole(['Admin']))) {
            
            if($stafftobeappraised->category_id==4) {
                $appraisal_id=$appraisalid;
                $staff_id=$staffid;

                $staff=User::find($staff_id);

                return view('admin.staff.juniorstaffscoreform',array('user'=>Auth::user()),compact('appraisal_id','staff_id','staff'));
            }

        } else {
            return redirect()->route('access.denied');
        }


    }

        
}
