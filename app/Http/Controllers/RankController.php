<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Rank;

class RankController extends Controller
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
        
        $ranks=Rank::where('id','>','1')->orderBy('id','desc')->get();
        return view('admin.ranks.index',array('user'=>Auth::user()),compact('ranks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|min:5|unique:ranks'
        ]);

        $rank=new Rank;
        $rank->name=$request->name;
        $rank->save();

        return redirect()->route('ranks.index')->with('success', $rank->name.' created successfully!');
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
        $rank=Rank::where('id',$id)->first();
        return view('admin.ranks.edit',array('user'=>Auth::user()),compact('rank'));
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
        $this->validate($request,[
            'name'=>'required|min:5|unique:ranks'
        ]);
        
        $rank=Rank::find($id);
        $rank->name=$request->name;
        $rank->save();

        return redirect()->route('ranks.index')->with('success', $rank->name.' edited successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rank=Rank::find($id);
        $rank->delete();

        return back()->with('deleted',$rank->name. ' deleted!');
    }
}
