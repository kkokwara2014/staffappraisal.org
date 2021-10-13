@extends('admin.layout.app')

@section('title')
 Scored Appraisals by Dean
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
                                    
                                    <th>Staff Name</th>
                                    <th>Phone</th>
                                    <th>Dept/Unit</th>
                                    <th>Submitted on</th>
                                    <th>View Details</th>                                   
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($deanscoredappraisals as $subapp)
                                @if ($subapp->user_id==auth()->user()->id || auth()->user()->hasAnyRole(['Dean']) || auth()->user()->hasAnyRole(['Director']) || auth()->user()->hasAnyRole(['Admin']) ||auth()->user()->hasAnyRole(['Rector']) || auth()->user()->hasAnyRole(['Registrar']) || auth()->user()->hasAnyRole(['Management']) || $subapp->sentto_id==auth()->user()->id)
                                <tr>
                                    
                                    <td>{{$subapp->appraisal->title}}</td>
                                    
                                    <td>{{$subapp->user->firstname.' '.$subapp->user->lastname}} <small style="color: red">[{{$subapp->user->staffnumb}}]</small></td>
                                    <td><a href="tel:{{$subapp->user->phone}}" title="Tap to Call">{{$subapp->user->phone}}</a></td>
                                    <td>
                                        @if ($subapp->user->department->id!=1)
                                        {{$subapp->user->department->name}}
                                        @else

                                        <span class="badge badge-pill badge-danger" style="background-color: red; color: seashell">Staff needs to update profile!</span>
                                            
                                        @endif
                                    </td>
                                    <td>
                                        {{ $subapp->created_at }}
                                    </td>
                                    <td><a href="{{ route('staffs.show',$subapp->user_id) }}"><span
                                                class="fa fa-eye fa-2x text-primary"></span></a></td>
                                    
                                   
                                     
                                  
                                </tr>
                                    
                                @endif

                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Appraisal Year</th>
                                    <th>Staff Name</th>
                                    <th>Phone</th>
                                    <th>Dept/Unit</th>
                                    <th>Submitted on</th>
                                    <th>View Details</th>                                   
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
