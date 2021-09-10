<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function index(){

        return view('frontend.index');
    }

    public function downloadusermanual($filename){
        $file = public_path('usermanual/'.$filename);
        $name = basename($file);
        return response()->download($file, $name);
    }

}
