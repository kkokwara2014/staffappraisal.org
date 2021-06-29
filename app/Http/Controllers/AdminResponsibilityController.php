<?php

namespace App\Http\Controllers;

use App\Adminresponsibility;
use Illuminate\Http\Request;

class AdminResponsibilityController extends Controller
{
    
    public function store(Request $request){
        //saving courses taught by staff to the database
        foreach ($request->admintype as $key => $adt) {
            $adminresp=new Adminresponsibility();
            if(!empty(trim($request->admintype[$key]))){
                if($request->has('responsibid')){
                    if($key < count($request->responsibid)){
                        $id = $request->responsibid[$key];
                        $adminresp= Adminresponsibility::findOrFail($id);
                    }
                }
                $adminresp->user_id=auth()->user()->id;
                $adminresp->appraisal_id=$request->appraisal_id;
                $adminresp->admintype=$request->admintype[$key];
                $adminresp->startingyear=$request->startingyear[$key];
                $adminresp->endingyear=$request->endingyear[$key];
                $adminresp->save();
            }
        }

        return redirect()->back()->with('success','Administrative Responsibility submitted successfully!');

    }
}
