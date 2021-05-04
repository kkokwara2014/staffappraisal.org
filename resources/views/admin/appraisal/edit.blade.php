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
        <p>
           <a href="{{ route('appraisals.index') }}" class="btn btn-success btn-sm">
               <span class="fa fa-eye"></span> All Appraisals
           </a>
       </p>

        <div class="row">
            <div class="col-md-6">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                        <form action="{{ route('appraisals.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Title *</label>
                                <input type="text"
                                    class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                    name="title" value="{{ old('title') }}" placeholder="Appraisal Title"
                                    autofocus>
            
                                @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <span
                                        style="color: red">{{ $errors->first('title') }}</span>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Starting Period *</label>
                                <input type="date"
                                    class="form-control{{ $errors->has('starting') ? ' is-invalid' : '' }}"
                                    name="starting" value="{{ old('starting') }}"
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
                                <input type="date"
                                    class="form-control{{ $errors->has('ending') ? ' is-invalid' : '' }}"
                                    name="ending" value="{{ old('ending') }}"
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
