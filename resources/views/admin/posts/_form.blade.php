<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    {!! Form::label('title', trans('posts.tbl_title'), ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-8">
        {!! Form::text('title', null, ['class' => 'form-control', 'required', 'autofocus']) !!}

        <span class="help-block">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
    </div>
</div>

<div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
    {!! Form::label('body', trans('posts.tbl_body'), ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-8">
        {!! Form::textarea('body', null, ['class' => 'form-control', 'required', 'id' => 'editor1']) !!}

        <span class="help-block">
            <strong>{{ $errors->first('body') }}</strong>
        </span>
    </div>
</div>

<div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
    {!! Form::label('file', trans('posts.tbl_file'), ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-8">
        {!! Form::file('file', null, ['class' => 'form-control', '']) !!}

        <span class="help-block">
            <strong>{{ $errors->first('file') }}</strong>
        </span>
    </div>
</div>

@if(!empty($files))
    <div class="form-group">
        {!! Form::label('File list', trans('posts.txt_file_list'), ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-8">
            <ul class="list-group">
                @foreach($files as $file)
                    <li class="list-group-item">{{ $file['file_name_origin'] }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
    {!! Form::label('category_id', trans('posts.tbl_category'), ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-8">
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'required']) !!}

        <span class="help-block">
            <strong>{{ $errors->first('category_id') }}</strong>
        </span>
    </div>
</div>

@php
    if(isset($post)) {
        $tag = $post->tags->pluck('name')->all();
    } else {
        $tag = null;
    }
@endphp

<div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
    {!! Form::label('tags', trans('posts.tbl_tags'), ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-8">
        {!! Form::select('tags[]', $tags, $tag, ['class' => 'form-control select2-tags', 'required', 'multiple']) !!}

        <span class="help-block">
            <strong>{{ $errors->first('tags') }}</strong>
        </span>
    </div>
</div>
