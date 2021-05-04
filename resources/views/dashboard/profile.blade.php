@extends('layouts.app')

@section('title')
Profile
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                {{--  <div class="card-header">{{ __('Dashboard') }}</div>  --}}
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Profile</h3>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                {{--  <div class="card-header">{{ __('Dashboard') }}</div>  --}}

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Profile</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
