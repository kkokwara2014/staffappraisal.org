<div class="row">
    <div class="col-md-4">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">

                <div>
                    <img style="display: block; margin-left: auto; margin-right: auto; border-radius: 50%"
                        src="{{url('user_images',$user->userimage)}}" width="180">
                </div>
                <div>
                    <div class="text-center mt-5">
                        <h3>{{$user->title->title.' '.ucfirst($user->firstname).' '.($user->middlename!=''?ucfirst($user->middlename):'').' '.ucfirst($user->lastname)}}
                        </h3>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        
        
        @if ($user->profileupdated==1)
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <div>
                    @if ($user->signature!='')
                    <img style="display: block; margin-left: auto; margin-right: auto;"
                    src="{{url('signatures',$user->signature)}}" width="150" height="150">
                    @else
                        <h3 style="text-align: center; color: red">No Signature yet!</h3>
                    @endif
                    
                </div>
                <br>
                <div>
                    <a href="" data-toggle="modal" data-target="#modal-default-signature"
                                    class="btn btn-info btn-sm btn-block"><span class="fa fa-modx"></span> Upload Your Signature</a>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box --> 
        @endif



    </div>
    <div class="col-md-8">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">

                <div>
                    Staff Number: <strong>{{ $user->staffnumb }}</strong>
                </div>
                <div>
                    Staff Rank: <strong>{{ $user->rank->name }}</strong>
                </div>
                <div>
                    Staff Category: <strong>{{ $user->category->name }}</strong>
                </div>
                <div>
                    State: <strong>{{ $user->state->name }}</strong>
                </div>
                <div>
                    L.G.A: <strong>{{ $user->lga->name }}</strong>
                </div>
                <div>
                    Date of Birth:
                    <strong>
                        {{ date('d M, Y',strtotime($user->dob)) }}

                        [<span class="badge badge-info" style="background-color: green; color: honeydew">
                            @php
                            $dob=$user->dob;
                            $today=date('Y-m-d');

                            $diff=abs(strtotime($today)-strtotime($dob));

                            $years=floor($diff/(365*60*60*24));
                            echo $years;

                            @endphp
                            years </span>]
                    </strong>
                </div>
                <div>
                    Email : <strong>{{ $user->email }}</strong>
                </div>
                <div>
                    Phone : <strong>{{ $user->phone }}</strong>
                </div>
                <hr>
                <div>
                    School: <strong>{{ $user->school->name }}</strong>
                </div>
                <div>
                    Department: <strong>{{ $user->department->name }}</strong>
                </div>

                <div>
                    Assumption Date : <strong>{{ date('d M, Y',strtotime($user->assumptiondate)) }}</strong>
                </div>
                <div>
                    First Assumption Status : <strong>{{ $user->firstassumptionstatus }}</strong>
                </div>
                <div>
                    Confirmation Date :
                    @if ($user->confirmationdate!='')
                    <span class="badge badge-success" style="background-color: green; color: honeydew">Confirmed</span>
                    {{ date('d M, Y',strtotime($user->confirmationdate)) }}
                    @else
                    <span class="badge badge-danger" style="background-color: red; color: honeydew">Not Confirmed</span>
                    @endif

                </div>
                <hr>
                <div>
                    Profile Updated?:
                    @if ($user->profileupdated!=0)
                    <span class="badge badge-success" style="background-color: green; color: honeydew">Yes</span>
                    @else
                    <span class="badge badge-danger" style="background-color: red; color: honeydew">No</span>
                    @endif
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">Personal Quick Tour</div>
                            <div class="panel-body">

                                <a href="{{ route('staffs.edit',$user->id) }}"
                                    class="btn btn-warning btn-sm btn-block"><span class="fa fa-pencil"></span> Edit
                                    Details</a>
                                <a href="{{ route('staffs.show',$user->id) }}"
                                    class="btn btn-primary btn-sm btn-block"><span class="fa fa-eye"></span> More
                                    Details</a>
                                <a href="" data-toggle="modal" data-target="#modal-default"
                                    class="btn btn-success btn-sm btn-block"><span class="fa fa-lock"></span> Change
                                    Password</a>
                                @if ($user->hasAnyRole('Admin') || $creatorExists>0)
                                <a href="{{ route('peoplecreatedbyothers',$user->id) }}"
                                    class="btn btn-default btn-sm btn-block">Staff created by
                                    {{ $user->firstname.' '.$user->lastname }}</a>
                                @endif
                            </div>
                        </div>


                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">Appraisal Quick Tour</div>
                            <div class="panel-body">
                                <a href="{{ route('appraisals.published') }}"
                                    class="btn btn-danger btn-sm btn-block"><span class="fa fa-file-pdf-o"></span>
                                    Published Appraisals</a>
                                <a href="{{ route('submitted.appraisals') }}"
                                    class="btn btn-success btn-sm btn-block"><span class="fa fa-file-pdf-o"></span>
                                    Submitted Appraisals</a>
                            </div>
                        </div>

                    </div>

                </div>
                


                {{-- <div>
                    <a href="{{ route('staffs.edit',$user->id) }}" class="btn btn-warning btn-sm"><span
                    class="fa fa-pencil"></span> Edit Details</a>
                <a href="{{ route('staffs.show',$user->id) }}" class="btn btn-primary btn-sm"><span
                        class="fa fa-eye"></span> More Details</a>
                <a href="" data-toggle="modal" data-target="#modal-default" class="btn btn-success btn-sm"><span
                        class="fa fa-lock"></span> Change Password</a>

                @if ($user->hasAnyRole('Admin') || $creatorExists>0)
                <a href="{{ route('peoplecreatedbyothers',$user->id) }}" class="btn btn-default btn-sm">Staff
                    created by {{ $user->firstname.' '.$user->lastname }}</a>
                @endif

            </div> --}}

            {{-- Password change input modal area --}}
            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">

                    <form action="{{ route('password.change') }}" method="post">
                        @csrf

                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><span class="fa fa-lock"></span> Change Password</h4>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="">New Password <strong style="color:red;">*</strong></label>
                                    <input type="password" class="form-control" name="password"
                                        value="{{ old('password') }}" required placeholder="New password"
                                        autocomplete="new-password">
                                </div>
                                <div class="form-group">
                                    <label for="">Confirm Password <strong style="color:red;">*</strong></label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" placeholder="Confirm Password" required
                                        autocomplete="new-password">

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->

                    </form>
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            {{-- Signature uploading modal area --}}
            <div class="modal fade" id="modal-default-signature">
                <div class="modal-dialog">

                    <form action="{{ route('upload.signature') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><span class="fa fa-modx"></span> Upload Signature</h4>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="">Choose Scanned or snapped Signature to upload <strong style="color:red;">* [.jpeg, .jpg, or .png only. Max. 2MB]</strong></label>
                                    <input type="file" name="usersignature" required>
                                
                                    @if ($errors->has('usersignature'))
                                    <span class="invalid-feedback" role="alert">
                                        <span
                                            style="color: red">{{ $errors->first('usersignature') }}</span>
                                    </span>
                                    @endif
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->

                    </form>
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>

</div>