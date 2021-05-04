<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Impersonate extends Controller
{
    
    public function index($id){
        if (Auth::user()->id==$id) {
            return redirect()->route('manageusers.index')->with('deleted','You are not allowed to impersonate yourself!');
        }
        $impersonatedstaff=User::where('id',$id)->first();

        if ($impersonatedstaff) {
            session()->put('impersonate',$impersonatedstaff->id);
        }

        return redirect()->route('home');
    }

    public function destroy(){
        session()->forget('impersonate');
        return redirect()->route('home');
    }
}
