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
            @if (auth()->user()->hasAnyRole(['Admin'])||auth()->user()->hasAnyRole(['Registrar']))
            <a href="{{ route('appraisals.index') }}" class="btn btn-success btn-sm">
                <span class="fa fa-eye"></span> All Appraisals
            </a>

            @endif

            {{-- @hasrole(['Admin','Registrar'])
            <a href="{{ route('appraisals.index') }}" class="btn btn-success btn-sm">
                <span class="fa fa-eye"></span> All Appraisals
            </a>
            @endhasrole --}}
        </p>

        <div class="row">
            <div class="col-md-8">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                        @foreach ($appraisals as $appraisal)

                        @if (Auth::user()->hasAnyRole(['Admin'])||Auth::user()->hasAnyRole(['Registrar']))
                        <small><a href="{{ route('appraisal.unpublish',$appraisal->id) }}">Unpublish
                                {{ $appraisal->title }}</a></small>
                            
                        @endif

                        {{-- @hasrole(['Admin','Registrar'])
                        <small><a href="{{ route('appraisal.unpublish',$appraisal->id) }}">Unpublish
                                {{ $appraisal->title }}</a></small>
                        @endhasrole --}}


                        <h5>

                            {{ $appraisal->title }}

                            @if (date('Y-m-d') > $appraisal->ending )
                            <small>
                                &nbsp; &nbsp; &nbsp;
                                <span style="color: red">
                                    Closed on {{ date('d M, Y',strtotime($appraisal->ending)) }}
                                </span>
                            </small>

                            @else

                            <small>
                                
                                <a href="{{ route('appraisalform',$appraisal->slug) }}">Fill Appraisal Form</a> 
                               
                                &nbsp; &nbsp; &nbsp;
                                <span style="color: red">
                                    Open from {{ date('d M, Y',strtotime($appraisal->starting)) }} to
                                    {{ date('d M, Y',strtotime($appraisal->ending)) }}
                                </span>
                                
                            </small>

                            @endif
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