@extends('admin.layout.app')

@section('title')
Edit Profile Details
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        
        <div class="row">
            <div class="col-md-12">

                <div class="row">

                    <div class="col-md-11">

                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <h3 class="text-center">Dear Dear <strong>{{ ucfirst($user->firstname) }}</strong>,
                                    please edit Your profile</h3>
                                <div>
                                    <img class="img-profile rounded-circle"
                                        style="display: block; margin-left: auto; margin-right: auto; border-radius:50%;"
                                        src="{{url('user_images',$user->userimage)}}" width="180">
                                </div>
                                <br>

                                <form action="{{ route('update.adhocstaffprofile') }}" method="post"
                                    enctype="multipart/form-data">

                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Title *</label>
                                                <select name="title_id" class="form-control" autofocus required>
                                                    <option selected="disabled">Select Title</option>
                                                    @foreach ($titles as $title)
                                                    <option value="{{$title->id}}" {{$title->id==$adhocstaff->title_id ? 'selected':''}}>{{$title->title}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="">State *</label>
                                                <select name="state_id" class="form-control" required>
                                                    <option selected="disabled" value="">Select State</option>
                                                    @foreach ($states as $state)
                                                    <option value="{{$state->id}}" {{$state->id==$adhocstaff->state_id ? 'selected':''}}>{{$state->name}}
                                                    </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">LGA *</label>
                                                <select name="lga_id" class="form-control" required>

                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Profile Image</label>
                                                <input type="file" name="userimage">
                                            </div>

                                            
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Marital Status *</label>
                                                <select name="maritalstatus_id" class="form-control" required>
                                                    <option selected="disabled" value="">Select Marital Status</option>
                                                    @foreach ($maritalstatuses as $maritalstat)
                                                    <option value="{{$maritalstat->id}}" {{$maritalstat->id==$adhocstaff->maritalstatus_id ? 'selected':''}}>{{$maritalstat->name}}
                                                    </option>
                                                    @endforeach

                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Assumption of Duty Date *</label>
                                                <input type="text" id="datepicker"
                                                    class="form-control{{ $errors->has('assumptiondate') ? ' is-invalid' : '' }}"
                                                    name="assumptiondate" value="{{ $adhocstaff->assumptiondate }}"
                                                    placeholder="Date of Assumption">

                                                @if ($errors->has('assumptiondate'))
                                                <span class="invalid-feedback" role="alert">
                                                    <span
                                                        style="color: red">{{ $errors->first('assumptiondate') }}</span>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="">Date of Birth *</label>
                                                <input type="text" id="datepicker1" class="form-control" name="dob"
                                                    value="{{ $adhocstaff->dob }}" required placeholder="Date of Birth">
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="existingimage" value="{{ $adhocstaff->userimage }}">


                                    <button type="reset" class="btn btn-danger btn-sm">Cancel</button>
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>

                                </form>


                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
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