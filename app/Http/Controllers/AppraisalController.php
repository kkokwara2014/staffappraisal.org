<?php

namespace App\Http\Controllers;

use App\Additionalqualif;
use App\Adhocperfduty;
use App\Adminresponsibility;
use App\Anyotherinfo;
use App\Appraisal;
use App\Appraisalreport;
use App\Appraisalscore;
use App\Appraisaluser;
use App\Coursetaught;
use App\Http\Requests\AppraisalStoreRequest;
use App\Institution;
use App\Juniorqualification;
use App\Performedduty;
use App\Postqualiexperience;
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
        $appraisalusers=Appraisaluser::latest()->get();
        $appraisals=Appraisal::where('ispublished','1')->latest()->get();
        
        return view('admin.appraisal.published',array('user'=>Auth::user()),compact('appraisals','appraisalusers'));
    }

    public function appraisalform($slug){

        $appraisal=Appraisal::where('slug',$slug)->where('ispublished','1')->first();
        $appraisal_id= $appraisal->id;

        if(date('Y-m-d') > $appraisal->ending){
            return redirect()->back();
        }else{
            $appraisers=User::whereHas(
                'roles',function($q){
                    $q->where('name','HOD')
                    ->orWhere('name','Dean')
                    ->orWhere('name','Director')
                    ->orWhere('name','Rector');
                }
            )->get();
    
            $qualifications=Qualification::where('appraisal_id',$appraisal->id)->where('user_id',auth()->user()->id)->count();
            $profmembs=Profmembership::where('appraisal_id',$appraisal->id)->where('user_id',auth()->user()->id)->count();
            $promotions=Promotion::where('appraisal_id',$appraisal->id)->where('user_id',auth()->user()->id)->count();
            $salaryscales=Salaryscale::where('appraisal_id',$appraisal->id)->where('user_id',auth()->user()->id)->count();
            $trainings=Training::where('appraisal_id',$appraisal->id)->where('user_id',auth()->user()->id)->count();
            $additionalquals=Additionalqualif::where('appraisal_id',$appraisal->id)->where('user_id',auth()->user()->id)->count();
            $performedduties=Performedduty::where('appraisal_id',$appraisal->id)->where('user_id',auth()->user()->id)->count();
            $publications=Publication::where('appraisal_id',$appraisal->id)->where('user_id',auth()->user()->id)->count();
            $productions=Production::where('appraisal_id',$appraisal->id)->where('user_id',auth()->user()->id)->count();
            $adminrespons=Adminresponsibility::where('appraisal_id',$appraisal->id)->where('user_id',auth()->user()->id)->count();
            $taughtcourses=Coursetaught::where('appraisal_id',$appraisal->id)->where('user_id',auth()->user()->id)->count();
            $tloadsummaries=Teachingloadsummary::where('appraisal_id',$appraisal->id)->where('user_id',auth()->user()->id)->count();
            $anyotherinfos=Anyotherinfo::where('appraisal_id',$appraisal->id)->where('user_id',auth()->user()->id)->count();
            $uploadedfiles=UploadedFile::where('appraisal_id',$appraisal->id)->where('user_id',auth()->user()->id)->count();
            $appraisalscore=Appraisalscore::where('appraisal_id',$appraisal->id)->where('user_id',auth()->user()->id)->count();
    
            $institutions=Institution::where('appraisal_id',$appraisal->id)->where('user_id',auth()->user()->id)->count();
            $juniorqualifications=Juniorqualification::where('appraisal_id',$appraisal->id)->where('user_id',auth()->user()->id)->count();
            $postqualiexperiences=Postqualiexperience::where('appraisal_id',$appraisal->id)->where('user_id',auth()->user()->id)->count();
            $adhocperfduties=Adhocperfduty::where('appraisal_id',$appraisal->id)->where('user_id',auth()->user()->id)->count();

            if (Auth::user()->category_id==2) {
                return view('admin.appraisal.academicform',array('user'=>Auth::user())
                            ,compact('appraisal_id'
                                    ,'appraisers'
                                    ,'appraisal'
                                    ,'qualifications'
                                    ,'profmembs'
                                    ,'promotions'
                                    ,'salaryscales'
                                    ,'trainings'
                                    ,'additionalquals'
                                    ,'performedduties'
                                    ,'publications'
                                    ,'productions'
                                    ,'adminrespons'
                                    ,'taughtcourses'
                                    ,'tloadsummaries'
                                    ,'anyotherinfos'
                                    ,'appraisalscore'
                                    ,'uploadedfiles'));
            } elseif (Auth::user()->category_id==3) {
                return view('admin.appraisal.nonacademicform',array('user'=>Auth::user())
                        ,compact('appraisal_id'
                                ,'appraisers'
                                ,'appraisal'
                                ,'qualifications'
                                ,'profmembs'
                                ,'promotions'
                                ,'salaryscales'
                                ,'trainings'
                                ,'additionalquals'
                                ,'performedduties'
                                ,'publications'
                                ,'productions'
                                ,'adminrespons'
                                ,'taughtcourses'
                                ,'tloadsummaries'
                                ,'anyotherinfos'
                                ,'appraisalscore'
                                ,'uploadedfiles'));
    
            } elseif(Auth::user()->category_id==4) {
                return view('admin.appraisal.juniorstaffform',
                            array('user'=>Auth::user())
                            ,compact('appraisal_id'
                                    ,'appraisers'
                                    ,'appraisal'
                                    ,'qualifications'
                                    ,'profmembs'
                                    ,'promotions'
                                    ,'salaryscales'
                                    ,'trainings'
                                    ,'additionalquals'
                                    ,'performedduties'
                                    ,'publications'
                                    ,'productions'
                                    ,'adminrespons'
                                    ,'taughtcourses'
                                    ,'tloadsummaries'
                                    ,'anyotherinfos'
                                    ,'appraisalscore'
                                    ,'uploadedfiles'
                                    ,'institutions'
                                    ,'juniorqualifications'
                                    ,'postqualiexperiences'
                                    ,'adhocperfduties'

                                ));
            }
    
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
        if (Auth::user()->hasAnyRole(['Admin'])||Auth::user()->hasAnyRole(['Registrar'])) {
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
            'appraisalyear'=>date('Y',strtotime($request->appraisalyear)),
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
        $appraisal=Appraisal::where('id',$id)->first();

        return view('admin.appraisal.edit',array('user'=>Auth::user()),compact('appraisal'));
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
        $this->validate($request, [
            'title'=>'required|min:5|max:40',
            'starting'=>'required',
            'ending'=>'required',
        ]);

        $appraisal=Appraisal::find($id);
        $appraisal->title=$request->title;
        $appraisal->slug=Str::slug($request->title);
        $appraisal->appraisalyear=date('Y',strtotime($request->appraisalyear));
        $appraisal->starting=$request->starting;
        $appraisal->ending=$request->ending;
        $appraisal->user_id=Auth::user()->id;
        $appraisal->save();

        return redirect()->route('appraisals.index')->with('success',$appraisal->title.' updated successfully 😊');
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
        if ($appraisaluser!=NULL) {
            $appraisaluser->delete();
        }
        
        $qualifs=Qualification::where('appraisal_id',$appraisal_id)->where('user_id',$user_id)->get();
        if(count($qualifs)>0){
            foreach($qualifs as $qualif){
                    $qualif->delete();
            }
        }

        $juniorqualifs=Juniorqualification::where('appraisal_id',$appraisal_id)->where('user_id',$user_id)->get();
        if(count($juniorqualifs)>0){
            foreach($juniorqualifs as $juniorqualif){
                    $juniorqualif->delete();
            }
        }

        $institutions=Institution::where('appraisal_id',$appraisal_id)->where('user_id',$user_id)->get();
        if(count($institutions)>0){
            foreach($institutions as $institute){
                    $institute->delete();
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
        if ($salscale!=NULL) {
            $salscale->delete();
        }
               

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
        
        if ($perfduty!=NULL) {
            $perfduty->delete();
        }
       
        $publications=Publication::where('appraisal_id',$appraisal_id)->where('user_id',$user_id)->get();
        if(count($publications)>0){
            foreach($publications as $publication){
                $publication->delete();
            }
        }

        $productions=Production::where('appraisal_id',$appraisal_id)->where('user_id',$user_id)->get();
        if(count($productions)>0){
            foreach($productions as $production){
                $production->delete();
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
        
        if ($anyotherinfo!=NULL) {
            $anyotherinfo->delete();
        }
 
        $apprascore=Appraisalscore::where('appraisal_id',$appraisal_id)->where('user_id',$user_id)->first();            
        if ($apprascore!=NULL) {
            $apprascore->delete();
        }
        
        //deleting uploaded appraisal documents
        $uploadedfiles=Uploadedfile::where('appraisal_id',$appraisal_id)->where('user_id',$user_id)->get();
        if(count($uploadedfiles)>0){
            foreach($uploadedfiles as $uploadedfile){
                $uploadedfile->delete();
                //deleting manifesto files from folder
                File::delete([public_path('storage/staff_appraisal_documents/' . $uploadedfile->filename)]);
            }
        }

        //deleting appraisal report
        $appraisalreport=Appraisalreport::where('appraisal_id',$appraisal_id)->where('user_id',$user_id)->first();
        if ($appraisalreport!=NULL) {
            $appraisalreport->delete();
        }

        return redirect()->back()->with('deleted','Staff Appraisal deleted successfully!');
    }

    private function deleteMulti($model, $appraisal_id, $position = 0)
    {
        $user_id = Auth::guard()->user()->id;
        $appraisals = $model->whereAppraisalId($appraisal_id)->whereUserId($user_id)->get();
        if(count($appraisals)>0){
            foreach($appraisals as $appraisal){
                    $appraisal->delete();
                    if($position){
                        File::delete([public_path('storage/staff_appraisal_documents/' . $appraisal->filename)]);
                    }
            }
        }

        return true;
    }

    public function destroyAppraisal($appraisal_id, $position){
      
       if((int)$position === 1) $this->deleteMulti($model = new Qualification, $appraisal_id);

       if((int)$position === 2) $this->deleteMulti($model = new Profmembership, $appraisal_id);

       if((int)$position === 3) $this->deleteMulti($model = new Promotion, $appraisal_id);

       if((int)$position === 4) $this->deleteMulti($model = new Salaryscale, $appraisal_id);

       if((int)$position === 5) $this->deleteMulti($model = new Training, $appraisal_id);

       if((int)$position === 6) $this->deleteMulti($model = new Additionalqualif, $appraisal_id);

       if((int)$position === 7) $this->deleteMulti($model = new Performedduty, $appraisal_id);

       if((int)$position === 8) $this->deleteMulti($model = new Publication, $appraisal_id);

       if((int)$position === 9) $this->deleteMulti($model = new Production, $appraisal_id);

       if((int)$position === 10) $this->deleteMulti($model = new Adminresponsibility, $appraisal_id);

       if((int)$position === 11) $this->deleteMulti($model = new Coursetaught, $appraisal_id);

       if((int)$position === 12) $this->deleteMulti($model = new Teachingloadsummary, $appraisal_id);

       if((int)$position === 13) $this->deleteMulti($model = new Anyotherinfo, $appraisal_id);
       
       if((int)$position === 14) $this->deleteMulti($model = new Uploadedfile, $appraisal_id, 1);
       
       if((int)$position === 15) $this->deleteMulti($model = new Institution, $appraisal_id);
       if((int)$position === 16) $this->deleteMulti($model = new Juniorqualification, $appraisal_id);
       if((int)$position === 17) $this->deleteMulti($model = new Postqualiexperience, $appraisal_id);
       if((int)$position === 18) $this->deleteMulti($model = new Adhocperfduty, $appraisal_id);
        
       return redirect()->back()->withSuccess('Staff Appraisal deleted successfully!');
    }

    private function fetchAppraisalData($model, $appraisal_id)
    {
        $user_id = Auth::guard()->user()->id;
        $appraisals = $model->whereAppraisalId($appraisal_id)->whereUserId($user_id)->get();
        return response()->json(['status'=>'ok', 'data'=>$appraisals], 200);
    }

    public function fetchData($appraisal_id, $position)
    {
        if((int)$position === 1) return $this->fetchAppraisalData($model = new Qualification, $appraisal_id);

           if((int)$position === 2) return $this->fetchAppraisalData($model = new Profmembership, $appraisal_id);

           if((int)$position === 3) return $this->fetchAppraisalData($model = new Promotion, $appraisal_id);

           if((int)$position === 4) return $this->fetchAppraisalData($model = new Salaryscale, $appraisal_id);

           if((int)$position === 5) return $this->fetchAppraisalData($model = new Training, $appraisal_id);

           if((int)$position === 6) return $this->fetchAppraisalData($model = new Additionalqualif, $appraisal_id);

           if((int)$position === 7) return $this->fetchAppraisalData($model = new Performedduty, $appraisal_id);

           if((int)$position === 8) return $this->fetchAppraisalData($model = new Publication, $appraisal_id);

           if((int)$position === 9) return $this->fetchAppraisalData($model = new Production, $appraisal_id);

           if((int)$position === 10) return $this->fetchAppraisalData($model = new Adminresponsibility, $appraisal_id);

           if((int)$position === 11) return $this->fetchAppraisalData($model = new Coursetaught, $appraisal_id);

           if((int)$position === 12) return $this->fetchAppraisalData($model = new Teachingloadsummary, $appraisal_id);

           if((int)$position === 13) return $this->fetchAppraisalData($model = new Anyotherinfo, $appraisal_id);
           
           if((int)$position === 14) return $this->fetchAppraisalData($model = new Uploadedfile, $appraisal_id, 1);
           
           if((int)$position === 15) return $this->fetchAppraisalData($model = new Institution, $appraisal_id);
           if((int)$position === 16) return $this->fetchAppraisalData($model = new Juniorqualification, $appraisal_id);
           if((int)$position === 17) return $this->fetchAppraisalData($model = new Postqualiexperience, $appraisal_id);
           if((int)$position === 18) return $this->fetchAppraisalData($model = new Adhocperfduty, $appraisal_id);
    }
}
