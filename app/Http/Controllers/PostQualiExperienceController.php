<?php

namespace App\Http\Controllers;

use App\Postqualiexperience;
use Illuminate\Http\Request;

class PostQualiExperienceController extends Controller
{
    

    public function store(Request $request){
        foreach ($request->postheld as $key => $pheld) {
            if(!empty(trim($request->postheld[$key]))){
                $postqualiexp=new Postqualiexperience;
                if($request->has('postexid')){
                    if($key < count($request->postexid)){
                        $id = $request->postexid[$key];
                        $postqualiexp = Postqualiexperience::findOrfail($id);
                    }
                }
                $postqualiexp->user_id=auth()->user()->id;
                $postqualiexp->appraisal_id=$request->appraisal_id;
                $postqualiexp->postheld=$request->postheld[$key];
                $postqualiexp->employer=$request->employer[$key];
                $postqualiexp->startdate=$request->startdate[$key];
                $postqualiexp->enddate=$request->enddate[$key];
                $postqualiexp->save();
            }
        }

        return redirect()->back()->with('success','Post Qualification Experience submitted successfully!');

    }
}
