<?php

namespace App\Http\Controllers;

use App\Additionalqualif;
use App\Adminresponsibility;
use App\Anyotherinfo;
use App\Appraisal;
use App\Appraisalscore;
use App\Appraisaluser;
use App\Coursetaught;
use App\Department;
use App\Http\Requests\StaffStoreRequest;
use App\Performedduty;
use App\Production;
use App\Profmembership;
use App\Promotion;
use App\Publication;
use App\Qualification;
use App\Role;
use App\Salaryscale;
use App\Teachingloadsummary;
use App\Training;
use App\User;
use App\Creatorinfo;

use App\Title;
use App\School;
use App\State;
use App\Maritalstatus;
use App\Category;
use App\Rank;
use Image;


use App\Mail\NewStaffMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs=User::latest()->paginate(50);

        return view('admin.staff.index',array('user'=>Auth::user()),compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.staff.create',array('user'=>Auth::user()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StaffStoreRequest $request)
    {
        $generated_password= bin2hex(random_bytes(4));
        
        //adding new staff
        $staff=new User;
        $staff->lastname=$request->lastname;
        $staff->middlename=$request->middlename;
        $staff->firstname=$request->firstname;
        $staff->staffnumb=$request->staffnumb;
        $staff->email=$request->email;
        $staff->phone=$request->phone;
        $staff->password=bcrypt($generated_password);
        $staff->creator_id=auth()->user()->id;
        $staff->save();

        //attaching newly created staff to a role
        $userRole=Role::where('name','Staff')->first();
        $staff->roles()->attach($userRole);

        //sending login credentials via SMS
        $this->sendLoginCredentialBySMS($staff, $generated_password);

        //send login credentials via email
        // Mail::to($staff->email)->send(new NewStaffMail($staff,$generated_password));


        //redirecting to all staff page
        return redirect()->route('staffs.index')->with('success','New Staff created successfully!');
    }

    public function storeAdhocStaff(StaffStoreRequest $request){
        
        $generated_password= bin2hex(random_bytes(4));
        
        //adding new Adhoc staff
        $staff=new User;
        $staff->lastname=$request->lastname;
        $staff->middlename=$request->middlename;
        $staff->firstname=$request->firstname;
        $staff->staffnumb=$request->staffnumb;
        $staff->email=$request->email;
        $staff->phone=$request->phone;
        $staff->password=bcrypt($generated_password);
        $staff->creator_id=auth()->user()->id;
        $staff->save();

        //attaching newly created staff to a role
        $userRole=Role::where('name','Adhoc Staff')->first();
        $staff->roles()->attach($userRole);

        //sending login credentials via SMS
        $this->sendLoginCredentialBySMS($staff, $generated_password);

        //send login credentials via email
        // Mail::to($staff->email)->send(new NewStaffMail($staff,$generated_password));


        //redirecting to all staff page
        return redirect()->route('adhocstaffs.index')->with('success','New Adhoc Staff created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff=User::find($id);

        // $staff_id=$request->segments(3);

        $staff_id=$id;
        $creatorExists=User::where('creator_id','=',$id)->count();

        // return $staff_id;       
        $staffappraisals=Appraisaluser::where('user_id',$staff->id)->get();
        // $staffappraisals=Appraisaluser::where('user_id',$staff->id)->first();
        return view('admin.staff.show',array('user'=>Auth::user()),compact('staff','staffappraisals','staff_id','creatorExists'));
    }

    public function showPeopleCreatedByOthers($id)
    {
        $creatorExists=User::where('creator_id','=',$id)->count();
        if (Auth::user()->hasAnyRole(['Admin']) || $creatorExists>0) {
            $staff=User::find($id);

        $staffcreatedbyothers=User::where('creator_id',$id)->latest()->get();       
        $totalstaffcount=User::where('creator_id',$id)->count();       
       
        return view('admin.staff.peoplecreated',array('user'=>Auth::user()),compact('staff','staffcreatedbyothers','totalstaffcount','creatorExists'));
        } else {
            
            return view('admin.unauthorized.accessdenied');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        

        $staff=User::find($id);

        $titles=Title::where('id','>','1')->orderBy('title','asc')->get();
        $schools=School::where('id','>','1')->orderBy('name','asc')->get();
        $states=State::where('id','<','38')->orderBy('name','asc')->get();
        $maritalstatuses=Maritalstatus::where('id','>','1')->orderBy('id','asc')->get();
        $staffcategories=Category::where('id','>','1')->orderBy('name','asc')->get();
        $ranks=Rank::where('id','>','1')->orderBy('id','asc')->get();

        return view('admin.profile.editstaff',array('user'=>Auth::user()),compact('staff','titles','schools','states','maritalstatuses','staffcategories','ranks'));

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

        
        if ($request->hasFile('userimage')) {
            $userimage = $request->file('userimage');
            $filename = time() . '.' . $userimage->getClientOriginalExtension();
            Image::make($userimage)->resize(300, 300)->save(public_path('user_images/' . $filename));
        

            $staff=User::find($id);
            $staff->title_id=$request->title_id;
            $staff->lastname=$request->lastname;
            $staff->middlename=$request->middlename;
            $staff->firstname=$request->firstname;
            $staff->email=$request->email;
            $staff->phone=$request->phone;
            $staff->rank_id=$request->rank_id;
            $staff->school_id=$request->school_id;
            $staff->department_id=$request->department_id;
            $staff->state_id=$request->state_id;
            $staff->lga_id=$request->lga_id;
            $staff->maritalstatus_id=$request->maritalstatus_id;
            $staff->category_id=$request->category_id;
            $staff->assumptiondate=$request->assumptiondate;
            $staff->confirmationdate=$request->confirmationdate;
            $staff->firstassumptionstatus=$request->firstassumptionstatus;
            $staff->dob=$request->dob;
            $staff->numofchildren=$request->numofchildren;
            $staff->userimage = $filename;

            $staff->save();

            return redirect()->route('home')->with('success','Profile Updated successfully!');
        
        }else{

            $staff=User::find($id);
            $staff->title_id=$request->title_id;
            $staff->lastname=$request->lastname;
            $staff->middlename=$request->middlename;
            $staff->firstname=$request->firstname;
            $staff->email=$request->email;
            $staff->phone=$request->phone;
            $staff->rank_id=$request->rank_id;
            $staff->school_id=$request->school_id;
            $staff->department_id=$request->department_id;
            $staff->state_id=$request->state_id;
            $staff->lga_id=$request->lga_id;
            $staff->maritalstatus_id=$request->maritalstatus_id;
            $staff->category_id=$request->category_id;
            $staff->assumptiondate=$request->assumptiondate;
            $staff->confirmationdate=$request->confirmationdate;
            $staff->firstassumptionstatus=$request->firstassumptionstatus;
            $staff->dob=$request->dob;
            $staff->numofchildren=$request->numofchildren;
            $staff->userimage = $request->existing_image;

            $staff->save();

            return redirect()->route('home')->with('success','Profile Updated successfully!');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff=User::find($id);
        $staff->delete();

        return back()->with('staff_deleted','Staff deleted successfully!');
    }

    

    public function activate($id)
    {
        if(Auth::user()->hasAnyRole('Admin')){
        $staff = User::find($id);
        $staff->isactive = '1';
        $staff->save();
        
        return back();

    } else {
        return redirect()->route('access.denied');
    }
    }

    public function deactivate($id)
    {
        if(Auth::user()->hasAnyRole('Admin')){
        $staff = User::find($id);
        $staff->isactive = '0';
        $staff->save();

        return back();
    } else {
        return redirect()->route('access.denied');
    }
    }

    public function staffbydepartment(){

        if(Auth::user()->hasAnyRole(['Admin','Rector','Registrar','Dean','HOD'])){
        $departments=Department::where('id','>','1')->orderBy('name','asc')->simplePaginate(10);

        $staffs=User::orderBy('firstname','asc')->where('profileupdated','1')->get();

        return view('admin.staff.staffbydepartment',array('user'=>Auth::user()),compact('departments','staffs'));
    } else {
        return redirect()->route('access.denied');
    }
    }

    public function departmentalstaff($id){
        $department=Department::find($id);
        
        $staffs=User::orderBy('firstname','asc')->where('profileupdated','1')->get();

        return view('admin.staff.departmentalstaff',array('user'=>Auth::user()),compact('department','staffs'));

    }


    public function showappraisal($appraisal_id,$staffid){
        //last order details
        // $lastID=Qualification::max('appraisal_id');
        // $orderreceipts=Orderdetail::where('customer_id',$lastID)->get();

        $appraisal=Appraisal::find($appraisal_id);


        $staff_id=$staffid;

        // return $staff_id;
        
        // $staffs=User::where('profileupdated','1')->get();
        $staff=User::find($staff_id);

        //get the last saved id
        $lastqualID=Qualification::max('appraisal_id');
        $lastprofID=Profmembership::max('appraisal_id');
        $lastpromoID=Promotion::max('appraisal_id');
        $lastsalscaleID=Salaryscale::max('appraisal_id');
        $lastTrainingID=Training::max('appraisal_id');
        $lastAddiQualID=Additionalqualif::max('appraisal_id');
        $lastPerfdutyID=Performedduty::max('appraisal_id');
        $lastPublicaID=Publication::max('appraisal_id');
        $lastProdID=Production::max('appraisal_id');
        $lastAdminResID=Adminresponsibility::max('appraisal_id');
        $lastCTaughtID=Coursetaught::max('appraisal_id');
        $lastTLSID=Teachingloadsummary::max('appraisal_id');
        $lastAnyInfoID=Anyotherinfo::max('appraisal_id');
        $lastAppScoreID=Appraisalscore::max('appraisal_id');

        $qualifications=Qualification::where('appraisal_id',$lastqualID)->get();
        $profmemberships=Profmembership::where('appraisal_id',$lastprofID)->get();
        $promotions=Promotion::where('appraisal_id',$lastpromoID)->get();
        $salaryscales=Salaryscale::where('appraisal_id',$lastsalscaleID)->get();
        $trainings=Training::where('appraisal_id',$lastTrainingID)->get();
        $additionalqualifs=Additionalqualif::where('appraisal_id',$lastAddiQualID)->get();
        $performedduties=Performedduty::where('appraisal_id',$lastPerfdutyID)->get();
        $publications=Publication::where('appraisal_id',$lastPublicaID)->get();
        $productions=Production::where('appraisal_id',$lastProdID)->get();
        $adminrespons=Adminresponsibility::where('appraisal_id',$lastAdminResID)->get();
        $taughtcourses=Coursetaught::where('appraisal_id',$lastCTaughtID)->get();
        $teachingloadsummaries=Teachingloadsummary::where('appraisal_id',$lastTLSID)->get();
        $anyotherinfos=Anyotherinfo::where('appraisal_id',$lastAnyInfoID)->get();


        $staffappraisalscores=Appraisalscore::where('appraisal_id',$lastAppScoreID)->where('user_id',$staff_id)->get();
        
        // $qualifications=Qualification::where('appraisal_id',$appraisal_id)->get();
        // $profmemberships=Profmembership::where('appraisal_id',$appraisal_id)->get();
        // $promotions=Promotion::where('appraisal_id',$appraisal_id)->get();
        // $salaryscales=Salaryscale::where('appraisal_id',$appraisal_id)->get();
        // $trainings=Training::where('appraisal_id',$appraisal_id)->get();
        // $additionalqualifs=Additionalqualif::where('appraisal_id',$appraisal_id)->get();
        // $performedduties=Performedduty::where('appraisal_id',$appraisal_id)->get();
        // $publications=Publication::where('appraisal_id',$appraisal_id)->get();
        // $productions=Production::where('appraisal_id',$appraisal_id)->get();
        // $adminrespons=Adminresponsibility::where('appraisal_id',$appraisal_id)->get();
        // $taughtcourses=Coursetaught::where('appraisal_id',$appraisal_id)->get();
        // $teachingloadsummaries=Teachingloadsummary::where('appraisal_id',$appraisal_id)->get();
        // $anyotherinfos=Anyotherinfo::where('appraisal_id',$appraisal_id)->get();


        // $staffappraisalscores=Appraisalscore::where('appraisal_id',$appraisal_id)->where('user_id',$staff_id)->get();
                
        return view('admin.staff.staffappraisaldetails',array('user'=>Auth::user()),compact('qualifications','salaryscales','staff','profmemberships','promotions','trainings','additionalqualifs','performedduties','publications','productions','adminrespons','taughtcourses','teachingloadsummaries','anyotherinfos','staff_id','staffappraisalscores'));
    }


    //sending default login credential to newly created user
    public function sendLoginCredentialBySMS($staff, $generated_password){
        $message=urlencode("Dear ".$staff->firstname.' '.$staff->lastname. ", your Staff Appraisal login details are ".$staff->staffnumb." and ".$generated_password." as Staff number and password respectively. Visit www.staffappraisal.org/login. Thank you.");
        $sender=urlencode("Appraisal");
        $recipient=urlencode($staff->phone);

        $this->sendsms($recipient,$sender,$message);

        // return back();
        return;
    }

    // the module for sendsms function
    public function sendsms($recipient,$sender,$message)
    {
        $message=$message;
        $sender=$sender;
        $recipient=$recipient;
        
        $api_username="kkokwara2014@gmail.com";
        $api_password="@Victorkk78";
        $api_token="ba34f9e7e74fa61beaa22154082f29f472a559a6";
            

        $url='https://api.ebulksms.com:4433/sendsms?username='.$api_username.'&apikey='.$api_token.'&sender='.$sender.'&messagetext='.$message.'&flash=0&recipients='.$recipient.'';
        

        $isError = 0;
        $errorMessage = true;

        $ch = curl_init($url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

        //Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        //get response
        $output = curl_exec($ch);
        //Print error if any
        if (curl_errno($ch)) {
            $isError = true;
            $errorMessage = curl_error($ch);
        }
        curl_close($ch);


        if($isError){
            return array('error' => 1 , 'message' => $errorMessage);
        }else{
            return array('error' => 0 );
        }
    }

}
