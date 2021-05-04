@extends('admin.layout.app')

@section('title')
 Create Admin
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        
        <div class="row">
            <div class="col-md-10">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                        <form action="{{ route('admins.store') }}" method="post">
                            {{ csrf_field() }}
        
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name <strong style="color: red">*</strong></label>
                                                <input id="lastname" type="text"
                                                    class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}"
                                                    name="lastname" value="{{ old('lastname') }}" required autofocus
                                                    placeholder="Last Name">
                
                                                @if ($errors->has('lastname'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('lastname') }}</strong>
                                                </span>
                                                @endif
                
                                            </div>
                                            <div class="form-group">
                                                <label>Middle Name (Optional)</label>
                                                <input id="middlename" type="text"
                                                    class="form-control"
                                                    name="middlename" value="{{ old('middlename') }}"
                                                    placeholder="Middle Name">
                                            </div>
                                            <div class="form-group">
                                                <label>First Name <strong style="color: red">*</strong></label>
                                                <input id="firstname" type="text"
                                                    class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                                                    name="firstname" value="{{ old('firstname') }}" required autofocus
                                                    placeholder="First Name">
                
                                                @if ($errors->has('firstname'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('firstname') }}</strong>
                                                </span>
                                                @endif
                
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Email Address <strong style="color: red">*</strong></label>
                                                <input id="email" type="email"
                                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                                    value="{{ old('email') }}" required autofocus placeholder="Email">
                
                                                @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>
        
                                        </div>
                                        <div class="col-md-6">
                                            
                                            <div class="form-group">
                                                <label>Phone Number <strong style="color: red">*</strong></label>
                                                <input id="phone" type="tel"
                                                    class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"
                                                    value="{{ old('phone') }}" required placeholder="Phone" maxlength="11" pattern="[0-9]+">
                
                                                @if ($errors->has('phone'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Date of Birth <strong style="color: red">*</strong></label>
                                                <input type="text" id="datepicker"
                                                    class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}"
                                                    name="dob" value="{{ old('dob') }}" placeholder="Date of Birth">

                                                @if ($errors->has('dob'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('dob') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Password <strong style="color: red">*</strong></label>
                                                <input id="password" type="password"
                                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                    name="password" required placeholder="Password">
                
                                                @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                
                                            <div class="form-group">
                                                <label>Repeat Password <strong style="color: red">*</strong></label>
                                                <input id="password-confirm" type="password" class="form-control"
                                                    name="password_confirmation" required placeholder="Repeat Password">
                                            </div>
                
                                            
        
                                        </div>
                                    </div>

                                    <a href="{{ route('admins.index') }}" class="btn btn-default btn-sm">Cancel</a>
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
