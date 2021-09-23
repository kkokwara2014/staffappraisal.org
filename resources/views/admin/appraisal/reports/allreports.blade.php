@extends('admin.layout.app')

@section('title')
Appraisal Reports
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
                </p>

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                        <table id="example1" class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>Staff Name</th>
                                    <th>DOB</th>
                                    <th>Qualification</th>
                                    <th>Assump. Date</th>
                                    <th>Confirm. Date</th>
                                    <th>Post on Appt.</th>
                                    <th>Print</th>
                                   
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($allreports as $rpt)
                                <tr>
                                    <td>{{$rpt->user->firstname.' '.$rpt->user->lastname}}</td>
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
                                    <td>
                                        <a href="{{ route('print.report',$rpt->id) }}" class="btn btn-primary btn-sm btn-block btnprnt"><span class="fa fa-print"></span>
                                            Print Appraisal</a>
                                    </td>                                    
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
                                    <th>Post on Appointment</th>
                                    <th>Print</th>

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

