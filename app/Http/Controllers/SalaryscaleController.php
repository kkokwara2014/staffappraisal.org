<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Salaryscale;

class SalaryscaleController extends Controller
{
    
    public function store(Request $request){

        $salscale=new Salaryscale;
        $salscale->user_id=auth()->user()->id;
        $salscale->appraisal_id=$request->appraisal_id;
        $salscale->presentpost=$request->presentpost;
        $salscale->salaryscale=$request->salaryscale;
        $salscale->save();

        return redirect()->back()->with('success','Salary Scale submitted successfully!');
    }
}
