<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Print Appraisal Summary</title>

        <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('admin_assets/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin_assets/bower_components/font-awesome/css/font-awesome.min.css')}}">
     <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <style>
            table{
                width: 100%;
                margin: 0px;
            }
            th,td{
                width: auto; 
                text-align: left;
            }
        </style>

    </head>

    <body>

        {{-- <div style="text-align: center">
            <img src="{{ asset('bootstrap_assets/images/LOGO.png') }}" width="70" height="70">
        </div> --}}

        <div class="row">
            <div class="col-md-12">
                <h3 style="text-align: center">{{ $appraisal->title }} Summary</h3>
                
                <img src="{{url('user_images',$staff->userimage)}}"
                                        width="120" height="120" style="border-radius: 50%; float: right">
            <h4>
                Staff Name: {{$staff->title->title.' '.ucfirst($staff->firstname).' '.($staff->middlename!=''?ucfirst($staff->middlename):'').' '.ucfirst($staff->lastname)}}
                <br>                
                Staff Number: {{ $staff->staffnumb }}
                <br>                
                Phone Number: {{ $staff->phone }}
                <br>
                Category: {{ $staff->category->name }}
                <br>
                Department: {{ $staff->department->name }}
            </h4>
            </div>
        </div>
        <hr>

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
        <span class="badeg badge-pill badge-danger" style="background-color: red; color: honeydew" class="badge badge-pill badge-danger">No submission
            made</span>
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
        <span class="badeg badge-pill badge-danger" style="background-color: red; color: honeydew" class="badge badge-pill badge-danger">No submission
            made</span>
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
                            <span class="badeg badge-pill badge-danger" style="background-color: red; color: honeydew" class="badge badge-pill badge-danger">No submission made</span>
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
                            <span class="badeg badge-pill badge-danger" style="background-color: red; color: honeydew" class="badge badge-pill badge-danger">No submission made</span>
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
                            <span class="badeg badge-pill badge-danger" style="background-color: red; color: honeydew" class="badge badge-pill badge-danger">No submission made</span>
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
                        <span class="badeg badge-pill badge-danger" style="background-color: red; color: honeydew" class="badge badge-pill badge-danger">No submission made</span>
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
                        <span class="badeg badge-pill badge-danger" style="background-color: red; color: honeydew" class="badge badge-pill badge-danger">No submission made</span>
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
                        <span class="badeg badge-pill badge-danger" style="background-color: red; color: honeydew" class="badge badge-pill badge-danger">No submission made</span> 
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
                        <span class="badeg badge-pill badge-danger" style="background-color: red; color: honeydew" class="badge badge-pill badge-danger">No submission made</span> 
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
                        <span class="badeg badge-pill badge-danger" style="background-color: red; color: honeydew" class="badge badge-pill badge-danger">No submission made</span>
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
                       <span class="badeg badge-pill badge-danger" style="background-color: red; color: honeydew" class="badge badge-pill badge-danger">No submission made</span>
                       @endif

                        <hr>
                        <h4>Uploaded Supporting Documents</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>Document Type </th>
                                            <th>File (Downloadable)</th>
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
                                                    <a href="#">
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


    </body>

</html>