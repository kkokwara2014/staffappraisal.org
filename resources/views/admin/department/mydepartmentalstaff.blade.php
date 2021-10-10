@extends('admin.layout.app')

@section('title')
 My Departmental Staff
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
                @include('admin.messages.deleted')
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-responsive table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Surname</th>
                                    <th>First Name</th>
                                    <th>Staff ID.</th>
                                    <th>Phone</th>
                                    
                                    <th>View Details</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($staffLists as $staff) --}}

                                @foreach ($mydepartmentalstaffs as $staff)
                                <tr>
                                    <td>
                                        <img src="{{url('user_images',$staff->userimage)}}" alt="" class="img-responsive"
                                        width="40" height="40" style="border-radius: 50%">
                                    </td>
                                    <td>{{$staff->lastname}}</td>
                                    <td>{{$staff->firstname}}</td>
                                    <td>{{$staff->staffnumb}}</td>
                                    <td><a href="tel:{{$staff->phone}}" title="Tap to Call">{{$staff->phone}}</a></td>
                                    
                                    <td><a href="{{ route('staffs.show',$staff->id) }}"><span
                                                class="fa fa-eye fa-2x text-primary"></span></a></td>
                                    <td>
                                        @if ($staff->isactive==1)
                                        <span class="fa fa-check-circle fa-2x text-success"></span>
                                        @else
                                        <span class="fa fa-close fa-2x text-danger"></span>
                                        @endif

                                    </td>
                                   
                                </tr>
                                                               
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Image</th>
                                    <th>Surname</th>
                                    <th>First Name</th>
                                    <th>Staff ID.</th>
                                    <th>Phone</th>
                                    
                                    <th>View Details</th>
                                    <th>Status</th>
                                    
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
