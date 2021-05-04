@include('admin.layout.statboardcontainer')
<!-- Small boxes (Stat box) -->



{{-- <div class="row">

    <div class="col-lg-3 col-md-3">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>5</h3>

                <p>Warehouses</p>
            </div>
            <div class="icon">
                <i class="fa fa-bank"></i>
            </div>

        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-md-3">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>3</h3>

                <p>Sales Staffs</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>

        </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-3 col-md-3">
        <!-- small box -->
        <div class="small-box bg-blue-active">
            <div class="inner">
                <h3>2</h3>

                <p>Transactions</p>
            </div>
            <div class="icon">
                <i class="fa fa-money"></i>
            </div>

        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-md-3">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>2</h3>

                <p>Admins</p>
            </div>
            <div class="icon">
                <i class="fa fa-user-plus"></i>
            </div>

        </div>
    </div>
    <!-- ./col -->


</div> --}}

@include('admin.messages.success')

@can('update-profile', Auth::user())
    @include('admin.layout.updateprofile')
@endcan

@can('profile-updated', Auth::user())
    @include('admin.layout.profileupdated')
@endcan

<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-8">

        
</div>
</div>
<!-- /.row -->
