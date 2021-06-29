<?php

namespace App\Http\Controllers;

use App\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    

    public function store(Request $request){
        
        foreach ($request->pubtype as $key => $pubtype) {
            if(!empty(trim($request->pubtype[$key]))){
                $publica=new Publication();
                if($request->has('pubid')){
                    if($key < count($request->pubid)){
                        $id = $request->pubid[$key];
                        $publica= Publication::findOrFail($id);
                    }
                }

                $publica->user_id=auth()->user()->id;
                $publica->appraisal_id=$request->appraisal_id;
                $publica->pubtype=$request->pubtype[$key];
                $publica->title=$request->title[$key];
                $publica->yearofpub=$request->yearofpub[$key];
    
                $publica->save();
            }
        }

        return redirect()->back()->with('success','Publication submitted successfully!');
    }

    public function delete($appraisal_id,$user_id){

    }
}
