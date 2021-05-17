<?php

namespace App\Http\Controllers;

use App\Additionalqualif;
use Illuminate\Http\Request;

class AdditionalQualificationController extends Controller
{
    

    public function store(Request $request){
        //saving staff additional qualification to the database
        foreach ($request->qualificationtype as $key => $quali) {      
            $addqualif=new Additionalqualif();
            $addqualif->user_id=auth()->user()->id;
            $addqualif->appraisal_id=$request->appraisal_id;
            $addqualif->qualificationtype=$request->qualificationtype[$key];
            $addqualif->dateobtained=$request->dateobtained[$key];
            
            $addqualif->save();
        }

        return redirect()->back()->with('success','Additional Qualification submitted successfully!');
    }
}
