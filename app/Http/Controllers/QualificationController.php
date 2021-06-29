<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Qualification;

class QualificationController extends Controller
{
    
    public function store(Request $request){

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

        return redirect()->back()->with('success','Qualification submitted successfully!');
    }

    public function delete($appraisal_id,$user_id){

    }
}
