<?php

namespace App\Http\Controllers;

use App\Appraisalreport;
use App\Profmembership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfessionalMembershipController extends Controller
{
    
    public function store(Request $request){
        
        DB::transaction(function () use($request) {
            foreach ($request->profbody as $key => $profbody) {
                if(!empty($request->profbody[$key])){
                    $profmemb=new Profmembership;
                    
                    if($request->has('profbodyid')){
                        if($key < count($request->profbodyid)){
                            $id = $request->profbodyid[$key];
                            $profmemb = Profmembership::findOrFail($id);
                        }
                    }
                    $profmemb->user_id=auth()->user()->id;
                    $profmemb->appraisal_id=$request->appraisal_id;
                    $profmemb->profbody=$request->profbody[$key];
                    $profmemb->membcategory=$request->membcategory[$key];
                    $profmemb->membnumb=$request->membnumb[$key];
                    $profmemb->awardyear=$request->awardyear[$key];
                    $profmemb->save();
                }
            }

            //saving appraisal report
            $appreport=Appraisalreport::where('appraisal_id',$profmemb->appraisal_id)->where('user_id',$profmemb->user_id)->first();
            if ($appreport!=null) {
                //update appraisal report with qualification
                $appreport->profmembership_id=$profmemb->id;
                $appreport->save();
            } else {
                //create new appraisal report
                $appraisal_report=new Appraisalreport;
                $appraisal_report->appraisal_id=$request->appraisal_id;
                $appraisal_report->user_id=$request->user_id;
                $appraisal_report->profmembership_id=$profmemb->id;
                $appraisal_report->save();
            }
            
        });
        
        return redirect()->back()->with('success','Professional Membership submitted successfully!');
    }

    public function delete($appraisal_id,$user_id){

    }
}
