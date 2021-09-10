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
                    <a href="{{ route('getappraisal.year') }}" class="btn btn-sm btn-success">Generate Yearly Appraisal Report</a>
                    <a href="{{ route('printyearlyappraisal.report',$appyear) }}" class="btn btn-sm btn-primary btnprnt" style="float: right"><span class="fa fa-print"></span> Print Report</a>
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
                                    <td>{{$rpt->user->title->title.' '.$rpt->user->firstname.' '.$rpt->user->lastname}}</td>
                                    <td>{{$rpt->user->dob}}</td>
                                    <td>
                                        {{$rpt->qualification->qualname.', '.date('Y',strtotime($rpt->qualification->dateofgrad))}}
                                    </td>
                                    <td>{{$rpt->user->assumptiondate}}</td>
                                    <td>
                                        @if ($rpt->user->confirmationdate==NULL)
                                            <span>None</span>
                                        @else
                                            {{$rpt->user->confirmationdate}}
                                        @endif
                                    </td>
                                    <td>{{$rpt->user->firstassumptionstatus}}</td>                                    
                                    <td>{{$rpt->salaryscale->presentpost}}</td>                                    
                                    <td>
                                        @if ($rpt->appraisalscore->totalscore>=50)
                                        <span class="badge badge-pill badge-success"
                                        style="color:white;background:green;">{{ $rpt->appraisalscore->totalscore }}</span>
                                        @else
                                        <span class="badge badge-pill badge-success"
                                        style="color:white;background:red;">{{ $rpt->appraisalscore->totalscore }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $rpt->appraisalscore->recommendation }}</td>                                    
                                    <td>Nil</td>                                    
                                    <td>Nil</td>                                    
                                    <td>Nil</td>                                    
                                    <td>Nil</td>                                    

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

