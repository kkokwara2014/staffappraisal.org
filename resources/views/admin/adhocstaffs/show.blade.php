@extends('admin.layout.app')

@section('title')
{{ucfirst($staff->firstname).' '.ucfirst($staff->lastname)}} [{{ $staff->staffnumb }}] Details
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <p>
            <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm">
                Back</a>

            @hasrole(['Admin','HOD','Rector','Registrar'])
            <a href="{{ route('staffsbydept') }}" class="btn btn-success btn-sm"><span class="fa fa-eye"></span> 
                Staff by Departments</a>
            @endhasrole
        </p>
        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-4">

                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">

                                <img src="{{url('user_images',$staff->userimage)}}" alt="" class="img-responsive"
                                    width="250" height="250" style="border-radius: 50%">

                            </div>
                        </div>

                    </div>
                    <div class="col-md-8">
                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">

                                <p>
                                    <h2>{{ucfirst($staff->firstname).' '.($staff->middlename!=''?ucfirst($staff->middlename):'').' '.ucfirst($staff->lastname)}}
                                    </h2>
                                </p>
                                <hr>

                                    <div><span class="fa fa-briefcase"></span> <strong>{{ implode(', ',$staff->roles()->get()->pluck('name')->toArray()) }}</strong> </div>
                                    <div>Email : {{$staff->email}} </div>
                                    <div>Phone : {{$staff->phone}}</div>
                                    <div>Created : {{date('d M, Y',strtotime($staff->created_at))}}
                                        [{{$staff->created_at->diffForHumans()}}] </div>
                                    <div>
                                        Status :
                                        @if ($staff->isactive==1)
                                        <span class="badge badge-success badge-pill"
                                            style="background-color: green; color:seashell"> Active</span>
                                        @else
                                        <span class="badge badge-danger badge-pill"
                                            style="background-color: red; color:seashell"> Inactive</span>

                                        @endif
                                    </div>
                                    <div>
                                        Profile Updated? :
                                        @if ($staff->profileupdated==1)
                                        <span class="badge badge-success badge-pill"
                                            style="background-color: green; color:seashell"> Yes</span>
                                        @else
                                        <span class="badge badge-danger badge-pill"
                                            style="background-color: red; color:seashell"> No</span>

                                        @endif
                                    </div>
                                    <div>
                                        @if ($staff->dob!='')
                                        Date of Birth:
                                        <strong>
                                            {{ date('d M, Y',strtotime($staff->dob)) }}

                                            [<span class="badge badge-info"
                                                style="background-color: green; color: honeydew">
                                                @php
                                                $dob=$staff->dob;
                                                $today=date('Y-m-d');

                                                $diff=abs(strtotime($today)-strtotime($dob));

                                                $years=floor($diff/(365*60*60*24));
                                                echo $years;

                                                @endphp
                                                years </span>]
                                        </strong>
                                        @endif
                                    </div>
                                    
                                    <div>
                                        @if ($staff->assumptiondate!='')
                                        Assumption Date : {{ date('d M, Y',strtotime($staff->assumptiondate)) }}
                                        @endif
                                    </div>
                                    <br>
                                    <div>
                                        @if ($user->hasAnyRole('Admin') || $creatorExists>0)
                                        <a href="{{ route('peoplecreatedbyothers',$staff->id) }}" class="btn btn-default btn-sm">Staff created by {{ $staff->firstname.' '.$staff->lastname }}</a>   
                                       @endif
                                    </div>
                                    
                                    

                                    

                            </div>

                        </div>
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