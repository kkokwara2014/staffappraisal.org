@extends('admin.layout.app')

@section('title')
 Submitted Appraisals
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
                                    <th>Appraisal Year</th>
                                    <th>Staff ID.</th>
                                    <th>Staff Name</th>
                                    <th>Phone</th>
                                    <th>Dept/School or Unit</th>
                                    <th>View Details</th>                                   
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($submittedappraisals as $subapp)
                                @if ($subapp->user_id==Auth::user()->id || Auth::user()->hasAnyRole(['Admin','Rector','Registrar']))
                                <tr>
                                    
                                    <td>{{$subapp->appraisal->title}}</td>
                                    <td>{{$subapp->user->staffnumb}}</td>
                                    <td>{{$subapp->user->firstname.' '.$subapp->user->lastname}}</td>
                                    <td>{{$subapp->user->phone}}</td>
                                    <td>
                                        @if ($subapp->user->department->id!=1)
                                        {{$subapp->user->department->name}} <small>[{{ $subapp->user->school->name }}]</small>
                                        @else

                                        <span class="badge badge-pill badge-danger" style="background-color: red; color: seashell">Staff needs to update profile!</span>
                                            
                                        @endif
                                    </td>
                                    <td><a href="{{ route('staffs.show',$subapp->user_id) }}"><span
                                                class="fa fa-eye fa-2x text-primary"></span></a></td>
                                    
                                   
                                     <td>
                                          <div class="dropdown"> <button type="button"
                                                class="btn btn-primary btn-sm dropdown-toggle" id="dropdownMenu1"
                                                data-toggle="dropdown"> Action &nbsp;&nbsp;<span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">

                                            

                                                <form id="remove-{{$subapp->id}}" style="display: none"
                                                    action="{{ route('delete.submitted.appraisal',$subapp->id) }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{method_field('DELETE')}}
                                                </form>

                                                <li role="presentation">
                                                    <a role="menuitem" tabindex="-1" href="" onclick="
                                                                if (confirm('Delete this?')) {
                                                                    event.preventDefault();
                                                                document.getElementById('remove-{{$subapp->id}}').submit();
                                                                } else {
                                                                    event.preventDefault();
                                                                }
                                                            "><span class="fa fa-trash-o"></span>
                                                        Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                  
                                </tr>
                                    
                                @endif

                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Appraisal Year</th>
                                    <th>Staff ID.</th>
                                    <th>Staff Name</th>
                                    <th>Phone</th>
                                    <th>Dept/School or Unit</th>
                                    <th>View Details</th>                                   
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
