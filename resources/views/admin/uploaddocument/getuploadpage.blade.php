@extends('admin.layout.app')

@section('title')
Document Uploading Page
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

                        Dear <strong>{{ $user->title->name.' '. $user->firstname.' '.$user->lastname }}</strong>,<br>
                        Thank you for submitting your appraisal form. Kindly click on the <strong>browse</strong>
                        button and select all your documents needed for this appraisal and click the
                        <strong>Upload</strong> button.

                        <br>
                        <div class="panel">
                            <div class="panel-body">
                                <form action="{{ route('upload.appraisal.docs') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="appraisal_id" value="{{ $appraisal_id }}">
                                    <div>
                                        <h4 style="color: red"><small>Kindly click on the browse button below and select
                                                all the documents (PDF) you wish to upload.</small></h4>
                                        <p>
                                            <input type="file" name="appraisaldocument[]" multiple required>
                                        </p>
                                        
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">Upload</button>

                                </form>
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