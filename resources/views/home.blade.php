@extends('layout')
@section('main_content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <a>{{Auth::user()->user_name}} ID:{{Auth::user()->id}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
