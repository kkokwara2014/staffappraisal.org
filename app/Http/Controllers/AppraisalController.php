<?php

namespace App\Http\Controllers;

use App\Additionalqualif;
use App\Adminresponsibility;
use App\Anyotherinfo;
use App\Appraisal;
use App\Appraisalscore;
use App\Appraisaluser;
use App\Coursetaught;
use App\Http\Requests\AppraisalStoreRequest;
use App\Performedduty;
use App\Profmembership;
use App\Promotion;
use App\Publication;
use App\Qualification;
use App\Role;
use App\Salaryscale;
use App\Teachingloadsummary;
use App\Training;
use App\User;
use App\Uploadedfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Str;

class AppraisalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appraisals=Appraisal::where('ispublished','0')->latest()->get();
        return view('admin.appraisal.index',array('user'=>Auth::user()),compact('appraisals'));
    }
    public function published()
    {
        $appraisals=Appraisal::where('ispublished','1')->latest()->get();
        return view('admin.appraisal.published',array('user'=>Auth::user()),compact('appraisals'));
    }

    public function appraisalform($id){

        $appraisal_id= $id;
        $appraisers=User::whereHas(
            'roles',function($q){
                $q->where('name','HOD')
                ->orWhere('name','Dean')
                ->orWhere('name','Director')
                ->orWhere('name','Rector');
            }
        )->get();

        if (Auth::user()->category_id==2) {
            return view('admin.appraisal.academicform',array('user'=>Auth::user()),compact('appraisal_id','appraisers'));
        } elseif (Auth::user()->category_id==3) {
            return view('admin.appraisal.nonacademicform',array('user'=>Auth::user()),compact('appraisal_id','appraisers'));
        } elseif(Auth::user()->category_id==4) {
            return view('admin.appraisal.juniorstaffform',array('user'=>Auth::user()),compact('appraisal_id','appraisers'));
        }

        
    }

    

    public function storeAcadAppraisal(Request $request){

        $inputs=$request->all();


        return $inputs;

        $qualifilenames=$request->file('qualifilename');

        if ($request->hasFile('qualifilename')) {

            foreach ($qualifilenames as $fileq) {
                $fileq=$request->file('qualifilename');
                $files=$fileq->getClientOriginalName();
                $filename=time().'_'.$files;
                $fileq->storeAs('public/qualifications',$filename);

                Qualification::create([
                    'awardinginst'=>$inputs['awardinginst'],
                    'dateofgrad'=>$inputs['dateofgrad'],
                    'qualname'=>$inputs['qualname'],
                    'appraisal_id'=>$inputs['appraisal_id'],
                    'user_id'=>$inputs['user_id'],
                    'qualifilename'=>$filename,
                ]);
            }
        }

        // return redirect()->route('acad.aparaisal.success');                
    }


    public function acadsuccess(){
        return view('admin.appraisal.acadsuccess',array('user'=>Auth::user()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->hasAnyRole(['Admin','Registrar'])) {
            return view('admin.appraisal.create',array('user'=>Auth::user()));
        } else {
            return redirect()->route('access.denied');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppraisalStoreRequest $request)
    {
        
        $appraisal=Appraisal::create([
            'title'=>$request->title,
            'slug'=>Str::slug($request->title),
            'starting'=>$request->starting,
            'ending'=>$request->ending,
            'user_id'=>Auth::user()->id,
        ]);

        return redirect()->route('appraisals.index')->with('success',$appraisal->title.' created successfully 😊');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appraisal=Appraisal::find($id);
        $appraisal->delete();

        return back()->with('deleted',$appraisal->title.' deleted successfully! 😦');
    }

    

    public function publish($id){
        $appraisal=Appraisal::find($id);

        $appraisal->ispublished='1';
        $appraisal->save();

        return back();
    }
    

    public function unpublish($id){
        $appraisal=Appraisal::find($id);

        $appraisal->ispublished='0';
        $appraisal->save();

        return back();
    }

    public function allsubmittedappraisals(){
        $submittedappraisals=Appraisaluser::latest()->get();

        return view('admin.staff.submittedappraisals',array('user'=>Auth::user()),compact('submittedappraisals'));
    }

    public function deletesubmittedappraisal($id){
        //deleting submitted appraisals
        $submittedappraisal=Appraisaluser::find($id);
        
        $quali=Qualification::find($submittedappraisal->appraisal_id);
        $quali->delete();

        $profmemb=Profmembership::find($submittedappraisal->appraisal_id);
        $profmemb->delete();

        $promo=Promotion::find($submittedappraisal->appraisal_id);
        $promo->delete();

        $salscal=Salaryscale::find($submittedappraisal->appraisal_id);
        $salscal->delete();

        $tran=Training::find($submittedappraisal->appraisal_id);
        $tran->delete();

        $aditqual=Additionalqualif::find($submittedappraisal->appraisal_id);
        $aditqual->delete();

        $perfduty=Performedduty::find($submittedappraisal->appraisal_id);
        $perfduty->delete();

        $publica=Publication::find($submittedappraisal->appraisal_id);
        $publica->delete();

        $adminres=Adminresponsibility::find($submittedappraisal->appraisal_id);
        $adminres->delete();

        $cotaught=Coursetaught::find($submittedappraisal->appraisal_id);
        $cotaught->delete();

        $teachload=Teachingloadsummary::find($submittedappraisal->appraisal_id);
        $teachload->delete();

        $anyotherinfo=Anyotherinfo::find($submittedappraisal->appraisal_id);
        $anyotherinfo->delete();

        $apprascore=Appraisalscore::find($submittedappraisal->appraisal_id);
        $apprascore->delete();


        $submittedappraisal->delete();

        //deleting uploaded appraisal documents
        $uploadedfile=Uploadedfile::find($id);
        $uploadedfile->delete();

        //deleting manifesto files from folder
        File::delete([public_path('storage/staff_appraisal_documents/' . $uploadedfile->filename)]);

        return redirect()->back()->with('deleted','Appraisal deleted successfully!');
    }
}
