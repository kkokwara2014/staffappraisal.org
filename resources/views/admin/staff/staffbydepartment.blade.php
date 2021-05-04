@extends('admin.layout.app')

@section('title')
Staff By Department
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

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                        {{ $departments->links() }}
                        <div class="panel-group" id="accordion">
                            @foreach ($departments as $dept)
                            
                            <div class="panel panel-default">

                                <a href="{{ route('departmentalstaff',$dept->id) }}">
                                    <div class="panel-body"> 
                                        {{ $dept->name }} <small>[{{ $dept->school->name }}]</small>
                                    </div>
                                </a>
                               
                            </div>
                            @endforeach
                        </div>
                        {{ $departments->links() }}

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