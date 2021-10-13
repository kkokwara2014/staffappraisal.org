@extends('admin.layout.app')

@section('title')
Junior Staff Appraisal Form
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
                                that your entries are cross-checked before submitting as you may not have time to edit
                                your entries after submission. Thank you.
                            </p>
                            <hr>
                            @if($uploadedfiles>0)
                            <p>
                                <ul class="list-group">
                                    <li class="list-group-item"
                                        style="margin-bottom: 5px;background-color:green;color:white;">
                                        <h4>
                                            Congratulations! You have completed {{$appraisal->title}}. Please check your
                                            e-mail. Thank you.
                                        </h4>
                                    </li>
                                </ul>
                            </p>
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group">
                                        <li class="list-group-item" style="margin-bottom: 4px">
                                            <span style="font-size: 17px; font-weigth:bold">Institution Attended <i
                                                    style="color: red">*</i></span>
                                            <span style="float: right">
                                                @if (!$institutions>0 && !$appraisalscore>0)
                                                <a href="#" data-toggle="modal"
                                                    data-target="#modal-institution-{{ $appraisal_id }}">
                                                    <span class="fa fa-plus-circle fa-2x"></span>
                                                </a>
                                                @else
                                                <div class="row">
                                                    @if (!$appraisalscore>0)
                                                    <div class="col-md-6 col-xs-6">
                                                        <small>
                                                            <span class="badge badge-success"
                                                                style="background-color: green; color: honeydew">Submitted
                                                                <span class="fa fa-check-circle-o"></span></span>
                                                        </small>
                                                    </div>
                                                    <div class="col-md-3 col-xs-3">
                                                        <a href="#" data-toggle="modal"
                                                            class="text-warning editappraisal" data-position="15"
                                                            data-target="#modal-institution-{{ $appraisal_id }}"
                                                            data-route="{{route('appraisal.data', [$appraisal_id, 15])}}"
                                                            id="editInstitution">
                                                            <span class="fa fa-edit fa-2x"></span>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-xs-3">
                                                        <a class="text-danger"
                                                            onclick="return confirm ('Do you want to delete the entries you made in this section?')"
                                                            href="{{route('delete.appraisals', [$appraisal_id, 15])}}">
                                                            <span class="fa fa-trash-o fa-2x"></span>
                                                        </a>
                                                    </div>
                                                    @else
                                                        <div class="col-md-6 col-xs-6">
                                                            <small>
                                                                <span class="badge badge-success"
                                                                    style="background-color: green; color: honeydew">Scored <span
                                                                        class="fa fa-check-circle-o"></span></span>
                                                            </small> 
                                                        </div> 
                                                    @endif
                                                </div>
                                                @endif
                                            </span>
                                        </li>
                                        <li class="list-group-item" style="margin-bottom: 4px">
                                            <span style="font-size: 17px; font-weigth:bold">Academic Qualification <i
                                                    style="color: red">*</i></span>
                                            <span style="float: right">
                                                @if (!$juniorqualifications>0 && !$appraisalscore>0)
                                                <a href="#" data-toggle="modal"
                                                    data-target="#modal-qualification-{{ $appraisal_id }}">
                                                    <span class="fa fa-plus-circle fa-2x"></span>
                                                </a>
                                                @else
                                                <div class="row">
                                                    @if (!$appraisalscore>0)
                                                    <div class="col-md-6 col-xs-6">
                                                        <small>
                                                            <span class="badge badge-success"
                                                                style="background-color: green; color: honeydew">Submitted
                                                                <span class="fa fa-check-circle-o"></span></span>
                                                        </small>
                                                    </div>
                                                    <div class="col-md-3 col-xs-3">
                                                        <a href="#" data-toggle="modal"
                                                            class="text-warning editappraisal" data-position="16"
                                                            data-target="#modal-qualification-{{ $appraisal_id }}"
                                                            data-route="{{route('appraisal.data', [$appraisal_id, 16])}}"
                                                            id="editQualification">
                                                            <span class="fa fa-edit fa-2x"></span>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-xs-3">
                                                        <a class="text-danger"
                                                            onclick="return confirm ('Do you want to delete the entries you made in this section?')"
                                                            href="{{route('delete.appraisals', [$appraisal_id, 1])}}">
                                                            <span class="fa fa-trash-o fa-2x"></span>
                                                        </a>
                                                    </div>
                                                    @else
                                                        <div class="col-md-6 col-xs-6">
                                                            <small>
                                                                <span class="badge badge-success"
                                                                    style="background-color: green; color: honeydew">Scored <span
                                                                        class="fa fa-check-circle-o"></span></span>
                                                            </small> 
                                                        </div> 
                                                    @endif
                                                </div>
                                                @endif
                                            </span>
                                        </li>
                                        <li class="list-group-item" style="margin-bottom: 4px">
                                            <span style="font-size: 17px; font-weigth:bold">Professional
                                                Membership</span>
                                            <span style="float: right">
                                                {{-- @if (!$uploadedfiles>0) --}}
                                                @if (!$profmembs>0 && !$appraisalscore>0)
                                                <a href="#" data-toggle="modal"
                                                    data-target="#modal-profmemb-{{ $appraisal_id }}">
                                                    <span class="fa fa-plus-circle fa-2x"></span>
                                                </a>
                                                @else
                                                <div class="row">
                                                    @if (!$appraisalscore>0)
                                                    <div class="col-md-6 col-xs-6">
                                                        <small>
                                                            <span class="badge badge-success"
                                                                style="background-color: green; color: honeydew">Submitted
                                                                <span class="fa fa-check-circle-o"></span></span>
                                                        </small>
                                                    </div>
                                                    <div class="col-md-3 col-xs-3">
                                                        <a href="#" data-toggle="modal"
                                                            class="text-warning editappraisal" data-position="2"
                                                            data-target="#modal-profmemb-{{ $appraisal_id }}"
                                                            data-route="{{route('appraisal.data', [$appraisal_id, 2])}}"
                                                            id="editProfmemb">
                                                            <span class="fa fa-edit fa-2x"></span>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-xs-3">
                                                        <a class="text-danger"
                                                            onclick="return confirm ('Do you want to delete the entries you made in this section?')"
                                                            href="{{route('delete.appraisals', [$appraisal_id, 2])}}">
                                                            <span class="fa fa-trash-o fa-2x"></span>
                                                        </a>
                                                    </div>
                                                    @else
                                                        <div class="col-md-6 col-xs-6">
                                                            <small>
                                                                <span class="badge badge-success"
                                                                    style="background-color: green; color: honeydew">Scored <span
                                                                        class="fa fa-check-circle-o"></span></span>
                                                            </small> 
                                                        </div> 
                                                    @endif
                                                </div>
                                                @endif
                                                {{-- @else
                                                <small>
                                                    <span class="badge badge-success"
                                                        style="background-color: red; color: honeydew">No
                                                        more submission
                                                    </span>
                                                </small>
                                                @endif --}}
                                            </span>
                                        </li>
                                        <li class="list-group-item" style="margin-bottom: 4px">
                                            <span style="font-size: 17px; font-weigth:bold">Post-Qualification
                                                Experience </span>
                                            <span style="float: right">
                                                {{-- @if (!$uploadedfiles>0) --}}
                                                @if (!$postqualiexperiences>0 && !$appraisalscore>0)
                                                <a href="#" data-toggle="modal"
                                                    data-target="#modal-postqualiexperience-{{ $appraisal_id }}">
                                                    <span class="fa fa-plus-circle fa-2x"></span>
                                                </a>
                                                @else
                                                <div class="row">
                                                    @if (!$appraisalscore>0)
                                                    <div class="col-md-6 col-xs-6">
                                                        <small>
                                                            <span class="badge badge-success"
                                                                style="background-color: green; color: honeydew">Submitted
                                                                <span class="fa fa-check-circle-o"></span></span>
                                                        </small>
                                                    </div>
                                                    <div class="col-md-3 col-xs-3">
                                                        <a href="#" data-toggle="modal"
                                                            class="text-warning editappraisal" data-position="17"
                                                            data-target="#modal-postqualiexperience-{{ $appraisal_id }}"
                                                            data-route="{{route('appraisal.data', [$appraisal_id, 17])}}"
                                                            id="editPostqualiexperience">
                                                            <span class="fa fa-edit fa-2x"></span>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-xs-3">
                                                        <a class="text-danger"
                                                            onclick="return confirm ('Do you want to delete the entries you made in this section?')"
                                                            href="{{route('delete.appraisals', [$appraisal_id, 17])}}">
                                                            <span class="fa fa-trash-o fa-2x"></span>
                                                        </a>
                                                    </div>
                                                    @else
                                                        <div class="col-md-6 col-xs-6">
                                                            <small>
                                                                <span class="badge badge-success"
                                                                    style="background-color: green; color: honeydew">Scored <span
                                                                        class="fa fa-check-circle-o"></span></span>
                                                            </small> 
                                                        </div> 
                                                    @endif
                                                </div>
                                                @endif
                                                {{-- @else
                                                <small>
                                                    <span class="badge badge-success"
                                                        style="background-color: red; color: honeydew">No
                                                        more submission
                                                    </span>
                                                </small>
                                                @endif --}}
                                            </span>
                                        </li>
                                        <li class="list-group-item" style="margin-bottom: 4px">
                                            <span style="font-size: 17px; font-weigth:bold">Promotions</span>
                                            <span style="float: right">
                                                {{-- @if (!$uploadedfiles>0) --}}
                                                @if (!$promotions>0 && !$appraisalscore>0)
                                                <a href="#" data-toggle="modal"
                                                    data-target="#modal-promotion-{{ $appraisal_id }}">
                                                    <span class="fa fa-plus-circle fa-2x"></span>
                                                </a>
                                                @else
                                                <div class="row">
                                                    @if (!$appraisalscore>0)
                                                    <div class="col-md-6 col-xs-6">
                                                        <small>
                                                            <span class="badge badge-success"
                                                                style="background-color: green; color: honeydew">Submitted
                                                                <span class="fa fa-check-circle-o"></span></span>
                                                        </small>
                                                    </div>
                                                    <div class="col-md-3 col-xs-3">
                                                        <a href="#" data-toggle="modal"
                                                            class="text-warning editappraisal" data-position="3"
                                                            data-target="#modal-promotion-{{ $appraisal_id }}"
                                                            data-route="{{route('appraisal.data', [$appraisal_id, 3])}}"
                                                            id="editPromotion">
                                                            <span class="fa fa-edit fa-2x"></span>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-xs-3">
                                                        <a class="text-danger"
                                                            onclick="return confirm ('Do you want to delete the entries you made in this section?')"
                                                            href="{{route('delete.appraisals', [$appraisal_id, 3])}}">
                                                            <span class="fa fa-trash-o fa-2x"></span>
                                                        </a>
                                                    </div>
                                                    @else
                                                        <div class="col-md-6 col-xs-6">
                                                            <small>
                                                                <span class="badge badge-success"
                                                                    style="background-color: green; color: honeydew">Scored <span
                                                                        class="fa fa-check-circle-o"></span></span>
                                                            </small> 
                                                        </div> 
                                                    @endif
                                                </div>
                                                @endif
                                                {{-- @else
                                                <small>
                                                    <span class="badge badge-success"
                                                        style="background-color: red; color: honeydew">No
                                                        more submission
                                                    </span>
                                                </small>
                                                @endif --}}
                                            </span>
                                        </li>
                                        <li class="list-group-item" style="margin-bottom: 4px">
                                            <span style="font-size: 17px; font-weigth:bold">Present Post & Salary Scale
                                                <i style="color: red">*</i></span>
                                            <span style="float: right">
                                                @if (!$salaryscales>0 && !$appraisalscore>0)
                                                <a href="#" data-toggle="modal"
                                                    data-target="#modal-salaryscale-{{ $appraisal_id }}">
                                                    <span class="fa fa-plus-circle fa-2x"></span>
                                                </a>
                                                @else
                                                <div class="row">
                                                    @if (!$appraisalscore>0)
                                                    <div class="col-md-6 col-xs-6">
                                                        <small>
                                                            <span class="badge badge-success"
                                                                style="background-color: green; color: honeydew">Submitted
                                                                <span class="fa fa-check-circle-o"></span></span>
                                                        </small>
                                                    </div>
                                                    <div class="col-md-3 col-xs-3">
                                                        <a href="#" data-toggle="modal"
                                                            class="text-warning editappraisal" data-position="4"
                                                            data-target="#modal-salaryscale-{{ $appraisal_id }}"
                                                            data-route="{{route('appraisal.data', [$appraisal_id, 4])}}"
                                                            id="editSalary">
                                                            <span class="fa fa-edit fa-2x"></span>
                                                        </a>

                                                    </div>
                                                    <div class="col-md-3 col-xs-3">
                                                        <a class="text-danger"
                                                            onclick="return confirm ('Do you want to delete the entries you made in this section?')"
                                                            href="{{route('delete.appraisals', [$appraisal_id, 4])}}">
                                                            <span class="fa fa-trash-o fa-2x"></span>
                                                        </a>
                                                    </div>
                                                    @else
                                                        <div class="col-md-6 col-xs-6">
                                                            <small>
                                                                <span class="badge badge-success"
                                                                    style="background-color: green; color: honeydew">Scored <span
                                                                        class="fa fa-check-circle-o"></span></span>
                                                            </small> 
                                                        </div> 
                                                    @endif
                                                </div>
                                                @endif
                                            </span>
                                        </li>
                                                                                
                                    </ul>
                                </div>

                                <div class="col-md-6">
                                    <ul class="list-group">

                                        <li class="list-group-item" style="margin-bottom: 4px">
                                            <span style="font-size: 17px; font-weigth:bold">Additional
                                                Qualification
                                            </span>
                                            <span style="float: right">
                                                {{-- @if (!$uploadedfiles>0) --}}

                                                @if (!$additionalquals>0 && !$appraisalscore>0)
                                                <a href="#" data-toggle="modal"
                                                    data-target="#modal-additionalquali-{{ $appraisal_id }}">
                                                    <span class="fa fa-plus-circle fa-2x"></span>
                                                </a>
                                                @else
                                                <div class="row">
                                                    @if (!$appraisalscore>0)
                                                    <div class="col-md-6 col-xs-6">
                                                        <small>
                                                            <span class="badge badge-success"
                                                                style="background-color: green; color: honeydew">Submitted
                                                                <span class="fa fa-check-circle-o"></span></span>
                                                        </small>
                                                    </div>
                                                    <div class="col-md-3 col-xs-3">
                                                        <a href="#" data-toggle="modal"
                                                            class="text-warning editappraisal" data-position="6"
                                                            data-target="#modal-additionalquali-{{ $appraisal_id }}"
                                                            data-route="{{route('appraisal.data', [$appraisal_id, 6])}}"
                                                            id="editAdditQuali">
                                                            <span class="fa fa-edit fa-2x"></span>
                                                        </a>
                                                    </div> 
                                                    <div class="col-md-3 col-xs-3">
                                                        <a class="text-danger"
                                                            onclick="return confirm ('Do you want to delete the entries you made in this section?')"
                                                            href="{{route('delete.appraisals', [$appraisal_id, 6])}}">
                                                            <span class="fa fa-trash-o fa-2x"></span>
                                                        </a>
                                                    </div>
                                                    @else
                                                        <div class="col-md-6 col-xs-6">
                                                            <small>
                                                                <span class="badge badge-success"
                                                                    style="background-color: green; color: honeydew">Scored <span
                                                                        class="fa fa-check-circle-o"></span></span>
                                                            </small> 
                                                        </div> 

                                                    @endif
                                                </div>
                                                @endif
                                                {{-- @else
                                                <small>
                                                    <span class="badge badge-success"
                                                        style="background-color: red; color: honeydew">No
                                                        more submission
                                                    </span>
                                                </small>
                                                @endif --}}

                                        </li>


                                        <li class="list-group-item" style="margin-bottom: 4px">
                                            <span style="font-size: 17px; font-weigth:bold">Duties
                                                Performed <i style="color: red">*</i></span>
                                            <span style="float: right">
                                                @if (!$performedduties>0 &&
                                                !$appraisalscore>0)
                                                <a href="#" data-toggle="modal"
                                                    data-target="#modal-perfduties-{{ $appraisal_id }}">
                                                    <span class="fa fa-plus-circle fa-2x"></span>
                                                </a>
                                                @else
                                                <div class="row">
                                                    @if (!$appraisalscore>0)
                                                    <div class="col-md-6 col-xs-6">
                                                        <small>
                                                            <span class="badge badge-success"
                                                                style="background-color: green; color: honeydew">Submitted
                                                                <span class="fa fa-check-circle-o"></span></span>
                                                        </small>
                                                    </div>
                                                    <div class="col-md-3 col-xs-3">
                                                        <a href="#" data-toggle="modal"
                                                            class="text-warning editappraisal" data-position="7"
                                                            data-target="#modal-perfduties-{{ $appraisal_id }}"
                                                            data-route="{{route('appraisal.data', [$appraisal_id, 7])}}"
                                                            id="editPerfduties">
                                                            <span class="fa fa-edit fa-2x"></span>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-xs-3">
                                                        <a class="text-danger"
                                                            onclick="return confirm ('Do you want to delete the entries you made in this section?')"
                                                            href="{{route('delete.appraisals', [$appraisal_id, 7])}}">
                                                            <span class="fa fa-trash-o fa-2x"></span>
                                                        </a>
                                                    </div>
                                                    @else
                                                        <div class="col-md-6 col-xs-6">
                                                            <small>
                                                                <span class="badge badge-success"
                                                                    style="background-color: green; color: honeydew">Scored <span
                                                                        class="fa fa-check-circle-o"></span></span>
                                                            </small> 
                                                        </div> 

                                                    @endif
                                                </div>
                                                @endif
                                            </span>
                                        </li>

                                        <li class="list-group-item" style="margin-bottom: 4px">
                                            <span style="font-size: 17px; font-weigth:bold">Adhoc Duties
                                                Performed</span>
                                            <span style="float: right">
                                                @if (!$adhocperfduties>0 &&
                                                !$appraisalscore>0)
                                                <a href="#" data-toggle="modal"
                                                    data-target="#modal-adhocperfduties-{{ $appraisal_id }}">
                                                    <span class="fa fa-plus-circle fa-2x"></span>
                                                </a>
                                                @else
                                                <div class="row">
                                                    @if (!$appraisalscore>0)
                                                    <div class="col-md-6 col-xs-6">
                                                        <small>
                                                            <span class="badge badge-success"
                                                                style="background-color: green; color: honeydew">Submitted
                                                                <span class="fa fa-check-circle-o"></span></span>
                                                        </small>
                                                    </div>
                                                    <div class="col-md-3 col-xs-3">
                                                        <a href="#" data-toggle="modal"
                                                            class="text-warning editappraisal" data-position="18"
                                                            data-target="#modal-adhocperfduties-{{ $appraisal_id }}"
                                                            data-route="{{route('appraisal.data', [$appraisal_id, 18])}}"
                                                            id="editAdhocPerfduties">
                                                            <span class="fa fa-edit fa-2x"></span>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-xs-3">
                                                        <a class="text-danger"
                                                            onclick="return confirm ('Do you want to delete the entries you made in this section?')"
                                                            href="{{route('delete.appraisals', [$appraisal_id, 18])}}">
                                                            <span class="fa fa-trash-o fa-2x"></span>
                                                        </a>
                                                    </div>
                                                    @else
                                                        <div class="col-md-6 col-xs-6">
                                                            <small>
                                                                <span class="badge badge-success"
                                                                    style="background-color: green; color: honeydew">Scored <span
                                                                        class="fa fa-check-circle-o"></span></span>
                                                            </small> 
                                                        </div> 

                                                    @endif
                                                </div>
                                                @endif
                                            </span>
                                        </li>

                                        <li class="list-group-item" style="margin-bottom: 4px">
                                            <span style="font-size: 17px; font-weigth:bold">Training
                                                Courses/Workshops</span>
                                            <span style="float: right">
                                                {{-- @if (!$uploadedfiles>0) --}}
                                                @if (!$trainings>0 && !$appraisalscore>0)
                                                <a href="#" data-toggle="modal"
                                                    data-target="#modal-training-{{ $appraisal_id }}">
                                                    <span class="fa fa-plus-circle fa-2x"></span>
                                                </a>
                                                @else
                                                <div class="row">
                                                    @if (!$appraisalscore>0)
                                                    <div class="col-md-6 col-xs-6">
                                                        <small>
                                                            <span class="badge badge-success"
                                                                style="background-color: green; color: honeydew">Submitted
                                                                <span class="fa fa-check-circle-o"></span></span>
                                                        </small>
                                                    </div>
                                                    <div class="col-md-3 col-xs-3">
                                                        <a href="#" data-toggle="modal"
                                                            class="text-warning editappraisal" data-position="5"
                                                            data-target="#modal-training-{{ $appraisal_id }}"
                                                            data-route="{{route('appraisal.data', [$appraisal_id, 5])}}"
                                                            id="editTraining">
                                                            <span class="fa fa-edit fa-2x"></span>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-3 col-xs-3">
                                                        <a class="text-danger"
                                                            onclick="return confirm ('Do you want to delete the entries you made in this section?')"
                                                            href="{{route('delete.appraisals', [$appraisal_id, 5])}}">
                                                            <span class="fa fa-trash-o fa-2x"></span>
                                                        </a>
                                                    </div>
                                                    @else
                                                        <div class="col-md-6 col-xs-6">
                                                            <small>
                                                                <span class="badge badge-success"
                                                                    style="background-color: green; color: honeydew">Scored <span
                                                                        class="fa fa-check-circle-o"></span></span>
                                                            </small> 
                                                        </div> 
                                                    @endif
                                                </div>
                                                @endif
                                                {{-- @else
                                                <small>
                                                    <span class="badge badge-success"
                                                        style="background-color: red; color: honeydew">No more
                                                        submission
                                                    </span>
                                                </small>
                                                @endif --}}
                                        </li>

                                        <li class="list-group-item" style="margin-bottom: 4px">
                                            <span style="font-size: 17px; font-weigth:bold">Any Other Information <i
                                                    style="color: red">*</i></span>
                                            <span style="float: right">
                                                @if (!$anyotherinfos>0 && !$appraisalscore>0)
                                                <a href="#" data-toggle="modal"
                                                    data-target="#modal-anyotherinfo-{{ $appraisal_id }}">
                                                    <span class="fa fa-plus-circle fa-2x"></span>
                                                </a>
                                                @else
                                                <div class="row">
                                                    @if (!$appraisalscore>0)
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
                                                        @else
                                                        <div class="col-md-6 col-xs-6">
                                                            <small>
                                                                <span class="badge badge-success"
                                                                    style="background-color: green; color: honeydew">Scored <span
                                                                        class="fa fa-check-circle-o"></span></span>
                                                            </small> 
                                                        </div> 
                                                            
                                                        @endif
                                                    </div>
                                                @endif
                                            </span>
                                        </li>

                                        {{-- publication removed --}}

                                        @if ($institutions>0 && $juniorqualifications>0 &&
                                        $salaryscales>0 && $performedduties>0 &&
                                        $anyotherinfos>0)

                                        <li class="list-group-item" style="margin-bottom: 4px">
                                            <span style="font-size: 17px; font-weigth:bold">Upload
                                                Supporting Documents
                                                <i style="color: red">*</i></span>
                                            <span style="float: right">
                                                {{-- @if (!$uploadedfiles>0)
                                                <a href="#" data-toggle="modal"
                                                    data-target="#modal-uploadfiles-{{ $appraisal_id }}">
                                                    <span class="fa fa-plus-circle fa-2x"></span>
                                                </a>
                                                @else
                                                <small>
                                                    <span class="badge badge-success"
                                                        style="background-color: green; color: honeydew">Submitted
                                                        <span class="fa fa-check-circle-o"></span></span>
                                                </small>
                                                @endif --}}
                                                @if (!$uploadedfiles>0 && !$appraisalscore>0)
                                                <a href="#" data-toggle="modal"
                                                    data-target="#modal-uploadfiles-{{ $appraisal_id }}">
                                                    <span class="fa fa-plus-circle fa-2x"></span>
                                                </a>
                                                @else
                                                <div class="row">
                                                    @if (!$appraisalscore>0)
                                                    <div class="col-md-6 col-xs-6">
                                                        <small>
                                                            <span class="badge badge-success"
                                                                style="background-color: green; color: honeydew">Submitted
                                                                <span class="fa fa-check-circle-o"></span></span>
                                                        </small>
                                                    </div>
                                                    <div class="col-md-3 col-xs-3">
                                                        {{--  <a href="#" data-toggle="modal"
                                                            class="text-warning editappraisal" data-position="14"
                                                            data-target="#modal-uploadfiles-{{ $appraisal_id }}"
                                                            data-route="{{route('appraisal.data', [$appraisal_id, 14])}}"
                                                            id="editUploadfiles">
                                                            <span class="fa fa-edit fa-2x"></span>
                                                        </a>  --}}
                                                    </div>

                                                    <div class="col-md-3 col-xs-3">
                                                        <a class="text-danger"
                                                            onclick="return confirm ('Do you want to delete the entries you made in this section?')"
                                                            href="{{route('delete.appraisals', [$appraisal_id, 14])}}">
                                                            <span class="fa fa-trash-o fa-2x"></span>
                                                        </a>
                                                    </div>
                                                    @else
                                                    <div class="col-md-6 col-xs-6">
                                                        <small>
                                                            <span class="badge badge-success"
                                                                style="background-color: green; color: honeydew">Scored
                                                                <span class="fa fa-check-circle-o"></span></span>
                                                        </small>
                                                    </div>
                                                    @endif
                                                </div>
                                                @endif
                                            </span>
                                        </li>

                                        {{-- for uploading more doucments --}}
                                        @if(!$appraisalscore>0 && $uploadedfiles>0)  
                                        <a href="" data-toggle="modal"
                                        data-target="#modal-uploadmorefiles-{{ $appraisal_id }}" style="float: right" class="btn btn-sm btn-warning"><span class="fa fa-upload"></span>  Upload more documents</a>
                                        @endif
                                        @endif


                                    </ul>
                                </div>
                            </div>

                            <p>
                                <a href="{{ route('submitted.appraisals') }}" class="btn btn-primary btn-sm"><span
                                        class="fa fa-eye"></span> Submitted Appraisals</a>
                            </p>

                            @else
                            <p style="text-align: justify; font-size: 20px; color: red">

                                Dear {{ $user->title->title.' '.$user->firstname.' '.$user->lastname }}, no form to be
                                filled at the moment! <br>
                                {{ $appraisal->title }} will start on
                                {{ date('d M, Y',strtotime($appraisal->starting)) }} and
                                end on {{ date('d M, Y',strtotime($appraisal->ending)) }}.
                            </p>
                            <p>
                                <a href="{{ route('appraisals.published') }}" class="btn btn-primary btn-sm">Published
                                    Appraisals</a>
                            </p>

                            @endif

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>

        <!-- Modal for Institution -->
        <div class="modal fade" id="modal-institution-{{ $appraisal_id }}">
            <div class="modal-dialog modal-lg">

                <form action="{{ route('institution.store') }}" method="post"
                    onsubmit="return confirm ('Do you want to submit the entries you made in this section?')">
                    @csrf

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"> Add Institution Attended for {{ $appraisal->title }}</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="appraisal_id" value="{{ $appraisal_id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            @livewire('institution')

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
        <!-- Modal for Qualification -->
        <div class="modal fade" id="modal-qualification-{{ $appraisal_id }}">
            <div class="modal-dialog modal-lg">

                <form action="{{ route('juniorqualification.store') }}" method="post"
                    onsubmit="return confirm ('Do you want to submit the entries you made in this section?')">
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

                            @livewire('juniorqualification')

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

                <form action="{{ route('profmembership.store') }}" method="post"
                    onsubmit="return confirm ('Do you want to submit the entries you made in this section?')">
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

        <!-- Modal for Post Qualification Experience -->
        <div class="modal fade" id="modal-postqualiexperience-{{ $appraisal_id }}">
            <div class="modal-dialog modal-lg">

                <form action="{{ route('postqualiexperience.store') }}" method="post"
                    onsubmit="return confirm ('Do you want to submit the entries you made in this section?')">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"> Add Post-Qualification Experience for {{ $appraisal->title }}</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="appraisal_id" value="{{ $appraisal_id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            @livewire('postqualiexperience')

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

                <form action="{{ route('promotion.store') }}" method="post"
                    onsubmit="return confirm ('Do you want to submit the entries you made in this section?')">
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

                <form action="{{ route('salaryscale.store') }}" method="post"
                    onsubmit="return confirm ('Do you want to submit the entries you made in this section?')">
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

                <form action="{{ route('training.store') }}" method="post"
                    onsubmit="return confirm ('Do you want to submit the entries you made in this section?')">
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

                <form action="{{ route('additionalqualif.store') }}" method="post"
                    onsubmit="return confirm ('Do you want to submit the entries you made in this section?')">
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

                <form action="{{ route('performedduty.store') }}" method="post"
                    onsubmit="return confirm ('Do you want to submit the entries you made in this section?')">
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

        <!-- Modal for Adhoc Performed Duties -->
        <div class="modal fade" id="modal-adhocperfduties-{{ $appraisal_id }}">
            <div class="modal-dialog modal-lg">

                <form action="{{  route('adhocperfduty.store') }}" method="post"
                    onsubmit="return confirm ('Do you want to submit the entries you made in this section?')">
                    @csrf

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"> Add Adhoc Performed Duties for {{ $appraisal->title }}</h4>
                        </div>
                        <div class="modal-body" id="adhocDutyContainer">
                            <input type="hidden" name="appraisal_id" value="{{ $appraisal_id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            @livewire('adhocperfduty')

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

                <form action="{{ route('publication.store') }}" method="post"
                    onsubmit="return confirm ('Do you want to submit the entries you made in this section?')">
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

                <form action="{{ route('production.store') }}" method="post"
                    onsubmit="return confirm ('Do you want to submit the entries you made in this section?')">
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

                <form action="{{ route('adminrespons.store') }}" method="post"
                    onsubmit="return confirm ('Do you want to submit the entries you made in this section?')">
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

                <form action="{{ route('coursetaught.store') }}" method="post"
                    onsubmit="return confirm ('Do you want to submit the entries you made in this section?')">
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

                <form action="{{ route('tloadsummary.store') }}" method="post"
                    onsubmit="return confirm ('Do you want to submit the entries you made in this section?')">
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

                <form action="{{ route('anyotherinfo.store') }}" method="post"
                    onsubmit="return confirm ('Do you want to submit the entries you made in this section?')">
                    @csrf

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"> Add Any Other Information for {{ $appraisal->title }}</h4>
                        </div>
                        <div class="modal-body" id="otherinfo">
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

                <form action="{{ route('supportingdoc.store') }}" method="post" enctype="multipart/form-data"
                    onsubmit="return confirm ('Do you want to submit the entries you made in this section?')">
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
                                                {{($appraiser->title->title==1?'':$appraiser->title->title).' '.$appraiser->firstname.' '.$appraiser->lastname }}
                                                @if ($appraiser->profileupdated=='1')
                                                    @if ($appraiser->hasAnyRole('HOD'))
                                                        {{ ' - '.'HOD, ' . $appraiser->department->name }}
                                                    @elseif($appraiser->hasAnyRole('Dean'))
                                                        {{ ' - '.'Dean, ' . $appraiser->school->name }}
                                                    @elseif($appraiser->hasAnyRole('Rector'))
                                                        {{ ' - '.'Rector' }}
                                                    @endif
                                                @endif
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


        {{-- for uploading more documents --}}
        <!-- Modal for uploadmorefiles -->
        <div class="modal fade" id="modal-uploadmorefiles-{{ $appraisal_id }}">
            <div class="modal-dialog modal-lg">

                <form action="{{ route('moresupportingdoc.store') }}" method="post" enctype="multipart/form-data"
                    onsubmit="return confirm ('Do you want to submit the entries you made in this section?')">
                    @csrf

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"> Add More Supporting Documents for {{ $appraisal->title }}</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="appraisal_id" value="{{ $appraisal_id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            
                            <div>
                                @livewire('supporting-document')
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
<script src="{{asset('admin_assets/dist/js/pages/appraisalupdate.js')}}"></script>
@endsection