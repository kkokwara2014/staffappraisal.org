@extends('admin.layout.app')

@section('title')
Junior Staff Score Form
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <p>
            <a href="{{ url()->previous() }}" class="btn btn-success btn-sm">Back</a>
        </p>

        <div class="row">
            <div class="col-md-11">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <h3>Appraisal Score for
                            {{ucfirst($staff->firstname).' '.($staff->middlename!=''?ucfirst($staff->middlename):'').' '.ucfirst($staff->lastname)}}
                            <small>[{{ $staff->staffnumb }}]</small></h3>

                        <p>
                            @include('admin.messages.error')
                        </p>

                        <form action="{{ route('store.juniorstaffappraisal.score') }}" method="post">
                            @csrf

                            <input type="hidden" name="appraisal_id" value="{{ $appraisal_id }}">
                            <input type="hidden" name="user_id" value="{{ $staff_id }}">

                            <div class="row">
                                <div class="col-md-10">
                                    <div>
                                        <strong>Points Awarded</strong>
                                        <span style="float:right;">
                                            Total Score:
                                            <input type="text" class="form-control text-center"
                                                name="juniorstafftotalscore" value="{{ old('juniorstafftotalscore') }}"
                                                id="juniorstafftotalscore" readonly>
                                        </span>
                                    </div>

                                    <br>
                                    <br>

                                    <table class="table table-light">
                                        <tbody>
                                            <thead>
                                                <tr>
                                                    <td></td>
                                                    <td>1</td>
                                                    <td>2</td>
                                                    <td>3</td>
                                                    <td>4</td>
                                                    <td>5</td>
                                                    <td>6</td>
                                                    <td>7</td>
                                                    <td>8</td>
                                                    <td>9</td>
                                                    <td>10</td>
                                                </tr>
                                            </thead>
                                            <tr>
                                                <td>
                                                    <strong>Regularity:</strong> Comes to work regularly.
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="regularityscore"
                                                        value="1">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="regularityscore"
                                                        value="2">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="regularityscore"
                                                        value="3">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="regularityscore"
                                                        value="4">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="regularityscore"
                                                        value="5">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="regularityscore"
                                                        value="6">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="regularityscore"
                                                        value="7">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="regularityscore"
                                                        value="8">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="regularityscore"
                                                        value="9">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="regularityscore"
                                                        value="10">
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Punctuality:</strong> Regularly punctual at work
                                                </td>

                                                <td>
                                                    <input type="radio" class="juniorappscore" name="punctualityscore"
                                                        value="1">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="punctualityscore"
                                                        value="2">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="punctualityscore"
                                                        value="3">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="punctualityscore"
                                                        value="4">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="punctualityscore"
                                                        value="5">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="punctualityscore"
                                                        value="6">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="punctualityscore"
                                                        value="7">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="punctualityscore"
                                                        value="8">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="punctualityscore"
                                                        value="9">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="punctualityscore"
                                                        value="10">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Foresight:</strong> Anticipates problems and develops
                                                    solutions in advance.
                                                </td>

                                                <td>
                                                    <input type="radio" class="juniorappscore" name="foresightscore"
                                                        value="1">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="foresightscore"
                                                        value="2">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="foresightscore"
                                                        value="3">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="foresightscore"
                                                        value="4">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="foresightscore"
                                                        value="5">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="foresightscore"
                                                        value="6">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="foresightscore"
                                                        value="7">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="foresightscore"
                                                        value="8">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="foresightscore"
                                                        value="9">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="foresightscore"
                                                        value="10">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Judgement:</strong> His/her opinions on proposal are
                                                    consistently sound.
                                                </td>

                                                <td>
                                                    <input type="radio" class="juniorappscore" name="judgementscore"
                                                        value="1">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="judgementscore"
                                                        value="2">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="judgementscore"
                                                        value="3">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="judgementscore"
                                                        value="4">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="judgementscore"
                                                        value="5">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="judgementscore"
                                                        value="6">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="judgementscore"
                                                        value="7">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="judgementscore"
                                                        value="8">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="judgementscore"
                                                        value="9">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="judgementscore"
                                                        value="10">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Initiative:</strong> Makes helpful suggestions without
                                                    waiting for instructions.
                                                </td>

                                                <td>
                                                    <input type="radio" class="juniorappscore" name="initiativescore"
                                                        value="1">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="initiativescore"
                                                        value="2">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="initiativescore"
                                                        value="3">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="initiativescore"
                                                        value="4">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="initiativescore"
                                                        value="5">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="initiativescore"
                                                        value="6">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="initiativescore"
                                                        value="7">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="initiativescore"
                                                        value="8">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="initiativescore"
                                                        value="9">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="initiativescore"
                                                        value="10">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Relationship with Colleagues:</strong> Sensitive to other
                                                    people's feelings; tactful and understanding of personal problems,
                                                    earns great respect.
                                                </td>

                                                <td>
                                                    <input type="radio" class="juniorappscore" name="relationshipscore"
                                                        value="1">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="relationshipscore"
                                                        value="2">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="relationshipscore"
                                                        value="3">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="relationshipscore"
                                                        value="4">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="relationshipscore"
                                                        value="5">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="relationshipscore"
                                                        value="6">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="relationshipscore"
                                                        value="7">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="relationshipscore"
                                                        value="8">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="relationshipscore"
                                                        value="9">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="relationshipscore"
                                                        value="10">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Relationship with the Public:</strong> Effective in dealing
                                                    with people of all types.
                                                </td>

                                                <td>
                                                    <input type="radio" class="juniorappscore"
                                                        name="publicrelationscore" value="1">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore"
                                                        name="publicrelationscore" value="2">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore"
                                                        name="publicrelationscore" value="3">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore"
                                                        name="publicrelationscore" value="4">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore"
                                                        name="publicrelationscore" value="5">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore"
                                                        name="publicrelationscore" value="6">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore"
                                                        name="publicrelationscore" value="7">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore"
                                                        name="publicrelationscore" value="8">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore"
                                                        name="publicrelationscore" value="9">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore"
                                                        name="publicrelationscore" value="10">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Acceptance of Responsibility:</strong> Readily accepts
                                                    responsibility at all times.
                                                </td>

                                                <td>
                                                    <input type="radio" class="juniorappscore"
                                                        name="acceptanceofrespscore" value="1">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore"
                                                        name="acceptanceofrespscore" value="2">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore"
                                                        name="acceptanceofrespscore" value="3">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore"
                                                        name="acceptanceofrespscore" value="4">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore"
                                                        name="acceptanceofrespscore" value="5">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore"
                                                        name="acceptanceofrespscore" value="6">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore"
                                                        name="acceptanceofrespscore" value="7">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore"
                                                        name="acceptanceofrespscore" value="8">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore"
                                                        name="acceptanceofrespscore" value="9">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore"
                                                        name="acceptanceofrespscore" value="10">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Reliability:</strong> Performs competently
                                                </td>

                                                <td>
                                                    <input type="radio" class="juniorappscore" name="reliabilityscore"
                                                        value="1">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="reliabilityscore"
                                                        value="2">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="reliabilityscore"
                                                        value="3">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="reliabilityscore"
                                                        value="4">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="reliabilityscore"
                                                        value="5">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="reliabilityscore"
                                                        value="6">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="reliabilityscore"
                                                        value="7">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="reliabilityscore"
                                                        value="8">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="reliabilityscore"
                                                        value="9">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="reliabilityscore"
                                                        value="10">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Application to Duty:</strong> Is dilligent in attending to
                                                    duties.
                                                </td>

                                                <td>
                                                    <input type="radio" class="juniorappscore"
                                                        name="applicationtodutyscore" value="1">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore"
                                                        name="applicationtodutyscore" value="2">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore"
                                                        name="applicationtodutyscore" value="3">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore"
                                                        name="applicationtodutyscore" value="4">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore"
                                                        name="applicationtodutyscore" value="5">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore"
                                                        name="applicationtodutyscore" value="6">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore"
                                                        name="applicationtodutyscore" value="7">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore"
                                                        name="applicationtodutyscore" value="8">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore"
                                                        name="applicationtodutyscore" value="9">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore"
                                                        name="applicationtodutyscore" value="10">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Output of Work:</strong> Gets a great deal done within a set
                                                    time.
                                                </td>

                                                <td>
                                                    <input type="radio" class="juniorappscore" name="outputofworkscore"
                                                        value="1">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="outputofworkscore"
                                                        value="2">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="outputofworkscore"
                                                        value="3">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="outputofworkscore"
                                                        value="4">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="outputofworkscore"
                                                        value="5">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="outputofworkscore"
                                                        value="6">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="outputofworkscore"
                                                        value="7">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="outputofworkscore"
                                                        value="8">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="outputofworkscore"
                                                        value="9">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="outputofworkscore"
                                                        value="10">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Quality of Work:</strong> Maintains high standard of work.
                                                </td>

                                                <td>
                                                    <input type="radio" class="juniorappscore" name="qualityofworkscore"
                                                        {{ (old('qualityofworkscore') =='1')?'checked':'' }} value="1">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="qualityofworkscore"
                                                        {{ (old('qualityofworkscore') =='2')?'checked':'' }} value="2">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="qualityofworkscore"
                                                        {{ (old('qualityofworkscore') =='3')?'checked':'' }} value="3">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="qualityofworkscore"
                                                        {{ (old('qualityofworkscore') =='4')?'checked':'' }} value="4">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="qualityofworkscore"
                                                        {{ (old('qualityofworkscore') =='5')?'checked':'' }} value="5">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="qualityofworkscore"
                                                        {{ (old('qualityofworkscore') =='6')?'checked':'' }} value="6">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="qualityofworkscore"
                                                        {{ (old('qualityofworkscore') =='7')?'checked':'' }} value="7">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="qualityofworkscore"
                                                        {{ (old('qualityofworkscore') =='8')?'checked':'' }} value="8">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="qualityofworkscore"
                                                        {{ (old('qualityofworkscore') =='9')?'checked':'' }} value="9">
                                                </td>
                                                <td>
                                                    <input type="radio" class="juniorappscore" name="qualityofworkscore"
                                                        {{ (old('qualityofworkscore') == '10') ?'checked':'' }}
                                                        value="10">
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>

                                    <hr>
                                    <strong>Miscellaneous Information</strong>
                                    <div class="row">
                                        <div class="form-group-sm col-md-10">
                                            Number of warning letters issued from the Registry during the year:
                                            &nbsp; 
                                            <a href="" style="background-color: #34a4eb; color: honeydew" class="badge badge-pill badge-primary"><span class="fa fa-paperclip"></span> Attach file</a> 
                                        </div>
                                        <div class="form-group-sm col-md-2">
                                            <input id="warningletterscore" type="text" name="warningletterscore" class="form-control juniorappscore"
                                                {{ old('warningletterscore') }} pattern="[0-9]+">
                                        </div>
                                    </div>
                                    <p></p>
                                    <div class="row">
                                        <div class="form-group-sm col-md-10">
                                            Number of days granted off-duty on health grounds: 
                                        </div>
                                        <div class="form-group-sm col-md-2">
                                            <input id="offdutyscore" type="text" name="offdutyonhealthscore" class="form-control juniorappscore"
                                                {{ old('offdutyonhealthscore') }} pattern="[0-9]+">
                                        </div>
                                    </div>
                                    <p></p>
                                    <div class="row">
                                        <div class="form-group-sm col-md-10">
                                            Number of commendations received: 
                                            &nbsp; 
                                            <a href="" style="background-color: #34a4eb; color: honeydew" class="badge badge-pill badge-primary"><span class="fa fa-paperclip"></span> Attach file</a> 
                                        </div>
                                        <div class="form-group-sm col-md-2">
                                            <input id="numofcommendation" type="text" name="numberofcommendationscore" class="form-control juniorappscore"
                                                {{ old('numberofcommendationscore') }} pattern="[0-9]+">
                                        </div>
                                    </div>
                                    <p></p>
                                    <div>
                                        Training potentials: this officer has potential for:
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="trainingpotentialscore"
                                                    value="Short-term courses only">
                                                Short-term courses only
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="trainingpotentialscore"
                                                    value="Full-time professional training">
                                                Full-time professional training
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="trainingpotentialscore"
                                                    value="Higher professional courses/seminars"> Higher professional courses/seminars
                                            </label>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="form-group">
                                        <label>Give your assessment of the staff overall performance in the period covered by your report <i
                                                style="color: red">*</i></label>
                                        <textarea
                                            class="form-control{{ $errors->has('freecomment') ? ' is-invalid' : '' }}"
                                            name="freecomment" rows="3" placeholder="Free Comments"></textarea>
                                        <div>
                                            @error('freecomment')
                                            <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <hr>

                                    <p><label>Recommendations</label></p>
                                    <p style="text-align:justify">
                                        I recommend
                                        <strong>{{ucfirst($staff->firstname).' '.($staff->middlename!=''?ucfirst($staff->middlename):'').' '.ucfirst($staff->lastname)}}
                                            <small>[{{ $staff->staffnumb }}]</small></strong> for <br>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="juniorappscore" name="recommendation"
                                                    value="Withholding of Increment"> Withholding of Increment
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="juniorappscore" name="recommendation"
                                                    value="Normal Increment">
                                                Normal Increment
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="juniorappscore" name="recommendation"
                                                    value="Double Increment">
                                                Double Increment
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="juniorappscore" name="recommendation"
                                                    value="Promotion to the next Rank"> Promotion to the next Rank
                                            </label>
                                        </div>
                                    </p>

                                </div>

                            </div>
                            <p>

                                <button type="submit" class="btn btn-primary btn-sm">Submit Score</button>
                                <a href="{{ route('staffsbydept') }}" class="btn btn-danger btn-sm">Cancel</a>
                            </p>
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