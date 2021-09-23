@extends('admin.layout.app')

@section('title')
{{ucfirst($staff->firstname).' '.($staff->middlename!=''?ucfirst($staff->middlename):'').' '.ucfirst($staff->lastname)}}
[{{ $staff->staffnumb }}] Appraisal Details - Category: {{ $staff->category->name }}
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">

        <div class="row">
            <div class="col-md-11">
                @include('admin.messages.success')

                <p>
                    <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm">
                        Back</a>

                        {{--  printing submitted appraisal  --}}
                        <a target="_blank" href="{{ route('print.submitted.appraisal',[$appraisal_id,$staff->id]) }}" class="btn btn-primary btn-sm btnprnt" style="float: right"><span class="fa fa-print"></span>
                            Print Appraisal</a>
                </p>
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                        <h4>Institution(s) Attended</h4>
                        @if (count($institutions)>0)
                        <table class="table table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>Institution Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($institutions as $institu)
                               
                                <div>
                                    @if ($institu->user_id==$staff->id)

                                    <tr>
                                        <td>{{ $institu->institutionname }}</td>
                                        <td>{{ $institu->startdate }}</td>
                                        <td>{{ $institu->enddate }}</td>
                                        
                                    </tr>

                                    @endif
                                </div>
                                @endforeach
                                
                            </tbody>
                        </table>
                            
                        @else
                        <span style="background-color: red; color: honeydew" class="badge badge-pill badge-danger">No submission made</span>
                        @endif

                        <hr>
                        <h4>Qualifications</h4>
                        @if (count($juniorqualifs)>0)
                        <table class="table table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>Qualification</th>
                                    <th>Date Obtained</th>
                                    <th>Specialization</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($juniorqualifs as $qualif)
                                <div>
                                    @if ($qualif->user_id==$staff->id)

                                    <tr>
                                        <td>{{ $qualif->qualification }}</td>
                                        <td>{{ $qualif->dateobtained }}</td>
                                        <td>{{ $qualif->specialization }}</td>
                                        
                                    </tr>

                                    @endif
                                </div>
                                @endforeach
                                
                            </tbody>
                        </table>
                            
                        @else
                        <span style="background-color: red; color: honeydew" class="badge badge-pill badge-danger">No submission made</span>
                        @endif

                        <hr>
                        <h4>Professional Membership</h4>
                        @if (count($profmemberships)>0)
                        <table class="table table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>Professional Body</th>
                                    <th>Member Category</th>
                                    <th>Member Number</th>
                                    <th>Award Year</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($profmemberships as $profmemb)
                                <div>
                                    @if ($profmemb->user_id==$staff->id)
                                    <tr>
                                        <td>{{ $profmemb->profbody }}</td>
                                        <td>{{ $profmemb->membcategory }}</td>
                                        <td>{{ $profmemb->membnumb }}</td>
                                        <td>{{ $profmemb->awardyear }}</td>

                                    </tr>

                                    @endif
                                </div>
                                @endforeach
                                {{-- @endforeach --}}

                            </tbody>
                        </table>
                            
                        @else
                            <span style="background-color: red; color: honeydew" class="badge badge-pill badge-danger">No submission made</span>
                        @endif

                        <hr>
                        <h4>Post Qualification Experience</h4>
                        @if (count($postqualiexps)>0)
                        <table class="table table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>Post Held</th>
                                    <th>Employer</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($postqualiexps as $postexp)
                                <div>
                                    @if ($postexp->user_id==$staff->id)
                                    <tr>
                                        <td>{{ $postexp->postheld }}</td>
                                        <td>{{ $postexp->employer }}</td>
                                        <td>{{ $postexp->startdate }}</td>
                                        <td>{{ $postexp->enddate }}</td>

                                    </tr>
                                    @endif
                                </div>
                                @endforeach

                            </tbody>
                        </table>
                            
                        @else
                            <span style="background-color: red; color: honeydew" class="badge badge-pill badge-danger">No submission made</span>
                        @endif


                        <hr>
                        <h4>Promotions</h4>
                        @if(count($promotions)>0)
                        <table class="table table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>Grade</th>
                                    <th>Promotion Date</th>

                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($staffs as $staff) --}}
                                @foreach ($promotions as $promo)
                                <div>
                                    @if ($promo->user_id==$staff->id)
                                    <tr>
                                        <td>{{ $promo->grade }}</td>
                                        <td>{{ $promo->promodate }}</td>
                                    </tr>

                                    @endif
                                </div>
                                @endforeach
                                {{-- @endforeach --}}

                            </tbody>
                        </table>
                        @else
                            <span style="background-color: red; color: honeydew" class="badge badge-pill badge-danger">No submission made</span>
                        @endif

                        <hr>
                        <h4>Salary Scale</h4>
                        @if (count($salaryscales)>0)
                        <table class="table table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>Present Post</th>
                                    <th>Salary Scale</th>

                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach ($salaryscales as $salscal)
                                <div>
                                    @if ($salscal->user_id==$staff->id)
                                    <tr>
                                        <td>{{ $salscal->presentpost }}</td>
                                        <td>{{ $salscal->salaryscale }}</td>
                                    </tr>

                                    @endif
                                </div>
                                @endforeach
                            </tbody>
                        </table>   
                        @else
                        <span style="background-color: red; color: honeydew" class="badge badge-pill badge-danger">No submission made</span>
                        @endif
                        
                        <hr>
                        <h4>Additional Educational/Professional Qualification</h4>
                        @if (count($additionalqualifs)>0)
                        <table class="table table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>Qualification Type </th>
                                    <th>Date Obtained</th>

                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($staffs as $staff) --}}
                                @foreach ($additionalqualifs as $addqualif)
                                <div>
                                    @if ($addqualif->user_id==$staff->id)
                                    <tr>
                                        <td>{{ $addqualif->qualificationtype }}</td>
                                        <td>{{ $addqualif->dateobtained }}</td>
                                    </tr>

                                    @endif
                                </div>
                                @endforeach
                                {{-- @endforeach --}}

                            </tbody>
                        </table>    
                        @else
                        <span style="background-color: red; color: honeydew" class="badge badge-pill badge-danger">No submission made</span>
                        @endif

                        <hr>
                        <h4>Duties Performed</h4>
                        @if (count($performedduties)>0)
                        @foreach ($performedduties as $perfduty)
                        <div>
                            @if ($perfduty->user_id==$staff->id)
                            <div>
                                {{ $perfduty->performedduty }}
                            </div>

                            @endif
                        </div>
                        @endforeach
                        @else
                        <span style="background-color: red; color: honeydew" class="badge badge-pill badge-danger">No submission made</span> 
                        @endif

                        <hr>
                        <h4>Adhoc Duties Performed</h4>
                        @if (count($adhocperfduties)>0)
                        @foreach ($adhocperfduties as $adhocperfduty)
                        <div>
                            @if ($adhocperfduty->user_id==$staff->id)
                            <div>
                                {{ $adhocperfduty->adhocperformedduty }}
                            </div>

                            @endif
                        </div>
                        @endforeach
                        @else
                        <span style="background-color: red; color: honeydew" class="badge badge-pill badge-danger">No submission made</span> 
                        @endif
                        
                        
                        <hr>
                        <h4>Training</h4>
                        @if (count($trainings)>0)
                        <table class="table table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>Training Type </th>
                                    <th>Caption</th>
                                    <th>Date Attended</th>

                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($staffs as $staff) --}}
                                @foreach ($trainings as $train)
                                <div>
                                    @if ($train->user_id==$staff->id)
                                    <tr>
                                        <td>{{ $train->trainingtype }}</td>
                                        <td>{{ $train->caption }}</td>
                                        <td>{{ $train->trainingdate }}</td>
                                    </tr>

                                    @endif
                                </div>
                                @endforeach
                                {{-- @endforeach --}}

                            </tbody>
                        </table>
                            
                        @else
                        <span style="background-color: red; color: honeydew" class="badge badge-pill badge-danger">No submission made</span>
                        @endif
                        
                        
                        
                        
                        <hr>
                        
                        <h4>Any Other Information</h4>
                       @if (count($anyotherinfos)>0)
                       @foreach ($anyotherinfos as $aoi)
                       <div>
                           @if ($aoi->user_id==$staff->id)
                           <div>
                               {{ $aoi->anyotherinfo }}
                           </div>
                           @endif
                       </div>
                       @endforeach
                           
                       @else
                       <span style="background-color: red; color: honeydew" class="badge badge-pill badge-danger">No submission made</span>
                       @endif

                        <hr>
                        <h4>Uploaded Supporting Documents</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>Document Type </th>
                                            <th>View File </th>
                                            <th>Download File</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($uploadedfiles as $uploadedfile)
                                        <div>
                                            @if ($uploadedfile->user_id==$staff->id)
                                            <tr>
                                                <td>{{ $uploadedfile->documenttype }}</td>
                                                <td>
                                                    @if ($uploadedfile->filename!='')
                                                    <a target="_blank" href="{{route('view.uploadedfile', $uploadedfile->filename )}}">
                                                        <span class="fa fa-eye" style="color: green"></span>
                                                    </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($uploadedfile->filename!='')
                                                    
                                                    <a target="_blank"
                                                        href="{{route('uploadedfile.download', $uploadedfile->filename )}}"
                                                        download="{{ $uploadedfile->filename }}">
                                                        <span class="fa fa-download" style="color: green"></span>
                                                        <span class="fa fa-file-pdf-o" style="color: red"></span>
                                                    </a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                        </div>

                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>


                        <div>
                            <p>
                                {{-- only HOD can score staff under him/her --}}
                                @if ((Auth::user()->hasAnyRole(['HOD'])||Auth::user()->hasAnyRole(['Dean'])||Auth::user()->hasAnyRole(['Rector'])) && $the_appraiser)
                                
                                @if ($scoredappraisaluser->isscoredbyhod==0)
                                {{-- scoredappraisaluser --}}
                                {{-- {{ route('getacademicscoreform',[$staffappraisalscore->appraisal_id,$staffappraisalscore->user_id]) }} --}}
                                <p>
                                    <a href="{{ route('getappraisalscoreform',[$scoredappraisaluser->appraisal_id,$scoredappraisaluser->user_id]) }}"
                                        class="btn btn-primary btn-sm">Score this Staff</a>
                                </p>
                                @endif
                                @endif

                                {{-- only school board appraisal committee --}}
                                @if (Auth::user()->hasAnyRole(['Dean'])||Auth::user()->hasAnyRole(['Rector']))
                                @if ($scoredappraisaluser->isscoredbyhod==1 && $scoredappraisaluser->isscoredbyschboard==0)
                                <p>
                                    <a href="#" data-toggle="modal"
                                    data-target="#schboard-recomm-modal-{{ $scoredappraisaluser->appraisal_id.'-'.$scoredappraisaluser->user_id }}"
                                        class="btn btn-success btn-sm">School Board Recommendation</a>
                                </p>

                                {{-- modal for making school board recommedantion --}}
                                <div class="modal fade"
                                    id="schboard-recomm-modal-{{ $scoredappraisaluser->appraisal_id.'-'.$scoredappraisaluser->user_id }}"
                                    tabindex="-1" role="dialog">

                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    <strong>Appraisal Score for
                                                        {{ $staff->firstname.' '.$staff->lastname.' ['.$staff->staffnumb.']' }}</strong>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div>Regularity score: {{ $staffappraisalscore->regularityscore!=''?$staffappraisalscore->regularityscore:'Not scored' }}</div>
                                                                <div>Punctuaity score: {{ $staffappraisalscore->punctualityscore!=''?$staffappraisalscore->punctualityscore:'Not scored' }}</div>
                                                                <div>Foresight score: {{ $staffappraisalscore->foresightscore!=''?$staffappraisalscore->foresightscore:'Not scored' }}</div>
                                                                <div>Judgement score: {{ $staffappraisalscore->judgementscore!=''?$staffappraisalscore->judgementscore:'Not scored' }}</div>
                                                                <div>Initiative score: {{ $staffappraisalscore->initiativescore!=''?$staffappraisalscore->initiativescore:'Not scored' }}</div>
                                                                <div>Relationship score: {{ $staffappraisalscore->relationshipscore!=''?$staffappraisalscore->relationshipscore:'Not scored' }}</div>
                                                                <div>Public relation score: {{ $staffappraisalscore->publicrelationscore!=''?$staffappraisalscore->publicrelationscore :'Not scored' }}</div>
                                                                <div>Acceptance of responsibility score: {{ $staffappraisalscore->acceptanceofrespscore!=''?$staffappraisalscore->acceptanceofrespscore:'Not scored' }}</div>
                                                                <div>Reliability score: {{ $staffappraisalscore->reliabilityscore!=''?$staffappraisalscore->reliabilityscore:'Not scored' }}</div>
                                                                
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div>Application to duty score: {{ $staffappraisalscore->applicationtodutyscore!=''?$staffappraisalscore->applicationtodutyscore:'Not scored' }}</div>
                                                                <div>Output of work score: {{ $staffappraisalscore->outputofworkscore!=''?$staffappraisalscore->outputofworkscore:'Not scored' }}</div>
                                                                <div>Quality of work score: {{ $staffappraisalscore->qualityofworkscore!=''?$staffappraisalscore->qualityofworkscore:'Not scored' }}</div>
                                                                <div>Number of Warning Letter(s) : {{ $staffappraisalscore->warningletterscore!=''?$staffappraisalscore->warningletterscore:'Not scored' }}</div>
                                                                <div>Off-duty on health score: {{ $staffappraisalscore->offdutyonhealthscore!=''?$staffappraisalscore->offdutyonhealthscore:'Not scored' }}</div>
                                                                <div>Number of commendation score: {{ $staffappraisalscore->numberofcommendationscore!=''?$staffappraisalscore->numberofcommendationscore:'Not scored' }}</div>
                                                                <div>Training potential: {{ $staffappraisalscore->trainingpotentialscore!=''?$staffappraisalscore->trainingpotentialscore:'Not scored' }}</div>
                                                                <div>
                                                                    @if ($staffappraisalscore->totalscore>50)
                                                                    Total Score: 
                                                                    <span class="badge badge-pill badge-success"
                                                                        style="color:white;background:green;">{{ $staffappraisalscore->totalscore }}</span>
                                                                    @else
                                                                    Total Score: 
                                                                    <span class="badge badge-pill badge-success"
                                                                        style="color:white;background:red;">{{ $staffappraisalscore->totalscore }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                                                                                        
                                                        </div>
                                                        <hr>
                                                        <div>

                                                            <div>
                                                                <label>Free comment by the Appraiser [{{ $staffappraisalscore->appraisedby }}]</label>
                                                                <p style="text-align:justify">
                                                                    {{ $staffappraisalscore->freecomment }}
                                                                </p>
                                                            </div>
                                                            <div>
                                                                <label>Recommendation by the Appraiser [{{ $staffappraisalscore->appraisedby }}]</label>
                                                                <p style="text-align:justify">
                                                                    {{ $staffappraisalscore->recommendation }}
                                                                </p>
                                                            </div>


                                                        </div>

                                                        <label>Staff Comment</label>
                                                        <p style="text-align: justify">
                                                            {{ $staffappraisalscore->acceptorrejectcomment }}
                                                        </p>
                                                        <hr>                                                        
                                                        <p>
                                                            <form
                                                                action="{{ route('schboardrecomm',[$scoredappraisaluser->appraisal_id,$scoredappraisaluser->user_id]) }}"
                                                                method="post">
                                                                @csrf
                                                                <label>Shool Board Recommendation</label>
                                                                <textarea class="form-control"
                                                                    name="schboardrecomm" cols="30" rows="3"
                                                                    required placeholder="Your recommendation(s) here"
                                                                    autofocus></textarea>
                                                                <br> 
                                                                
                                                                <button type="submit" class="btn btn-primary btn-sm">Submit Recommendation</button>

                                                            </form>
                                                        </p>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default btn-sm"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div>

                                </div>
                                @endif
                                @endif
                                {{-- end of school board appraisal committee recommendation --}}

                                {{-- only Management appraisal committee --}}
                                @if (Auth::user()->hasAnyRole(['Management'])||Auth::user()->hasAnyRole(['Rector']))
                                
                                @if ($scoredappraisaluser->isscoredbyschboard==1 && $scoredappraisaluser->isscoredbymanagement==0)
                                <p>
                                    <a href="#" data-toggle="modal"
                                    data-target="#management-recomm-modal-{{ $scoredappraisaluser->appraisal_id.'-'.$scoredappraisaluser->user_id }}"
                                        class="btn btn-success btn-sm">Management Recommendation</a>
                                </p>

                                {{-- modal for making Management recommedantion --}}
                                <div class="modal fade"
                                    id="management-recomm-modal-{{ $scoredappraisaluser->appraisal_id.'-'.$scoredappraisaluser->user_id }}"
                                    tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    <strong>Appraisal Score for
                                                        {{ $staff->firstname.' '.$staff->lastname.' ['.$staff->staffnumb.']' }}</strong>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div>Regularity score: {{ $staffappraisalscore->regularityscore!=''?$staffappraisalscore->regularityscore:'Not scored' }}</div>
                                                                <div>Punctuaity score: {{ $staffappraisalscore->punctualityscore!=''?$staffappraisalscore->punctualityscore:'Not scored' }}</div>
                                                                <div>Foresight score: {{ $staffappraisalscore->foresightscore!=''?$staffappraisalscore->foresightscore:'Not scored' }}</div>
                                                                <div>Judgement score: {{ $staffappraisalscore->judgementscore!=''?$staffappraisalscore->judgementscore:'Not scored' }}</div>
                                                                <div>Initiative score: {{ $staffappraisalscore->initiativescore!=''?$staffappraisalscore->initiativescore:'Not scored' }}</div>
                                                                <div>Relationship score: {{ $staffappraisalscore->relationshipscore!=''?$staffappraisalscore->relationshipscore:'Not scored' }}</div>
                                                                <div>Public relation score: {{ $staffappraisalscore->publicrelationscore!=''?$staffappraisalscore->publicrelationscore :'Not scored' }}</div>
                                                                <div>Acceptance of responsibility score: {{ $staffappraisalscore->acceptanceofrespscore!=''?$staffappraisalscore->acceptanceofrespscore:'Not scored' }}</div>
                                                                <div>Reliability score: {{ $staffappraisalscore->reliabilityscore!=''?$staffappraisalscore->reliabilityscore:'Not scored' }}</div>
                                                                
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div>Application to duty score: {{ $staffappraisalscore->applicationtodutyscore!=''?$staffappraisalscore->applicationtodutyscore:'Not scored' }}</div>
                                                                <div>Output of work score: {{ $staffappraisalscore->outputofworkscore!=''?$staffappraisalscore->outputofworkscore:'Not scored' }}</div>
                                                                <div>Quality of work score: {{ $staffappraisalscore->qualityofworkscore!=''?$staffappraisalscore->qualityofworkscore:'Not scored' }}</div>
                                                                <div>Number of Warning Letter(s) : {{ $staffappraisalscore->warningletterscore!=''?$staffappraisalscore->warningletterscore:'Not scored' }}</div>
                                                                <div>Off-duty on health score: {{ $staffappraisalscore->offdutyonhealthscore!=''?$staffappraisalscore->offdutyonhealthscore:'Not scored' }}</div>
                                                                <div>Number of commendation score: {{ $staffappraisalscore->numberofcommendationscore!=''?$staffappraisalscore->numberofcommendationscore:'Not scored' }}</div>
                                                                <div>Training potential: {{ $staffappraisalscore->trainingpotentialscore!=''?$staffappraisalscore->trainingpotentialscore:'Not scored' }}</div>
                                                                <div>
                                                                    @if ($staffappraisalscore->totalscore>50)
                                                                    Total Score: 
                                                                    <span class="badge badge-pill badge-success"
                                                                        style="color:white;background:green;">{{ $staffappraisalscore->totalscore }}</span>
                                                                    @else
                                                                    Total Score: 
                                                                    <span class="badge badge-pill badge-success"
                                                                        style="color:white;background:red;">{{ $staffappraisalscore->totalscore }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                                                                                        
                                                        </div>
                                                        <hr>
                                                        <div>

                                                            <div>
                                                                <label>Free comment by the Appraiser [{{ $staffappraisalscore->appraisedby }}]</label>
                                                                <p style="text-align:justify">
                                                                    {{ $staffappraisalscore->freecomment }}
                                                                </p>
                                                            </div>
                                                            <div>
                                                                <label>Recommendation by the Appraiser [{{ $staffappraisalscore->appraisedby }}]</label>
                                                                <p style="text-align:justify">
                                                                    {{ $staffappraisalscore->recommendation }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        
                                                        <label>Staff Comment</label>
                                                        <p style="text-align: justify">
                                                            {{ $staffappraisalscore->acceptorrejectcomment }}
                                                        </p>
                                                        <label>School Board Appraisal Committee Recommendation [{{ $staffappraisalscore->schboardrecommender }}]</label>
                                                        <p style="text-align: justify">
                                                            {{ $staffappraisalscore->schboardrecomm }}
                                                        </p>
                                                        <hr>                                                        
                                                        <p>
                                                            <form
                                                                action="{{ route('managementrecomm',[$scoredappraisaluser->appraisal_id,$scoredappraisaluser->user_id]) }}"
                                                                method="post">
                                                                @csrf
                                                                <label>Management Recommendation</label>
                                                                <textarea class="form-control"
                                                                    name="managementrecomm" cols="30" rows="3"
                                                                    required placeholder="Your recommendation(s) here"
                                                                    autofocus></textarea>
                                                                <br> 
                                                                
                                                                <button type="submit" class="btn btn-primary btn-sm">Submit Recommendation</button>

                                                            </form>
                                                        </p>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default btn-sm"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div>

                                </div>
                                @endif
                                @endif
                                {{-- end of management appraisal committee recommendation --}}

                                {{-- only ssapc --}}
                                @if (Auth::user()->hasAnyRole(['SSAP Committee'])||Auth::user()->hasAnyRole(['Rector']))
                                
                                @if ($scoredappraisaluser->isscoredbymanagement==1 && $scoredappraisaluser->isscoredbyssapc==0)
                                <p>
                                    <a href="#" data-toggle="modal"
                                    data-target="#ssapc-recomm-modal-{{ $scoredappraisaluser->appraisal_id.'-'.$scoredappraisaluser->user_id }}"
                                        class="btn btn-success btn-sm">SSAP Committee Recommendation</a>
                                </p>

                                {{-- modal for making ssapc recommedantion --}}
                                <div class="modal fade"
                                    id="ssapc-recomm-modal-{{ $scoredappraisaluser->appraisal_id.'-'.$scoredappraisaluser->user_id }}"
                                    tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    <strong>Appraisal Score for
                                                        {{ $staff->firstname.' '.$staff->lastname.' ['.$staff->staffnumb.']' }}</strong>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div>Regularity score: {{ $staffappraisalscore->regularityscore!=''?$staffappraisalscore->regularityscore:'Not scored' }}</div>
                                                                <div>Punctuaity score: {{ $staffappraisalscore->punctualityscore!=''?$staffappraisalscore->punctualityscore:'Not scored' }}</div>
                                                                <div>Foresight score: {{ $staffappraisalscore->foresightscore!=''?$staffappraisalscore->foresightscore:'Not scored' }}</div>
                                                                <div>Judgement score: {{ $staffappraisalscore->judgementscore!=''?$staffappraisalscore->judgementscore:'Not scored' }}</div>
                                                                <div>Initiative score: {{ $staffappraisalscore->initiativescore!=''?$staffappraisalscore->initiativescore:'Not scored' }}</div>
                                                                <div>Relationship score: {{ $staffappraisalscore->relationshipscore!=''?$staffappraisalscore->relationshipscore:'Not scored' }}</div>
                                                                <div>Public relation score: {{ $staffappraisalscore->publicrelationscore!=''?$staffappraisalscore->publicrelationscore :'Not scored' }}</div>
                                                                <div>Acceptance of responsibility score: {{ $staffappraisalscore->acceptanceofrespscore!=''?$staffappraisalscore->acceptanceofrespscore:'Not scored' }}</div>
                                                                <div>Reliability score: {{ $staffappraisalscore->reliabilityscore!=''?$staffappraisalscore->reliabilityscore:'Not scored' }}</div>
                                                                
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div>Application to duty score: {{ $staffappraisalscore->applicationtodutyscore!=''?$staffappraisalscore->applicationtodutyscore:'Not scored' }}</div>
                                                                <div>Output of work score: {{ $staffappraisalscore->outputofworkscore!=''?$staffappraisalscore->outputofworkscore:'Not scored' }}</div>
                                                                <div>Quality of work score: {{ $staffappraisalscore->qualityofworkscore!=''?$staffappraisalscore->qualityofworkscore:'Not scored' }}</div>
                                                                <div>Number of Warning Letter(s) : {{ $staffappraisalscore->warningletterscore!=''?$staffappraisalscore->warningletterscore:'Not scored' }}</div>
                                                                <div>Off-duty on health score: {{ $staffappraisalscore->offdutyonhealthscore!=''?$staffappraisalscore->offdutyonhealthscore:'Not scored' }}</div>
                                                                <div>Number of commendation score: {{ $staffappraisalscore->numberofcommendationscore!=''?$staffappraisalscore->numberofcommendationscore:'Not scored' }}</div>
                                                                <div>Training potential: {{ $staffappraisalscore->trainingpotentialscore!=''?$staffappraisalscore->trainingpotentialscore:'Not scored' }}</div>
                                                                <div>
                                                                    @if ($staffappraisalscore->totalscore>50)
                                                                    Total Score: 
                                                                    <span class="badge badge-pill badge-success"
                                                                        style="color:white;background:green;">{{ $staffappraisalscore->totalscore }}</span>
                                                                    @else
                                                                    Total Score: 
                                                                    <span class="badge badge-pill badge-success"
                                                                        style="color:white;background:red;">{{ $staffappraisalscore->totalscore }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                                                                                        
                                                        </div>
                                                        <hr>
                                                        <div>

                                                            <div>
                                                                <label>Free comment by the Appraiser [{{ $staffappraisalscore->appraisedby }}]</label>
                                                                <p style="text-align:justify">
                                                                    {{ $staffappraisalscore->freecomment }}
                                                                </p>
                                                            </div>
                                                            <div>
                                                                <label>Recommendation by the Appraiser [{{ $staffappraisalscore->appraisedby }}]</label>
                                                                <p style="text-align:justify">
                                                                    {{ $staffappraisalscore->recommendation }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        
                                                        <label>Staff Comment</label>
                                                        <p style="text-align: justify">
                                                            {{ $staffappraisalscore->acceptorrejectcomment }}
                                                        </p>
                                                        <label>School Board Appraisal Committee Recommendation [{{ $staffappraisalscore->schboardrecommender }}]</label>
                                                        <p style="text-align: justify">
                                                            {{ $staffappraisalscore->schboardrecomm }}
                                                        </p>
                                                        <label>Management Appraisal Committee Recommendation [{{ $staffappraisalscore->managementrecommender }}]</label>
                                                        <p style="text-align: justify">
                                                            {{ $staffappraisalscore->managementrecomm }}
                                                        </p>
                                                        <hr>                                                        
                                                        <p>
                                                            <form
                                                                action="{{ route('ssapcrecomm',[$scoredappraisaluser->appraisal_id,$scoredappraisaluser->user_id]) }}"
                                                                method="post">
                                                                @csrf
                                                                <label>SSAP Committee Recommendation</label>
                                                                <textarea class="form-control"
                                                                    name="ssapcrecomm" cols="30" rows="3"
                                                                    required placeholder="Your recommendation(s) here"
                                                                    autofocus></textarea>
                                                                <br> 
                                                                
                                                                <button type="submit" class="btn btn-primary btn-sm">Submit Recommendation</button>
                                                            </form>
                                                        </p>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default btn-sm"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div>

                                </div>
                                @endif
                                @endif
                                {{-- end of ssapc recommendation --}}


                                {{-- only governing council appraisal committee --}}
                                @if (Auth::user()->hasAnyRole(['Governing Council'])||Auth::user()->hasAnyRole(['Rector']))
                                
                                @if ($scoredappraisaluser->isscoredbyssapc==1 && $scoredappraisaluser->isscoredbycouncil==0)
                                <p>
                                    <a href="#" data-toggle="modal"
                                    data-target="#council-recomm-modal-{{ $scoredappraisaluser->appraisal_id.'-'.$scoredappraisaluser->user_id }}"
                                        class="btn btn-success btn-sm">Council Recommendation</a>
                                </p>

                                {{-- modal for making governing council recommedantion --}}
                                <div class="modal fade"
                                    id="council-recomm-modal-{{ $scoredappraisaluser->appraisal_id.'-'.$scoredappraisaluser->user_id }}"
                                    tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    <strong>Appraisal Score for
                                                        {{ $staff->firstname.' '.$staff->lastname.' ['.$staff->staffnumb.']' }}</strong>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div>Regularity score: {{ $staffappraisalscore->regularityscore!=''?$staffappraisalscore->regularityscore:'Not scored' }}</div>
                                                                <div>Punctuaity score: {{ $staffappraisalscore->punctualityscore!=''?$staffappraisalscore->punctualityscore:'Not scored' }}</div>
                                                                <div>Foresight score: {{ $staffappraisalscore->foresightscore!=''?$staffappraisalscore->foresightscore:'Not scored' }}</div>
                                                                <div>Judgement score: {{ $staffappraisalscore->judgementscore!=''?$staffappraisalscore->judgementscore:'Not scored' }}</div>
                                                                <div>Initiative score: {{ $staffappraisalscore->initiativescore!=''?$staffappraisalscore->initiativescore:'Not scored' }}</div>
                                                                <div>Relationship score: {{ $staffappraisalscore->relationshipscore!=''?$staffappraisalscore->relationshipscore:'Not scored' }}</div>
                                                                <div>Public relation score: {{ $staffappraisalscore->publicrelationscore!=''?$staffappraisalscore->publicrelationscore :'Not scored' }}</div>
                                                                <div>Acceptance of responsibility score: {{ $staffappraisalscore->acceptanceofrespscore!=''?$staffappraisalscore->acceptanceofrespscore:'Not scored' }}</div>
                                                                <div>Reliability score: {{ $staffappraisalscore->reliabilityscore!=''?$staffappraisalscore->reliabilityscore:'Not scored' }}</div>
                                                                
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div>Application to duty score: {{ $staffappraisalscore->applicationtodutyscore!=''?$staffappraisalscore->applicationtodutyscore:'Not scored' }}</div>
                                                                <div>Output of work score: {{ $staffappraisalscore->outputofworkscore!=''?$staffappraisalscore->outputofworkscore:'Not scored' }}</div>
                                                                <div>Quality of work score: {{ $staffappraisalscore->qualityofworkscore!=''?$staffappraisalscore->qualityofworkscore:'Not scored' }}</div>
                                                                <div>Number of Warning Letter(s) : {{ $staffappraisalscore->warningletterscore!=''?$staffappraisalscore->warningletterscore:'Not scored' }}</div>
                                                                <div>Off-duty on health score: {{ $staffappraisalscore->offdutyonhealthscore!=''?$staffappraisalscore->offdutyonhealthscore:'Not scored' }}</div>
                                                                <div>Number of commendation score: {{ $staffappraisalscore->numberofcommendationscore!=''?$staffappraisalscore->numberofcommendationscore:'Not scored' }}</div>
                                                                <div>Training potential: {{ $staffappraisalscore->trainingpotentialscore!=''?$staffappraisalscore->trainingpotentialscore:'Not scored' }}</div>
                                                                <div>
                                                                    @if ($staffappraisalscore->totalscore>50)
                                                                    Total Score: 
                                                                    <span class="badge badge-pill badge-success"
                                                                        style="color:white;background:green;">{{ $staffappraisalscore->totalscore }}</span>
                                                                    @else
                                                                    Total Score: 
                                                                    <span class="badge badge-pill badge-success"
                                                                        style="color:white;background:red;">{{ $staffappraisalscore->totalscore }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                                                                                        
                                                        </div>
                                                        <hr>
                                                        <div>

                                                            <div>
                                                                <label>Free comment by the Appraiser [{{ $staffappraisalscore->appraisedby }}]</label>
                                                                <p style="text-align:justify">
                                                                    {{ $staffappraisalscore->freecomment }}
                                                                </p>
                                                            </div>
                                                            <div>
                                                                <label>Recommendation by the Appraiser [{{ $staffappraisalscore->appraisedby }}]</label>
                                                                <p style="text-align:justify">
                                                                    {{ $staffappraisalscore->recommendation }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        
                                                        <label>Staff Comment</label>
                                                        <p style="text-align: justify">
                                                            {{ $staffappraisalscore->acceptorrejectcomment }}
                                                        </p>
                                                        <label>School Board Appraisal Committee Recommendation [{{ $staffappraisalscore->schboardrecommender }}]</label>
                                                        <p style="text-align: justify">
                                                            {{ $staffappraisalscore->schboardrecomm }}
                                                        </p>
                                                        <label>Management Appraisal Committee Recommendation [{{ $staffappraisalscore->managementrecommender }}]</label>
                                                        <p style="text-align: justify">
                                                            {{ $staffappraisalscore->managementrecomm }}
                                                        </p>
                                                        <label>SSAP Committee Recommendation [{{ $staffappraisalscore->ssapcrecommender }}]</label>
                                                        <p style="text-align: justify">
                                                            {{ $staffappraisalscore->ssapcrecomm }}
                                                        </p>
                                                        <hr>                                                        
                                                        <p>
                                                            <form
                                                                action="{{ route('councilrecomm',[$scoredappraisaluser->appraisal_id,$scoredappraisaluser->user_id]) }}"
                                                                method="post">
                                                                @csrf
                                                                <label>Governing Council Recommendation</label>
                                                                <textarea class="form-control"
                                                                    name="councilrecomm" cols="30" rows="3"
                                                                    required placeholder="Your recommendation(s) here"
                                                                    autofocus></textarea>
                                                                <br> 
                                                                
                                                                <button type="submit" class="btn btn-primary btn-sm">Submit Recommendation</button>

                                                            </form>
                                                        </p>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default btn-sm"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div>

                                </div>
                                @endif
                                @endif
                                {{-- end of governing council appraisal committee recommendation --}}



                                @if ($staffappraisalscore!=NULL)
                                <br>
                                @if ($staff->id==auth()->user()->id)
                                <a href="#" data-toggle="modal"
                                    data-target="#modal-{{ $scoredappraisaluser->appraisal_id.'-'.$scoredappraisaluser->user_id }}"
                                    class="btn btn-primary btn-sm"><span class="fa fa-eye"></span> Check Score</a>
                                @endif

                                {{-- appraisal score modal  --}}
                                <div class="modal fade"
                                    id="modal-{{ $scoredappraisaluser->appraisal_id.'-'.$scoredappraisaluser->user_id }}"
                                    tabindex="-1" role="dialog">

                                    <div class="modal-dialog modal-lg">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    <strong>Appraisal Score for
                                                        {{ $staff->firstname.' '.$staff->lastname.' ['.$staff->staffnumb.']' }}</strong>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div>Regularity score: {{ $staffappraisalscore->regularityscore!=''?$staffappraisalscore->regularityscore:'Not scored' }}</div>
                                                                <div>Punctuaity score: {{ $staffappraisalscore->punctualityscore!=''?$staffappraisalscore->punctualityscore:'Not scored' }}</div>
                                                                <div>Foresight score: {{ $staffappraisalscore->foresightscore!=''?$staffappraisalscore->foresightscore:'Not scored' }}</div>
                                                                <div>Judgement score: {{ $staffappraisalscore->judgementscore!=''?$staffappraisalscore->judgementscore:'Not scored' }}</div>
                                                                <div>Initiative score: {{ $staffappraisalscore->initiativescore!=''?$staffappraisalscore->initiativescore:'Not scored' }}</div>
                                                                <div>Relationship score: {{ $staffappraisalscore->relationshipscore!=''?$staffappraisalscore->relationshipscore:'Not scored' }}</div>
                                                                <div>Public relation score: {{ $staffappraisalscore->publicrelationscore!=''?$staffappraisalscore->publicrelationscore :'Not scored' }}</div>
                                                                <div>Acceptance of responsibility score: {{ $staffappraisalscore->acceptanceofrespscore!=''?$staffappraisalscore->acceptanceofrespscore:'Not scored' }}</div>
                                                                <div>Reliability score: {{ $staffappraisalscore->reliabilityscore!=''?$staffappraisalscore->reliabilityscore:'Not scored' }}</div>
                                                                
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div>Application to duty score: {{ $staffappraisalscore->applicationtodutyscore!=''?$staffappraisalscore->applicationtodutyscore:'Not scored' }}</div>
                                                                <div>Output of work score: {{ $staffappraisalscore->outputofworkscore!=''?$staffappraisalscore->outputofworkscore:'Not scored' }}</div>
                                                                <div>Quality of work score: {{ $staffappraisalscore->qualityofworkscore!=''?$staffappraisalscore->qualityofworkscore:'Not scored' }}</div>
                                                                <div>Number of Warning Letter(s) : {{ $staffappraisalscore->warningletterscore!=''?$staffappraisalscore->warningletterscore:'Not scored' }}</div>
                                                                <div>Off-duty on health score: {{ $staffappraisalscore->offdutyonhealthscore!=''?$staffappraisalscore->offdutyonhealthscore:'Not scored' }}</div>
                                                                <div>Number of commendation score: {{ $staffappraisalscore->numberofcommendationscore!=''?$staffappraisalscore->numberofcommendationscore:'Not scored' }}</div>
                                                                <div>Training potential: {{ $staffappraisalscore->trainingpotentialscore!=''?$staffappraisalscore->trainingpotentialscore:'Not scored' }}</div>
                                                                <div>
                                                                    @if ($staffappraisalscore->totalscore>50)
                                                                    Total Score: 
                                                                    <span class="badge badge-pill badge-success"
                                                                        style="color:white;background:green;">{{ $staffappraisalscore->totalscore }}</span>
                                                                    @else
                                                                    Total Score: 
                                                                    <span class="badge badge-pill badge-success"
                                                                        style="color:white;background:red;">{{ $staffappraisalscore->totalscore }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                                                                                        
                                                        </div>
                                                        <hr>
                                                        <div>

                                                            <div>
                                                                <label>Free comment by the Appraiser</label>
                                                                <p style="text-align:justify">
                                                                    {{ $staffappraisalscore->freecomment }}
                                                                </p>
                                                            </div>
                                                            <div>
                                                                <label>Recommendation by the Appraiser</label>
                                                                <p style="text-align:justify">
                                                                    {{ $staffappraisalscore->recommendation }}
                                                                </p>
                                                            </div>


                                                        </div>

                                                        @if ($staffappraisalscore->staffcommented==0)
                                                        <div>
                                                            <p>
                                                                <label>Accept or Reject</label>
                                                            </p>

                                                            <form
                                                                action="{{ route('appraisalscore.acceptorreject',[$staffappraisalscore->appraisal_id,$staffappraisalscore->user_id]) }}"
                                                                method="post">
                                                                @csrf
                                                                <textarea class="form-control"
                                                                    name="acceptorrejectreason" cols="30" rows="3"
                                                                    required placeholder="Your comment here"
                                                                    autofocus></textarea>
                                                                <br> <button type="submit"
                                                                    class="btn btn-primary btn-sm">Submit</button>

                                                            </form>

                                                        </div>

                                                        @else
                                                        <label>Staff Comment</label>
                                                        <p style="text-align: justify">
                                                            {{ $staffappraisalscore->acceptorrejectcomment }}
                                                        </p>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default btn-sm"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div>

                                </div>


                                @else
                                <br>
                                <p>No Score yet!</p>

                                @endif


                            </p>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

        </div>

    </section>
    <!-- /.Left col -->
    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    {{-- <section class="col-lg-5 connectedSortable"> --}}


    {{-- </section> --}}
    <!-- right col -->
</div>
<!-- /.row (main row) -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection