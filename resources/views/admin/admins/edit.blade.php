@extends('admin.layout.app')

@section('title')
 Edit Electoral Officer
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <a href="{{ route('electoralofficer.index') }}" class="btn btn-success">
            <span class="fa fa-eye"></span> All Electoral Officers
         </a>
         <br><br>

        <div class="row">
            <div class="col-md-10">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('electoralofficer.update',$electoralofficer->id) }}" method="post">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Last Name</label>
                                        <input id="lastname" type="text"
                                            class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}"
                                            name="lastname" value="{{ $electoralofficer->lastname }}" required autofocus
                                            placeholder="Last Name">

                                        @if ($errors->has('lastname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </span>
                                        @endif

                                    </div>
                                    <div class="form-group">
                                        <label for="">Middle Name</label>
                                        <input id="middlename" type="text"
                                            class="form-control"
                                            name="middlename" value="{{ $electoralofficer->middlename==''?old('middlename'):$electoralofficer->middlename }}" autofocus
                                            placeholder="Middle Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">First Name</label>
                                        <input id="firstname" type="text"
                                            class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                                            name="firstname" value="{{ $electoralofficer->firstname }}" required autofocus
                                            placeholder="First Name">

                                        @if ($errors->has('firstname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('firstname') }}</strong>
                                        </span>
                                        @endif

                                    </div>
                                    <div class="form-group">
                                        <label>Staff Number <strong style="color: red">*</strong></label>
                                        <input id="staffnumb" type="text"
                                            class="form-control{{ $errors->has('staffnumb') ? ' is-invalid' : '' }}" name="staffnumb"
                                            value="{{ $electoralofficer->staffnumb }}" required placeholder="Staff number e.g SS-01234" maxlength="8">

                                        @if ($errors->has('staffnumb'))
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $errors->first('staffnumb') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     
                                    

                                    <div class="form-group">
                                        <label for="">Email Address</label>
                                        <input id="email" type="email"
                                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                            value="{{ $electoralofficer->email }}" required autofocus placeholder="Email">

                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input id="phone" type="tel"
                                            class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"
                                            value="{{ $electoralofficer->phone }}" required placeholder="Phone" maxlength="11">

                                        @if ($errors->has('phone'))
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Department <strong style="color:red;">*</strong></label>
                                        <select name="department_id" class="form-control" required>
                                            <option selected="disabled">Select Department</option>
                                            @foreach ($departments as $department)
                                            <option value="{{$department->id}} {{ $department->id== $electoralofficer->department_id?'selected':'' }}">{{$department->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Role <strong style="color:red;">*</strong></label>
                                        <select name="role_id" class="form-control" required>
                                            <option selected="disabled">Select Role</option>
                                            @foreach ($roles as $role)
                                            <option value="{{$role->id}} {{ $role->id==$electoralofficer->role_id?'selected':'' }}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="existingstaffnumb" value="{{$electoralofficer->staffnumb}}">
                            <input type="hidden" name="existingemail" value="{{$electoralofficer->email}}">
                            <input type="hidden" name="existingphone" value="{{$electoralofficer->phone}}">
                            
                            
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('electoralofficer.index') }}" class="btn btn-default">Cancel</a>
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
