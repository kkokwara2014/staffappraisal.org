<?php

namespace App\Http\Controllers;

use App\Profmembership;
use Illuminate\Http\Request;

class ProfessionalMembershipController extends Controller
{
    
    public function store(Request $request){

        foreach ($request->profbody as $key => $profbody) {
            if(!empty($request->profbody[$key])){
                $profmemb=new Profmembership;
                
                if($request->has('profbodyid')){
                    if($key < count($request->profbodyid)){
                        $id = $request->profbodyid[$key];
                        $profmemb = Profmembership::findOrFail($id);
                    }
                }
                $profmemb->user_id=auth()->user()->id;
                $profmemb->appraisal_id=$request->appraisal_id;
                $profmemb->profbody=$request->profbody[$key];
                $profmemb->membcategory=$request->membcategory[$key];
                $profmemb->membnumb=$request->membnumb[$key];
                $profmemb->awardyear=$request->awardyear[$key];
                $profmemb->save();
            }
        }

        return redirect()->back()->with('success','Professional Membership submitted successfully!');
    }

    public function delete($appraisal_id,$user_id){

    }
}
