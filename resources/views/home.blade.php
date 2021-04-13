@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('home.posts') }}</div>

                    <div class="panel-body">
                        <h1>{{ $posts }}</h1>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('home.comments') }}</div>

                    <div class="panel-body">
                        <h1>{{ $comments }}</h1>
                    </div>
                </div>
            </div>
            @if($is_admin)
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('home.users') }}</div>

                    <div class="panel-body">
                        <h1>{{ $users }}</h1>
                    </div>
                </div>
            </div>
            @endif

            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('home.categories') }}</div>

                    <div class="panel-body">
                        <h1>{{ $categories }}</h1>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
