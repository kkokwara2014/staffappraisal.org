<?php

namespace App\Http\Controllers;

use App\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    
    public function store(Request $request){

        foreach ($request->promodate as $key => $promodate) {
            if(!empty(trim($request->promodate[$key]))){
                $promot=new Promotion();
                if($request->has('promoid')){
                    if($key < count($request->promoid)){
                        $id = $request->promoid[$key];
                        $promot= Promotion::findOrFail($id);
                    }
                }
                $promot->user_id=auth()->user()->id;
                $promot->appraisal_id=$request->appraisal_id;
                $promot->promodate=$request->promodate[$key];
                $promot->grade=$request->grade[$key];
                $promot->save();
            }
        }

        return redirect()->back()->with('success','Promotion submitted successfully!');
    }

    public function delete($appraisal_id,$user_id){

    }
}
