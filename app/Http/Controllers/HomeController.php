<?php

namespace App\Http\Controllers;

use App\Category;
use App\School;
use App\Title;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Department;
use App\Lga;
use App\Maritalstatus;
use App\Rank;
use App\State;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {        
        // return view('dashboard.home');
        $titles=Title::where('id','>','1')->orderBy('title','asc')->get();
        $schools=School::where('id','>','1')->orderBy('name','asc')->get();
        $states=State::where('id','<','38')->orderBy('name','asc')->get();
        $maritalstatuses=Maritalstatus::where('id','>','1')->orderBy('id','asc')->get();
        $staffcategories=Category::where('id','>','1')->orderBy('name','asc')->get();
        $ranks=Rank::where('id','>','1')->orderBy('id','asc')->get();

        $creatorExists=User::where('creator_id','=',Auth::user()->id)->count();
        
        return view('admin.index',array('user'=>Auth::user()),compact('titles','schools','states','maritalstatuses','staffcategories','ranks','creatorExists'));
    }

    public function myformAjax($id)
    {
        $departments=Department::where('school_id',$id)->orderBy('name','asc')->get();

        return response()->json($departments);
    }

    public function myformAjax3($id)
    {
        $lgas=Lga::where('state_id',$id)->orderBy('name','asc')->get();

        return response()->json($lgas);
    }


    public function editprofile($id){

        $staff=User::find($id);
        return view('admin.profile.edit',array('user'=>Auth::user()),compact('staff'));
    }

    public function updateprofile(Request $request, $id){

        $staff=User::find($id);
        $staff->lastname=$request->lastname;

        $staff->save();


    }

   
    
}
