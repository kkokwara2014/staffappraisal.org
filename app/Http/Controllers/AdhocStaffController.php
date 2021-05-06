<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdhocStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adhocstaffs=User::whereHas(
            'roles',function($q){
                $q->where('name','Adhoc Staff');
            }
        )->latest()->get();

        return view('admin.adhocstaffs.index',array('user'=>Auth::user()),compact('adhocstaffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.adhocstaffs.create',array('user'=>Auth::user()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff=User::find($id);

        // $staff_id=$request->segments(3);

        $staff_id=$id;
        $creatorExists=User::where('creator_id','=',$id)->count();

        // $staffappraisals=Appraisaluser::where('user_id',$staff->id)->first();
        return view('admin.adhocstaffs.show',array('user'=>Auth::user()),compact('staff','staff_id','creatorExists'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adhocstaff=User::find($id);

        return view('admin.adhocstaffs.edit',array('user'=>Auth::user()),compact('adhocstaff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //adding new staff
        $adhocstaff=User::find($id);
        $adhocstaff->lastname=$request->lastname;
        $adhocstaff->middlename=$request->middlename;
        $adhocstaff->firstname=$request->firstname;
        $adhocstaff->staffnumb=$request->staffnumb;
        $adhocstaff->email=$request->email;
        $adhocstaff->phone=$request->phone;
        $adhocstaff->creator_id=auth()->user()->id;
        $adhocstaff->save();

        return redirect()->route('adhocstaffs.index')->with('success','Adhoc Staff details updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adhocstaff=User::find($id);
        $adhocstaff->delete();

        return redirect()->back()->with('deleted','Adhoc Staff deleted successfully!');
    }
}
