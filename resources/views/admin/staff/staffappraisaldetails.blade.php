@extends('admin.layout.app')

@section('title')
{{ucfirst($staff->firstname).' '.($staff->middlename!=''?ucfirst($staff->middlename):'').' '.ucfirst($staff->lastname)}}
[{{ $staff->staffnumb }}] Appraisal Details
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">

        <div class="row">
            <div class="col-md-12">
                @include('admin.messages.success')

                <p>
                    <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm">
                        Back</a>
                </p>
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                        <h4>Qualifications</h4>
                        <table class="table table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>Qualification</th>
                                    <th>Awarding Institution</th>
                                    <th>Date Awarded</th>
                                    {{-- <th>Certificate in PDF</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($qualifications as $qualif)
                                {{-- @foreach ($staffs as $staff) --}}
                                <div>
                                    @if ($qualif->user_id==$staff->id)

                                    <tr>
                                        <td>{{ $qualif->qualname }}</td>
                                        <td>{{ $qualif->awardinginst }}</td>
                                        <td>{{ $qualif->dateofgrad }}</td>
                                        {{-- <td>
                                            <a href="{{route('download.qualification', $qualif->qualifilename )}}"
                                        download="{{ $qualif->qualifilename }}"><span style="color: red"
                                            class="fa fa-file-pdf-o"></span> <span class="fa fa-download"></span> </a>
                                        </td> --}}
                                    </tr>

                                    @endif
                                </div>
                                @endforeach
                                {{-- @endforeach --}}

                            </tbody>
                        </table>

                        <hr>
                        <h4>Professional Membership</h4>
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
                        <hr>
                        <h4>Promotions</h4>

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
                        <hr>
                        <h4>Salary Scale</h4>

                        <table class="table table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>Present Post</th>
                                    <th>Salary Scale</th>

                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($staffs as $staff) --}}
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
                                {{-- @endforeach --}}

                            </tbody>
                        </table>
                        <hr>
                        <h4>Training</h4>
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
                        <hr>
                        <h4>Additional Educational/Professional Qualification</h4>

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
                        <hr>
                        <h4>Duties Performed</h4>
                        {{-- @foreach ($staffs as $staff) --}}
                        @foreach ($performedduties as $perfduty)
                        <div>
                            @if ($perfduty->user_id==$staff->id)
                            <div>
                                {{ $perfduty->performedduty }}
                            </div>

                            @endif
                        </div>
                        @endforeach
                        {{-- @endforeach --}}

                        <hr>
                        <h4>Publications</h4>
                        <table class="table table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>Publication Type </th>
                                    <th>Publication Title </th>
                                    <th>Date of Publication</th>
                                    {{-- <th>File in PDF</th> --}}

                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($staffs as $staff) --}}
                                @foreach ($publications as $publi)
                                <div>
                                    @if ($publi->user_id==$staff->id)
                                    <tr>
                                        <td>{{ $publi->pubtype }}</td>
                                        <td>{{ $publi->title }}</td>
                                        <td>{{ $publi->yearofpub }}</td>
                                        {{-- <td>
                                            <a href="{{route('download.publication', $publi->pubfilename )}}"
                                        download="{{ $publi->pubfilename }}"><span style="color: red"
                                            class="fa fa-file-pdf-o"></span> <span class="fa fa-download"></span> </a>
                                        </td> --}}
                                    </tr>

                                    @endif
                                </div>
                                @endforeach
                                {{-- @endforeach --}}

                            </tbody>
                        </table>
                        <hr>
                        <h4>Productions</h4>
                        <table class="table table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>Production Type </th>
                                    <th>Production Title </th>
                                    <th>Date of Production</th>
                                    {{-- <th>File in PDF</th> --}}

                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($staffs as $staff) --}}
                                @foreach ($productions as $prod)
                                <div>
                                    @if ($prod->user_id==$staff->id)
                                    <tr>
                                        <td>{{ $prod->prodtype }}</td>
                                        <td>{{ $prod->title }}</td>
                                        <td>{{ $prod->yearofprod }}</td>
                                        {{-- <td>
                                            <a href="{{route('download.production', $prod->prodfilename )}}"
                                        download="{{ $prod->prodfilename }}"><span style="color: red"
                                            class="fa fa-file-pdf-o"></span> <span class="fa fa-download"></span> </a>
                                        </td> --}}
                                    </tr>

                                    @endif
                                </div>
                                @endforeach
                                {{-- @endforeach --}}

                            </tbody>
                        </table>
                        <hr>
                        <h4>Administrative Responsibility</h4>
                        <table class="table table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>Administrative Type </th>
                                    <th>Starting </th>
                                    <th>Ending</th>

                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($staffs as $staff) --}}
                                @foreach ($adminrespons as $adminres)
                                <div>
                                    @if ($adminres->user_id==$staff->id)
                                    <tr>
                                        <td>{{ $adminres->admintype }}</td>
                                        <td>{{ $adminres->startingyear }}</td>
                                        <td>{{ $adminres->endingyear }}</td>

                                    </tr>

                                    @endif
                                </div>
                                @endforeach
                                {{-- @endforeach --}}

                            </tbody>
                        </table>
                        <hr>
                        <h4>Courses Taught</h4>
                        <table class="table table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>Course Code </th>
                                    <th>Course Title </th>
                                    <th>Credit Hour </th>
                                    <th>Semester </th>
                                    <th>Year</th>

                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($staffs as $staff) --}}
                                @foreach ($taughtcourses as $ct)
                                <div>
                                    @if ($ct->user_id==$staff->id)
                                    <tr>
                                        <td>{{ $ct->coursecode }}</td>
                                        <td>{{ $ct->coursetitle }}</td>
                                        <td>{{ $ct->credithour }}</td>
                                        <td>{{ $ct->semester }}</td>
                                        <td>{{ $ct->courseyear }}</td>

                                    </tr>

                                    @endif
                                </div>
                                @endforeach
                                {{-- @endforeach --}}

                            </tbody>
                        </table>
                        <hr>
                        <h4>Summary of Teaching Load</h4>
                        <table class="table table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>Semester </th>
                                    <th>Year</th>
                                    <th>Credit Hour/Week </th>
                                    <th>Normal Load (Hour)/Week </th>
                                    <th>Excess Load (Hour)/Week </th>

                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($staffs as $staff) --}}
                                @foreach ($teachingloadsummaries as $teachingload)
                                <div>
                                    @if ($teachingload->user_id==$staff->id)
                                    <tr>
                                        <td>{{ $teachingload->semester }}</td>
                                        <td>{{ $teachingload->courseyear }}</td>
                                        <td>{{ $teachingload->credithour }}</td>
                                        <td>{{ $teachingload->normalload }}</td>
                                        <td>{{ $teachingload->excessload }}</td>

                                    </tr>

                                    @endif
                                </div>
                                @endforeach
                                {{-- @endforeach --}}

                            </tbody>
                        </table>
                        <hr>
                        <h4>Any Other Information</h4>
                        {{-- @foreach ($staffs as $staff) --}}
                        @foreach ($anyotherinfos as $aoi)
                        <div>
                            @if ($aoi->user_id==$staff->id)
                            <div>
                                {{ $aoi->anyotherinfo }}
                            </div>

                            <p>
                                {{-- only HOD can score staff under him/her --}}

                                @hasrole('HOD')
                                @if ($staff->department_id==Auth::user()->department_id)

                                @if ($staffappraisalscore==NULL)
                                <p>
                                    <a href="{{ route('getappraisalscoreform',[$aoi->appraisal_id,$staff->id]) }}"
                                        class="btn btn-primary btn-sm">Score this Staff</a>
                                </p>
                                @endif

                                {{-- <form action="{{ route('appraisalscoreform',$staff->id) }}" method="post">
                                @csrf

                                <input type="hidden" name="user_id" value="{{ $staff->id }}">
                                <input type="hidden" name="appraisal_id" value="{{ request()->segment(4) }}">

                                <button type="submit" class="btn btn-primary btn-sm"><span class="fa fa-check"></span>
                                    Score this Staff</button>
                                </form> --}}
                                @endif
                                @endhasrole


                                @if ($staffappraisalscore!=NULL)
                                <br>
                                @if ($staff->id==auth()->user()->id)
                                    
                                <a href="#" data-toggle="modal"
                                    data-target="#modal-{{ $staffappraisalscore->appraisal_id.'-'.$staffappraisalscore->user_id }}"
                                    class="btn btn-primary btn-sm"><span class="fa fa-eye"></span> Check Score</a>
                                @endif

                                {{-- appraisal score modal  --}}
                                <div class="modal fade"
                                    id="modal-{{ $staffappraisalscore->appraisal_id.'-'.$staffappraisalscore->user_id }}"
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
                                                        <div>

                                                            <table class="table table-light">
                                                                <thead class="thead-light">
                                                                    <tr>
                                                                        <th>Publication</th>
                                                                        <th>Production</th>
                                                                        <th>Admin. Responsibility</th>
                                                                        <th>Acad. Qualification</th>
                                                                        <th>Other Abilities</th>
                                                                        <th>Length of Service</th>
                                                                        <th>Total</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    <tr>
                                                                        <td>{{ $staffappraisalscore->publicationscore }}
                                                                        </td>
                                                                        <td>{{ $staffappraisalscore->productionscore }}
                                                                        </td>
                                                                        <td>{{ $staffappraisalscore->adminresponscore }}
                                                                        </td>
                                                                        <td>{{ $staffappraisalscore->qualificationscore }}
                                                                        </td>
                                                                        <td>{{ $staffappraisalscore->abilityscore }}
                                                                        </td>
                                                                        <td>{{ $staffappraisalscore->servicelengthscore }}
                                                                        </td>
                                                                        <td>
                                                                            @if ($staffappraisalscore->totalscore>50)
                                                                            <span class="badge badge-pill badge-success"
                                                                                style="color:white;background:green;">{{ $staffappraisalscore->totalscore }}</span>
                                                                            @else
                                                                            <span class="badge badge-pill badge-success"
                                                                                style="color:white;background:red;">{{ $staffappraisalscore->totalscore }}</span>
                                                                            @endif


                                                                        </td>
                                                                    </tr>

                                                                </tbody>

                                                            </table>
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

                                                            <form action="{{ route('appraisalscore.acceptorreject',[$staffappraisalscore->appraisal_id,$staffappraisalscore->user_id]) }}" method="post">
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

                            @endif
                        </div>

                        @endforeach

                        {{-- @endforeach --}}



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