<?php

namespace App\Http\Controllers;

use App\Production;
use Illuminate\Http\Request;

class ProductionController extends Controller
{
    
    public function store(Request $request){
        foreach ($request->prodtype as $key => $prodtype) {
           if(!empty(trim($request->prodtype[$key])))
           {
               $prod=new Production();
               if($request->has('achievid')){
                   if($key < count($request->achievid)){
                       $id = $request->achievid[$key];
                       $prod= Production::findOrFail($id);
                   }
               }
               
               $prod->user_id=auth()->user()->id;
               $prod->appraisal_id=$request->appraisal_id;
               $prod->prodtype=$request->prodtype[$key];
               $prod->title=$request->prodtitle[$key];
               $prod->yearofprod=$request->yearofprod[$key];
              
               $prod->save();
           }
        }

        return redirect()->back()->with('success','Production/Workshop submitted successfully!');
    }

    public function delete($appraisal_id,$user_id){

    }
}
