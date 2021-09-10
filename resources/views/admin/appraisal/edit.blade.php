@extends('admin.layout.app')

@section('title')
Edit Appraisal
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
                    <a href="{{ route('appraisals.index') }}" class="btn btn-success btn-sm">
                        <span class="fa fa-eye"></span> All Appraisals
                    </a>
                </p>
                

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                        <form action="{{ route('appraisals.update',$appraisal->id) }}" method="post">
                            @csrf
                            @method('put')
                            
                            <div class="form-group">
                                <label for="">Title *</label>
                                <input type="text"
                                    class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                    name="title" value="{{ $appraisal->title }}" placeholder="Appraisal Title"
                                    autofocus>
            
                                @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <span
                                        style="color: red">{{ $errors->first('title') }}</span>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Appraisal Year *</label>
                                <input type="text" id="datepicker5" class="form-control{{ $errors->has('appraisalyear') ? ' is-invalid' : '' }}"
                                    name="appraisalyear" value="{{ $appraisal->appraisalyear }}" placeholder="Appraisal Year" required>

                                @if ($errors->has('appraisalyear'))
                                <span class="invalid-feedback" role="alert">
                                    <span style="color: red">{{ $errors->first('appraisalyear') }}</span>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Starting Period *</label>
                                <input type="text" id="datepicker3"
                                    class="form-control{{ $errors->has('starting') ? ' is-invalid' : '' }}"
                                    name="starting" value="{{ $appraisal->starting }}"
                                    autofocus>
            
                                @if ($errors->has('starting'))
                                <span class="invalid-feedback" role="alert">
                                    <span
                                        style="color: red">{{ $errors->first('starting') }}</span>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Ending Period *</label>
                                <input type="text" id="datepicker4"
                                    class="form-control{{ $errors->has('ending') ? ' is-invalid' : '' }}"
                                    name="ending" value="{{ $appraisal->ending }}"
                                    autofocus>
            
                                @if ($errors->has('ending'))
                                <span class="invalid-feedback" role="alert">
                                    <span
                                        style="color: red">{{ $errors->first('ending') }}</span>
                                </span>
                                @endif
                            </div>

                            <button type="reset" class="btn btn-danger btn-sm">Cancel</button>
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>

                          </form>
                        
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