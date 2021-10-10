<?php

namespace App\Http\Controllers;

use App\Department;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MySchoolController extends Controller
{
    
    public function myschool(){
        if(auth()->user()->hasAnyRole(['Admin']) || auth()->user()->hasAnyRole(['Dean']) || auth()->user()->hasAnyRole(['Director']) || auth()->user()->hasAnyRole(['Registrar'])){
            $userschool=User::where('id', auth()->user()->id)->first();
            return view('admin.school.myschool',array('user'=>Auth::user()),compact('userschool'));
        }else{
            return redirect()->route('access.denied');
        }
    }

    public function myschooldepartment($id){
        if(auth()->user()->hasAnyRole(['Admin']) ||auth()->user()->hasAnyRole(['Dean']) || auth()->user()->hasAnyRole(['Director']) || auth()->user()->hasAnyRole(['Registrar'])){
        $myschooldepartments=Department::where('school_id', $id)->orderBy('name','asc')->get();
        $myschooldepartmentcount=Department::where('school_id', $id)->count();

        return view('admin.school.myschooldepartment',array('user'=>Auth::user()),compact('myschooldepartments','myschooldepartmentcount'));
        }else{
            return redirect()->route('access.denied');
        }
    }
    public function myschoolstaff($id){
        if(auth()->user()->hasAnyRole(['Admin']) ||auth()->user()->hasAnyRole(['Dean']) || auth()->user()->hasAnyRole(['Director']) || auth()->user()->hasAnyRole(['Registrar'])){
        $myschooldepartmentstaffs=User::where('department_id', $id)->orderBy('lastname','asc')->get();
        $myschooldepartmentstaffscount=User::where('department_id', $id)->count();

        return view('admin.school.myschoolstaff',array('user'=>Auth::user()),compact('myschooldepartmentstaffs','myschooldepartmentstaffscount'));
        }else{
            return redirect()->route('access.denied');
        }
    }
}
