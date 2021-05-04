@extends('admin.layout.app')

@section('title')
My Appraisals
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">

        <div class="row">
            <div class="col-md-7">

                @include('admin.messages.success')

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="list-group">
                            @foreach ($myappraisals as $myapprais)
                            {{-- @if () --}}
                            <a href="{{ route('myappraisal.show',$myapprais->id) }}">
                                <li class="list-group-item mb-2">{{ $myapprais->title }}</li>
                            </a>
                                
                            {{-- @endif --}}
                            @endforeach
                            
                        </ul>


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