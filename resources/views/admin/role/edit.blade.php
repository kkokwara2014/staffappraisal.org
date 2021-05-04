@extends('admin.layout.app')

@section('title')
Edit Role
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <a href="{{ route('roles.index') }}" class="btn btn-success btn-sm">
            <span class="fa fa-eye"></span> All Roles
        </a>
        <br><br>

        <div class="row">
            <div class="col-md-6">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                        <form action="{{ route('roles.update',$role->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Name *</label>
                                <input type="text"
                                    class="form-control form-control-sm{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                    name="name" value="{{ $role->name }}" placeholder="Role Name e.g. HOD"
                                    autofocus>
            
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <span
                                        style="color: red">{{ $errors->first('name','Enter Role name') }}</span>
                                </span>
                                @endif
                            </div>
                            
                            
                            <a href="{{ route('roles.index') }}" class="btn btn-danger btn-sm">Cancel</a>
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
