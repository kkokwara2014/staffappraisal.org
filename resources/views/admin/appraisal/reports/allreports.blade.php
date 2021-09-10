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
                                    <td>{{$rpt->user->dob}}</td>
                                    <td>{{$rpt->qualification->qualname.', '.date('Y',strtotime($rpt->qualification->dateofgrad))}}
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

