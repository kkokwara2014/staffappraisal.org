<?php

namespace App\Http\Controllers;

use App\Institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    

    public function store(Request $request){
        foreach ($request->institutionname as $key => $institutname) {
            if(!empty(trim($request->institutionname[$key]))){
                $qualif=new Institution;
                if($request->has('instuteid')){
                    if($key < count($request->instuteid)){
                        $id = $request->instuteid[$key];
                        $qualif = Institution::findOrfail($id);
                    }
                }
                $qualif->user_id=auth()->user()->id;
                $qualif->appraisal_id=$request->appraisal_id;
                $qualif->institutionname=$request->institutionname[$key];
                $qualif->startdate=$request->startdate[$key];
                $qualif->enddate=$request->enddate[$key];
                $qualif->save();
            }
        }

        return redirect()->back()->with('success','Institution Attended submitted successfully!');
    }
}
