@extends('admin.layout.app')

@section('title')
Staff Appraisal Report for {{ $appyear }}
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

                <p>
                    <a href="{{ route('getappraisal.year') }}" class="btn btn-sm btn-success">Generate Yearly Appraisal
                        Report</a>
                    <a href="{{ route('printyearlyappraisal.report',$appyear) }}" class="btn btn-sm btn-primary btnprnt"
                        style="float: right"><span class="fa fa-print"></span> Print Report</a>
                </p>

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                        <table class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>Staff Name</th>
                                    <th>DOB</th>
                                    <th>Qualification</th>
                                    <th>Assump. Date</th>
                                    <th>Confirm. Date</th>
                                    <th>Post on Appt.</th>
                                    <th>Present Post</th>
                                    <th>Perf. Rating</th>
                                    <th>HOD Recom.</th>
                                    <th>Div. Comm. Recom.</th>
                                    <th>Mgt. Recom.</th>
                                    <th>SSA & PC Recom.</th>
                                    <th>Expd. Mgt. Recom.</th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($appraisalreports as $rpt)
                                <tr>
                                    <td>{{$rpt->user->title->title.' '.$rpt->user->firstname.' '.$rpt->user->lastname}}
                                    </td>
                                    <td>{{date('d M, Y',strtotime($rpt->user->dob))}}</td>
                                    <td>
                                        @if ($rpt->user->category_id==2 || $rpt->user->category_id==3)
                                        @foreach ($qualifications as $qualif)
                                        @if (($qualif->user_id == $rpt->user_id ))
                                        {{$qualif->qualname.', '.date('Y',strtotime($qualif->dateofgrad)).'; '}}
                                        @endif
                                        @endforeach
                                        @else
                                        @foreach ($juniorqualifications as $qualif)
                                        @if (($qualif->user_id == $rpt->user_id ))
                                        {{$qualif->qualification.', '.date('Y',strtotime($qualif->dateobtained)).'; '}}
                                        @endif
                                        @endforeach
                                        @endif
                                    </td>
                                    <td>{{date('d M, Y',strtotime($rpt->user->assumptiondate))}}</td>
                                    <td>
                                        @if ($rpt->user->confirmationdate==NULL)
                                        <span>None</span>
                                        @else
                                        {{date('d M, Y',strtotime($rpt->user->confirmationdate))}}
                                        @endif
                                    </td>
                                    <td>{{$rpt->user->firstassumptionstatus}}</td>
                                    <td>{{$rpt->salaryscale->presentpost!=''?$rpt->salaryscale->presentpost:'N/A'}}</td>
                                    <td>
                                        @if ($rpt->appraisalscore->totalscore!='')
                                            {{--  @if ($rpt->appraisalscore->totalscore>=50)
                                            <span class="badge badge-pill badge-success"
                                                style="color:white;background:green;">{{ $rpt->appraisalscore->totalscore }}</span>
                                            @else
                                            <span class="badge badge-pill badge-success"
                                                style="color:white;background:red;">{{ $rpt->appraisalscore->totalscore }}</span>
                                            @endif  --}}
                                            <span style="font-size:20px; font-weight:bold;">{{$rpt->appraisalscore->totalscore}}</span>
                                        @endif
                                        
                                    </td>
                                    <td>{{ $rpt->appraisalscore->recommendation!=''? $rpt->appraisalscore->recommendation:'Nill' }}</td>
                                    <td>{{ $rpt->appraisalscore->schboardrecomm!=''? $rpt->appraisalscore->schboardrecomm :'Nill' }}</td>
                                    <td>{{ $rpt->appraisalscore->managementrecomm!=''? $rpt->appraisalscore->managementrecomm:'Nill' }}</td>
                                    <td>{{ $rpt->appraisalscore->ssapcrecomm!=''? $rpt->appraisalscore->ssapcrecomm:'Nill' }}</td>                                    
                                    <td>{{ $rpt->appraisalscore->councilrecomm!=''? $rpt->appraisalscore->councilrecomm:'Nill' }}</td>                                    
                                </tr>

                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Staff Name</th>
                                    <th>DOB</th>
                                    <th>Qualification</th>
                                    <th>Assump. Date</th>
                                    <th>Confirm. Date</th>
                                    <th>Post on Appt.</th>
                                    <th>Present Post</th>
                                    <th>Perf. Rating</th>
                                    <th>HOD Recom.</th>
                                    <th>Div. Comm. Recom.</th>
                                    <th>Mgt. Recom.</th>
                                    <th>SSA & PC Recom.</th>
                                    <th>Expd. Mgt. Recom.</th>

                                </tr>
                            </tfoot>
                        </table>
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