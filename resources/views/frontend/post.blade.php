@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $post->title }} - <small>{{ trans('posts.post_by') }} {{ $post->user->name }}</small>

                        <span class="pull-right">
                            {{ $post->created_at->diffForHumans() }}
                        </span>
                    </div>

                    <div class="panel-body">
                        <p>{!! $post->body !!}</p>
                        <p>
                            {{ trans('posts.lb_category') }}: <span class="label label-success">{{ $post->category->name }}</span> <br>
                            {{ trans('posts.lb_tags') }}:
                            @forelse ($post->tags as $tag)
                                <span class="label label-default">{{ $tag->name }}</span>
                            @empty
                                <span class="label label-danger">{{ trans('posts.txt_not_found_tag') }}</span>
                            @endforelse
                        </p>
                    </div>
                </div>

                @includeWhen(Auth::user(), 'frontend._form')

                @include('frontend._comments')

            </div>

        </div>
    </div>
@endsection
