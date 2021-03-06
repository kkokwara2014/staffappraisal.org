<?php

namespace App\Http\Controllers;

use App\Performedduty;
use Illuminate\Http\Request;

class PerformedDutiesController extends Controller
{
    

    public function store(Request $request){
        //saving staff duties performed to the database
        $perfduty=new Performedduty();
        if($request->has('dutyid')){
            $perfduty= Performedduty::findOrFail($request->dutyid);
        }
        $perfduty->user_id=auth()->user()->id;
        $perfduty->appraisal_id=$request->appraisal_id;
        $perfduty->performedduty=$request->performedduty;
        $perfduty->save();

        return redirect()->back()->with('success','Duties performed submitted successfully!');
    }

    public function delete($appraisal_id,$user_id){

    }
}
