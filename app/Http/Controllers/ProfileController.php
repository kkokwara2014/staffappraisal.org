<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileStoreRequest;
use App\Maritalstatus;
use App\School;
use App\State;
use App\Title;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Image;

class ProfileController extends Controller
{
    
    public function profile()
    {
        $titles=Title::where('id','>','1')->orderBy('title','asc')->get();
        $schools=School::where('id','>','1')->orderBy('name','asc')->get();
        $states=State::where('id','<','38')->orderBy('name','asc')->get();
        $maritalstatuses=Maritalstatus::where('id','>','1')->orderBy('id','asc')->get();

        $creatorExists=User::where('creator_id','=',Auth::user()->id)->count();
        if (Auth::user()->hasAnyRole(['Adhoc Staff'])) {
            return view('admin.adhocstaffs.profile',array('user'=>Auth::user()),compact('titles','schools','states','maritalstatuses','creatorExists'));
            
        } else {
            return view('admin.profile.myprofile',array('user'=>Auth::user()));
            
        }
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

    

    public function storeadhocstaff(Request $request){

        $this->validate($request,[
            'title_id'=>'required|integer',
            'state_id'=>'required|integer',
            'lga_id'=>'required|integer',
            'assumptiondate'=>'required',
            'dob'=>'required',
            'maritalstatus_id'=>'required|integer',
            'userimage' => 'required|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        if ($request->hasFile('userimage')) {
            $userimage = $request->file('userimage');
            $filename = time() . '.' . $userimage->getClientOriginalExtension();
            Image::make($userimage)->resize(300, 300)->save(public_path('user_images/' . $filename));
        

            $adhocstaff=User::find(Auth::user()->id);
            $adhocstaff->title_id=$request->title_id;
            $adhocstaff->state_id=$request->state_id;
            $adhocstaff->lga_id=$request->lga_id;
            $adhocstaff->maritalstatus_id=$request->maritalstatus_id;
            $adhocstaff->assumptiondate=$request->assumptiondate;
            $adhocstaff->dob=$request->dob;
            $adhocstaff->profileupdated = '1';
            $adhocstaff->userimage = $filename;

            $adhocstaff->save();
        
        }

        return redirect()->route('home')->with('success','Profile Updated successfully!');
    }

    public function editadhocstaffprofile($id){
        $titles=Title::where('id','>','1')->orderBy('title','asc')->get();
        $schools=School::where('id','>','1')->orderBy('name','asc')->get();
        $states=State::where('id','<','38')->orderBy('name','asc')->get();
        $maritalstatuses=Maritalstatus::where('id','>','1')->orderBy('id','asc')->get();
        
        $adhocstaff=User::find($id);

        return view('admin.adhocstaffs.edit_info',array('user'=>Auth::user()),compact('titles','schools','states','maritalstatuses','adhocstaff'));
    }

    public function updateadhocstaffprofile(Request $request,$id){

        $this->validate($request,[
            'title_id'=>'required|integer',
            'state_id'=>'required|integer',
            'lga_id'=>'required|integer',
            'assumptiondate'=>'required',
            'dob'=>'required',
            'maritalstatus_id'=>'required|integer',
        ]);

        if ($request->hasFile('userimage')) {
            $userimage = $request->file('userimage');
            $filename = time() . '.' . $userimage->getClientOriginalExtension();
            Image::make($userimage)->resize(300, 300)->save(public_path('user_images/' . $filename));
        

            $adhocstaff=User::find(Auth::user()->id);
            $adhocstaff->title_id=$request->title_id;
            $adhocstaff->state_id=$request->state_id;
            $adhocstaff->lga_id=$request->lga_id;
            $adhocstaff->maritalstatus_id=$request->maritalstatus_id;
            $adhocstaff->assumptiondate=$request->assumptiondate;
            $adhocstaff->dob=$request->dob;
            $adhocstaff->profileupdated = '1';
            $adhocstaff->userimage = $filename;

            $adhocstaff->save();
            
            return redirect()->route('home')->with('success','Profile Updated successfully!');
        }else{

            $adhocstaff=User::find($id);
            $adhocstaff->title_id=$request->title_id;
            $adhocstaff->state_id=$request->state_id;
            $adhocstaff->lga_id=$request->lga_id;
            $adhocstaff->maritalstatus_id=$request->maritalstatus_id;
            $adhocstaff->assumptiondate=$request->assumptiondate;
            $adhocstaff->dob=$request->dob;
            $adhocstaff->profileupdated = '1';
            $adhocstaff->userimage = $request->existingimage;

            $adhocstaff->save();
            
            return redirect()->route('home')->with('success','Profile Updated successfully!');
        }


    }

}
