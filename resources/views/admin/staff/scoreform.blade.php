@extends('admin.layout.app')

@section('title')
Academic Staff Score Form
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

                        <form action="{{ route('store.appraisal.score') }}" method="post">
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
                                                <td><strong>Publication (Max. Score: 20)</strong>
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
                                                    <div>
                                                        Creative Writings
                                                    </div>

                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" id="pubscore" name="publicationscore"
                                                            value="{{ old('publicationscore') }}"
                                                            class="form-control input-sm text-right appraisalscore{{ $errors->has('publicationscore') ? ' is-invalid' : '' }}"
                                                            placeholder="Publication Score" pattern="[0-9]+"
                                                            maxlength="2">
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
                                                        id="totalscore" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Production &amp; Achievements (Max. Score: 25)</strong>
                                                    <div>
                                                        Patents
                                                    </div>
                                                    <div>
                                                        Inventions
                                                    </div>
                                                    <div>
                                                        Trademarks
                                                    </div>
                                                    <div>
                                                        Copyrights
                                                    </div>
                                                    <div>
                                                        Designs
                                                    </div>
                                                    <div>
                                                        Consultancy
                                                    </div>
                                                    <div>
                                                        Feasibility Studies
                                                    </div>
                                                    <div>
                                                        Membership of Learned/Professional Bodies
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" id="prodscore"
                                                            value="{{ old('productionscore') }}" name="productionscore"
                                                            class="form-control input-sm text-right appraisalscore{{ $errors->has('productionscore') ? ' is-invalid' : '' }}"
                                                            placeholder="Production Score" pattern="[0-9]+"
                                                            maxlength="2">
                                                        <div>
                                                            @error('productionscore')
                                                            <span style="color: red">{{ $message }}</span>
                                                            @enderror
                                                            <span id="proderrmsg" class="errormsg hidden">Maximim score
                                                                exceeded</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Administrative Responsibility (Max. Score: 10)</strong>
                                                    <div>
                                                        Deanship
                                                    </div>
                                                    <div>
                                                        Headship
                                                    </div>
                                                    <div>
                                                        Chairman of Polytechnic Committee/Boards
                                                    </div>
                                                    <div>
                                                        Member of Polytechnic Committee/Boards
                                                    </div>
                                                    <div>
                                                        Chairman of School Committee/Board
                                                    </div>
                                                    <div>
                                                        Member of School Committee/Board
                                                    </div>
                                                    <div>
                                                        Membership of Learned/Professional Bodies
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
                                                    <div class="form-group">
                                                        <input type="text" name="adminresponscore"
                                                            class="form-control input-sm text-right appraisalscore{{ $errors->has('adminresponscore') ? ' is-invalid' : '' }}"
                                                            placeholder="Admin. Resp. Score" pattern="[0-9]+"
                                                            maxlength="2">
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
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" name="qualificationscore"
                                                            class="form-control{{ $errors->has('qualificationscore') ? ' is-invalid' : '' }} input-sm text-right appraisalscore"
                                                            placeholder="Acad. Qualification Score"
                                                            pattern="[0-9]+" maxlength="2">
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
                                                    <strong>Teaching Ability/Other Abilities (Max. Score: 15) <span
                                                            style="color:red">*</span></strong>
                                                    <div>
                                                        Knowledge of the Subject
                                                    </div>
                                                    <div>
                                                        Communication Skill
                                                    </div>
                                                    <div>
                                                        Thoroughness In Teaching
                                                    </div>
                                                    <div>
                                                        Acceptance of Responsibility
                                                    </div>
                                                    <div>
                                                        Resourcefulness
                                                    </div>
                                                    <div>
                                                        Responsiveness
                                                    </div>
                                                    <div>
                                                        Punctuality
                                                    </div>
                                                    <div>
                                                        Reliability
                                                    </div>
                                                    <div>
                                                        Excess Teaching Load
                                                    </div>


                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" name="abilityscore"
                                                            class="form-control{{ $errors->has('abilityscore') ? ' is-invalid' : '' }} input-sm text-right appraisalscore"
                                                            placeholder="Ability Score" pattern="[0-9]+" maxlength="2">
                                                        <div>
                                                            @error('abilityscore')
                                                            <span style="color: red">{{ $message }}</span>
                                                            @enderror
                                                            <span id="abilityerrmsg" class="errormsg hidden">Maximim
                                                                score exceeded</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Length of Service in this Polytechnic (Max. Score: 20) <span
                                                            style="color:red">*</span></strong>
                                                    <div>
                                                        Length of Service
                                                    </div>

                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" name="servicelengthscore"
                                                            class="form-control{{ $errors->has('servicelengthscore') ? ' is-invalid' : '' }} input-sm text-right appraisalscore"
                                                            placeholder="Length of Service Score" pattern="[0-9]+"
                                                            maxlength="2">
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
                                    <div class="form-group">
                                        <label>Free Comments on Staff being Appraised <i style="color: red">*</i></label>
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