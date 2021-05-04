<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Login;


class LoginAuditController extends Controller
{
    
    public function index(){

        $logins=Login::latest()->get();
        return view('admin.audits.index',array('user'=>Auth::user()),compact('logins'));
    }
}
