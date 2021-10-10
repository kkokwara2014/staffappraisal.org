@extends('admin.layout.app')

@section('title')
My Department
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        
        <div class="row">
            <div class="col-md-8">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="panel-group" id="accordion">                   
                                    <div class="panel panel-default">
                                        <a href="{{ route('mydepartmental.staff',$userdepartment->department_id) }}" title="Click to see Departmental Staff">
                                            <div class="panel-body"> 
                                                {{ $userdepartment->department->name }}
                                            </div>
                                        </a>
                                    </div>
                        </div>

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