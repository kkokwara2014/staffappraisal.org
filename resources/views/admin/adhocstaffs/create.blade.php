@extends('admin.layout.app')

@section('title')
Create Adhoc Staff
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <p>
            <a href="{{ route('adhocstaffs.index') }}" class="btn btn-success btn-sm"><span class="fa fa-eye"></span> All
                Adhoc Staff</a>
        </p>

        <div class="row">
            <div class="col-md-10">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('createnew.adhocstaff') }}" method="post">
                            {{ csrf_field() }}
                                                              
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name <strong style="color: red">*</strong></label>
                                                <input id="lastname" type="text"
                                                    class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}"
                                                    name="lastname" value="{{ old('lastname') }}"  autofocus
                                                    placeholder="Last Name">

                                                @if ($errors->has('lastname'))
                                                <span style="color:red;" class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('lastname') }}</strong>
                                                </span>
                                                @endif

                                            </div>
                                            <div class="form-group">
                                                <label>Middle Name (Optional)</label>
                                                <input id="middlename" type="text" class="form-control"
                                                    name="middlename" value="{{ old('middlename') }}"
                                                    placeholder="Middle Name">
                                            </div>
                                            <div class="form-group">
                                                <label>First Name <strong style="color: red">*</strong></label>
                                                <input id="firstname" type="text"
                                                    class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                                                    name="firstname" value="{{ old('firstname') }}"  autofocus
                                                    placeholder="First Name">

                                                @if ($errors->has('firstname'))
                                                <span style="color:red;" class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('firstname') }}</strong>
                                                </span>
                                                @endif

                                            </div>                       

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Staff Number <strong style="color: red">*</strong></label>
                                                <input id="staffnumb" type="text"
                                                    class="form-control{{ $errors->has('staffnumb') ? ' is-invalid' : '' }}"
                                                    name="staffnumb" value="{{ old('staffnumb') }}"  placeholder="Staff number e.g. SS-00755"
                                                    maxlength="8">

                                                @if ($errors->has('staffnumb'))
                                                <span style="color:red;" class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('staffnumb') }}</strong>
                                                </span>
                                                @endif
                                            </div>    
                                        <div class="form-group">
                                                <label>Email Address <strong style="color: red">*</strong></label>
                                                <input id="email" type="email"
                                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                    name="email" value="{{ old('email') }}"  autofocus
                                                    placeholder="Email">

                                                @if ($errors->has('email'))
                                                <span style="color:red;" class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Phone Number <strong style="color: red">*</strong></label>
                                                <input id="phone" type="tel"
                                                    class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                    name="phone" value="{{ old('phone') }}"  placeholder="Phone"
                                                    maxlength="11" pattern="[0-9]+">

                                                @if ($errors->has('phone'))
                                                <span style="color:red;" class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            
                                        </div>
                                    </div>
                                                            
                            <a href="{{ route('staffs.index') }}" class="btn btn-danger btn-sm">Cancel</a>
                            <button type="submit" class="btn btn-primary btn-sm"><span class="fa fa-floppy-o"></span> Save</button>
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