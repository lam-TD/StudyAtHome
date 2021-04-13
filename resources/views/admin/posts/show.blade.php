@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            {{ $post->title }} <small>{{ trans('posts.post_by') }} {{ $post->user->name }}</small>

                            <a href="{{ url('admin/posts') }}" class="btn btn-default pull-right">{{ trans('posts.btn_go_back') }}</a>
                        </h2>
                    </div>

                    <div class="panel-body">
                        <p>{!! $post->body !!}</p>

                        <p><strong>{{ trans('posts.lb_category') }}: </strong>{{ $post->category->name }}</p>
                        <p><strong>{{ trans('posts.lb_tags') }}: </strong>{{ $post->tags->implode('name', ', ') }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
