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
use App\Production;
use App\Profmembership;
use App\Promotion;
use App\Publication;
use App\Qualification;
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
        $appraisal=Appraisal::where('id',$id)->where('ispublished','1')->first();
        
        $appraisers=User::whereHas(
            'roles',function($q){
                $q->where('name','HOD')
                ->orWhere('name','Dean')
                ->orWhere('name','Director')
                ->orWhere('name','Rector');
            }
        )->get();

        $qualifications=Qualification::where('appraisal_id',$id)->where('user_id',auth()->user()->id)->count();
        $profmembs=Profmembership::where('appraisal_id',$id)->where('user_id',auth()->user()->id)->count();
        $promotions=Promotion::where('appraisal_id',$id)->where('user_id',auth()->user()->id)->count();
        $salaryscales=Salaryscale::where('appraisal_id',$id)->where('user_id',auth()->user()->id)->count();
        $trainings=Training::where('appraisal_id',$id)->where('user_id',auth()->user()->id)->count();
        $additionalquals=Additionalqualif::where('appraisal_id',$id)->where('user_id',auth()->user()->id)->count();
        $performedduties=Performedduty::where('appraisal_id',$id)->where('user_id',auth()->user()->id)->count();
        $publications=Publication::where('appraisal_id',$id)->where('user_id',auth()->user()->id)->count();
        $productions=Production::where('appraisal_id',$id)->where('user_id',auth()->user()->id)->count();
        $adminrespons=Adminresponsibility::where('appraisal_id',$id)->where('user_id',auth()->user()->id)->count();
        $taughtcourses=Coursetaught::where('appraisal_id',$id)->where('user_id',auth()->user()->id)->count();
        $tloadsummaries=Teachingloadsummary::where('appraisal_id',$id)->where('user_id',auth()->user()->id)->count();
        $anyotherinfos=Anyotherinfo::where('appraisal_id',$id)->where('user_id',auth()->user()->id)->count();
        $uploadedfiles=UploadedFile::where('appraisal_id',$id)->where('user_id',auth()->user()->id)->count();

        if (Auth::user()->category_id==2) {
            return view('admin.appraisal.academicform',array('user'=>Auth::user()),compact('appraisal_id','appraisers','appraisal','qualifications','profmembs','promotions','salaryscales','trainings','additionalquals','performedduties','publications','productions','adminrespons','taughtcourses','tloadsummaries','anyotherinfos','uploadedfiles'));
        } elseif (Auth::user()->category_id==3) {
            return view('admin.appraisal.nonacademicform',array('user'=>Auth::user()),compact('appraisal_id','appraisers','appraisal','qualifications','profmembs','promotions','salaryscales','trainings','additionalquals','performedduties','publications','productions','adminrespons','taughtcourses','tloadsummaries','anyotherinfos','uploadedfiles'));
        } elseif(Auth::user()->category_id==4) {
            return view('admin.appraisal.juniorstaffform',array('user'=>Auth::user()),compact('appraisal_id','appraisers','appraisal','qualifications','profmembs','promotions','salaryscales','trainings','additionalquals','performedduties','publications','productions','adminrespons','taughtcourses','tloadsummaries','anyotherinfos','uploadedfiles'));
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

    // public function deletesubmittedappraisal($id){
    public function deletesubmittedappraisal($appraisal_id,$user_id){
        //deleting submitted appraisals
        $appraisaluser=Appraisaluser::where('appraisal_id',$appraisal_id)->where('user_id',$user_id)->first();
        $appraisaluser->delete();
        
        
        $qualifs=Qualification::where('appraisal_id',$appraisal_id)->where('user_id',$user_id)->get();
        if(count($qualifs)>0){
            foreach($qualifs as $qualif){
                    $qualif->delete();
            }
        }

        $profmembs=Profmembership::where('appraisal_id',$appraisal_id)->where('user_id',$user_id)->get();
        if(count($profmembs)>0){
            foreach($profmembs as $profmemb){
                $profmemb->delete();
            }
        }

        $promos=Promotion::where('appraisal_id',$appraisal_id)->where('user_id',$user_id)->get();
        if(count($promos)>0){
            foreach($promos as $promo){
                $promo->delete();
            }
        }

        $salscale=Salaryscale::where('appraisal_id',$appraisal_id)->where('user_id',$user_id)->first();
        $salscale->delete();
        
        

        $trainings=Training::where('appraisal_id',$appraisal_id)->where('user_id',$user_id)->get();
        if(count($trainings)>0){
            foreach($trainings as $training){
                $training->delete();
            }
        }

        $aditqualifs=Additionalqualif::where('appraisal_id',$appraisal_id)->where('user_id',$user_id)->get();
        if(count($aditqualifs)>0){
            foreach($aditqualifs as $aditqualif){
                $aditqualif->delete();
            }
        }

        $perfduty=Performedduty::where('appraisal_id',$appraisal_id)->where('user_id',$user_id)->first();
        $perfduty->delete();
       
        

        $publications=Publication::where('appraisal_id',$appraisal_id)->where('user_id',$user_id)->get();
        if(count($publications)>0){
            foreach($publications as $publication){
                $publication->delete();
            }
        }

        $adminrespons=Adminresponsibility::where('appraisal_id',$appraisal_id)->where('user_id',$user_id)->get();
        if(count($adminrespons)>0){
            foreach($adminrespons as $adminrespon){
                $adminrespon->delete();
            }
        }

        $cotaughts=Coursetaught::where('appraisal_id',$appraisal_id)->where('user_id',$user_id)->get();
        if(count($cotaughts)>0){
            foreach($cotaughts as $cotaught){
                $cotaught->delete();
            }
        }

        $teachloads=Teachingloadsummary::where('appraisal_id',$appraisal_id)->where('user_id',$user_id)->get();
        if(count($teachloads)>0){
            foreach($teachloads as $teachload){
                    $teachload->delete();
            }
        }

        $anyotherinfo=Anyotherinfo::where('appraisal_id',$appraisal_id)->where('user_id',$user_id)->first();
        $anyotherinfo->delete();

        

        $apprascore=Appraisalscore::where('appraisal_id',$appraisal_id)->where('user_id',$user_id)->first();            
        $apprascore->delete();
        
        


        //deleting uploaded appraisal documents
        $uploadedfiles=where('appraisal_id',$appraisal_id)->where('user_id',$user_id)->get();
        if(count($uploadedfiles)>0){
            foreach($uploadedfiles as $uploadedfile){
                $uploadedfile->delete();
                //deleting manifesto files from folder
                // File::delete([public_path('storage/staff_appraisal_documents/' . $uploadedfile->filename)]);
            }
        }


        return redirect()->back()->with('deleted','Staff Appraisal deleted successfully!');
    }
}
