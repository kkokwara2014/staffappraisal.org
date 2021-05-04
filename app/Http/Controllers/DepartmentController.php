<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Requests\DepartmentStoreRequest;
use App\Http\Requests\DepartmentUpdateRequest;
use App\School;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
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
        $schools=School::where('id','>','1')->orderBy('name','asc')->get();
        $departments=Department::where('id','>','1')->latest()->get();
        return view('admin.department.index',array('user'=>Auth::user()), compact('schools','departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools=School::where('id','>','1')->orderBy('name','asc')->get();
        return view('admin.department.create',array('user'=>Auth::user()), compact('schools'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentStoreRequest $request)
    {

        $dept=Department::create([
            'name'=>$request->name,
            'code'=>$request->code,
            'school_id'=>$request->school_id,
        ]);

        return redirect()->route('departments.index')->with('success', $dept->name.' Department added successfully!');
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
        $schools=School::where('id','>','1')->orderBy('name','asc')->get();
        $dept=Department::where('id',$id)->first();
        return view('admin.department.edit',array('user'=>Auth::user()), compact('dept','schools'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentUpdateRequest $request, $id)
    {
        $department=Department::find($id);
        $department->name=$request->name;
        $department->code=$request->code;
        $department->school_id=$request->school_id;
        $department->save();
        
        return redirect()->route('departments.index')->with('success','Department update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department=Department::find($id);
        $department->delete();

        return back()->with('deleted','Department deleted!');
    }
}
