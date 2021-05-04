@extends('admin.layout.app')

@section('title')
My Appraisals
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
                                @foreach ($staffs as $staff)
                                @foreach ($qualifications as $qualif)
                                <div>
                                    @if ($qualif->user_id==$staff->id)
                                    <tr>
                                        <td>{{ $qualif->qualname }}</td>
                                        <td>{{ $qualif->awardinginst }}</td>
                                        <td>{{ $qualif->dateofgrad }}</td>
                                        {{-- <td>
                                            <a href="{{route('download.qualification', $qualif->qualifilename )}}"
                                                download="{{ $qualif->qualifilename }}"><span style="color: red" class="fa fa-file-pdf-o"></span> <span class="fa fa-download"></span> </a>
                                        </td> --}}
                                    </tr>
        
                                    @endif
                                </div>
                                @endforeach
                                @endforeach
                                                                
                            </tbody>
                        </table>
                       
                        <hr>
                        <h4>Professional Membership</h4>
                        <table class="table table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>Honour</th>
                                    <th>Institution</th>
                                    <th>Acronym</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($staffs as $staff)
                                @foreach ($profmemberships as $profmemb)
                                <div>
                                    @if ($profmemb->user_id==$staff->id)
                                    <tr>
                                        <td>{{ $profmemb->honour }}</td>
                                        <td>{{ $profmemb->award }}</td>
                                        <td>{{ $profmemb->member }}</td>
                                        
                                    </tr>
        
                                    @endif
                                </div>
                                @endforeach
                                @endforeach
                                                                
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
                                @foreach ($staffs as $staff)
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
                                @endforeach
                                                                
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
                                @foreach ($staffs as $staff)
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
                                @endforeach
                                                                
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
                                @foreach ($staffs as $staff)
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
                                @endforeach
                                                                
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
                                @foreach ($staffs as $staff)
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
                                @endforeach
                                                                
                            </tbody>
                        </table>
                        <hr>
                        <h4>Duties Performed</h4>
                        @foreach ($staffs as $staff)
                        @foreach ($performedduties as $perfduty)
                        <div>
                            @if ($perfduty->user_id==$staff->id)
                            <div>
                                {{ $perfduty->performedduty }}
                            </div>

                            @endif
                        </div>
                        @endforeach
                        @endforeach
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
                                @foreach ($staffs as $staff)
                                @foreach ($publications as $publi)
                                <div>
                                    @if ($publi->user_id==$staff->id)
                                    <tr>
                                        <td>{{ $publi->pubtype }}</td>
                                        <td>{{ $publi->title }}</td>
                                        <td>{{ $publi->yearofpub }}</td>
                                        {{-- <td>
                                            <a href="{{route('download.publication', $publi->pubfilename )}}"
                                                download="{{ $publi->pubfilename }}"><span style="color: red" class="fa fa-file-pdf-o"></span> <span class="fa fa-download"></span> </a>
                                        </td>                                     --}}
                                    </tr>
        
                                    @endif
                                </div>
                                @endforeach
                                @endforeach
                                                                
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
                                @foreach ($staffs as $staff)
                                @foreach ($productions as $prod)
                                <div>
                                    @if ($prod->user_id==$staff->id)
                                    <tr>
                                        <td>{{ $prod->prodtype }}</td>
                                        <td>{{ $prod->title }}</td>
                                        <td>{{ $prod->yearofprod }}</td>
                                        {{-- <td>
                                            <a href="{{route('download.production', $prod->prodfilename )}}"
                                                download="{{ $prod->prodfilename }}"><span style="color: red" class="fa fa-file-pdf-o"></span> <span class="fa fa-download"></span> </a>
                                        </td>                                     --}}
                                    </tr>
        
                                    @endif
                                </div>
                                @endforeach
                                @endforeach
                                                                
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
                                @foreach ($staffs as $staff)
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
                                @endforeach
                                                                
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
                                @foreach ($staffs as $staff)
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
                                @endforeach
                                                                
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
                                @foreach ($staffs as $staff)
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
                                @endforeach
                                                                
                            </tbody>
                        </table>
                        <hr>
                        <h4>Any Other Information</h4>
                        @foreach ($staffs as $staff)
                        @foreach ($anyotherinfos as $aoi)
                        <div>
                            @if ($aoi->user_id==$staff->id)
                            <div>
                                {{ $aoi->anyotherinfo }}
                            </div>

                            @endif
                        </div>
                        @endforeach
                        @endforeach
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