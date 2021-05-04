@extends('admin.layout.app')

@section('title')
Edit Profile
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <p>
        <a href="{{ route('home') }}" class="btn btn-success btn-sm">
            <span class="fa fa-eye"></span> Back to Profile
        </a>
        </p>
       
        <div class="row">
            <div class="col-md-12">

                <div class="box">
    <!-- /.box-header -->
    <div class="box-body">
        <h3 class="text-center">Welcome Dear <strong>{{ ucfirst($user->firstname) }}</strong>, kindly edit Your profile</h3>
        <div>
            <img class="img-profile rounded-circle" style="display: block; margin-left: auto; margin-right: auto; border-radius:50%"
                    src="{{url('user_images',$user->userimage)}}" width="180">
        </div>
       
        <form action="{{ route('staffs.update',$staff->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Title <b style="color:red">*</b></label>
                        <select name="title_id" class="form-control" autofocus required>
                            <option selected="disabled">Select Title</option>
                            @foreach ($titles as $title)
                            <option value="{{$title->id}}" {{$title->id==$staff->title_id ? 'selected':''}}>{{$title->title}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Last Name <b style="color:red">*</b></label>
                        <input type="text"
                            class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}"
                            name="lastname" value="{{ $staff->lastname }}" placeholder="Last Name">
    
                        @if ($errors->has('lastname'))
                        <span class="invalid-feedback" role="alert">
                            <span
                                style="color: red">{{ $errors->first('lastname') }}</span>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Middle Name <small>[optional]</small></label>
                        <input type="text"
                            class="form-control"
                            name="middlename" value="{{ $staff->middlename }}" placeholder="Middle Name">
    
                    </div>
                    <div class="form-group">
                        <label for="">First Name <b style="color:red">*</b></label>
                        <input type="text"
                            class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                            name="firstname" value="{{ $staff->firstname }}" placeholder="First Name">
    
                        @if ($errors->has('firstname'))
                        <span class="invalid-feedback" role="alert">
                            <span
                                style="color: red">{{ $errors->first('firstname') }}</span>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="">Staff Number <small style="color:red">[Contact Admin to Edit this field]</small></label>
                        <input type="text"
                            class="form-control"
                            name="staffnumb" value="{{ $staff->staffnumb }}" readonly>
    
                    </div>

                    <div class="form-group">
                        <label for="">Email <b style="color:red">*</b></label>
                        <input type="text"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            name="email" value="{{ $staff->email }}" placeholder="Email">
    
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <span
                                style="color: red">{{ $errors->first('email') }}</span>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Phone Number <b style="color:red">*</b></label>
                        <input type="text"
                            class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                            name="phone" value="{{ $staff->phone }}" placeholder="Phone Number">
    
                        @if ($errors->has('phone'))
                        <span class="invalid-feedback" role="alert">
                            <span
                                style="color: red">{{ $errors->first('phone') }}</span>
                        </span>
                        @endif
                    </div>


                    <div class="form-group">
                        <label for="">Rank <b style="color:red">*</b></label>
                        <select name="rank_id" class="form-control" required>
                            <option selected="disabled" value="">Select Rank</option>
                            @foreach ($ranks as $rank)
                            <option value="{{$rank->id}}" {{$rank->id==$staff->rank_id ? 'selected':''}}>{{$rank->name}}
                            </option>
                            @endforeach
    
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">School <b style="color:red">*</b></label>
                        <select name="school_id" class="form-control" required>
                            <option selected="disabled" value="">Select School</option>
                            @foreach ($schools as $school)
                            <option value="{{$school->id}}" {{$school->id==$staff->school_id ? 'selected':''}}>{{$school->name}}
                            </option>
                            @endforeach
    
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Department <b style="color:red">*</b></label>
                            <select name="department_id" class="form-control" required>
    
                            </select>
                    </div>
                                                                               
                    
                </div>
                <div class="col-md-6">
                <div class="form-group">
                        <label for="">State <b style="color:red">*</b></label>
                        <select name="state_id" class="form-control" required>
                            <option selected="disabled" value="">Select State</option>
                            @foreach ($states as $state)
                            <option value="{{$state->id}}" {{$state->id==$staff->state_id ? 'selected':''}}>{{$state->name}}
                            </option>
                            @endforeach
    
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">LGA <b style="color:red">*</b></label>
                            <select name="lga_id" class="form-control" required>
    
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="">Marital Status <b style="color:red">*</b></label>
                        <select name="maritalstatus_id" class="form-control" required>
                            <option selected="disabled" value="">Select Marital Status</option>
                            @foreach ($maritalstatuses as $maritalstat)
                            <option value="{{$maritalstat->id}}" {{$maritalstat->id==$staff->maritalstatus_id ? 'selected':''}}>{{$maritalstat->name}}
                            </option>
                            @endforeach
    
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Number of Children</label>
                        
                        <input type="text"
                            class="form-control"
                            name="numofchildren" value="{{ $staff->numofchildren }}" placeholder="4" pattern="[0-9]+"
                            maxlength="2">
                    </div>                   
                    
                    <div class="form-group">
                        <label for="">Staff Category <b style="color:red">*</b></label>
                        <select name="category_id" class="form-control" required>
                            <option selected="disabled" value="">Select Staff Category</option>
                            @foreach ($staffcategories as $category)
                            <option value="{{$category->id}}" {{$category->id==$staff->category_id ? 'selected':''}}>{{$category->name}}
                            </option>
                            @endforeach
    
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Assumption Date <b style="color:red">*</b></label>
                        <input type="text" id="datepicker"
                            class="form-control{{ $errors->has('assumptiondate') ? ' is-invalid' : '' }}"
                            name="assumptiondate" value="{{ $staff->assumptiondate }}" placeholder="Date of Assumption">
    
                        @if ($errors->has('assumptiondate'))
                        <span class="invalid-feedback" role="alert">
                            <span
                                style="color: red">{{ $errors->first('assumptiondate') }}</span>
                        </span>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label for="">Date of Birth <b style="color:red">*</b></label>
                        <input type="text" id="datepicker1"
                            class="form-control"
                            name="dob" value="{{ $staff->dob }}" required placeholder="Date of Birth">
                    </div>
                    <div class="form-group">
                        <label for="">Confirmation Date [only for confirmed Staff]</label>
                        <input type="text" id="datepicker2"
                            class="form-control"
                            name="confirmationdate" value="{{ $staff->confirmationdate }}" placeholder="Confirmation Date">
                    </div>
                    <div class="form-group">
                        <label for="">First Assumption Status <b style="color:red">*</b></label>
                        
                        <input type="text"
                            class="form-control{{ $errors->has('firstassumptionstatus') ? ' is-invalid' : '' }}"
                            name="firstassumptionstatus" value="{{ $staff->firstassumptionstatus }}" placeholder="First Assumption Status e.g Assistant Lecturer"
                            maxlength="25">
    
                        @if ($errors->has('firstassumptionstatus'))
                        <span class="invalid-feedback" role="alert">
                            <span
                                style="color: red">{{ $errors->first('firstassumptionstatus') }}</span>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Profile Image </label>
                        <input class="form-control" type="file" name="userimage">

                        <input type="hidden" name="existing_image" value="{{ $staff->userimage }}">
                    </div>
                </div>
                
            </div>
            
    
            <button type="reset" class="btn btn-danger btn-sm">Cancel</button>
            <button type="submit" class="btn btn-primary btn-sm">Update</button>
    
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
