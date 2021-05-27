<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Qualification;

class QualificationController extends Controller
{
    
    public function store(Request $request){

        foreach ($request->qualname as $key => $qualname) {
            $qualif=new Qualification;
            $qualif->user_id=auth()->user()->id;
            $qualif->appraisal_id=$request->appraisal_id;
            $qualif->awardinginst=$request->awardinginst[$key];
            $qualif->dateofgrad=$request->dateofgrad[$key];
            $qualif->qualname=$request->qualname[$key];
            $qualif->save();
        }

        return redirect()->back()->with('success','Qualification submitted successfully!');
    }

    public function delete($appraisal_id,$user_id){

    }
}
