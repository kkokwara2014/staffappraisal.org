<?php

namespace App\Http\Controllers;

use App\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    
    public function store(Request $request){
        //saving staff training to the database
        foreach ($request->trainingtype as $key => $traintyp) {
            $training=new Training();
            $training->user_id=auth()->user()->id;
            $training->appraisal_id=$request->appraisal_id;
            $training->trainingtype=$request->trainingtype[$key];
            $training->caption=$request->caption[$key];
            $training->trainingdate=$request->trainingdate[$key];
            $training->save();
        }

        return redirect()->back()->with('success','Training submitted successfully!');
    }
}
