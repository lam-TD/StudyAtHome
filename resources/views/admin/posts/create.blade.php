@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            {{ trans('posts.txt_create_new') }}

                            <a href="{{ url('admin/posts') }}" class="btn btn-default pull-right">{{ trans('posts.btn_go_back') }}</a>
                        </h2>
                    </div>

                    <div class="panel-body">
                        {!! Form::open([
                                'url' => '/admin/posts',
                                'class' => 'form-horizontal',
                                'role' => 'form',
                                'enctype' => 'multipart/form-data'
                            ])
                        !!}

                        @include('admin.posts._form')

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ trans('posts.btn_create') }}
                                </button>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script> CKEDITOR.replace('editor1'); </script>
@endsection
