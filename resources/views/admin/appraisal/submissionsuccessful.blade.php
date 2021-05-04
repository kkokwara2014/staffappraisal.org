@extends('admin.layout.app')

@section('title')
Thank you
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

                        Dear {{ $user->title->name.' '. $user->firstname.' '.$user->lastname }},<br>
                        Thank you for submitting your appraisal form. Your Appraiser has been notified.

                        You may check your submitted appraisal <a href="{{ route('submitted.appraisals') }}">here</a>.
                        
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