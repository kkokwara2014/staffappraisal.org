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
                        <div>
                            <h4>@yield('title')</h4>
                            <div class="card">
                                <div class="card-body">

                                    <form action="{{ route('store.acad.appraisal') }}" method="post" enctype="multipart/form-data">
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

                                       <div>
                                        <h4><small style="color: red">Kindly click on the browse button below and select
                                                all the documents (PDF) you wish to upload.</small></h4>
                                        <p>
                                            <input type="file" name="appraisaldocument[]" multiple required>
                                        </p>
                                        
                                        </div>
                                        <hr>
                                       
                                       <div class="row">
                                           <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Select Appraiser <strong style="color:red;">*</strong></label>
                                                <select name="sentto_id" class="form-control" required>
                                                    <option selected="disabled">Select Appriaser</option>
                                                    @foreach ($appraisers as $appraiser)
                                                    
                                                    <option value="{{$appraiser->id}}">
                                                    {{$appraiser->firstname.' '.$appraiser->lastname.'  - '.$appraiser->department->name}}
                                                    </option>
                                                        
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