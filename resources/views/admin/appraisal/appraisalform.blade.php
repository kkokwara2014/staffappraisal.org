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

                {{-- <div class="box" id="all-forms"> --}}
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                        @if ($user->category_id==2)
                        <div>
                            <h4>@yield('title')</h4>
                            <div class="card">
                                <div class="card-body">

                                    <form action="{{ route('store.acad.appraisal') }}" method="post">
                                        @csrf

                                        <input type="hidden" name="appraisal_id" value="{{ $appraisal_id }}">
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                       @livewire('qualification')
                                       <hr>
                                       @livewire('profmembership')
                                       <hr>
                                       @livewire('promotion')
                                       <hr>
                                       @livewire('salaryscale')
                                       <hr>
                                       @livewire('training')
                                       <hr>
                                       @livewire('additionalqualif')
                                       <hr>
                                       @livewire('dutiesperformed')
                                       <hr>
                                       @livewire('publication')
                                       <hr>
                                       @livewire('production')
                                       <hr>
                                       @livewire('adminresponsibility')
                                       <hr>
                                       @livewire('coursestaught')
                                       <hr>
                                       @livewire('teachingloadsummary')
                                       <hr>
                                       @livewire('anyotherinfo')
                                       <hr>
                                       {{--  <div>
                                           <h4>File uploading area <small>Kindly click on the browse button below and select all the documents (PDF) you wish to upload.</small></h4>
                                           <p>
                                               <input type="file" name="appraisaldocument[]" multiple required>
                                           </p>
                                           <br>
                                       </div>  --}}
                                       <div class="row">
                                           <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Select Appraiser <strong style="color:red;">*</strong></label>
                                                <select name="sentto_id" class="form-control" required>
                                                    <option selected="disabled">Select Appriaser</option>
                                                    @foreach ($appraisers as $appraiser)
                                                    <option value="{{$appraiser->id}}">{{$appraiser->firstname.' '.$appraiser->lastname.'  - '.$appraiser->department->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                           </div>
                                       </div>
                                        
                                       <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                        <a href="#" class="btn btn-danger btn-sm">Cancel</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($user->category_id==3)
                        <div >
                            <h4>Non-Academic Staff Appraisal Form</h4>
                            <div class="card">
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-section">
                                            <div class="form-group">
                                                <label for="rank">Rank</label>
                                                <input type="text" class="form-control form-control-sm" name="rank"
                                                    required placeholder="Enter Present Rank">
                                            </div>

                                            <div class="form-group">
                                                <label for="salaryscale">Salary Scale</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="salaryscale" required placeholder="Enter Salary Scale">
                                            </div>
                                        </div>
                                        <div class="form-section">
                                            <div class="form-group">
                                                <label for="level">Level</label>
                                                <input type="text" class="form-control form-control-sm" name="level"
                                                    required placeholder="Enter Present Level">
                                            </div>

                                            <div class="form-group">
                                                <label for="salarystep">Salary Step</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="salarystep" required placeholder="Enter Salary Step">
                                            </div>
                                        </div>

                                        <div class="form-navigation">
                                            <button type="button"
                                                class="previous btn btn-sm btn-primary float-left">Previous</button>
                                            <button type="button"
                                                class="next btn btn-sm btn-primary float-right">Next</button>
                                            <button type="submit"
                                                class="btn btn-sm btn-success float-right">Submit</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($user->category_id==4)
                        <div>
                            <h4>Junior Staff Appraisal Form</h4>
                            <div class="card">
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-section">
                                            <div class="form-group">
                                                <label for="rank">Rank</label>
                                                <input type="text" class="form-control form-control-sm" name="rank"
                                                    required placeholder="Enter Present Rank">
                                            </div>

                                            <div class="form-group">
                                                <label for="salaryscale">Salary Scale</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="salaryscale" required placeholder="Enter Salary Scale">
                                            </div>
                                        </div>
                                        <div class="form-section">
                                            <div class="form-group">
                                                <label for="level">Level</label>
                                                <input type="text" class="form-control form-control-sm" name="level"
                                                    required placeholder="Enter Present Level">
                                            </div>

                                            <div class="form-group">
                                                <label for="salarystep">Salary Step</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="salarystep" required placeholder="Enter Salary Step">
                                            </div>
                                        </div>

                                        <div class="form-navigation">
                                            <button type="button"
                                                class="previous btn btn-sm btn-primary float-left">Previous</button>
                                            <button type="button"
                                                class="next btn btn-sm btn-primary float-right">Next</button>
                                            <button type="submit"
                                                class="btn btn-sm btn-success float-right">Submit</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif

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