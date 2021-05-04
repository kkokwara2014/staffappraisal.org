@extends('admin.layout.app')

@section('title')
Create Appraisal
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <p>
        @hasrole(['Admin','Registrar'])
            <a href="{{ route('appraisals.index') }}" class="btn btn-success btn-sm">
                <span class="fa fa-eye"></span> All Appraisals
            </a>
        @endhasrole
        </p>

        <div class="row">
            <div class="col-md-6">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        
                        @foreach ($appraisals as $appraisal)
                        
                        @hasrole(['Admin','Registrar'])
                        <small><a href="{{ route('appraisal.unpublish',$appraisal->id) }}">Unpublish {{ $appraisal->title }}</a></small>
                        @endhasrole
                        
                        <h5>
                        {{ $appraisal->title }}  
                          <small>
                              <a href="{{ route('appraisalform',$appraisal->id) }}">Fill Appraisal Form</a>
                          </small>
                        </h5> 
                                    
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