@extends('layouts.app')

@section('content')
    <div class="container">

        @include('frontend._search')

        <div class="row">

            <div class="col-md-12">
                @forelse ($posts as $post)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ $post->title }} - <small>{{ trans('home.post_by') }} {{ $post->user->name }}</small>

                            <span class="pull-right">
                                {{ $post->created_at->diffForHumans() }}
                            </span>
                        </div>

                        <div class="panel-body">
                            <p>{!! str_limit($post->body, 200) !!}
                            @if(!empty($post->files_list))
                                <p>
                                    @forelse ($post->files_list as $file)
                                        <a href="{{url($file['url_download'])}}" download class="btn btn-sm btn-warning">{{ $file['file_name_origin'] }}
                                            <span class="badge">{{ $file['file_size'] }}</span>
                                        </a>
                                    @empty
                                    @endforelse
                                </p>
                            @endif
                            <p>
                                {{ trans('posts.lb_tags') }}:
                                @forelse ($post->tags as $tag)
                                    <span class="label label-default">{{ $tag->name }}</span>
                                @empty
                                    <span class="label label-danger">{{ trans('posts.txt_not_found_tag') }}</span>
                                @endforelse
                            </p>
                            <p>
                                <span class="btn btn-sm btn-success">{{ $post->category->name }}</span>
                                <span class="btn btn-sm btn-info">{{ trans('home.btn_comments') }} <span class="badge">{{ $post->comments_count }}</span></span>

                                <a href="{{ url("/posts/{$post->id}") }}" class="btn btn-sm btn-primary">{{ trans('home.btn_see_more') }}</a>
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ trans('home.txt_not_found') }}</div>

                        <div class="panel-body">
                            <p>{{ trans('home.txt_no_post') }}</p>
                        </div>
                    </div>
                @endforelse

{{--                <div align="center">--}}
{{--                    {!! $posts->appends(['search' => request()->get('search')])->links() !!}--}}
{{--                </div>--}}

            </div>

        </div>
    </div>
@endsection
