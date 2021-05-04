@extends('admin.layout.app')

@section('title')
Edit Department
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <a href="{{ route('departments.index') }}" class="btn btn-success btn-sm">
            <span class="fa fa-eye"></span> All Departments
        </a>
        <br><br>

        <div class="row">
            <div class="col-md-6">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                        <form action="{{ route('departments.update',$dept->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Name *</label>
                                <input type="text"
                                    class="form-control form-control-sm{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                    name="name" value="{{ $dept->name }}" placeholder="Department/Unit Name e.g. Computer Science"
                                    autofocus>
            
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <span
                                        style="color: red">{{ $errors->first('name','Enter Department/Unit name') }}</span>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Code *</label>
                                <input type="text"
                                    class="form-control form-control-sm{{ $errors->has('code') ? ' is-invalid' : '' }}"
                                    name="code" value="{{ $dept->code }}" placeholder="Department/Unit Code e.g. CSC"
                                    autofocus pattern="[A-za-z]+" maxlength="5">
            
                                @if ($errors->has('code'))
                                <span class="invalid-feedback" role="alert">
                                    <span
                                        style="color: red">{{ $errors->first('code','Enter Department/Unit code') }}</span>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">School *</label>
                                <select name="school_id" class="form-control form-control-sm" autofocus>
                                    <option selected="disabled">Select School</option>
                                    @foreach ($schools as $school)
                                    <option value="{{$school->id}}" {{$school->id==$dept->school_id ? 'selected':''}}>{{$school->name}}
                                    </option>
                                    @endforeach

                                </select>
                            </div>
            
                            <a href="{{ route('departments.index') }}" class="btn btn-danger btn-sm">Cancel</a>
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
            
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
