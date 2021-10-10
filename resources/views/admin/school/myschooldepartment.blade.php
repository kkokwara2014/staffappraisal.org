@extends('admin.layout.app')

@section('title')
My School Department(s)
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

                <p>
                    <span class="badge badge-pill" style="background-color: green; color: honeydew; font-size: 21px">Num. of Departments : {{ $myschooldepartmentcount }}</span>
                </p>

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                        @foreach ($myschooldepartments as $schooldepartment)
                            <div class="panel-group" id="accordion">                   
                                <div class="panel panel-default">
                                    <a href="{{ route('myschool.staffs',$schooldepartment->id) }}" title="Click to see Staff">
                                        <div class="panel-body"> 
                                            {{ $schooldepartment->name }}
                                        </div>
                                    </a>
                                 </div>
                            </div>
                        @endforeach

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