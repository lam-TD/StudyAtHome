@forelse ($post->comments as $comment)
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $comment->user->name }} {{ trans('posts.says') }}

            <span class="pull-right">{{ $comment->created_at->diffForHumans() }}</span>
        </div>

        <div class="panel-body">
            <p>{{ $comment->body }}</p>
        </div>
    </div>
@empty
    <div class="panel panel-default">
        <div class="panel-heading">{{ trans('posts.not_found_comment') }}</div>

        <div class="panel-body">
            <p>{{ trans('posts.not_found_comment2') }}</p>
        </div>
    </div>
@endforelse
