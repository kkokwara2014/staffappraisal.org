<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{url('user_images',$user->userimage)}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{$user->firstname.' '.$user->lastname}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">

        @if ($user->profileupdated==1)
            
        

            <li>
                <a href="{{ route('home') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                        {{-- <i class="fa fa-angle-left pull-right"></i> --}}
                    </span>
                </a>
            </li>


            {{-- only Admin --}}
            @hasrole(['Admin','Governing Council','Rector','Registrar','Management'])
            <li><a href="{{ route('roles.index') }}"><i class="fa fa-briefcase"></i>Roles</a></li>
            <li><a href="{{ route('ranks.index') }}"><i class="fa fa-level-up"></i>Ranks</a></li>
            <li><a href="{{ route('schools.index') }}"><i class="fa fa-bank"></i> Schools</a></li>
            <li><a href="{{ route('departments.index') }}"><i class="fa fa-tag"></i> Department</a></li>
            <li><a href="{{ route('staffsbydept') }}"><i class="fa fa-users"></i> Staff By Department</a></li>
            @endhasrole
            
            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-pdf-o"></i>
                    <span>Appraisals</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    {{-- <li><a href="{{ route('myappraisal.index') }}"><i class="fa fa-file-pdf-o"></i> My Appraisals</a></li> --}}
                    @hasrole(['Admin','Registrar'])
                    <li><a href="{{ route('appraisals.index') }}"><i class="fa fa-file-pdf-o"></i> Unpublished</a></li>
                    @endhasrole
                    
                    <li><a href="{{ route('appraisals.published') }}"><i class="fa fa-file-pdf-o"></i> Published</a></li>
                    <li><a href="{{ route('submitted.appraisals') }}"><i class="fa fa-file-pdf-o"></i> Submitted</a></li>
                </ul>
            </li>


            @hasrole('Admin')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Stakeholders</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li><a href="#"><i class="fa fa-users"></i> Management</a></li>
                    <li><a href="#"><i class="fa fa-users"></i> Deans</a></li>
                    <li><a href="#"><i class="fa fa-users"></i> HODs</a></li>
                    <li><a href="{{ route('staffs.index') }}"><i class="fa fa-users"></i> Staff</a></li>
                    <li><a href="#"><i class="fa fa-user-plus"></i> Admins</a></li>

                </ul>
            </li>
            @endhasrole


            @endif
            

            {{-- @can('profile-updated', Auth::user()) --}}
            <li><a href="{{ route('my.profile') }}"><i class="fa fa-picture-o"></i> My Profile Photo</a></li>
            {{-- @endcan --}}

            {{-- only Admin --}}
           @hasrole('Admin')
           <li class="treeview">
            <a href="#">
                <i class="fa fa-user"></i>
                <span>Admin Panel</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('manageusers.index') }}"><i class="fa fa-user"></i> User Management</a></li>
                <li><a href="{{ route('login.details') }}"><i class="fa fa-user"></i> Login Audit</a></li>
            </ul>
        </li>
        
        <li class="treeview">
            <a href="#">
                <i class="fa fa-cogs"></i>
                <span>Settings</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-cog"></i> User Management</a></li>
            </ul>
        </li>
        
        @endhasrole


            <li>
                <a href="{{ route('user.logout') }}"><span class="fa fa-sign-out"></span> Sign out</a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>