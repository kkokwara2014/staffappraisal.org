<?php

namespace App\Http\Controllers;

use App\Appraisalreport;
use Illuminate\Http\Request;
use App\Salaryscale;
use Illuminate\Support\Facades\DB;

class SalaryscaleController extends Controller
{
    
    public function store(Request $request){

        
        DB::transaction(function () use($request){
            if(!empty(trim($request->presentpost))){
                $salscale=new Salaryscale;
                if($request->has('salaryid')){
                    $salscale= Salaryscale::findOrFail($request->salaryid);
                }
                $salscale->user_id=auth()->user()->id;
                $salscale->appraisal_id=$request->appraisal_id;
                $salscale->presentpost=$request->presentpost;
                $salscale->salaryscale=$request->salaryscale;
                $salscale->save();
            }

            //saving appraisal report
            $appreport=Appraisalreport::where('appraisal_id',$salscale->appraisal_id)->where('user_id',$salscale->user_id)->first();
            if ($appreport!=null) {
                //update appraisal report with qualification
                $appreport->salaryscale_id=$salscale->id;
                $appreport->save();
            } else {
                //create new appraisal report
                $appraisal_report=new Appraisalreport;
                $appraisal_report->appraisal_id=$request->appraisal_id;
                $appraisal_report->user_id=$request->user_id;
                $appraisal_report->salaryscale_id=$salscale->id;
                $appraisal_report->save();
            }
            
        });
        

        return redirect()->back()->with('success','Salary Scale submitted successfully!');
    }

    public function delete($appraisal_id,$user_id){

    }
}
