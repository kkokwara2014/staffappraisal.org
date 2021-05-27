<?php

namespace App\Http\Controllers;

use App\Coursetaught;
use Illuminate\Http\Request;

class CourseTaughtController extends Controller
{
    
    public function store(Request $request){
        //saving courses taught by staff to the database
        foreach ($request->taughtcoursecode as $key => $tc) {
                    
            $taughtcourse=new Coursetaught();
            $taughtcourse->user_id=auth()->user()->id;
            $taughtcourse->appraisal_id=$request->appraisal_id;
            $taughtcourse->coursecode=$request->taughtcoursecode[$key];
            $taughtcourse->coursetitle=$request->taughtcoursetitle[$key];
            $taughtcourse->credithour=$request->taughtcredithour[$key];
            $taughtcourse->semester=$request->taughtsemester[$key];
            $taughtcourse->courseyear=$request->taughtyear[$key];
            
            $taughtcourse->save();
        }

        return redirect()->back()->with('success','Courses Taught submitted successfully!');

    }

    public function delete($appraisal_id,$user_id){

    }
}
