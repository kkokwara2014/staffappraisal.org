<?php

namespace App\Http\Controllers;

use App\Additionalqualif;
use App\Appraisalreport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdditionalQualificationController extends Controller
{
    

    public function store(Request $request){

        
        DB::transaction(function () use($request) {
            
            //saving staff additional qualification to the database
            foreach ($request->qualificationtype as $key => $quali) {    
                if(!empty(trim($request->qualificationtype[$key]))){
                    $addqualif=new Additionalqualif();
                    if($request->has('qtypeid')){
                        if($key < count($request->qtypeid)){
                            $id = $request->qtypeid[$key];
                            $addqualif = Additionalqualif::findOrFail($id);
                        }
                    }
                    $addqualif->user_id=auth()->user()->id;
                    $addqualif->appraisal_id=$request->appraisal_id;
                    $addqualif->qualificationtype=$request->qualificationtype[$key];
                    $addqualif->dateobtained=$request->dateobtained[$key];
                    
                    $addqualif->save();
                }  
            }
    
            //saving appraisal report
            $appreport=Appraisalreport::where('appraisal_id',$addqualif->appraisal_id)->where('user_id',$addqualif->user_id)->first();
            if ($appreport!=null) {
                //update appraisal report with additional qualification
                $appreport->additionalqualif_id=$addqualif->id;
                $appreport->save();
            } else {
                //create new appraisal report
                $appraisal_report=new Appraisalreport;
                $appraisal_report->appraisal_id=$request->appraisal_id;
                $appraisal_report->user_id=$request->user_id;
                $appraisal_report->additionalqualif_id=$addqualif->id;
                $appraisal_report->save();
            }
        });
        

        return redirect()->back()->with('success','Additional Qualification submitted successfully!');
    }
}
