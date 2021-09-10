<?php

namespace App\Http\Controllers;

use App\Adhocperfduty;
use Illuminate\Http\Request;

class AdhocPerfDutyController extends Controller
{
    

    public function store(Request $request){
        //saving staff adhoc duties performed to the database
        $perfduty=new Adhocperfduty();
        if($request->has('adhocdutyid')){
            $perfduty= Adhocperfduty::findOrFail($request->adhocdutyid);
        }
        $perfduty->user_id=auth()->user()->id;
        $perfduty->appraisal_id=$request->appraisal_id;
        $perfduty->adhocperformedduty=$request->adhocperfduty;
        $perfduty->save();

        return redirect()->back()->with('success','Adhoc Duties performed submitted successfully!');
    }
}
