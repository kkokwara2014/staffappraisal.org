@extends('admin.layout.app')

@section('title')
{{ $department->name }} Staff 
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <p>
            <a href="{{ route('staffsbydept') }}" class="btn btn-success btn-sm">
                Back</a>
        </p>
        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-12">

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
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>More Details</th>
                                                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($staffs as $staff)
        
                                        @if ($staff->department_id==$department->id)
                                        <tr>
                                            <td>
                                                <img src="{{url('user_images',$staff->userimage)}}" alt="" class="img-responsive"
                                    width="40" height="40" style="border-radius: 50%">
                                            </td>
                                            <td>{{$staff->lastname}}</td>
                                            <td>{{$staff->firstname}}</td>
                                            <td>{{$staff->staffnumb}}</td>
                                            <td>{{$staff->email}}</td>
                                            <td>{{$staff->phone}}</td>
                                            <td><a href="{{ route('staffs.show',$staff->id) }}"><span
                                                        class="fa fa-eye fa-2x text-primary"></span></a>
                                            </td>                                          
                                            
                                        </tr>                                                                                   
                                        @endif
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Image</th>
                                            <th>Surname</th>
                                            <th>First Name</th>
                                            <th>Staff ID.</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>More Details</th>
                                                                                       
                                        </tr>
                                    </tfoot>
                                </table>
                                

                            </div>
                        </div>

                    </div>
                    
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