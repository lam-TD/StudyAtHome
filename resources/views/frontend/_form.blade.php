<div class="panel panel-default">
    <div class="panel-heading">{{ trans('posts.txt_comment') }}</div>

    <div class="panel-body">
        {!! Form::open(['url' => "posts/{$post->id}/comment"]) !!}
            <div class="form-group">
                {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 3, 'required']) !!}
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    {{ trans('posts.btn_reply') }}
                </button>
            </div>
        {!! Form::close() !!}
    </div>
</div>
