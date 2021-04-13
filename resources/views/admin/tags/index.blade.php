@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            {{ trans('common.txt_tags') }}

                            <a href="{{ url('admin/tags/create') }}" class="btn btn-default pull-right">{{ trans('common.btn_create') }}</a>
                        </h2>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ trans('common.tbl_name') }}</th>
                                    <th>{{ trans('common.tbl_action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->name }}</td>
                                        <td>
                                            <a href="{{ url("/admin/tags/{$tag->id}/edit") }}" class="btn btn-xs btn-info">{{ trans('common.btn_edit') }}</a>
                                            <a href="{{ url("/admin/tags/{$tag->id}") }}" data-method="DELETE" data-token="{{ csrf_token() }}" data-confirm="{{ trans('users.btn_confirm') }}" class="btn btn-xs btn-danger">{{ trans('common.btn_delete') }}</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">{{ trans('common.no_data') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {!! $tags->links() !!}

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
