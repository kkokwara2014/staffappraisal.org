@extends('admin.layout.app')

@section('title')
 All Departments
@endsection

@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        
        <div class="row">
            <div class="col-md-7">

                {{-- @include('admin.messages.success')
                @include('admin.messages.deleted') --}}

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($departments as $department)
                                <tr>
                
                                  <td>{{$department->name}}</td>
                                  <td>{{$department->code}}</td>
                
                
                                  <td>
                                    <div class="dropdown"> <button type="button"
                                        class="btn btn-primary btn-block btn-sm dropdown-toggle" id="dropdownMenu1"
                                        data-toggle="dropdown"> Action &nbsp;&nbsp;<span class="caret"></span>
                                      </button>
                                      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                
                
                
                                        <li role="presentation"> <a role="menuitem" tabindex="-1"
                                            href="{{ route('departments.edit',$department->id) }}"><span
                                              class="fa fa-pencil-square"></span> Edit</a> </li>
                
                                        <form id="remove-{{$department->id}}" style="display: none"
                                          action="{{ route('departments.destroy',$department->id) }}" method="post">
                                          {{ csrf_field() }}
                                          {{method_field('DELETE')}}
                                        </form>
                
                                        <li role="presentation">
                                          <a role="menuitem" tabindex="-1" href="" onclick="
                                                                                            if (confirm('Delete this?')) {
                                                                                                event.preventDefault();
                                                                                            document.getElementById('remove-{{$department->id}}').submit();
                                                                                            } else {
                                                                                                event.preventDefault();
                                                                                            }
                                                                                        "><span class="fa fa-trash-o"></span>
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
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-5">

                {{-- @include('admin.messages.success')
                @include('admin.messages.deleted') --}}

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('departments.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Name *</label>
                                <input type="text"
                                    class="form-control form-control-sm{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                    name="name" value="{{ old('name') }}" placeholder="Department/Unit Name e.g. Computer Science"
                                    autofocus>
            
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <span
                                        style="color: red">{{ $errors->first('name','Enter Department/Unit name') }}</span>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Code *</label>
                                <input type="text"
                                    class="form-control form-control-sm{{ $errors->has('code') ? ' is-invalid' : '' }}"
                                    name="code" value="{{ old('code') }}" placeholder="Department/Unit Code e.g. CSC"
                                    autofocus pattern="[A-za-z]+" maxlength="5">
            
                                @if ($errors->has('code'))
                                <span class="invalid-feedback" role="alert">
                                    <span
                                        style="color: red">{{ $errors->first('code','Enter Department/Unit code') }}</span>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">School *</label>
                                <select name="school_id" class="form-control form-control-sm" autofocus>
                                    <option selected="disabled">Select School</option>
                                    @foreach ($schools as $school)
                                    <option value="{{$school->id}}">{{$school->name}}
                                    </option>
                                    @endforeach

                                </select>
                            </div>
        
                            <button type="submit" class="btn btn-primary btn-sm"><span class="fa fa-floppy-o"></span> Save</button>
            
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
