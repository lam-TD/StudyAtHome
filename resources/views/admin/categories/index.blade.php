@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            {{ trans('categories.txt_categories') }}

                            <a href="{{ url('admin/categories/create') }}" class="btn btn-default pull-right">{{ trans('categories.btn_Create') }}</a>
                        </h2>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ trans('categories.tbl_Name') }}</th>
                                    <th>{{ trans('categories.tbl_PostCount') }}</th>
                                    <th>{{ trans('categories.tbl_Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->posts_count }}</td>
                                        <td>
                                            <a href="{{ url("/admin/categories/{$category->id}/edit") }}" class="btn btn-xs btn-info">{{ trans('categories.tbl_Edit') }}</a>
                                            <a href="{{ url("/admin/categories/{$category->id}") }}" data-method="DELETE" data-token="{{ csrf_token() }}" data-confirm="{{ trans('users.btn_confirm') }}" class="btn btn-xs btn-danger">{{ trans('categories.tbl_Delete') }}</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">{{ trans('categories.txt_no_categories') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {!! $categories->links() !!}

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
