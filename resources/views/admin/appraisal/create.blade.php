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

        <div class="row">
            <div class="col-md-8">
                @hasrole(['Admin','Registrar'])
                <p>
                    <a href="{{ route('appraisals.index') }}" class="btn btn-success btn-sm">
                        <span class="fa fa-eye"></span> All Appraisals
                    </a>
                </p>
                @endhasrole

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                        @hasrole(['Admin','Registrar'])

                        <form action="{{ route('appraisals.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Title *</label>
                                <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                    name="title" value="{{ old('title') }}" placeholder="Appraisal Title" autofocus>

                                @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <span style="color: red">{{ $errors->first('title') }}</span>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Appraisal Year *</label>
                                <input type="text" id="datepicker5" class="form-control{{ $errors->has('appraisalyear') ? ' is-invalid' : '' }}"
                                    name="appraisalyear" value="{{ old('appraisalyear') }}" placeholder="Appraisal Year" required>

                                @if ($errors->has('appraisalyear'))
                                <span class="invalid-feedback" role="alert">
                                    <span style="color: red">{{ $errors->first('appraisalyear') }}</span>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Starting Period *</label>
                                <input type="text" id="datepicker"
                                    class="form-control{{ $errors->has('starting') ? ' is-invalid' : '' }}"
                                    name="starting" value="{{ old('starting') }}" placeholder="Starting Date">

                                @if ($errors->has('starting'))
                                <span class="invalid-feedback" role="alert">
                                    <span style="color: red">{{ $errors->first('starting') }}</span>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Ending Period *</label>
                                <input type="text" id="datepicker1"
                                    class="form-control{{ $errors->has('ending') ? ' is-invalid' : '' }}" name="ending"
                                    value="{{ old('ending') }}" placeholder="Ending Date">

                                @if ($errors->has('ending'))
                                <span class="invalid-feedback" role="alert">
                                    <span style="color: red">{{ $errors->first('ending') }}</span>
                                </span>
                                @endif
                            </div>

                            <button type="reset" class="btn btn-danger btn-sm">Cancel</button>
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>

                        </form>

                        @else
                        <h3><span class="fa fa-exclamation-triangle" style="color:red"></span> You are not Authorized to
                            perform this task!</h3>
                        @endhasrole



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