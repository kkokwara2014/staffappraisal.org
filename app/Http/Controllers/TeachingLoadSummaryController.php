<?php

namespace App\Http\Controllers;

use App\Teachingloadsummary;
use Illuminate\Http\Request;

class TeachingLoadSummaryController extends Controller
{
    

    public function store(Request $request){
        //saving teaching load submmary by staff to the database
        foreach ($request->teachingloadsemester as $key => $tload) {
            
            if(!empty(trim($request->teachingloadsemester[$key]))){
                $teachload=new Teachingloadsummary();
                if($request->has('teachid')){
                    if($key < count($request->teachid)){
                        $id = $request->teachid[$key];
                        $teachload= Teachingloadsummary::findOrFail($id);
                    }
                }
                $teachload->user_id=auth()->user()->id;
                $teachload->appraisal_id=$request->appraisal_id;
                $teachload->semester=$request->teachingloadsemester[$key];
                $teachload->courseyear=$request->teachingloadyear[$key];
                $teachload->credithour=$request->teachingloadcredithour[$key];
                $teachload->normalload=$request->teachingnormalload[$key];
                $teachload->excessload=$request->teachingexcessload[$key];
                
                $teachload->save();
            }
        }

        return redirect()->back()->with('success','Teaching Laod summary submitted successfully!');

    }

    public function delete($appraisal_id,$user_id){

    }
}
