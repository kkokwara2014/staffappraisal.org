<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppraisalscoreController extends Controller
{

    public function scoreform(Request $request,$staff_id){

        if (Auth::user()->hasAnyRole(['Admin','HOD','Dean'])) {
            $staff_id=$request->user_id;
            $appraisal_id=$request->appraisal_id;

            $staff=User::find($staff_id);

            return view('admin.staff.scoreform',array('user'=>Auth::user()),compact('staff','staff_id','appraisal_id'));
        } else {
            return redirect()->route('access.denied');
        }
        
    }

    
    
}
