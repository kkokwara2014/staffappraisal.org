
<div class="box">
    <!-- /.box-header -->
    <div class="box-body">
        <h3 class="text-center">Welcome Dear <strong>{{ ucfirst($user->firstname) }}</strong>, please update Your profile</h3>
        <div>
            <img class="img-profile rounded-circle" style="display: block; margin-left: auto; margin-right: auto;"
                    src="{{url('user_images',$user->userimage)}}" width="180">
        </div>
       
        <form action="{{ route('update.profile') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Title *</label>
                        <select name="title_id" class="form-control" autofocus required>
                            <option selected="disabled">Select Title</option>
                            @foreach ($titles as $title)
                            <option value="{{$title->id}}">{{$title->title}}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Rank *</label>
                        <select name="rank_id" class="form-control" required>
                            <option selected="disabled" value="">Select Rank</option>
                            @foreach ($ranks as $rank)
                            <option value="{{$rank->id}}">{{$rank->name}}
                            </option>
                            @endforeach
    
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">School *</label>
                        <select name="school_id" class="form-control" required>
                            <option selected="disabled" value="">Select School</option>
                            @foreach ($schools as $school)
                            <option value="{{$school->id}}">{{$school->name}}
                            </option>
                            @endforeach
    
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Department *</label>
                            <select name="department_id" class="form-control" required>
    
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="">State *</label>
                        <select name="state_id" class="form-control" required>
                            <option selected="disabled" value="">Select State</option>
                            @foreach ($states as $state)
                            <option value="{{$state->id}}">{{$state->name}}
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
                        <label for="">Marital Status *</label>
                        <select name="maritalstatus_id" class="form-control" required>
                            <option selected="disabled" value="">Select Marital Status</option>
                            @foreach ($maritalstatuses as $maritalstat)
                            <option value="{{$maritalstat->id}}">{{$maritalstat->name}}
                            </option>
                            @endforeach
    
                        </select>
                    </div>
                                                           
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Number of Children</label>
                        
                        <input type="text"
                            class="form-control"
                            name="numofchildren" value="{{ old('numofchildren') }}" placeholder="4" pattern="[0-9]+"
                            maxlength="2">
                    </div>                   
                    
                    <div class="form-group">
                        <label for="">Staff Category *</label>
                        <select name="category_id" class="form-control" required>
                            <option selected="disabled" value="">Select Staff Category</option>
                            @foreach ($staffcategories as $category)
                            <option value="{{$category->id}}">{{$category->name}}
                            </option>
                            @endforeach
    
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Assumption Date *</label>
                        <input type="text" id="datepicker"
                            class="form-control{{ $errors->has('assumptiondate') ? ' is-invalid' : '' }}"
                            name="assumptiondate" value="{{ old('assumptiondate') }}" placeholder="Date of Assumption">
    
                        @if ($errors->has('assumptiondate'))
                        <span class="invalid-feedback" role="alert">
                            <span
                                style="color: red">{{ $errors->first('assumptiondate') }}</span>
                        </span>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label for="">Date of Birth *</label>
                        <input type="text" id="datepicker1"
                            class="form-control"
                            name="dob" value="{{ old('dob') }}" required placeholder="Date of Birth">
                    </div>
                    <div class="form-group">
                        <label for="">Confirmation Date [only for confirmed Staff]</label>
                        <input type="text" id="datepicker2"
                            class="form-control"
                            name="confirmationdate" value="{{ old('confirmationdate') }}" placeholder="Confirmation Date">
                    </div>
                    <div class="form-group">
                        <label for="">First Assumption Status *</label>
                        
                        <input type="text"
                            class="form-control{{ $errors->has('firstassumptionstatus') ? ' is-invalid' : '' }}"
                            name="firstassumptionstatus" value="{{ old('firstassumptionstatus') }}" placeholder="First Assumption Status e.g Assistant Lecturer"
                            maxlength="25">
    
                        @if ($errors->has('firstassumptionstatus'))
                        <span class="invalid-feedback" role="alert">
                            <span
                                style="color: red">{{ $errors->first('firstassumptionstatus') }}</span>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Profile Image *</label>
                        <input class="form-control" type="file" name="userimage" required>
                    </div>
                </div>
            </div>
            
    
            <button type="reset" class="btn btn-danger btn-sm">Cancel</button>
            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    
        </form>


    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
