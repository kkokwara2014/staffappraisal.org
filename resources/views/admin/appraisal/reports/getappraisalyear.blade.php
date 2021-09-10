@extends('admin.layout.app')

@section('title')
Select Appraisal Year
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

                        <h3>Select Appraisal Year to generate Report</h3>

                        <p>
                            @include('admin.messages.deleted')
                        </p>

                        <div class="row">
                            <div class="col-md-7">


                                <form action="{{ route('getyearlyappraisal.report') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>Appraisal Year <strong style="color:red;">*</strong></label>
                                        <select name="appraisalyear" class="form-control" required>
                                            <option selected="disabled">Select Appraisal Year</option>
                                            @foreach ($appraisalyears as $appyear)
                                            <option value="{{$appyear}}">{{$appyear}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <a href="{{ route('appraisal.reports') }}" class="btn btn-danger btn-sm">Cancel</a>
                                    <button class="btn btn-primary btn-sm" type="submit">Get Report</button>

                                </form>

                                <br>
                                
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

