<?php

namespace App\Http\Controllers;

use App\Uploadedfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AcademicDocumentUploadController extends Controller
{
    

    public function getuploadpage(Request $request){
        $appraisal_id= $request->appraisal_id;

        return view('admin.uploaddocument.getuploadpage',array('user'=>Auth::user()),compact('appraisal_id'));
    }

    public function uploaddoc(Request $request){
        // $this->validate($request,[
        //     'appraisaldocument' => 'required|file|mimes:pdf|max:51200'
        // ]);
        //saving uploaded files
            if ($request->hasFile('appraisaldocument')) {
                foreach ($request->appraisaldocument as $document) {
                    $filename=rand(1234,6789).'_'.$document->getClientOriginalName();
                    $document->storeAs('public/staff_appraisal_documents/', $filename);
                    
                    $uploadeddoc=new Uploadedfile();
                    $uploadeddoc->user_id=Auth::user()->id;
                    $uploadeddoc->appraisal_id=$request->appraisal_id;
                    $uploadeddoc->filename=$filename;
                    $uploadeddoc->save();
                }

            }

        return redirect()->route('acad.thankyoupage');
    }
}
