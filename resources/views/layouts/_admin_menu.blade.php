<ul class="nav navbar-nav">
    <li><a href="{{ url('admin/posts') }}">{{ trans('home.posts') }}</a></li>
    <li><a href="{{ url('admin/categories') }}">{{ trans('home.categories') }}</a></li>
    <li><a href="{{ url('admin/comments') }}">{{ trans('home.comments') }}</a></li>
    <li><a href="{{ url('admin/tags') }}">{{ trans('home.tags') }}</a></li>

    @if (Auth::user()->is_admin)
        <li><a href="{{ url('admin/users') }}">{{ trans('home.users') }}</a></li>
    @endif
</ul>
