@extends('admin.layout.app')

@section('title')
Non Academic Staff Score Form
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

                        <form action="{{ route('store.nonacademicappraisal.score') }}" method="post">
                            @csrf

                            <input type="hidden" name="appraisal_id" value="{{ $appraisal_id }}">
                            <input type="hidden" name="user_id" value="{{ $staff_id }}">

                            <div class="row">
                                <div class="col-md-10">
                                    <table class="table table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <td><strong>Heading</strong></td>
                                                <td><strong>Score</strong></td>
                                                <td><strong>Total Score</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>Publication (Max. Score: 10)</strong>
                                                    <div>
                                                        Books
                                                    </div>
                                                    <div>
                                                        Journal Articles
                                                    </div>
                                                    <div>
                                                        Published Conference papers
                                                    </div>
                                                    <div>
                                                        Seminar papers
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group-sm">
                                                        <input type="text" id="napubscore" name="publicationscore"
                                                            value="{{ old('publicationscore') }}"
                                                            class="form-control{{ $errors->has('publicationscore') ? ' is-invalid' : '' }} input-sm text-right  naappraisalscore"
                                                            placeholder="Publication Score" pattern="[0-9]+"
                                                            maxlength="2" min="1" max="10">
                                                        <div>
                                                            @error('publicationscore')
                                                            <span style="color: red">{{ $message }}</span>
                                                            @enderror
                                                            <span id="puberrmsg" class="errormsg hidden">Maximim score
                                                                exceeded</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td style="width: 15%">
                                                    <input type="text" class="form-control text-center"
                                                        name="totalscore" value="{{ old('totalscore') }}"
                                                        id="natotalscore" readonly>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td>
                                                    <strong>Administrative Responsibilities (Max. Score: 10)</strong>
                                                    <div>
                                                        Head of Division
                                                    </div>
                                                    <div>
                                                        Head of Department
                                                    </div>
                                                    <div>
                                                        Head of Unit
                                                    </div>
                                                    <div>
                                                        Chairman of Polytechnic Committee/Boards
                                                    </div>
                                                    <div>
                                                        Secretary of Polytechnic Committee/Boards
                                                    </div>
                                                    <div>
                                                        Member of Polytechnic Committee/Boards
                                                    </div>
                                                    <div>
                                                        Public Service Render:
                                                        <p>
                                                            <ol>
                                                                <li>Federal Government</li>
                                                                <li>State Government</li>
                                                                <li>Local Government</li>
                                                            </ol>
                                                        </p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group-sm">
                                                        <input type="text" name="adminresponscore" value="{{ old('adminresponscore') }}"
                                                            class="form-control{{ $errors->has('adminresponscore') ? ' is-invalid' : '' }} input-sm text-right naappraisalscore"
                                                            placeholder="Admin. Resp. Score" pattern="[0-9]+"
                                                            maxlength="2" min="1" max="10">
                                                        <div>
                                                            @error('adminresponscore')
                                                            <span style="color: red">{{ $message }}</span>
                                                            @enderror
                                                            <span id="adminreserrmsg" class="errormsg hidden">Maximim
                                                                score exceeded</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Academic Qualifications (Max. Score: 10) <span
                                                            style="color:red">*</span></strong>
                                                    <div>
                                                        Ph.D
                                                    </div>
                                                    <div>
                                                        Masters Degree
                                                    </div>
                                                    <div>
                                                        Postgraduate Diploma (Post B.A, B.S., HND)
                                                        <p>
                                                            B.A.,/B.Sc. 1<sup>st</sup> Class Hons (or HND with
                                                            Distinction)
                                                        </p>
                                                    </div>
                                                    <div>
                                                        B.A.,/B.Sc. 2<sup>nd</sup> Class (Hons) Upper Division (or HND
                                                        Upper Credit)
                                                    </div>
                                                    <div>
                                                        B.A.,/B.Sc. 2<sup>nd</sup> Class (Hons) Lower Division (or HND
                                                        Lower Credit)
                                                    </div>
                                                    <div>
                                                        B.A.,/B.Sc. 3<sup>rd</sup> Class (Hons)
                                                    </div>
                                                    <div>
                                                        Membership of Learned/Professional Body
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group-sm">
                                                        <input type="text" name="qualificationscore"
                                                            class="form-control{{ $errors->has('qualificationscore') ? ' is-invalid' : '' }} input-sm text-right naappraisalscore"
                                                            placeholder="Acad. Qualification Score"
                                                            pattern="[0-9]+" maxlength="2" min="1" max="10" value="{{ old('qualificationscore') }}">
                                                        <div>
                                                            @error('qualificationscore')
                                                            <span style="color: red">{{ $message }}</span>
                                                            @enderror
                                                            <span id="qualierrmsg" class="errormsg hidden">Maximim score
                                                                exceeded</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td></td>
                                            </tr>
                                            
                                            <tr>
                                                <td>
                                                    <strong>Length of Service in this Polytechnic (Max. Score: 10) <span
                                                            style="color:red">*</span></strong>
                                                    <div>
                                                        Length of Service
                                                    </div>

                                                </td>
                                                <td>
                                                    <div class="form-group-sm">
                                                        <input type="text" name="servicelengthscore" value="{{ old('servicelengthscore') }}"
                                                            class="form-control{{ $errors->has('servicelengthscore') ? ' is-invalid' : '' }} input-sm text-right naappraisalscore"
                                                            placeholder="Length of Service Score" pattern="[0-9]+"
                                                            maxlength="2" min="1" max="10">
                                                        <div>
                                                            @error('servicelengthscore')
                                                            <span style="color: red">{{ $message }}</span>
                                                            @enderror
                                                            <span id="servlenerrmsg" class="errormsg hidden">Maximim
                                                                score exceeded</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <hr>
                                    <label>Rating of Aspects of Performance</label>
                                    <table class="table table-light">
                                        <tbody>
                                            <thead>
                                                <tr>
                                                    <td>Heading</td>
                                                    <td>Tip</td>
                                                    <td>Max Score</td>
                                                    <td>Actual Score</td>
                                                </tr>
                                            </thead>
                                            <tr>
                                                <td>
                                                    Productivity
                                                </td>
                                                <td>
                                                    <a href="#" class="tooltip-test" data-toggle="tooltip" title="Gets a great deal more done within a set time. Maintains very high standard of work.">
                                                        <span class="fa fa-eye"></span>
                                                    </a>
                                                </td>
                                                <td>5</td>
                                                <td style="width: 30%">
                                                    <div class="form-group-sm">
                                                    <input type="text" class="form-control naappraisalscore" name="productivityscore" placeholder="Productivity Score" pattern="[0-9]+"
                                                    maxlength="1" min="1" max="5" value="{{ old('productivityscore') }}">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Initiative
                                                </td>
                                                <td>
                                                    <a href="#" class="tooltip-test" data-toggle="tooltip" title="Takes prompt and appropriate actions without waiting for instruction.">
                                                        <span class="fa fa-eye"></span>
                                                    </a>
                                                </td>
                                                <td>5</td>
                                                <td style="width: 30%">
                                                    <div class="form-group-sm">
                                                    <input type="text" class="form-control naappraisalscore" name="initiativescore" placeholder="Initiative Score" pattern="[0-9]+"
                                                    maxlength="1" min="1" max="5" value="{{ old('initiativescore') }}">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Acceptance of Responsibility
                                                </td>
                                                <td>
                                                    <a href="#" class="tooltip-test" data-toggle="tooltip" title="Seeks and accepts responsibility at all times.">
                                                        <span class="fa fa-eye"></span>
                                                    </a>
                                                </td>
                                                <td>5</td>
                                                <td style="width: 30%">
                                                    <div class="form-group-sm">
                                                    <input type="text" class="form-control naappraisalscore" name="acceptanceofrespscore" placeholder="Responsibility Score" pattern="[0-9]+"
                                                    maxlength="1" min="1" max="5" value="{{ old('acceptanceofrespscore') }}">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Judgement
                                                </td>
                                                <td>
                                                    <a href="#" class="tooltip-test" data-toggle="tooltip" title="His/her decisions or proposals are consistent/sound">
                                                        <span class="fa fa-eye"></span>
                                                    </a>
                                                </td>
                                                <td>5</td>
                                                <td style="width: 30%">
                                                    <div class="form-group-sm">
                                                    <input type="text" class="form-control naappraisalscore" name="judgementscore" placeholder="Judgement Score" pattern="[0-9]+"
                                                    maxlength="1" min="1" max="5" value="{{ old('judgementscore') }}">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Management of Staff
                                                </td>
                                                <td>
                                                    <a href="#" class="tooltip-test" data-toggle="tooltip" title="Organises and inspires staff to give their best.">
                                                        <span class="fa fa-eye"></span>
                                                    </a>
                                                </td>
                                                <td>5</td>
                                                <td style="width: 30%">
                                                    <div class="form-group-sm">
                                                    <input type="text" class="form-control naappraisalscore" name="staffmgtscore" placeholder="Staff Mgt. Score" pattern="[0-9]+"
                                                    maxlength="1" min="1" max="5" value="{{ old('staffmgtscore') }}">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Communication
                                                </td>
                                                <td>
                                                    <a href="#" class="tooltip-test" data-toggle="tooltip" title="Always clear and well set out.">
                                                        <span class="fa fa-eye"></span>
                                                    </a>
                                                </td>
                                                <td>5</td>
                                                <td style="width: 30%">
                                                    <div class="form-group-sm">
                                                    <input type="text" class="form-control naappraisalscore" name="communicationscore" placeholder="Communication Score" pattern="[0-9]+"
                                                    maxlength="1" min="1" max="5" value="{{ old('communicationscore') }}">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Relationship with Colleagues
                                                </td>
                                                <td>
                                                    <a href="#" class="tooltip-test" data-toggle="tooltip" title="Sensitive to other people\'s feelings; tactful and understanding of personal problems; earns great respect.">
                                                        <span class="fa fa-eye"></span>
                                                    </a>
                                                </td>
                                                <td>5</td>
                                                <td style="width: 30%">
                                                    <div class="form-group-sm">
                                                    <input type="text" class="form-control naappraisalscore" name="relationshipscore" placeholder="Relationship Score" pattern="[0-9]+"
                                                    maxlength="1" min="1" max="5" value="{{ old('relationshipscore') }}">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Reliability under pressure
                                                </td>
                                                <td>
                                                    <a href="#" class="tooltip-test" data-toggle="tooltip" title="Performs competently under pressure">
                                                        <span class="fa fa-eye"></span>
                                                    </a>
                                                </td>
                                                <td>5</td>
                                                <td style="width: 30%">
                                                    <div class="form-group-sm">
                                                    <input type="text" class="form-control naappraisalscore" name="reliabilityscore" placeholder="Reliability Score" pattern="[0-9]+"
                                                    maxlength="1" min="1" max="5" value="{{ old('reliabilityscore') }}">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Drive and Determination
                                                </td>
                                                <td>
                                                    <a href="#" class="tooltip-test" data-toggle="tooltip" title="Wholehearted application to tasks; determined to carry through to the end.">
                                                        <span class="fa fa-eye"></span>
                                                    </a>
                                                </td>
                                                <td>5</td>
                                                <td style="width: 30%">
                                                    <div class="form-group-sm">
                                                    <input type="text" class="form-control naappraisalscore" name="determinationscore" placeholder="Determination Score" pattern="[0-9]+"
                                                    maxlength="1" min="1" max="5" value="{{ old('determinationscore') }}">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Thoroughness
                                                </td>
                                                <td>
                                                    <a href="#" class="tooltip-test" data-toggle="tooltip" title="Meticulous and conscientious in carrying out any assignment. Avoids halfheartedness in job performance.">
                                                        <span class="fa fa-eye"></span>
                                                    </a>
                                                </td>
                                                <td>5</td>
                                                <td style="width: 30%">
                                                    <div class="form-group-sm">
                                                    <input type="text" class="form-control naappraisalscore" name="thoroughnessscore" placeholder="Thoroughness Score" pattern="[0-9]+"
                                                    maxlength="1" min="1" max="5" value="{{ old('thoroughnessscore') }}">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Relationship with the Public
                                                </td>
                                                <td>
                                                    <a href="#" class="tooltip-test" data-toggle="tooltip" title="Very tactful and friendly in dealing with the public.">
                                                        <span class="fa fa-eye"></span>
                                                    </a>
                                                </td>
                                                <td>5</td>
                                                <td style="width: 30%">
                                                    <div class="form-group-sm">
                                                    <input type="text" class="form-control naappraisalscore" name="publicrelationscore" placeholder="Public Relation Score" pattern="[0-9]+"
                                                    maxlength="1" min="1" max="5"  value="{{ old('publicrelationscore') }}">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Punctuality
                                                </td>
                                                <td>
                                                    <a href="#" class="tooltip-test" data-toggle="tooltip" title="Regularity, punctual at work.">
                                                        <span class="fa fa-eye"></span>
                                                    </a>
                                                </td>
                                                <td>5</td>
                                                <td style="width: 30%">
                                                    <div class="form-group-sm">
                                                    <input type="text" class="form-control naappraisalscore" name="punctualityscore" placeholder="Punctuality Score" pattern="[0-9]+"
                                                    maxlength="1" min="1" max="5" value="{{ old('punctualityscore') }}">
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <hr>
                                    <div class="form-group">
                                        <label>Free Comments on Staff being Appraised <i style="color: red">*</i></label>
                                        <textarea
                                            class="form-control{{ $errors->has('freecomment') ? ' is-invalid' : '' }}"
                                            name="freecomment" rows="3" placeholder="Free Comments">{{ old('freecomment') }}</textarea>
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
                                                <input type="radio" name="recommendation"
                                                    value="Withholding of Increment"> Withholding of Increment
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="recommendation" value="Normal Increment">
                                                Normal Increment
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="recommendation" value="Double Increment">
                                                Double Increment
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="recommendation"
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