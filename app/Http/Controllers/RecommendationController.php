<?php

namespace App\Http\Controllers;

use App\Appraisalreport;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Appraisalscore;
use App\Appraisaluser;

class RecommendationController extends Controller
{
    

    public function byschoolboard(Request $request, $appraisal_id,$user_id){

        if (Auth::user()->hasAnyRole(['Admin'])||Auth::user()->hasAnyRole(['Dean'])||Auth::user()->hasAnyRole(['Rector'])) {

            $schboardrecommender=Auth::user()->title->title.' '.Auth::user()->firstname.' '.Auth::user()->lastname;
            // $recommender_email=Auth::user()->email;

            //saving appraisal recommendation by school board
            $appraisalscore=Appraisalscore::where('appraisal_id',$appraisal_id)->where('user_id',$user_id)->first();
            $appraisaluser=Appraisaluser::where('appraisal_id',$appraisal_id)->where('user_id',$user_id)->first();
            if ($appraisalscore!=null) {
                //update appraisal report with school board appraisal committee recommendation
                $appraisalscore->schboardrecomm=$request->schboardrecomm;
                $appraisalscore->isrecommbyschboard='1';
                $appraisalscore->schboardrecommender=$schboardrecommender;
                $appraisalscore->daterecommbyschboard=date('Y-m-d H:i:s');
                $appraisalscore->save();

                //update Appraisaluser record
                $appraisaluser->isscoredbyschboard='1';
                $appraisaluser->save();
            }

            return redirect()->route('staffappraisal.show',[$appraisal_id, $user_id])->with('success','School Board Appraisal Committee recommended successfully!');
            
        }else {
            return redirect()->route('access.denied');
        }
    }

    public function bymanagement(Request $request, $appraisal_id, $user_id){
        if (Auth::user()->hasAnyRole(['Admin'])||Auth::user()->hasAnyRole(['Management'])||Auth::user()->hasAnyRole(['Rector'])) {

            $managementrecommender=Auth::user()->title->title.' '.Auth::user()->firstname.' '.Auth::user()->lastname;
            // $recommender_email=Auth::user()->email;

            //saving appraisal recommendation by school board
            $appraisalscore=Appraisalscore::where('appraisal_id',$appraisal_id)->where('user_id',$user_id)->first();
            $appraisaluser=Appraisaluser::where('appraisal_id',$appraisal_id)->where('user_id',$user_id)->first();
            if ($appraisalscore!=null) {
                //update appraisal report with school board appraisal committee recommendation
                $appraisalscore->managementrecomm=$request->managementrecomm;
                $appraisalscore->isrecommbymanagement='1';
                $appraisalscore->managementrecommender=$managementrecommender;
                $appraisalscore->daterecommbymanagement=date('Y-m-d H:i:s');
                $appraisalscore->save();

                //update Appraisaluser record
                $appraisaluser->isscoredbymanagement='1';
                $appraisaluser->save();
            }

            return redirect()->route('staffappraisal.show',[$appraisal_id, $user_id])->with('success','Management Appraisal Committee recommended successfully!');
            
        }else {
            return redirect()->route('access.denied');
        }
    }

    public function byssapc(Request $request, $appraisal_id, $user_id){
        if (Auth::user()->hasAnyRole(['Admin'])||Auth::user()->hasAnyRole(['SSAP Committee'])||Auth::user()->hasAnyRole(['Rector'])) {

            $ssapcrecommender=Auth::user()->title->title.' '.Auth::user()->firstname.' '.Auth::user()->lastname;
            // $recommender_email=Auth::user()->email;

            //saving appraisal recommendation by school board
            $appraisalscore=Appraisalscore::where('appraisal_id',$appraisal_id)->where('user_id',$user_id)->first();
            $appraisaluser=Appraisaluser::where('appraisal_id',$appraisal_id)->where('user_id',$user_id)->first();
            if ($appraisalscore!=null) {
                //update appraisal report with school board appraisal committee recommendation
                $appraisalscore->ssapcrecomm=$request->ssapcrecomm;
                $appraisalscore->isrecommbyssapc='1';
                $appraisalscore->ssapcrecommender=$ssapcrecommender;
                $appraisalscore->daterecommbyssapc=date('Y-m-d H:i:s');
                $appraisalscore->save();

                //update Appraisaluser record
                $appraisaluser->isscoredbyssapc='1';
                $appraisaluser->save();
            }

            return redirect()->route('staffappraisal.show',[$appraisal_id, $user_id])->with('success','SSAP Committee recommended successfully!');
            
        }else {
            return redirect()->route('access.denied');
        }
    }

    public function bycouncil(Request $request, $appraisal_id, $user_id){
        if (Auth::user()->hasAnyRole(['Admin'])||Auth::user()->hasAnyRole(['Governing Council'])||Auth::user()->hasAnyRole(['Rector'])) {

            $councilrecommender=Auth::user()->title->title.' '.Auth::user()->firstname.' '.Auth::user()->lastname;
            // $recommender_email=Auth::user()->email;

            //saving appraisal recommendation by school board
            $appraisalscore=Appraisalscore::where('appraisal_id',$appraisal_id)->where('user_id',$user_id)->first();
            $appraisaluser=Appraisaluser::where('appraisal_id',$appraisal_id)->where('user_id',$user_id)->first();
            if ($appraisalscore!=null) {
                //update appraisal report with school board appraisal committee recommendation
                $appraisalscore->councilrecomm=$request->councilrecomm;
                $appraisalscore->isrecommbycouncil='1';
                $appraisalscore->councilrecommender=$councilrecommender;
                $appraisalscore->daterecommbycouncil=date('Y-m-d H:i:s');
                $appraisalscore->save();

                //update Appraisaluser record
                $appraisaluser->isscoredbycouncil='1';
                $appraisaluser->save();
            }

            // return redirect()->route('submitted.appraisals')->with('success','Governing Council recommended successfully!');
            return redirect()->route('staffappraisal.show',[$appraisal_id, $user_id])->with('success','Governing Council recommended successfully!');
            
        }else {
            return redirect()->route('access.denied');
        }
    }
}
