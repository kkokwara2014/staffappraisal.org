<?php

namespace App\Http\Controllers;

use App\Appraisalreport;
use App\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromotionController extends Controller
{
    
    public function store(Request $request){

        
        DB::transaction(function () use($request){
            
            foreach ($request->promodate as $key => $promodate) {
                if(!empty(trim($request->promodate[$key]))){
                    $promot=new Promotion();
                    if($request->has('promoid')){
                        if($key < count($request->promoid)){
                            $id = $request->promoid[$key];
                            $promot= Promotion::findOrFail($id);
                        }
                    }
                    $promot->user_id=auth()->user()->id;
                    $promot->appraisal_id=$request->appraisal_id;
                    $promot->promodate=$request->promodate[$key];
                    $promot->grade=$request->grade[$key];
                    $promot->save();
                }
            }

            //saving appraisal report
            $appreport=Appraisalreport::where('appraisal_id',$promot->appraisal_id)->where('user_id',$promot->user_id)->first();
            if ($appreport!=null) {
                //update appraisal report with qualification
                $appreport->promotion_id=$promot->id;
                $appreport->save();
            } else {
                //create new appraisal report
                $appraisal_report=new Appraisalreport;
                $appraisal_report->appraisal_id=$request->appraisal_id;
                $appraisal_report->user_id=$request->user_id;
                $appraisal_report->promotion_id=$promot->id;
                $appraisal_report->save();
            }
            
        });

        return redirect()->back()->with('success','Promotion submitted successfully!');
    }

    public function delete($appraisal_id,$user_id){

    }
}
