<?php

namespace App\Http\Controllers;

use App\Appraisaluser;
use App\Mail\AppraisalSubmittedMail;
use App\Mail\WaitingtobeAppraisedMail;
use App\Uploadedfile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SupportingDocumentController extends Controller
{
    

    public function store(Request $request){

        request()->validate([
            'sentto_id'=>'required',
            'supportingdoc' => 'required',
            'supportingdoc.*' => 'mimes:pdf'
        ]);

        $allUploadedFiles = $request->file('supportingdoc');
        //uploading appraisal documents
        if ($request->hasFile('supportingdoc')) {
            foreach ($allUploadedFiles as $key=> $docum) {
                $filename=auth()->user()->lastname.'_'.auth()->user()->staffnumb.'_'.rand(1234567,6789099).'.'.$docum->getClientOriginalExtension();
                $docum->storeAs('public/staff_appraisal_documents/', $filename);
                
                $uploadeddoc=new Uploadedfile();
                $uploadeddoc->user_id=auth()->user()->id;
                $uploadeddoc->appraisal_id=$request->appraisal_id;
                $uploadeddoc->documenttype=$request->documenttype[$key];
                $uploadeddoc->filename=$filename;
                $uploadeddoc->save();
            }
        }

        //saving appraisal id and user id in appraisaluser model
        $apprauser=new Appraisaluser();
        $apprauser->appraisal_id=$request->appraisal_id;
        $apprauser->user_id=auth()->user()->id;
        $apprauser->sentto_id=$request->sentto_id;
        $apprauser->save();
        
        //notify the appraiser about a submitted appraisal
        $stafftobeappraised =User::where('id',$apprauser->user_id)->first();
        // Mail::to($stafftobeappraised->email)->send(new AppraisalSubmittedMail($apprauser));
        
        
        //send email to the HOD after successful submission of appraisal
        $the_appraiser =User::where('id',$apprauser->sentto_id)->first();
        // Mail::to($the_appraiser->email)->send(new WaitingtobeAppraisedMail($apprauser));
        
        return redirect()->back()->with('success','Supporting Document(s) uploaded successfully!');

    }

    public function storemoredocument(Request $request){
        request()->validate([
            'supportingdoc' => 'required',
            'supportingdoc.*' => 'mimes:pdf'
        ]);

        $moreUploadedFiles = $request->file('supportingdoc');
        //uploading appraisal documents
        if ($request->hasFile('supportingdoc')) {
            foreach ($moreUploadedFiles as $key=> $docum) {
                $filename=auth()->user()->lastname.'_'.auth()->user()->staffnumb.'_'.rand(2345678,7890989).'.'.$docum->getClientOriginalExtension();
                $docum->storeAs('public/staff_appraisal_documents/', $filename);
                
                $uploadeddoc=new Uploadedfile();
                $uploadeddoc->user_id=auth()->user()->id;
                $uploadeddoc->appraisal_id=$request->appraisal_id;
                $uploadeddoc->documenttype=$request->documenttype[$key];
                $uploadeddoc->filename=$filename;
                $uploadeddoc->save();
            }
        }
        
        
        return redirect()->back()->with('success','More Supporting Document(s) uploaded successfully!');
    }
}
