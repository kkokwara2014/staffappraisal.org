<?php

namespace App\Http\Controllers;

use App\Appraisalreport;
use Illuminate\Http\Request;
use App\Qualification;

use Illuminate\Support\Facades\DB;

class QualificationController extends Controller
{
    
    public function store(Request $request){

        DB::transaction(function () use($request) {
            //saving qualification
            foreach ($request->qualname as $key => $qualname) {
                if(!empty(trim($request->qualname[$key]))){
                    $qualif=new Qualification;
                    if($request->has('qualid')){
                        if($key < count($request->qualid)){
                            $id = $request->qualid[$key];
                            $qualif = Qualification::findOrfail($id);
                        }
                    }
                    $qualif->user_id=auth()->user()->id;
                    $qualif->appraisal_id=$request->appraisal_id;
                    $qualif->awardinginst=$request->awardinginst[$key];
                    $qualif->dateofgrad=$request->dateofgrad[$key];
                    $qualif->qualname=$request->qualname[$key];
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

    public function delete($appraisal_id,$user_id){

    }
}
