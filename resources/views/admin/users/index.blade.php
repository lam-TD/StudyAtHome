@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            {{ trans('users.txt_title') }}
                        </h2>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ trans('users.btn_Name') }}</th>
                                    <th>{{ trans('users.btn_Email') }}</th>
                                    <th>Admin?</th>
                                    <th>{{ trans('users.btn_NoOfPost') }}</th>
                                    <th>{{ trans('users.btn_Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ ($user->is_admin)?'Yes':'No' }}</td>
                                        <td>{{ $user->posts_count }}</td>
                                        <td>
                                            <a href="{{ url("/admin/users/{$user->id}") }}" data-method="DELETE" data-token="{{ csrf_token() }}" data-confirm="{{ trans('users.btn_confirm') }}" class="btn btn-xs btn-danger">{{ trans('users.btn_Delete') }}</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">{{ trans('users.btn_NoUser') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {!! $users->links() !!}

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
