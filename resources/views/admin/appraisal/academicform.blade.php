@extends('admin.layout.app')

@section('title')
Academic Staff Appraisal Form
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

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        @include('admin.messages.success')

                        @if (date('m/d/Y')>$appraisal->starting || date('m/d/Y')<$appraisal->ending)
                            <p style="color: red; text-align: justify; font-size: 15px; font-weight: bold">
                                Kindly click on the plus (+) blue button to add details in each of the headings below.
                                Ensure
                                that your entries are cross-checked before submitting as you may not be able
                                to edit after submitting. Thank you.
                            </p>
                            <hr>
                            @if($uploadedfiles>0)
                            <p>
                                <ul class="list-group">
                                    <li class="list-group-item" style="margin-bottom: 5px;background-color:green;color:white;">
                                        <h4>
                                            Congratulations! You have completed {{$appraisal->title}}. Please check your e-mail. Thank you.
                                        </h4>
                                    </li>
                                </ul>
                            </p>
                            @endif
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <ul class="list-group">
                                        <li class="list-group-item" style="margin-bottom: 4px">
                                            <span style="font-size: 17px; font-weigth:bold">Academic Qualification <i
                                                    style="color: red">*</i></span>
                                            <span style="float: right">
                                                @if (!$qualifications>0)
                                                <a href="#" data-toggle="modal" 
                                                    data-target="#modal-qualification-{{ $appraisal_id }}">
                                                    <span class="fa fa-plus-circle fa-2x"></span>
                                                </a>
                                                @else
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-6">
                                                        <small>
                                                            <span class="badge badge-success"
                                                                style="background-color: green; color: honeydew">Submitted <span
                                                                    class="fa fa-check-circle-o"></span></span>
                                                        </small> 
                                                    </div>
                                                    <div class="col-md-3 col-xs-3">
                                                        <a href="#" data-toggle="modal" class="text-warning editappraisal" data-position="1" 
                                                            data-target="#modal-qualification-{{ $appraisal_id }}" 
                                                            data-route="{{route('appraisal.data', [$appraisal_id, 1])}}" id="editQualification">
                                                            <span class="fa fa-edit fa-2x"></span>
                                                        </a> 
                                                    </div>
                                                    <div class="col-md-3 col-xs-3">
                                                        <a class="text-danger" onclick="return confirm ('Do you want to delete the entries you made in this section?')" href="{{route('delete.appraisals', [$appraisal_id, 1])}}" >
                                                            <span class="fa fa-trash-o fa-2x"></span>
                                                        </a>
                                                    </div>
                                                </div>
                                                @endif
                                            </span>
                                        </li>
                                        <li class="list-group-item" style="margin-bottom: 4px">
                                            <span style="font-size: 17px; font-weigth:bold">Professional
                                                Membership</span>
                                            <span style="float: right">
                                                @if (!$uploadedfiles>0)
                                                @if (!$profmembs>0)
                                                <a href="#" data-toggle="modal"
                                                    data-target="#modal-profmemb-{{ $appraisal_id }}">
                                                    <span class="fa fa-plus-circle fa-2x"></span>
                                                </a>
                                                @else
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-6">
                                                        <small>
                                                            <span class="badge badge-success"
                                                                style="background-color: green; color: honeydew">Submitted <span
                                                                    class="fa fa-check-circle-o"></span></span>
                                                        </small>
                                                    </div>
                                                    <div class="col-md-3 col-xs-3">
                                                        <a href="#" data-toggle="modal" class="text-warning editappraisal" data-position="2" 
                                                            data-target="#modal-profmemb-{{ $appraisal_id }}" 
                                                            data-route="{{route('appraisal.data', [$appraisal_id, 2])}}"  id="editProfmemb">
                                                            <span class="fa fa-edit fa-2x"></span>
                                                        </a>  
                                                    </div>
                                                    <div class="col-md-3 col-xs-3">
                                                        <a class="text-danger" onclick="return confirm ('Do you want to delete the entries you made in this section?')" href="{{route('delete.appraisals', [$appraisal_id, 2])}}" >
                                                            <span class="fa fa-trash-o fa-2x"></span>
                                                        </a>
                                                    </div>
                                                </div>
                                                @endif
                                                @else
                                                <small>
                                                    <span class="badge badge-success"
                                                        style="background-color: red; color: honeydew">No
                                                        more submission 
                                                    </span>
                                                </small>
                                                @endif 
                                            </span>
                                        </li>
                                        <li class="list-group-item" style="margin-bottom: 4px">
                                            <span style="font-size: 17px; font-weigth:bold">Promotions</span>
                                            <span style="float: right">
                                                @if (!$uploadedfiles>0)
                                                @if (!$promotions>0)
                                                <a href="#" data-toggle="modal"
                                                    data-target="#modal-promotion-{{ $appraisal_id }}">
                                                    <span class="fa fa-plus-circle fa-2x"></span>
                                                </a>
                                                @else
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-6">
                                                        <small>
                                                            <span class="badge badge-success"
                                                                style="background-color: green; color: honeydew">Submitted <span
                                                                    class="fa fa-check-circle-o"></span></span>
                                                        </small>
                                                    </div>
                                                    <div class="col-md-3 col-xs-3">
                                                        <a href="#" data-toggle="modal" class="text-warning editappraisal" data-position="3" 
                                                            data-target="#modal-promotion-{{ $appraisal_id }}" 
                                                            data-route="{{route('appraisal.data', [$appraisal_id, 3])}}" id="editPromotion">
                                                            <span class="fa fa-edit fa-2x"></span>
                                                        </a>  
                                                    </div>
                                                    <div class="col-md-3 col-xs-3">
                                                        <a class="text-danger" onclick="return confirm ('Do you want to delete the entries you made in this section?')" href="{{route('delete.appraisals', [$appraisal_id, 3])}}" >
                                                            <span class="fa fa-trash-o fa-2x"></span>
                                                        </a>
                                                    </div>
                                                </div>
                                                @endif
                                                @else
                                                <small>
                                                    <span class="badge badge-success"
                                                        style="background-color: red; color: honeydew">No
                                                        more submission   
                                                        </span>
                                                    </small>
                                                @endif 
                                            </span>
                                        </li>
                                        <li class="list-group-item" style="margin-bottom: 4px">
                                            <span style="font-size: 17px; font-weigth:bold">Present Post & Salary Scale
                                                <i style="color: red">*</i></span>
                                            <span style="float: right">
                                                @if (!$salaryscales>0)
                                                <a href="#" data-toggle="modal"
                                                    data-target="#modal-salaryscale-{{ $appraisal_id }}">
                                                    <span class="fa fa-plus-circle fa-2x"></span>
                                                </a>
                                                @else
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-6">
                                                        <small>
                                                            <span class="badge badge-success"
                                                                style="background-color: green; color: honeydew">Submitted <span
                                                                    class="fa fa-check-circle-o"></span></span>
                                                        </small>
                                                    </div>
                                                    <div class="col-md-3 col-xs-3"> 
                                                        <a href="#" data-toggle="modal" class="text-warning editappraisal" data-position="4" 
                                                            data-target="#modal-salaryscale-{{ $appraisal_id }}" 
                                                            data-route="{{route('appraisal.data', [$appraisal_id, 4])}}" id="editSalary">
                                                            <span class="fa fa-edit fa-2x"></span>
                                                        </a> 
                                                        
                                                    </div>
                                                    <div class="col-md-3 col-xs-3">
                                                        <a class="text-danger" onclick="return confirm ('Do you want to delete the entries you made in this section?')" href="{{route('delete.appraisals', [$appraisal_id, 4])}}" >
                                                            <span class="fa fa-trash-o fa-2x"></span>
                                                        </a>
                                                    </div>
                                                </div>
                                                @endif
                                            </span>
                                        </li>
                                        <li class="list-group-item" style="margin-bottom: 4px">
                                            <span style="font-size: 17px; font-weigth:bold">Training
                                                Courses/Workshops</span>
                                            <span style="float: right">
                                                @if (!$uploadedfiles>0)
                                                @if (!$trainings>0)
                                                <a href="#" data-toggle="modal"
                                                    data-target="#modal-training-{{ $appraisal_id }}">
                                                    <span class="fa fa-plus-circle fa-2x"></span>
                                                </a>
                                                @else
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-6">
                                                        <small>
                                                            <span class="badge badge-success"
                                                                style="background-color: green; color: honeydew">Submitted <span
                                                                    class="fa fa-check-circle-o"></span></span>
                                                        </small>
                                                    </div>
                                                    <div class="col-md-3 col-xs-3">
                                                        <a href="#" data-toggle="modal" class="text-warning editappraisal" data-position="5" 
                                                            data-target="#modal-training-{{ $appraisal_id }}" 
                                                            data-route="{{route('appraisal.data', [$appraisal_id, 5])}}" id="editTraining">
                                                            <span class="fa fa-edit fa-2x"></span>
                                                        </a>  
                                                    </div>
                                                    <div class="col-md-3 col-xs-3">
                                                        <a class="text-danger" onclick="return confirm ('Do you want to delete the entries you made in this section?')" href="{{route('delete.appraisals', [$appraisal_id, 5])}}" >
                                                            <span class="fa fa-trash-o fa-2x"></span>
                                                        </a>
                                                    </div>
                                                </div>
                                                @endif
                                                @else
                                                <small>
                                                    <span class="badge badge-success"
                                                        style="background-color: red; color: honeydew">No more
                                                        submission </span> </small> @endif  </li> <li
                                                            class="list-group-item" style="margin-bottom: 4px">
                                                            <span style="font-size: 17px; font-weigth:bold">Additional
                                                                Qualification</span>
                                                            <span style="float: right">
                                                                @if (!$uploadedfiles>0)

                                                                @if (!$additionalquals>0)
                                                                <a href="#" data-toggle="modal"
                                                                    data-target="#modal-additionalquali-{{ $appraisal_id }}">
                                                                    <span class="fa fa-plus-circle fa-2x"></span>
                                                                </a>
                                                                @else
                                                                <div class="row">
                                                                    <div class="col-md-6 col-xs-6">
                                                                        <small>
                                                                            <span class="badge badge-success"
                                                                                style="background-color: green; color: honeydew">Submitted <span
                                                                                    class="fa fa-check-circle-o"></span></span>
                                                                        </small>
                                                                    </div>
                                                                    <div class="col-md-3 col-xs-3">
                                                                        <a href="#" data-toggle="modal" class="text-warning editappraisal" data-position="6" 
                                                                            data-target="#modal-additionalquali-{{ $appraisal_id }}" 
                                                                            data-route="{{route('appraisal.data', [$appraisal_id, 6])}}" id="editAdditQuali">
                                                                            <span class="fa fa-edit fa-2x"></span>
                                                                        </a> 
                                                                    </div>
                                                                    <div class="col-md-3 col-xs-3">
                                                                        <a class="text-danger" onclick="return confirm ('Do you want to delete the entries you made in this section?')" href="{{route('delete.appraisals', [$appraisal_id, 6])}}">
                                                                            <span class="fa fa-trash-o fa-2x"></span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @else
                                                                <small>
                                                                    <span class="badge badge-success"
                                                                        style="background-color: red; color: honeydew">No
                                                                        more submission </span> 
                                                                    </small> 
                                                                           
                                                                @endif 
                                                                        
                                                            </li> 
                                                                <li class="list-group-item" style="margin-bottom: 4px">
                                                                    <span style="font-size: 17px; font-weigth:bold">Duties Performed <i style="color: red">*</i></span>
                                                                    <span style="float: right">
                                                                        @if (!$performedduties>0)
                                                                        <a href="#" data-toggle="modal"
                                                                            data-target="#modal-perfduties-{{ $appraisal_id }}">
                                                                            <span
                                                                                class="fa fa-plus-circle fa-2x"></span>
                                                                        </a>
                                                                        @else
                                                                        <div class="row">
                                                                            <div class="col-md-6 col-xs-6">
                                                                                <small>
                                                                                    <span class="badge badge-success"
                                                                                        style="background-color: green; color: honeydew">Submitted <span
                                                                                            class="fa fa-check-circle-o"></span></span>
                                                                                </small>
                                                                            </div>
                                                                            <div class="col-md-3 col-xs-3">
                                                                                <a href="#" data-toggle="modal" class="text-warning editappraisal" data-position="7" 
                                                                                    data-target="#modal-perfduties-{{ $appraisal_id }}" 
                                                                                    data-route="{{route('appraisal.data', [$appraisal_id, 7])}}" id="editPerfduties">
                                                                                    <span class="fa fa-edit fa-2x"></span>
                                                                                </a> 
                                                                            </div>
                                                                            <div class="col-md-3 col-xs-3">
                                                                                <a class="text-danger" onclick="return confirm ('Do you want to delete the entries you made in this section?')" href="{{route('delete.appraisals', [$appraisal_id, 7])}}" >
                                                                                    <span class="fa fa-trash-o fa-2x"></span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                    </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group">

                                        <li class="list-group-item" style="margin-bottom: 4px">
                                            <span style="font-size: 17px; font-weigth:bold">Publications</span>
                                            <span style="float: right">
                                                @if (!$uploadedfiles>0)
                                                @if (!$publications>0)
                                                <a href="#" data-toggle="modal"
                                                    data-target="#modal-publication-{{ $appraisal_id }}">
                                                    <span class="fa fa-plus-circle fa-2x"></span>
                                                </a>
                                                @else
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-6">
                                                        <small>
                                                            <span class="badge badge-success"
                                                                style="background-color: green; color: honeydew">Submitted <span
                                                                    class="fa fa-check-circle-o"></span></span>
                                                        </small>
                                                    </div>
                                                    <div class="col-md-3 col-xs-3"> 
                                                        <a href="#" data-toggle="modal" class="text-warning editappraisal" data-position="8" 
                                                            data-target="#modal-publication-{{ $appraisal_id }}" 
                                                            data-route="{{route('appraisal.data', [$appraisal_id, 8])}}" id="editPublication">
                                                            <span class="fa fa-edit fa-2x"></span>
                                                        </a> 
                                                    </div>
                                                    <div class="col-md-3 col-xs-3">
                                                        <a class="text-danger" onclick="return confirm ('Do you want to delete the entries you made in this section?')" href="{{route('delete.appraisals', [$appraisal_id, 8])}}" >
                                                            <span class="fa fa-trash-o fa-2x"></span>
                                                        </a>
                                                    </div>
                                                </div>
                                                @endif
                                                @else
                                                <small>
                                                    <span class="badge badge-success"
                                                        style="background-color: red; color: honeydew">No
                                                        more submission 
                                                    </span> 
                                                </small>
                                                                           
                                                @endif 
                                            </span>
                                        </li>
                                        <li class="list-group-item" style="margin-bottom: 4px">
                                            <span style="font-size: 17px; font-weigth:bold">Production &
                                                Achievements</span>
                                            <span style="float: right">
                                                @if (!$uploadedfiles>0)
                                                @if (!$productions>0)
                                                <a href="#" data-toggle="modal"
                                                    data-target="#modal-production-{{ $appraisal_id }}">
                                                    <span class="fa fa-plus-circle fa-2x"></span>
                                                </a>
                                                @else
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-6">
                                                        <small>
                                                            <span class="badge badge-success"
                                                                style="background-color: green; color: honeydew">Submitted <span
                                                                    class="fa fa-check-circle-o"></span></span>
                                                        </small>
                                                    </div>
                                                    <div class="col-md-3 col-xs-3"> 
                                                        <a href="#" data-toggle="modal" class="text-warning editappraisal" data-position="9" 
                                                            data-target="#modal-production-{{ $appraisal_id }}" 
                                                            data-route="{{route('appraisal.data', [$appraisal_id, 9])}}" id="editProduction">
                                                            <span class="fa fa-edit fa-2x"></span>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-xs-3">
                                                        <a class="text-danger" onclick="return confirm ('Do you want to delete the entries you made in this section?')" href="{{route('delete.appraisals', [$appraisal_id, 9])}}" >
                                                            <span class="fa fa-trash-o fa-2x"></span>
                                                        </a>
                                                    </div>
                                                </div>
                                                @endif
                                                @else
                                                <small>
                                                    <span class="badge badge-success" style="background-color: red; color: honeydew">No more submission
                                                    </span>
                                                </small>
                                                           
                                                @endif 
                                            </span>
                                        </li>
                                        <li class="list-group-item" style="margin-bottom: 4px">
                                            <span style="font-size: 17px; font-weigth:bold">Administrative
                                                Responsibility</span>
                                            <span style="float: right">
                                                @if (!$uploadedfiles>0)
                                                @if (!$adminrespons>0)
                                                <a href="#" data-toggle="modal"
                                                    data-target="#modal-adminrespons-{{ $appraisal_id }}">
                                                    <span class="fa fa-plus-circle fa-2x"></span>
                                                </a>
                                                @else
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-6">
                                                        <small>
                                                            <span class="badge badge-success"
                                                                style="background-color: green; color: honeydew">Submitted <span
                                                                    class="fa fa-check-circle-o"></span></span>
                                                        </small>
                                                    </div>
                                                    <div class="col-md-3 col-xs-3">
                                                        <a href="#" data-toggle="modal" class="text-warning editappraisal" data-position="10" 
                                                            data-target="#modal-adminrespons-{{ $appraisal_id }}" 
                                                            data-route="{{route('appraisal.data', [$appraisal_id, 10])}}" id="editAdminrespons">
                                                            <span class="fa fa-edit fa-2x"></span>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-xs-3">
                                                        <a class="text-danger" onclick="return confirm ('Do you want to delete the entries you made in this section?')" href="{{route('delete.appraisals', [$appraisal_id, 10])}}" >
                                                            <span class="fa fa-trash-o fa-2x"></span>
                                                        </a>
                                                    </div>
                                                </div>
                                                @endif
                                                @else
                                                <small>
                                                    <span class="badge badge-success" style="background-color: red; color: honeydew">No
                                                        more submission
                                                    </span>
                                                </small>
                                                @endif

                                            </span>
                                        </li>
                                        <li class="list-group-item" style="margin-bottom: 4px">
                                            <span style="font-size: 17px; font-weigth:bold">Course(s) Taught</span>
                                                <span style="float: right">
                                                @if (!$uploadedfiles>0)
                                                @if (!$taughtcourses>0)
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#modal-taughtcourses-{{ $appraisal_id }}">
                                                        <span class="fa fa-plus-circle fa-2x"></span>
                                                    </a>
                                                
                                                    @else
                                                    <div class="row">
                                                        <div class="col-md-6 col-xs-6">
                                                            <small>
                                                                <span class="badge badge-success"
                                                                    style="background-color: green; color: honeydew">Submitted <span
                                                                        class="fa fa-check-circle-o"></span></span>
                                                            </small>
                                                        </div>
                                                        <div class="col-md-3 col-xs-3">
                                                            <a href="#" data-toggle="modal" class="text-warning editappraisal" data-position="11" 
                                                                data-target="#modal-taughtcourses-{{ $appraisal_id }}" 
                                                                data-route="{{route('appraisal.data', [$appraisal_id, 11])}}" id="editTaughtcourses">
                                                                <span class="fa fa-edit fa-2x"></span>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-3 col-xs-3">
                                                            <a class="text-danger" onclick="return confirm ('Do you want to delete the entries you made in this section?')" href="{{route('delete.appraisals', [$appraisal_id, 11])}}" >
                                                                <span class="fa fa-trash-o fa-2x"></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @else
                                                        <small>
                                                            <span class="badge badge-success"
                                                                style="background-color: red; color: honeydew">No
                                                                        more submission 
                                                            </span>
                                                        </small>                
                                                    @endif
                                            </span>
                                                
                                        </li>
                                        <li class="list-group-item" style="margin-bottom: 4px">
                                            <span style="font-size: 17px; font-weigth:bold">Teaching Load Summary </span>
                                            <span style="float: right">
                                                @if (!$uploadedfiles>0)
                                                @if (!$tloadsummaries>0)
                                                <a href="#" data-toggle="modal"
                                                    data-target="#modal-tloadsummary-{{ $appraisal_id }}">
                                                    <span class="fa fa-plus-circle fa-2x"></span>
                                                </a>
                                                @else
                                                <div class="row">
                                                        <div class="col-md-6 col-xs-6">
                                                            <small>
                                                                <span class="badge badge-success"
                                                                    style="background-color: green; color: honeydew">Submitted <span
                                                                        class="fa fa-check-circle-o"></span></span>
                                                            </small>
                                                        </div>
                                                        <div class="col-md-3 col-xs-3">
                                                            <a href="#" data-toggle="modal" class="text-warning editappraisal" data-position="12" 
                                                                data-target="#modal-tloadsummary-{{ $appraisal_id }}" 
                                                                data-route="{{route('appraisal.data', [$appraisal_id, 12])}}" id="editTloadsummary">
                                                                <span class="fa fa-edit fa-2x"></span>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-3 col-xs-3">
                                                            <a class="text-danger" onclick="return confirm ('Do you want to delete the entries you made in this section?')" href="{{route('delete.appraisals', [$appraisal_id, 12])}}" >
                                                                <span class="fa fa-trash-o fa-2x"></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endif
                                                @else
                                                <small>
                                                    <span class="badge badge-success"
                                                        style="background-color: red; color: honeydew">No
                                                        more submission  
                                                        </span>
                                                </small>                                                           
                                                @endif
                                            </span>
                                        </li>
                                        <li class="list-group-item" style="margin-bottom: 4px">
                                            <span style="font-size: 17px; font-weigth:bold">Any Other Information <i
                                                    style="color: red">*</i></span>
                                            <span style="float: right">
                                                @if (!$anyotherinfos>0)
                                                <a href="#" data-toggle="modal"
                                                    data-target="#modal-anyotherinfo-{{ $appraisal_id }}">
                                                    <span class="fa fa-plus-circle fa-2x"></span>
                                                </a>
                                                @else
                                                <div class="row">
                                                        <div class="col-md-6 col-xs-6">
                                                            <small>
                                                                <span class="badge badge-success"
                                                                    style="background-color: green; color: honeydew">Submitted <span
                                                                        class="fa fa-check-circle-o"></span></span>
                                                            </small>
                                                        </div>
                                                        <div class="col-md-3 col-xs-3">
                                                            <a href="#" data-toggle="modal" class="text-warning editappraisal" data-position="13" 
                                                                data-target="#modal-anyotherinfo-{{ $appraisal_id }}" 
                                                                data-route="{{route('appraisal.data', [$appraisal_id, 13])}}" id="editAnyotherinfo">
                                                                <span class="fa fa-edit fa-2x"></span>
                                                            </a> 
                                                        </div>
                                                        <div class="col-md-3 col-xs-3">
                                                            <a class="text-danger" onclick="return confirm ('Do you want to delete the entries you made in this section?')" href="{{route('delete.appraisals', [$appraisal_id, 13])}}" >
                                                                <span class="fa fa-trash-o fa-2x"></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endif
                                            </span>
                                        </li>
                                        @if ($qualifications>0 && $salaryscales>0 && $performedduties>0 && $anyotherinfos>0)
                                        <li class="list-group-item" style="margin-bottom: 4px">
                                            <span style="font-size: 17px; font-weigth:bold">Upload Supporting Documents
                                                <i style="color: red">*</i></span>
                                            <span style="float: right">
                                                @if (!$uploadedfiles>0)
                                                <a href="#" data-toggle="modal"
                                                    data-target="#modal-uploadfiles-{{ $appraisal_id }}">
                                                    <span class="fa fa-plus-circle fa-2x"></span>
                                                </a>
                                                @else
                                                <div class="row">
                                                        <div class="col-md-6 col-xs-6">
                                                            <small>
                                                                <span class="badge badge-success"
                                                                    style="background-color: green; color: honeydew">Submitted <span
                                                                        class="fa fa-check-circle-o"></span></span>
                                                            </small>
                                                        </div>
                                                        <div class="col-md-3 col-xs-3">
                                                            <a href="#" data-toggle="modal" class="text-warning" 
                                                                data-target="#modal-uploadfiles-{{ $appraisal_id }}">
                                                                <span class="fa fa-edit fa-2x"></span>
                                                            </a>
                                                            <a href="#" data-toggle="modal" class="text-warning editappraisal" data-position="14" 
                                                                data-target="#modal-uploadfiles-{{ $appraisal_id }}" 
                                                                data-route="{{route('appraisal.data', [$appraisal_id, 14])}}" id="editUploadfiles">
                                                                <span class="fa fa-edit fa-2x"></span>
                                                            </a>  
                                                        </div>
                                                        <div class="col-md-3 col-xs-3">
                                                            <a class="text-danger" onclick="return confirm ('Do you want to delete the entries you made in this section?')" href="{{route('delete.appraisals', [$appraisal_id, 14])}}" >
                                                                <span class="fa fa-trash-o fa-2x"></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endif
                                            </span>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>

                            <p>
                                <a href="{{ route('submitted.appraisals') }}" class="btn btn-primary btn-sm"><span class="fa fa-eye"></span> Submitted Appraisals</a>
                            </p>

                            @else
                            <p style="text-align: justify; font-size: 20px; color: red">

                                Dear {{ $user->title->title.' '.$user->firstname.' '.$user->lastname }}, no form to be filled at the moment! <br>
                                {{ $appraisal->title }} will start on
                                {{ date('d M, Y',strtotime($appraisal->starting)) }} and
                                end on {{ date('d M, Y',strtotime($appraisal->ending)) }}.
                            </p>
                            <p>
                                <a href="{{ route('appraisals.published') }}" class="btn btn-primary btn-sm">Published Appraisals</a>
                            </p>

                            @endif

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>

        <!-- Modal for Qualification -->
        <div class="modal fade" id="modal-qualification-{{ $appraisal_id }}">
            <div class="modal-dialog modal-lg">

                <form action="{{ route('qualification.store') }}" method="post" onsubmit="return confirm ('Do you want to submit the entries you made in this section?')">
                    @csrf

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"> Add Academic Qualification for {{ $appraisal->title }}</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="appraisal_id" value="{{ $appraisal_id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            @livewire('qualification')

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


        <!-- Modal for Professional Membership -->
        <div class="modal fade" id="modal-profmemb-{{ $appraisal_id }}">
            <div class="modal-dialog modal-lg">

                <form action="{{ route('profmembership.store') }}" method="post" onsubmit="return confirm ('Do you want to submit the entries you made in this section?')">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"> Add Professional Membership for {{ $appraisal->title }}</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="appraisal_id" value="{{ $appraisal_id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            @livewire('profmembership')

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
        <!-- Modal for Promotions -->
        <div class="modal fade" id="modal-promotion-{{ $appraisal_id }}">
            <div class="modal-dialog modal-lg">

                <form action="{{ route('promotion.store') }}" method="post" onsubmit="return confirm ('Do you want to submit the entries you made in this section?')">
                    @csrf

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"> Add Promotions for {{ $appraisal->title }}</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="appraisal_id" value="{{ $appraisal_id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            @livewire('promotion')

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
        <!-- Modal for Salary Scale -->
        <div class="modal fade" id="modal-salaryscale-{{ $appraisal_id }}">
            <div class="modal-dialog modal-lg">

                <form action="{{ route('salaryscale.store') }}" method="post" onsubmit="return confirm ('Do you want to submit the entries you made in this section?')">
                    @csrf

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"> Add Salary Scale for {{ $appraisal->title }}</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="appraisal_id" value="{{ $appraisal_id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            @livewire('salaryscale')

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
        <!-- Modal for Training -->
        <div class="modal fade" id="modal-training-{{ $appraisal_id }}">
            <div class="modal-dialog modal-lg">

                <form action="{{ route('training.store') }}" method="post" onsubmit="return confirm ('Do you want to submit the entries you made in this section?')">
                    @csrf

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"> Add Training(s)/Workshop(s) for {{ $appraisal->title }}</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="appraisal_id" value="{{ $appraisal_id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            @livewire('training')

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
        <!-- Modal for Additional Quali -->
        <div class="modal fade" id="modal-additionalquali-{{ $appraisal_id }}">
            <div class="modal-dialog modal-lg">

                <form action="{{ route('additionalqualif.store') }}" method="post" onsubmit="return confirm ('Do you want to submit the entries you made in this section?')">
                    @csrf

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"> Add Additional Qualification for {{ $appraisal->title }}</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="appraisal_id" value="{{ $appraisal_id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            @livewire('additionalqualif')

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
        <!-- Modal for Performed Duties -->
        <div class="modal fade" id="modal-perfduties-{{ $appraisal_id }}">
            <div class="modal-dialog modal-lg">

                <form action="{{ route('performedduty.store') }}" method="post" onsubmit="return confirm ('Do you want to submit the entries you made in this section?')">
                    @csrf

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"> Add Performed Duties for {{ $appraisal->title }}</h4>
                        </div>
                        <div class="modal-body" id="dutyContainer">
                            <input type="hidden" name="appraisal_id" value="{{ $appraisal_id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            @livewire('dutiesperformed')

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
        <!-- Modal for Publications -->
        <div class="modal fade" id="modal-publication-{{ $appraisal_id }}">
            <div class="modal-dialog modal-lg">

                <form action="{{ route('publication.store') }}" method="post" onsubmit="return confirm ('Do you want to submit the entries you made in this section?')">
                    @csrf

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"> Add Publications for {{ $appraisal->title }}</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="appraisal_id" value="{{ $appraisal_id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            @livewire('publication')

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
        <!-- Modal for Production -->
        <div class="modal fade" id="modal-production-{{ $appraisal_id }}">
            <div class="modal-dialog modal-lg">

                <form action="{{ route('production.store') }}" method="post" onsubmit="return confirm ('Do you want to submit the entries you made in this section?')">
                    @csrf

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"> Add Production for {{ $appraisal->title }}</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="appraisal_id" value="{{ $appraisal_id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            @livewire('production')

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
        <!-- Modal for AdminRespons -->
        <div class="modal fade" id="modal-adminrespons-{{ $appraisal_id }}">
            <div class="modal-dialog modal-lg">

                <form action="{{ route('adminrespons.store') }}" method="post" onsubmit="return confirm ('Do you want to submit the entries you made in this section?')">
                    @csrf

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"> Add Administrative Responsibility for {{ $appraisal->title }}</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="appraisal_id" value="{{ $appraisal_id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            @livewire('adminresponsibility')

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
        <!-- Modal for taughtcourses -->
        <div class="modal fade" id="modal-taughtcourses-{{ $appraisal_id }}">
            <div class="modal-dialog modal-lg">

                <form action="{{ route('coursetaught.store') }}" method="post" onsubmit="return confirm ('Do you want to submit the entries you made in this section?')">
                    @csrf

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"> Add Courses Taught for {{ $appraisal->title }}</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="appraisal_id" value="{{ $appraisal_id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            @livewire('coursestaught')

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
        <!-- Modal for tloadsummary -->
        <div class="modal fade" id="modal-tloadsummary-{{ $appraisal_id }}">
            <div class="modal-dialog modal-lg">

                <form action="{{ route('tloadsummary.store') }}" method="post" onsubmit="return confirm ('Do you want to submit the entries you made in this section?')">
                    @csrf

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"> Add Teaching Load Summary for {{ $appraisal->title }}</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="appraisal_id" value="{{ $appraisal_id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            @livewire('teachingloadsummary')

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
        <!-- Modal for anyotherinfo -->
        <div class="modal fade" id="modal-anyotherinfo-{{ $appraisal_id }}">
            <div class="modal-dialog modal-lg">

                <form action="{{ route('anyotherinfo.store') }}" method="post" onsubmit="return confirm ('Do you want to submit the entries you made in this section?')">
                    @csrf

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"> Add Any Other Information for {{ $appraisal->title }}</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="appraisal_id" value="{{ $appraisal_id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            @livewire('anyotherinfo')

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
        <!-- Modal for uploadfiles -->
        <div class="modal fade" id="modal-uploadfiles-{{ $appraisal_id }}">
            <div class="modal-dialog modal-lg">

                <form action="{{ route('supportingdoc.store') }}" method="post" enctype="multipart/form-data" onsubmit="return confirm ('Do you want to submit the entries you made in this section?')">
                    @csrf

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"> Add Supporting Documents for {{ $appraisal->title }}</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="appraisal_id" value="{{ $appraisal_id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="">Select Appraiser <strong style="color:red;">*</strong></label>
                                        <select name="sentto_id" class="form-control" required>
                                            <option selected="disabled">Select Appriaser</option>
                                            @foreach ($appraisers as $appraiser)
                                            <option value="{{$appraiser->id}}">
                                                {{$appraiser->title->title.' '.$appraiser->firstname.' '.$appraiser->lastname.'  - '.$appraiser->department->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div>
                                @livewire('supporting-document')
                                {{-- <div class="form-group">
                                    <label for="">Select Supporting Document(s) <strong style="color:red;">* [Select all your documents at once]</strong></label>
                                    <input type="file" name="supportingdoc[]" required multiple>
                                </div> --}}
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

@section('footer-scripts')
<script>
    $('.editappraisal').click(function(){
        let route = $(this).data('route');
        let position = $(this).data('position');
        // alert(route);
        $.ajax({
            url: route,
            type:'GET',
            success: function(res){
                console.log(res.data);
                fillFormByPosition(res.data, position);
            }
        });
    });

    let autoFillQualilficationFormData = function(data){
        let html = '';
        let i = 0;
        for(i = 0; i < data.length; i++){
            html+='<tr><td style="width: 20%"><select name="qualname[]" class="form-control form-control-sm qualname"required>';
                html+='<option value="">Select Qualification</option>';
                if(data[i].qualname == 'PhD'){
                    html+='<option value="PhD" selected>Ph.D</option>';
                }else{
                    html+='<option value="PhD">Ph.D</option>';
                }
                if(data[i].qualname == 'MSc'){
                    html+='<option value="MSc" selected>MSc</option>';
                }else{
                    html+='<option value="MSc">MSc</option>';
                }
                if(data[i].qualname == 'MEd'){
                    html+='<option value="MEd" selected>MEd</option>';
                }else{
                    html+='<option value="MEd">MEd</option>';
                }

                if(data[i].qualname == 'MBA'){
                    html+='<option value="MBA" selected>MBA</option>';
                }else{
                    html+='<option value="MBA">MBA</option>';
                }
                if(data[i].qualname == 'MA'){
                    html+='<option value="MA" selected>MA</option>';
                }else{
                    html+='<option value="MA">MA</option>';
                }
                if(data[i].qualname == 'PGD'){
                    html+='<option value="PGD" selected>PGD</option>';
                }else{
                    html+='<option value="PGD">PGD</option>';
                }
                if(data[i].qualname == 'PGDE'){
                    html+='<option value="PGDE" selected>PGDE</option>';
                }else{
                    html+='<option value="PGDE">PGDE</option>';
                }
                if(data[i].qualname == 'BA'){
                    html+='<option value="BA" selected>BA</option>';
                }else{
                    html+='<option value="BA">BA</option>';
                }
                if(data[i].qualname == 'BSc'){
                    html+='<option value="BSc" selected>BSc</option>';
                }else{
                    html+='<option value="BSc" >BSc</option>';
                }
                if(data[i].qualname == 'HND'){
                    html+='<option value="HND" selected>HND</option>';
                }else{
                    html+='<option value="HND">HND</option>';
                }
                if(data[i].qualname == 'BEd'){
                    html+='<option value="BEd" selected>BEd</option>';
                }else{
                    html+='<option value="BEd">BEd</option>';
                }
                if(data[i].qualname == 'ND'){
                    html+='<option value="ND" selected>ND</option>';
                }else{
                    html+='<option value="ND">ND</option>';
                }
                if(data[i].qualname == 'NCE'){
                    html+='<option value="NCE" selected>NCE</option>';
                }else{
                    html+='<option value="NCE">NCE</option>';
                }
                if(data[i].qualname == 'O-level'){
                    html+='<option value="O-level" selected>O-level</option>';
                }else{
                    html+='<option value="O-level">O-level</option>';
                }
            html+='</select>';
            html+='</td><td style="width: 60%">';
            html+='<input type="text" class="form-control form-control-sm" name="awardinginst[]" value="'+data[i].awardinginst+'" required placeholder="Awarding Institution e.g. AIFPU"></td>';
            html+='<td style="width: 20%"><input type="date" value="'+data[i].dateofgrad+'" class="form-control form-control-sm" name="dateofgrad[]" required placeholder="Grad. Year"> <input type="hidden" value="'+data[i].id+'" class="" name="qualid[]"></td>';
            html+='<td><button wire:click.prevent="remove('+i+')" class="btn btn-danger btn-sm"><span class="fa fa-times"></span></button></td></tr>';
        }

        let key = i++;
        html+='<tr><td style="width: 20%"><select name="qualname[]" class="form-control form-control-sm qualname">';
        html+='<option value="">Select Qualification</option>';
        html+='<option value="PhD" >Ph.D</option>';
        html+='<option value="MSc" >MSc</option>';
        html+='<option value="MEd" >MEd</option>';
        html+='<option value="MBA" >MBA</option>';
        html+='<option value="MA" >MA</option>';
        html+='<option value="PGD" >PGD</option>';
        html+='<option value="PGDE" >PGDE</option>';
        html+='<option value="BA" >BA</option>';
        html+='<option value="BSc" >BSc</option>';
        html+='<option value="HND" >HND</option>';
        html+='<option value="BEd" >BEd</option>';
        html+='<option value="ND" >ND</option>';
        html+='<option value="NCE" >NCE</option>';
        html+='<option value="O-level" >O-level</option>';
        html+='</select>';
        html+='</td><td style="width: 60%">';
        html+='<input type="text" class="form-control form-control-sm" name="awardinginst[]" placeholder="Awarding Institution e.g. AIFPU"></td>';
        html+='<td style="width: 20%"><input type="date" class="form-control form-control-sm" name="dateofgrad[]" placeholder="Grad. Year"></td>';
        html+='<td><button wire:click.prevent="remove('+key+')" class="btn btn-danger btn-sm"><span class="fa fa-times"></span></button></td></tr>';

        $('.moreQualification').empty();
        $('.moreQualification').prepend(html);
        console.log(html);
    }

    let autfillProfMembFormData = function(data)
    {
        let html = '';
        let i = 0;
        for(i = 0; i < data.length; i++){
            html+='<tr><td style="width: 40%"><input type="text" value="'+data[i].profbody+'" class="form-control form-control-sm" name="profbody[]" placeholder="Professional Body"></td>';
            html+='<td style="width: 25%"><input type="text" value="'+data[i].membcategory+'" class="form-control form-control-sm" name="membcategory[]" placeholder="Memb. Category"></td>';
            html+='<td style="width: 15%"><input type="text" value="'+data[i].membnumb+'" class="form-control form-control-sm" name="membnumb[]" placeholder="Memb. Num."></td>';
            html+='<td style="width: 20%"><input type="date" value="'+data[i].awardyear+'" class="form-control form-control-sm" name="awardyear[]"><input type="hidden" value="'+data[i].id+'" name="profbodyid[]"></td>';
            html+='<td><button wire:click.prevent="remove('+i+')" class="btn btn-danger btn-sm"><span class="fa fa-times"></span></button></td></tr>';
        }
        let key = i++;
        html+='<tr><td style="width: 40%"><input type="text" class="form-control form-control-sm" name="profbody[]" placeholder="Professional Body"></td>';
        html+='<td style="width: 25%"><input type="text" class="form-control form-control-sm" name="membcategory[]" placeholder="Memb. Category"></td>';
        html+='<td style="width: 15%"><input type="text" class="form-control form-control-sm" name="membnumb[]" placeholder="Memb. Num."></td>';
        html+='<td style="width: 20%"><input type="date" class="form-control form-control-sm" name="awardyear[]"></td>';
        html+='<td><button wire:click.prevent="remove('+key+')" class="btn btn-danger btn-sm"><span class="fa fa-times"></span></button></td></tr>';
        
        $('#editProfbody').empty();
        $('#editProfbody').prepend(html);
    }

    let autfillPromotionFormData = function(data)
    {
        let html = '';
        let i = 0;
        for(i = 0; i < data.length; i++){
            html+='<tr><td style="width: 50%"><input type="date" value="'+data[i].promodate+'" class="form-control form-control-sm" name="promodate[]" placeholder="Promotion Date"></td>';
            html+='<td style="width: 50%"><input type="text" value="'+data[i].grade+'" class="form-control form-control-sm" name="grade[]" placeholder="Grade"><input type="hidden" value="'+data[i].id+'" name="promoid[]"></td>';
            html+='<td><button wire:click.prevent="remove('+i+')" class="btn btn-danger btn-sm"><span class="fa fa-times"></span></button></td></tr>';
                
        }
        let key = i++;
        html+='<tr><td style="width: 50%"><input type="date" class="form-control form-control-sm" name="promodate[]" placeholder="Promotion Date"></td>';
        html+='<td style="width: 50%"><input type="text" class="form-control form-control-sm" name="grade[]" placeholder="Grade"></td>';
        html+='<td><button wire:click.prevent="remove('+key+')" class="btn btn-danger btn-sm"><span class="fa fa-times"></span></button></td></tr>';

        $('#editPromotiontable').empty();
        $('#editPromotiontable').prepend(html);
    }

    let autofillSalaryScale = function(data){
        let html = '';
        let i = 0;
        html+='<tr><td style="width: 50%"><input type="text" value="'+data[0].presentpost+'" class="form-control form-control-sm" name="presentpost" required placeholder="Present Scale"></td>';
        html+='<td style="width: 50%"><input type="text" value="'+data[0].salaryscale+'" class="form-control form-control-sm" name="salaryscale" required placeholder="Salary Scale"><input type="hidden" value="'+data[0].id+'" name="salaryid"></td></tr>';
        
        $('#editSalarScale').empty();
        $('#editSalarScale').prepend(html);
    }

    let autofillTrainings = function(data){
        let html = '';
        let i = 0;
        for(i = 0; i < data.length; i++){
            html+='<tr><td style="width: 25%"><select name="trainingtype[]" value="'+data[i].trainingtype+'" class="form-control form-control-sm">';
            html+='<option value="">Select Training Type</option>';
            if(data[i].trainingtype == 'Course'){
                html+='<option value="Course" selected>Course</option>';
            }else{
                html+='<option value="Course">Course</option>';
            }
            if(data[i].trainingtype == 'Workshop'){
                html+='<option value="Workshop" selected>Workshop</option>';
            }else{
                html+='<option value="Workshop">Workshop</option>';
            }
            html+='</select></td>';
            html+='<td style="width: 50%"><input type="text" value="'+data[i].caption+'" class="form-control form-control-sm" name="caption[]" placeholder="Caption"></td>';
            html+='<td style="width: 25%"><input type="date" value="'+data[i].trainingdate+'" class="form-control form-control-sm" name="trainingdate[]"><input type="hidden" value="'+data[i].id+'" name="trainingid[]"></td>';
            html+='<td><button wire:click.prevent="remove('+i+')" class="btn btn-danger btn-sm"><span class="fa fa-times"></span></button></td></tr>';
        }
        html+='<tr><td style="width: 25%"><select name="trainingtype[]" class="form-control form-control-sm">';
        html+='<option value="">Select Training Type</option>';
        html+='<option value="Course">Course</option>';
        html+='<option value="Workshop">Workshop</option>';
        html+='</select></td>';
        html+='<td style="width: 50%"><input type="text" class="form-control form-control-sm" name="caption[]" placeholder="Caption"></td>';
        html+='<td style="width: 25%"><input type="date" class="form-control form-control-sm" name="trainingdate[]"></td>';
        html+='<td><button wire:click.prevent="remove('+i+')" class="btn btn-danger btn-sm"><span class="fa fa-times"></span></button></td></tr>';
        
        $('#editTrainingtable').empty();
        $('#editTrainingtable').prepend(html);
    }

    let autofillAdditQuali = function(data){
        let html = '';
        let i = 0;
        for(i = 0; i < data.length; i++){
            html+='<tr><td style="width: 75%"><input type="text" value="'+data[i].qualificationtype+'" class="form-control form-control-sm" name="qualificationtype[]" placeholder="Qualification Name"></td>';
            html+='<td style="width: 25%"><input type="date" value="'+data[i].dateobtained+'" class="form-control form-control-sm" name="dateobtained[]"><input type="hidden" value="'+data[i].id+'" name="qtypeid[]"></td>';
            html+='<td><button wire:click.prevent="remove('+i+')" class="btn btn-danger btn-sm"><span class="fa fa-times"></span></button></td></tr>';
        }
        let key = i++;
        html+='<tr><td style="width: 75%"><input type="text" class="form-control form-control-sm" name="qualificationtype[]" placeholder="Qualification Name"></td>';
        html+='<td style="width: 25%"><input type="date" class="form-control form-control-sm" name="dateobtained[]"></td>';
        html+='<td><button wire:click.prevent="remove('+key+')" class="btn btn-danger btn-sm"><span class="fa fa-times"></span></button></td></tr>';
        
        $('#editAdditionalQualif').empty();
        $('#editAdditionalQualif').prepend(html);

    }

    let autofillDuties = function(data){
        let html='<input type="hidden" value="'+data[0].id+'" name="dutyid">';
        $('#dutyContainer').prepend(html);

        let duty = $('#performedduty');
        duty.text(data[0].performedduty);
    }

    let fillFormByPosition = function(data, position){
        if(position === 1 ) autoFillQualilficationFormData(data, position);
        if(position === 2 ) autfillProfMembFormData(data, position);
        if(position === 3 ) autfillPromotionFormData(data, position);
        if(position === 4 ) autofillSalaryScale(data, position);
        if(position === 5 ) autofillTrainings(data, position);
        if(position === 6 ) autofillAdditQuali(data, position);
        if(position === 7 ) autofillDuties(data, position);
    }
</script>
    
@endsection