<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolStoreRequest;
use App\School;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class SchoolController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools=School::where('id','>','1')->orderBy('id','desc')->get();
        return view('admin.school.index',array('user'=>Auth::user()),compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.school.create',array('user'=>Auth::user()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SchoolStoreRequest $request)
    {
        $school=School::create([
            'name'=>$request->name,
            'code'=>$request->code,
        ]);

        return redirect()->route('schools.index')->with('success', $school->name.' Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sch=School::where('id',$id)->first();
        return view('admin.school.edit',array('user'=>Auth::user()),compact('sch'));
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
         $school=School::find($id);
         $school->name=$request->name;
         $school->code=$request->code;
         $school->save();

        return redirect()->route('schools.index')->with('success', $school->name.' updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $school=School::find($id);
        $school->delete();

        return back()->with('deleted','School deleted!');
    }
}
