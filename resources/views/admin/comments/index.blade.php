@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            {{ trans('comments.txt_profile') }}

{{--                            <a href="{{ url('admin/comments/create') }}" class="btn btn-default pull-right">{{ trans('comments.btn_create') }}</a>--}}
                        </h2>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ trans('comments.tbl_Post') }}</th>
                                    <th>{{ trans('comments.tbl_Comment') }}</th>
                                    <th>{{ trans('comments.tbl_Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->post->title }}</td>
                                        <td>{{ $comment->body }}</td>
                                        <td>
                                            <a href="{{ url("/admin/comments/{$comment->id}") }}" data-method="DELETE" data-token="{{ csrf_token() }}" data-confirm="{{ trans('users.btn_confirm') }}" class="btn btn-xs btn-danger">{{ trans('comments.btn_Delete') }}</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">{{ trans('comments.btn_NoCom') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {!! $comments->links() !!}

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
