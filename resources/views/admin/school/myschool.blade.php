@extends('admin.layout.app')

@section('title')
My School Staff
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
                                <a href="{{ route('myschool.departments',$userschool->school_id) }}" title="Click to see Departments">
                                    <div class="panel-body"> 
                                        {{ $userschool->school->name }}
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