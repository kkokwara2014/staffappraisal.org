<?php

namespace App\Http\Controllers;

use App\Additionalqualif;
use App\Anyotherinfo;
use App\Appraisaluser;
use App\Coursetaught;
use App\Performedduty;
use App\Production;
use App\Profmembership;
use App\Promotion;
use App\Publication;
use App\Qualification;
use App\Salaryscale;
use App\Teachingloadsummary;
use App\Training;
use App\Uploadedfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AcademicStaffAppraisalController extends Controller
{
    
    public function store(Request $request){

        $appraisal_id=$request->appraisal_id;

        

        DB::transaction(function () use($request) {

            //saving staff academic qualification to the database
            // if ($request->has('qualifilename')) {
                foreach ($request->qualname as $key => $qualname) {
                    // $qfilename=time().'.'.$fileq->getClientOriginalExtension();
                    // $fileq->storeAs('public/qualifications/',$qfilename);

                    $qualif=new Qualification;
                    $qualif->user_id=auth()->user()->id;
                    $qualif->appraisal_id=$request->appraisal_id;
                    $qualif->awardinginst=$request->awardinginst[$key];
                    $qualif->dateofgrad=$request->dateofgrad[$key];
                    $qualif->qualname=$request->qualname[$key];
                    // $qualif->qualifilename=$qfilename;
                    $qualif->save();
                }
            // }

            //saving staff professional membership to the database
            // if ($request->has('profmembfilename')) {
                foreach ($request->award as $key => $award) {
                    // $profmfilename=time().'.'.$membfile->getClientOriginalExtension();
                    // $membfile->storeAs('public/profmembership/',$profmfilename);

                    $profmemb=new Profmembership;
                    $profmemb->user_id=auth()->user()->id;
                    $profmemb->appraisal_id=$request->appraisal_id;
                    $profmemb->award=$request->award[$key];
                    $profmemb->honour=$request->honour[$key];
                    $profmemb->member=$request->member[$key];
                    // $profmemb->profmembfilename=$profmfilename;
                    $profmemb->save();
                }
            // }
            //saving staff promotion to the database
            // if ($request->has('promofilename')) {
                foreach ($request->promodate as $key => $promodate) {
                    // $promfile=time().'.'.$promofile->getClientOriginalExtension();
                    // $promofile->storeAs('public/promotions/',$promfile);

                    $promot=new Promotion;
                    $promot->user_id=auth()->user()->id;
                    $promot->appraisal_id=$request->appraisal_id;
                    $promot->promodate=$request->promodate[$key];
                    $promot->grade=$request->grade[$key];
                    // $promot->promofilename=$promfile;
                    $promot->save();
                }
            // }

            //saving staff salary scale to the database
            $salscale=new Salaryscale;
            $salscale->user_id=auth()->user()->id;
            $salscale->appraisal_id=$request->appraisal_id;
            $salscale->presentpost=$request->presentpost;
            $salscale->salaryscale=$request->salaryscale;
            $salscale->save();

            //saving staff training to the database
                foreach ($request->trainingtype as $key => $traintyp) {
                    $training=new Training;
                    $training->user_id=auth()->user()->id;
                    $training->appraisal_id=$request->appraisal_id;
                    $training->trainingtype=$request->trainingtype[$key];
                    $training->caption=$request->caption[$key];
                    $training->trainingdate=$request->trainingdate[$key];
                    
                    $training->save();
                }
            //saving staff additional qualification to the database
                foreach ($request->qualificationtype as $key => $quali) {
                    
                    $addqualif=new Additionalqualif;
                    $addqualif->user_id=auth()->user()->id;
                    $addqualif->appraisal_id=$request->appraisal_id;
                    $addqualif->qualificationtype=$request->qualificationtype[$key];
                    $addqualif->dateobtained=$request->dateobtained[$key];
                    
                    $addqualif->save();
                }

            //saving staff duties performed to the database
            $perfduty=new Performedduty;
            $perfduty->user_id=auth()->user()->id;
            $perfduty->appraisal_id=$request->appraisal_id;
            $perfduty->performedduty=$request->performedduty;
            $perfduty->save();

            //saving staff publication to the database
            // if ($request->has('pubfilename')) {
                foreach ($request->pubtype as $key => $pubtype) {
                    // $publfile=time().'.'.$pubfile->getClientOriginalExtension();
                    // $pubfile->storeAs('public/publications/',$publfile);

                    $publica=new Publication;
                    $publica->user_id=auth()->user()->id;
                    $publica->appraisal_id=$request->appraisal_id;
                    $publica->pubtype=$request->pubtype[$key];
                    $publica->title=$request->title[$key];
                    $publica->yearofpub=$request->yearofpub[$key];
                    // $publica->pubfilename=$publfile;
                    $publica->save();
                }
            // }
            //saving staff production to the database
            // if ($request->has('prodfilename')) {
                foreach ($request->prodtype as $key => $prodtype) {
                    // $producfile=time().'.'.$prodfile->getClientOriginalExtension();
                    // $prodfile->storeAs('public/productions/',$producfile);

                    $prod=new Production;
                    $prod->user_id=auth()->user()->id;
                    $prod->appraisal_id=$request->appraisal_id;
                    $prod->prodtype=$request->prodtype[$key];
                    $prod->title=$request->prodtitle[$key];
                    $prod->yearofprod=$request->yearofprod[$key];
                    // $prod->prodfilename=$producfile;
                    $prod->save();
                }
            // }

            
            //saving courses taught by staff to the database
            foreach ($request->taughtcoursecode as $key => $tc) {
                    
                $taughtcourse=new Coursetaught;
                $taughtcourse->user_id=auth()->user()->id;
                $taughtcourse->appraisal_id=$request->appraisal_id;
                $taughtcourse->coursecode=$request->taughtcoursecode[$key];
                $taughtcourse->coursetitle=$request->taughtcoursetitle[$key];
                $taughtcourse->credithour=$request->taughtcredithour[$key];
                $taughtcourse->semester=$request->taughtsemester[$key];
                $taughtcourse->courseyear=$request->taughtyear[$key];
                
                $taughtcourse->save();
            }

            //saving teaching load submmary by staff to the database
            foreach ($request->teachingloadsemester as $key => $tload) {
                    
                $teachload=new Teachingloadsummary;
                $teachload->user_id=auth()->user()->id;
                $teachload->appraisal_id=$request->appraisal_id;
                $teachload->semester=$request->teachingloadsemester[$key];
                $teachload->courseyear=$request->teachingloadyear[$key];
                $teachload->credithour=$request->teachingloadcredithour[$key];
                $teachload->normalload=$request->teachingnormalload[$key];
                $teachload->excessload=$request->teachingexcessload[$key];
                
                $teachload->save();
            }

            //saving any other info by staff to the database
            $otherinfo=new Anyotherinfo;
            $otherinfo->user_id=auth()->user()->id;
            $otherinfo->appraisal_id=$request->appraisal_id;
            $otherinfo->anyotherinfo=$request->anyotherinfo;
            $otherinfo->save();

            //saving appraisal id and user id in appraisaluser model
            $apprauser=new Appraisaluser;
            $apprauser->appraisal_id=$request->appraisal_id;
            $apprauser->user_id=auth()->user()->id;
            $apprauser->sentto_id=$request->sentto_id;
            $apprauser->save();  
            
            
            //uploading appraisal documents
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

            //notify the appraiser about a submitted appraisal
            

            //send email to the HOD after successful submission of appraisal
            
        });

        

    return redirect()->route('acad.thankyoupage');
    
    }

    public function thankyoupage(){
        return view('admin.appraisal.submissionsuccessful',array('user'=>Auth::user()));
    }

}
