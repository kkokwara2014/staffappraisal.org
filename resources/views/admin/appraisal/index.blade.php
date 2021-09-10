@extends('admin.layout.app')

@section('title')
Appraisals
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
                <p>
                @hasrole(['Admin','Registrar'])
                    <a href="{{ route('appraisals.create') }}" class="btn btn-primary btn-sm">Create Appraisal</a>
                    <a href="{{ route('appraisals.published') }}" class="btn btn-success btn-sm">Published Appraisals</a>
                @endhasrole
                </p>

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                    @hasrole(['Admin','Registrar'])

                        <table id="example1" class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Appraisal Year</th>
                                    <th>Starting</th>
                                    <th>Ending</th>
                                    <th>Created By</th>
                                    <th>Publish</th>
                                    <th>Action</th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($appraisals as $appraisal)
                                <tr>

                                    <td>{{$appraisal->title}}</td>
                                    <td>{{$appraisal->appraisalyear}}</td>
                                    <td>{{ date('d M, Y', strtotime($appraisal->starting)) }}</td>
                                    <td>{{ date('d M, Y', strtotime($appraisal->ending)) }}</td>
                                    <td>{{$appraisal->user->firstname.' '.$appraisal->user->lastname.' ['.$appraisal->user->staffnumb.']'}}
                                    </td>
                                    <td>
                                        <a href="{{  route('appraisal.publish',$appraisal->id) }}"
                                            class="btn btn-sm btn-block btn-success">Publish</a>
                                    </td>


                                    <td>
                                        <div class="dropdown"> <button type="button"
                                                class="btn btn-primary btn-block btn-sm dropdown-toggle"
                                                id="dropdownMenu1" data-toggle="dropdown"> Action &nbsp;&nbsp;<span
                                                    class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">



                                                <li role="presentation"> <a role="menuitem" tabindex="-1"
                                                        href="{{ route('appraisals.edit',$appraisal->id) }}"><span
                                                            class="fa fa-pencil-square"></span> Edit</a> </li>

                                                <form id="remove-{{$appraisal->id}}" style="display: none"
                                                    action="{{ route('appraisals.destroy',$appraisal->id) }}"
                                                    method="post">
                                                    {{ csrf_field() }}
                                                    {{method_field('DELETE')}}
                                                </form>

                                                <li role="presentation">
                                                    <a role="menuitem" tabindex="-1" href="" onclick="
                                                                                          if (confirm('Delete this?')) {
                                                                                              event.preventDefault();
                                                                                          document.getElementById('remove-{{$appraisal->id}}').submit();
                                                                                          } else {
                                                                                              event.preventDefault();
                                                                                          }
                                                                                      "><span
                                                            class="fa fa-trash-o"></span>
                                                        Delete
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Title</th>
                                    <th>Appraisal Year</th>
                                    <th>Starting</th>
                                    <th>Ending</th>
                                    <th>Created By</th>
                                    <th>Publish</th>
                                    <th>Action</th>

                                </tr>
                            </tfoot>
                        </table>


                    @else
                    <h3><span class="fa fa-exclamation-triangle" style="color:red"></span> You are not Authorized to see the content of this page!</h3>
                    @endhasrole

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