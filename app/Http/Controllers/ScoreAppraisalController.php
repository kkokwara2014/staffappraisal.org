<?php

namespace App\Http\Controllers;

use App\Appraisalscore;
use App\Mail\AppraisalScoreAcceptedMail;
use App\Mail\AppraisalScoreMail;
use App\Mail\NotifyAppraiserMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ScoreAppraisalController extends Controller
{


    public function store(Request $request){
        
        if (Auth::user()->hasAnyRole(['Admin','HOD','Dean'])) {

            $this->validate($request,[
                'qualificationscore'=>'required',
                'abilityscore'=>'required',
                'servicelengthscore'=>'required',
                'freecomment'=>'required|string',
                'recommendation'=>'required',
            ]);

        $appraisedby=Auth::user()->title->title.' '.Auth::user()->firstname.' '.Auth::user()->lastname;
        $appraiser_email=Auth::user()->email;

        $apprascore=new Appraisalscore;
        $apprascore->publicationscore=$request->publicationscore;
        $apprascore->productionscore=$request->productionscore;
        $apprascore->adminresponscore=$request->adminresponscore;
        $apprascore->qualificationscore=$request->qualificationscore;
        $apprascore->abilityscore=$request->abilityscore;
        $apprascore->servicelengthscore=$request->servicelengthscore;
        $apprascore->totalscore=$request->totalscore;
        $apprascore->freecomment=$request->freecomment;
        $apprascore->recommendation=$request->recommendation;
        $apprascore->appraisal_id=$request->appraisal_id;
        $apprascore->user_id=$request->user_id;
        $apprascore->appraisedby=$appraisedby;
        $apprascore->appraiseremail=$appraiser_email;
        
        $apprascore->isscored='1';

        $apprascore->save();


       //notify staff that his/her appraisal has been scored
       $appraisedstaff=User::find($apprascore->user_id);
    // Mail::to($appraisedstaff->email)->send(new AppraisalScoreMail($apprascore,$appraisedstaff));

       return redirect()->route('staffappraisal.show',[$apprascore->appraisal_id,$apprascore->user_id])->with('success','Appraisal Score for '. $appraisedstaff->firstname.' '.$appraisedstaff->lastname .' submitted successfully!');

    } else {
        return redirect()->route('access.denied');
    }
    }

    public function acceptorrejectcomment(Request $request,$appraisal_id,$user_id){

        $acceptofrejectcomment=Appraisalscore::where('appraisal_id',$appraisal_id)->where('user_id',$user_id)->first();
        $acceptofrejectcomment->acceptorrejectcomment=$request->acceptorrejectreason;
        $acceptofrejectcomment->staffcommented='1';
        $acceptofrejectcomment->save();

        //notify the Appraised staff
        $appraisedstaff=User::find($acceptofrejectcomment->user_id);
        
        // Mail::to($appraisedstaff->email)->send(new AppraisalScoreAcceptedMail($acceptofrejectcomment,$appraisedstaff));

        //notify Appraiser
        // $appraiser=User::find($acceptofrejectcomment->appraiseremail);
        // Mail::to($acceptofrejectcomment->appraiseremail)->send(new NotifyAppraiserMail($acceptofrejectcomment,$appraisedstaff));

        return redirect()->route('staffappraisal.show',[$acceptofrejectcomment->appraisal_id,$acceptofrejectcomment->user_id])->with('success','Dear '.$appraisedstaff->firstname.' '.$appraisedstaff->lastname.', thank you for commenting on you appraisal score!');
    }


}
