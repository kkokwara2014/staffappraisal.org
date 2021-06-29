<?php

namespace App\Http\Controllers;

use App\Anyotherinfo;
use Illuminate\Http\Request;

class AnyOtherInfoController extends Controller
{
    

    public function store(Request $request){

        $otherinfo=new Anyotherinfo();

        if($request->has('otherinfoid')){
            $id = $request->otherinfoid;
            $otherinfo= Anyotherinfo::findOrFail($id);
        }
        $otherinfo->user_id=auth()->user()->id;
        $otherinfo->appraisal_id=$request->appraisal_id;
        $otherinfo->anyotherinfo=$request->anyotherinfo;
        $otherinfo->save();

        return redirect()->back()->with('success','Any other information submitted successfully!');
    }

    public function delete($appraisal_id,$user_id){

    }
}
