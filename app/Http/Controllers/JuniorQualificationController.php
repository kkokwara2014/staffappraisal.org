<?php

namespace App\Http\Controllers;

use App\Appraisalreport;
use App\Juniorqualification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JuniorQualificationController extends Controller
{
    

    public function store(Request $request){

        
        DB::transaction(function () use($request) {
            foreach ($request->qualification as $key => $qualifica) {
                if(!empty(trim($request->qualification[$key]))){
                    $qualif=new Juniorqualification;
                    if($request->has('qtypeid')){
                        if($key < count($request->qtypeid)){
                            $id = $request->qtypeid[$key];
                            $qualif = Juniorqualification::findOrfail($id);
                        }
                    }
                    $qualif->user_id=auth()->user()->id;
                    $qualif->appraisal_id=$request->appraisal_id;
                    $qualif->qualification=$request->qualification[$key];
                    $qualif->dateobtained=$request->dateobtained[$key];
                    $qualif->specialization=$request->specialization[$key];
                    $qualif->save();
                }
            }

            //saving appraisal report
            $appreport=Appraisalreport::where('appraisal_id',$qualif->appraisal_id)->where('user_id',$qualif->user_id)->first();
            if ($appreport!=null) {
                //update appraisal report with qualification
                $appreport->qualification_id=$qualif->id;
                $appreport->save();
            } else {
                //create new appraisal report
                $appraisal_report=new Appraisalreport;
                $appraisal_report->appraisal_id=$request->appraisal_id;
                $appraisal_report->user_id=$request->user_id;
                $appraisal_report->qualification_id=$qualif->id;
                $appraisal_report->save();
            }
            
        });
        

        return redirect()->back()->with('success','Qualification submitted successfully!');

    }
}
