<?php

namespace App\Http\Controllers;

use App\Appraisalreport;
use App\Appraisalscore;
use App\Appraisaluser;
use App\Mail\AppraisalScoreAcceptedMail;
use App\Mail\AppraisalScoreMail;
use App\Mail\NotifyAppraiserMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ScoreAppraisalController extends Controller
{

    public function store(Request $request){

        $stafftobeappraised=User::where('id',$request->user_id)->first();
        
        if ((Auth::user()->hasAnyRole(['HOD']) || Auth::user()->hasAnyRole(['Dean']) || Auth::user()->hasAnyRole(['Admin']) || Auth::user()->hasAnyRole(['Rector']))) {

            if ($stafftobeappraised->category_id==2) {
                //for academic staff
                $this->validate($request, [
                    'qualificationscore'=>'required|integer|between:1,10',
                    'abilityscore'=>'required|integer|between:1,15',
                    'servicelengthscore'=>'required|integer|between:1,20',
                    'freecomment'=>'required|string',
                    'recommendation'=>'required',
                ]);
    
                $appraisedby=Auth::user()->title->title.' '.Auth::user()->firstname.' '.Auth::user()->lastname;
                $appraiser_email=Auth::user()->email;
    
                
                DB::transaction(function () use ($request, $appraisedby, $appraiser_email) {
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
                    $apprascore->isrecommbyhod='1';
                    $apprascore->save();
                    
                    //saving appraisal report
                    $appreport=Appraisalreport::where('appraisal_id', $apprascore->appraisal_id)->where('user_id', $apprascore->user_id)->first();
                    $appraisaluser=Appraisaluser::where('appraisal_id',$apprascore->appraisal_id)->where('user_id',$apprascore->user_id)->first();
                    if ($appreport!=null) {
                        //update appraisal report with qualification
                        $appreport->appraisalscore_id=$apprascore->id;
                        $appreport->save();

                        //update Appraisaluser record
                        $appraisaluser->isscoredbyhod='1';
                        $appraisaluser->save();
                    } else {
                        //create new appraisal report
                        $appraisal_report=new Appraisalreport;
                        $appraisal_report->appraisal_id=$request->appraisal_id;
                        $appraisal_report->user_id=$request->user_id;
                        $appraisal_report->appraisalscore_id=$apprascore->id;
                        $appraisal_report->save();

                        //update Appraisaluser record
                        $appraisaluser->isscoredbyhod='1';
                        $appraisaluser->save();
                    }
                    
                    //notify staff that his/her appraisal has been scored
                    $appraisedstaff=User::find($apprascore->user_id);
                    // Mail::to($appraisedstaff->email)->send(new AppraisalScoreMail($apprascore,$appraisedstaff));
                    
                    // return redirect()->route('staffappraisal.show',[$apprascore->appraisal_id,$apprascore->user_id])->with('success','Appraisal Score for '. $appraisedstaff->firstname.' '.$appraisedstaff->lastname .' submitted successfully!');
                });
                return redirect()->route('submitted.appraisals')->with('success', 'A Staff has been scored successfully!');
            
            }

        } else {
            return redirect()->route('access.denied');
        }
    }


    public function storenonacademicscore(Request $request){

        $stafftobeappraised=User::where('id',$request->user_id)->first();
        
        if ((Auth::user()->hasAnyRole(['HOD']) || Auth::user()->hasAnyRole(['Dean']) || Auth::user()->hasAnyRole(['Admin']) || Auth::user()->hasAnyRole(['Rector']))) {
            if ($stafftobeappraised->category_id==3) {
                //for non academic staff
                $this->validate($request,[
                    'qualificationscore'=>'required|integer|between:1,10',
                    'servicelengthscore'=>'required|integer|between:1,10',
                    'freecomment'=>'required|string',
                    'recommendation'=>'required',
                ]);
    
                $appraisedby=Auth::user()->title->title.' '.Auth::user()->firstname.' '.Auth::user()->lastname;
                $appraiser_email=Auth::user()->email;

                DB::transaction(function () use($request, $appraisedby, $appraiser_email) {                    
                    $apprascore=new Appraisalscore;
                    $apprascore->publicationscore=$request->publicationscore;
                    $apprascore->adminresponscore=$request->adminresponscore;
                    $apprascore->qualificationscore=$request->qualificationscore;
                    $apprascore->servicelengthscore=$request->servicelengthscore;
                    $apprascore->totalscore=$request->totalscore;
                    $apprascore->freecomment=$request->freecomment;
                    $apprascore->recommendation=$request->recommendation;
                    $apprascore->appraisal_id=$request->appraisal_id;
                    $apprascore->user_id=$request->user_id;
                    $apprascore->appraisedby=$appraisedby;
                    $apprascore->appraiseremail=$appraiser_email;
                
                    $apprascore->productivityscore=$request->productivityscore;
                    $apprascore->initiativescore=$request->initiativescore;
                    $apprascore->acceptanceofrespscore=$request->acceptanceofrespscore;
                    $apprascore->judgementscore=$request->judgementscore;
                    $apprascore->staffmgtscore=$request->staffmgtscore;
                    $apprascore->communicationscore=$request->communicationscore;
                    $apprascore->relationshipscore=$request->relationshipscore;
                    $apprascore->reliabilityscore=$request->reliabilityscore;
                    $apprascore->determinationscore=$request->determinationscore;
                    $apprascore->thoroughnessscore=$request->thoroughnessscore;
                    $apprascore->publicrelationscore=$request->publicrelationscore;
                    $apprascore->punctualityscore=$request->punctualityscore;
                
                    $apprascore->isscored='1';
                    $apprascore->isrecommbyhod='1';
                    $apprascore->save();

                    //saving appraisal report
                    $appreport=Appraisalreport::where('appraisal_id',$apprascore->appraisal_id)->where('user_id',$apprascore->user_id)->first();
                    $appraisaluser=Appraisaluser::where('appraisal_id',$apprascore->appraisal_id)->where('user_id',$apprascore->user_id)->first();
            if ($appreport!=null) {
                //update appraisal report with qualification
                $appreport->appraisalscore_id=$apprascore->id;
                $appreport->save();

                //update Appraisaluser record
                $appraisaluser->isscoredbyhod='1';
                $appraisaluser->save();
            } else {
                //create new appraisal report
                $appraisal_report=new Appraisalreport;
                $appraisal_report->appraisal_id=$request->appraisal_id;
                $appraisal_report->user_id=$request->user_id;
                $appraisal_report->appraisalscore_id=$apprascore->id;
                $appraisal_report->save();

                //update Appraisaluser record
                $appraisaluser->isscoredbyhod='1';
                $appraisaluser->save();
            }
                
                //notify staff that his/her appraisal has been scored
                $appraisedstaff=User::find($apprascore->user_id);
                // Mail::to($appraisedstaff->email)->send(new AppraisalScoreMail($apprascore,$appraisedstaff));
                
                // return redirect()->route('staffappraisal.show',[$apprascore->appraisal_id,$apprascore->user_id])->with('success','Appraisal Score for '. $appraisedstaff->firstname.' '.$appraisedstaff->lastname .' submitted successfully!');
            });
            
            return redirect()->route('submitted.appraisals')->with('success','A Staff has been scored successfully!');

            } 
        
        } else {
            return redirect()->route('access.denied');
        }
    }

    public function storejuniorstaffscore(Request $request){

        $stafftobeappraised=User::where('id',$request->user_id)->first();
        
        if ((Auth::user()->hasAnyRole(['HOD']) || Auth::user()->hasAnyRole(['Dean']) || Auth::user()->hasAnyRole(['Admin']) || Auth::user()->hasAnyRole(['Rector']))) {

           if($stafftobeappraised->category_id==4) {
                //for junior staff
                $this->validate($request,[
                    'freecomment'=>'required|string',
                    'recommendation'=>'required',
                ]);

                // return $request->all();
    
                $appraisedby=Auth::user()->title->title.' '.Auth::user()->firstname.' '.Auth::user()->lastname;
                $appraiser_email=Auth::user()->email;
    
                
                DB::transaction(function () use($request, $appraisedby, $appraiser_email){

                    $apprascore=new Appraisalscore;
                    $apprascore->regularityscore=$request->regularityscore;
                    $apprascore->punctualityscore=$request->punctualityscore;
                    $apprascore->foresightscore=$request->foresightscore;
                    $apprascore->judgementscore=$request->judgementscore;
                    $apprascore->initiativescore=$request->initiativescore;
                    $apprascore->relationshipscore=$request->relationshipscore;
                    $apprascore->publicrelationscore=$request->publicrelationscore;
                    $apprascore->acceptanceofrespscore=$request->acceptanceofrespscore;
                    $apprascore->reliabilityscore=$request->reliabilityscore;
                    $apprascore->applicationtodutyscore=$request->applicationtodutyscore;
                    $apprascore->outputofworkscore=$request->outputofworkscore;
                    $apprascore->qualityofworkscore=$request->qualityofworkscore;
                    $apprascore->warningletterscore=$request->warningletterscore;
                    $apprascore->offdutyonhealthscore=$request->offdutyonhealthscore;
                    $apprascore->numberofcommendationscore=$request->numberofcommendationscore;
                    $apprascore->trainingpotentialscore=$request->trainingpotentialscore;
                    // $apprascore->servicelengthscore=$request->servicelengthscore;
                    $apprascore->totalscore=$request->juniorstafftotalscore + ($request->warningletterscore + $request->offdutyonhealthscore + $request->numberofcommendationscore);
                    $apprascore->freecomment=$request->freecomment;
                    $apprascore->recommendation=$request->recommendation;
                    $apprascore->appraisal_id=$request->appraisal_id;
                    $apprascore->user_id=$request->user_id;
                    $apprascore->appraisedby=$appraisedby;
                    $apprascore->appraiseremail=$appraiser_email;
                    
                    $apprascore->isscored='1';
                    $apprascore->isrecommbyhod='1';
                    $apprascore->save();

                    //saving appraisal report
            $appreport=Appraisalreport::where('appraisal_id',$apprascore->appraisal_id)->where('user_id',$apprascore->user_id)->first();
            $appraisaluser=Appraisaluser::where('appraisal_id',$apprascore->appraisal_id)->where('user_id',$apprascore->user_id)->first();
            if ($appreport!=null) {
                //update appraisal report with qualification
                $appreport->appraisalscore_id=$apprascore->id;
                $appreport->save();

                //update Appraisaluser record
                $appraisaluser->isscoredbyhod='1';
                $appraisaluser->save();
            } else {
                //create new appraisal report
                $appraisal_report=new Appraisalreport;
                $appraisal_report->appraisal_id=$request->appraisal_id;
                $appraisal_report->user_id=$request->user_id;
                $appraisal_report->appraisalscore_id=$apprascore->id;
                $appraisal_report->save();

                //update Appraisaluser record
                $appraisaluser->isscoredbyhod='1';
                $appraisaluser->save();
            }     
                    //notify staff that his/her appraisal has been scored
                    $appraisedstaff=User::find($apprascore->user_id);
                    // Mail::to($appraisedstaff->email)->send(new AppraisalScoreMail($apprascore,$appraisedstaff));
                });
                
                // return redirect()->route('staffappraisal.show',[$apprascore->appraisal_id,$apprascore->user_id])->with('success','Appraisal Score for '. $appraisedstaff->firstname.' '.$appraisedstaff->lastname .' submitted successfully!');
                return redirect()->route('submitted.appraisals')->with('success','A Staff has been scored successfully!');
            }
        

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
