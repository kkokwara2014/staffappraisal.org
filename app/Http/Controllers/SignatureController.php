<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Image;

class SignatureController extends Controller
{
    
    public function staffsignature(Request $request){

        $this->validate($request,[
            'usersignature' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        $staffid=Auth::user()->id;

        if ($request->hasFile('usersignature')) {
            $usersignature = $request->file('usersignature');
            $filename = auth()->user()->staffnumb.'_'.time() . '.' . $usersignature->getClientOriginalExtension();
            Image::make($usersignature)->save(public_path('signatures/' . $filename));
        

            $staff=User::find($staffid);

            if ($staff->signature!='') {
                //deleting uploaded staff signature
                File::delete([public_path('signatures/' . $staff->signature)]);
                //save the most recent uploaded signature 
                $staff->signature = $filename;
                $staff->save();
            }else{
                //save the uploaded signature for the first time 
                $staff->signature = $filename;
                $staff->save();
            }

            return redirect()->route('home')->with('success','Signature uploaded successfully!'); 
        }

    }
}
