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
            {{-- @hasrole(['Admin','Governing Council','Rector','Registrar','Management']) --}}
            @if (auth()->user()->hasAnyRole(['Admin']) || auth()->user()->hasAnyRole(['Governing Council']) || auth()->user()->hasAnyRole(['Rector']) || auth()->user()->hasAnyRole(['Registrar']) || auth()->user()->hasAnyRole(['Management']))
            <li><a href="{{ route('roles.index') }}"><i class="fa fa-briefcase"></i>Roles</a></li>
            <li><a href="{{ route('ranks.index') }}"><i class="fa fa-level-up"></i>Ranks</a></li>
            <li><a href="{{ route('schools.index') }}"><i class="fa fa-bank"></i> Schools</a></li>
            <li><a href="{{ route('departments.index') }}"><i class="fa fa-tag"></i> Department</a></li>
            <li><a href="{{ route('staffsbydept') }}"><i class="fa fa-users"></i> Staff By Department</a></li>
            @endif
            

            {{--  for dean  --}}
            @if (auth()->user()->hasAnyRole(['Admin']) || auth()->user()->hasAnyRole(['Dean']) || auth()->user()->hasAnyRole(['Director']) || auth()->user()->hasAnyRole(['Registrar']))
                <li><a href="{{ route('myschool') }}"><i class="fa fa-bank"></i> My School/Division</a></li>  
            @endif
            
            {{--  for HOD only  --}}
            @if (auth()->user()->hasAnyRole(['Admin']) || auth()->user()->hasAnyRole(['HOD']))
                <li><a href="{{ route('mydepartment') }}"><i class="fa fa-tag"></i> My Department/Unit</a></li>
            @endif
            
            @endif
            


            @if ($user->profileupdated==1 && $user->hasAnyRole(['Staff']))
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
                    @if(auth()->user()->hasAnyRole(['Admin']) || auth()->user()->hasAnyRole(['Registrar']))
                    <li><a href="{{ route('appraisals.index') }}"><i class="fa fa-file-pdf-o"></i> Unpublished</a></li>
                    @endif
                    
                    <li><a href="{{ route('appraisals.published') }}"><i class="fa fa-file-pdf-o"></i> Published</a></li>
                    <li><a href="{{ route('submitted.appraisals') }}"><i class="fa fa-file-pdf-o"></i> Submitted</a></li>
                </ul>
            </li>

            @if(auth()->user()->hasAnyRole(['Admin']) || auth()->user()->hasAnyRole(['Rector']) || auth()->user()->hasAnyRole(['Registrar']))
                <li><a href="{{ route('appraisal.reports') }}"><i class="fa fa-bar-chart"></i> Reports</a></li>
            @endif

            @if(auth()->user()->hasAnyRole(['Admin']))
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Stakeholders</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('staffs.index') }}"><i class="fa fa-users"></i> Staff</a></li>
                    <li><a href="{{ route('adhocstaffs.index') }}"><i class="fa fa-users"></i> Adhoc Staff</a></li>
                    <li><a href="#"><i class="fa fa-user-plus"></i> Admins</a></li>
                </ul>
            </li>
            @endif
            @endif
            

            {{-- only Admin --}}
           @if(auth()->user()->hasAnyRole(['Admin']))
           <li class="treeview">
            <a href="#">
                <i class="fa fa-cogs"></i>
                <span>Settings</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('manageusers.index') }}"><i class="fa fa-user"></i> User Management</a></li>
                <li><a href="{{ route('login.details') }}"><i class="fa fa-user"></i> Login Audit</a></li>
            </ul>
        </li>        
        
        @endif

        {{-- only Admin and Adhoc Staff --}}
         @if ($user->profileupdated==1 && ($user->hasAnyRole(['Admin'])|| $user->hasAnyRole(['Adhoc Staff'])))
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Staff</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                
                <ul class="treeview-menu">
                    <li><a href="{{ route('staffs.create') }}"><i class="fa fa-user-plus"></i> Add New</a></li>
                    <li><a href="{{ route('staffs.index') }}"><i class="fa fa-users"></i> All Staff</a></li>
                </ul>
            </li>
         @endif



            <li>
                <a href="{{ route('user.logout') }}"><span class="fa fa-sign-out"></span> Sign out</a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>