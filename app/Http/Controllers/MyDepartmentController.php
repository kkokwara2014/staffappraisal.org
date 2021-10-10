<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyDepartmentController extends Controller
{
    

    public function mydepartment(){
        if(auth()->user()->hasAnyRole(['Admin']) ||auth()->user()->hasAnyRole(['HOD'])){
            $userdepartment=User::where('id', auth()->user()->id)->first();
            return view('admin.department.mydepartment',array('user'=>Auth::user()),compact('userdepartment'));
        }else{
            return redirect()->route('access.denied');
        }
    }
    public function mydepartmentalstaff($id){
        if(auth()->user()->hasAnyRole(['Admin']) ||auth()->user()->hasAnyRole(['HOD'])){
            $mydepartmentalstaffs=User::where('department_id', $id)->orderBy('lastname','asc')->get();
            return view('admin.department.mydepartmentalstaff',array('user'=>Auth::user()),compact('mydepartmentalstaffs'));
        }else{
            return redirect()->route('access.denied');
        }
    }
}
