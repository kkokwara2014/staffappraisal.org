<?php

namespace App\Http\Controllers;

use App\Appraisaluser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScoredAppraisalController extends Controller
{
    

    public function scoredbyhod(){
        $hodscoredappraisals=Appraisaluser::where('isscoredbyhod','1')->latest()->get();
        return view('admin.scoredappraisals.hodscoredappraisals',array('user'=>Auth::user()),compact('hodscoredappraisals'));
    }
    public function scoredbydean(){
        $deanscoredappraisals=Appraisaluser::where('isscoredbyschboard','1')->latest()->get();
        return view('admin.scoredappraisals.deanscoredappraisals',array('user'=>Auth::user()),compact('deanscoredappraisals'));
    }
    public function scoredbymanagement(){
        $mgtscoredappraisals=Appraisaluser::where('isscoredbymanagement','1')->latest()->get();
        return view('admin.scoredappraisals.mgtscoredappraisals',array('user'=>Auth::user()),compact('mgtscoredappraisals'));
    }
    public function scoredbyssapc(){
        $ssapcscoredappraisals=Appraisaluser::where('isscoredbyssapc','1')->latest()->get();
        return view('admin.scoredappraisals.ssapcscoredappraisals',array('user'=>Auth::user()),compact('ssapcscoredappraisals'));
    }
    public function scoredbycouncil(){
        $councilscoredappraisals=Appraisaluser::where('isscoredbycouncil','1')->latest()->get();
        return view('admin.scoredappraisals.councilscoredappraisals',array('user'=>Auth::user()),compact('councilscoredappraisals'));
    }

    public function allscoredappraisals(){
        $allscoredappraisals=Appraisaluser::where('isscoredbyhod','1')->where('isscoredbyschboard','1')->where('isscoredbymanagement','1')->where('isscoredbyssapc','1')->where('isscoredbycouncil','1')->latest()->get();
        return view('admin.scoredappraisals.allscoredappraisals',array('user'=>Auth::user()),compact('allscoredappraisals'));
    }
}
