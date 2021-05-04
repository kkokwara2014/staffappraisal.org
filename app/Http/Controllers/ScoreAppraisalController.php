<?php

namespace App\Http\Controllers;

use App\Appraisalscore;
use Illuminate\Http\Request;

class ScoreAppraisalController extends Controller
{


    public function store(Request $request){

        if (Auth::user()->hasAnyRole(['Admin','HOD','Dean'])) {
        
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
        
        $apprascore->isscored='1';

        $apprascore->save();


       //notify staff that his/her appraisal has been scored

       return redirect()->route('staffsbydept')->with('success','Appraisal Score for submitted successfully!');

    } else {
        return redirect()->route('access.denied');
    }
    }


}
