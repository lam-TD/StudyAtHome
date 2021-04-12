@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(isset($is_update_success))
                    <div class="alert alert-success">
                        <ul>
                            {{ $is_update_success }}
                        </ul>
                    </div>
                @endif
            </div>
            <form action="{{ url('/profile/update') }}" method="POST">
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>
                                Profile
                                <button type="submit" class="btn btn-primary pull-right">Save</button>
                            </h2>

                        </div>

                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Attribute</th>
                                    <th>Value</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td><input name="name" value="{{ $user->name }}" type="text" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td>Register At</td>
                                    <td>{{ $user->created_at->format('d-m-Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <td>Is Admin</td>
                                    <td>{{ $user->is_admin ? 'Yes' : 'No' }}</td>
                                </tr>
                                <tr>
                                    <td>API Token</td>
                                    <td>{{ $user->api_token }}</td>
                                </tr>
                                <tr>
                                    <td>Number of Posts</td>
                                    <td>{{ $user->posts_count }}</td>
                                </tr>
                                <tr>
                                    <td>Number of Comments</td>
                                    <td>{{ $user->comments_count }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>
@endsection
