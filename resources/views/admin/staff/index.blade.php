@extends('admin.layout.app')

@section('title')
 All Staffs
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <p>
            <a href="{{ route('staffs.create') }}" class="btn btn-primary btn-sm">
                <span class="fa fa-plus"></span> Add Staff
            </a>
        </p>
        
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
                                    <th>Dept/School or Unit</th>
                                    <th>View Details</th>
                                    <th>Status</th>
                                   
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($staffs as $staff)

                                @if ($staff->creator_id==Auth::user()->id || Auth::user()->hasAnyRole(['Admin','Rector','Registrar']))

                                    
                                            <tr>
                                    <td>
                                        <img src="{{url('user_images',$staff->userimage)}}" alt="" class="img-responsive"
                                        width="40" height="40" style="border-radius: 50%">
                                    </td>
                                    <td>{{$staff->lastname}}</td>
                                    <td>{{$staff->firstname}}</td>
                                    <td>{{$staff->staffnumb}}</td>
                                    <td><a href="tel:{{$staff->phone}}" title="Tap to Call">{{$staff->phone}}</a></td>
                                    <td>
                                        @if ($staff->department->id!=1)
                                        {{$staff->department->name}} <small>[{{ $staff->school->name }}]</small>
                                        @else

                                        <span class="badge badge-pill badge-danger" style="background-color: red; color: seashell">Staff needs to update profile!</span>
                                            
                                        @endif
                                    </td>
                                    <td><a href="{{ route('staffs.show',$staff->id) }}"><span
                                                class="fa fa-eye fa-2x text-primary"></span></a></td>
                                    <td>
                                        @if ($staff->isactive==1)
                                        <span class="fa fa-check-circle fa-2x text-success"></span>
                                        @else
                                        <span class="fa fa-close fa-2x text-danger"></span>
                                        @endif

                                    </td>
                                   
                                     <td>
                                          <div class="dropdown"> <button type="button"
                                                class="btn btn-primary btn-sm dropdown-toggle" id="dropdownMenu1"
                                                data-toggle="dropdown"> Action &nbsp;&nbsp;<span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">

                                                @hasrole('Admin')
                                                @if ($staff->isactive==1)
                                                <form id="deact-{{$staff->id}}" style="display: none"
                                                    action="{{ route('staffs.deactivate',$staff->id) }}" method="post">
                                                    {{ csrf_field() }}
                                                </form>

                                                <li role="presentation">
                                                    <a role="menuitem" tabindex="-1" href="" onclick="
                                                                if (confirm('Ban this User?')) {
                                                                    event.preventDefault();
                                                                document.getElementById('deact-{{$staff->id}}').submit();
                                                                } else {
                                                                    event.preventDefault();
                                                                }
                                                            "><span class="fa fa-ban"></span>
                                                        Ban
                                                    </a>
                                                </li>

                                                @else
                                                <form id="act-{{$staff->id}}" style="display: none"
                                                    action="{{ route('staffs.activate',$staff->id) }}" method="post">
                                                    {{ csrf_field() }}
                                                </form>

                                                <li role="presentation">
                                                    <a role="menuitem" tabindex="-1" href="" onclick="
                                                                if (confirm('Activate this User?')) {
                                                                    event.preventDefault();
                                                                document.getElementById('act-{{$staff->id}}').submit();
                                                                } else {
                                                                    event.preventDefault();
                                                                }
                                                            "><span class="fa fa-check-circle"></span>
                                                        Activate
                                                    </a>
                                                </li>

                                                @endif
                                                @endhasrole

                                                @if ($staff->creator_id==Auth::user()->id || Auth::user()->hasAnyRole(['Admin']))
                                                <li role="presentation"> <a role="menuitem" tabindex="-1"
                                                        href="{{ route('staffs.edit',$staff->id) }}"><span
                                                            class="fa fa-pencil-square"></span> Edit</a> </li>

                                                <form id="remove-{{$staff->id}}" style="display: none"
                                                    action="{{ route('staffs.destroy',$staff->id) }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{method_field('DELETE')}}
                                                </form>

                                                <li role="presentation">
                                                    <a role="menuitem" tabindex="-1" href="" onclick="
                                                                if (confirm('Delete this?')) {
                                                                    event.preventDefault();
                                                                document.getElementById('remove-{{$staff->id}}').submit();
                                                                } else {
                                                                    event.preventDefault();
                                                                }
                                                            "><span class="fa fa-trash-o"></span>
                                                        Delete
                                                    </a>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
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
                                    <th>Phone</th>
                                    <th>Dept/School or Unit</th>
                                    <th>View Details</th>
                                    <th>Status</th>
                                    
                                    <th>Action</th>
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
