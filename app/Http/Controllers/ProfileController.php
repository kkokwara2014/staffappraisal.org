<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileStoreRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Image;

class ProfileController extends Controller
{
    
    public function profile()
    {
        return view('admin.profile.myprofile',array('user'=>Auth::user()));
    }

    public function store(ProfileStoreRequest $request){

        if ($request->hasFile('userimage')) {
            $userimage = $request->file('userimage');
            $filename = time() . '.' . $userimage->getClientOriginalExtension();
            Image::make($userimage)->resize(300, 300)->save(public_path('user_images/' . $filename));
        

            $user=User::find(Auth::user()->id);
            $user->title_id=$request->title_id;
            $user->rank_id=$request->rank_id;
            $user->school_id=$request->school_id;
            $user->department_id=$request->department_id;
            $user->state_id=$request->state_id;
            $user->lga_id=$request->lga_id;
            $user->maritalstatus_id=$request->maritalstatus_id;
            $user->category_id=$request->category_id;
            $user->assumptiondate=$request->assumptiondate;
            $user->confirmationdate=$request->confirmationdate;
            $user->firstassumptionstatus=$request->firstassumptionstatus;
            $user->dob=$request->dob;
            $user->numofchildren=$request->numofchildren;
            $user->profileupdated = '1';
            $user->userimage = $filename;

            $user->save();
        
        }

        return redirect()->route('home')->with('success','Profile Updated successfully!');
    }
}
