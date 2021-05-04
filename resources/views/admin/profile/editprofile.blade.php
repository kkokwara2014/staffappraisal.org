@extends('admin.layout.app')

@section('title')
User Profile
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">

        {{-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default-password"
            data-backdrop="static" data-keyboard="false">
            <span class="fa fa-gears"></span> Change Password
        </button> --}}
       
        <div class="row">
            <div class="col-md-5">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <img src="{{url('user_images',$user->userimage)}}" alt=""
                                    class="img-responsive img-circle"
                                    style="width: 180px; border-radius: 50%;">
                                <form action="{{ route('user.profile.update') }}" method="post"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <br>
                                    <input type="file" name="userimage" required>
                                    <p></p>

                                    
                                    <button type="submit" class="btn btn-success text-center btn-sm"><span
                                            class="fa fa-upload"></span>
                                        Upload Photo
                                    </button>
                                </form>
                            </div>
                            <div class="col-md-2"></div>

                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-7">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        @include('admin.profile.profilestatus')

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
