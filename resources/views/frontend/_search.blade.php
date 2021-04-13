<div class="row form-search">
    {!! Form::open(['method' => 'GET', 'role' => 'form']) !!}
            <div class="col-md-10">
                {!! Form::text('search', request()->get('search'), ['class' => 'form-control', 'placeholder' => trans('home.placeholder_search')]) !!}
            </div>
            <div class="col-md-2">
                {!! Form::submit(trans('home.btn_search'), ['class' => 'btn btn-block btn-default']) !!}
            </div>
    {!! Form::close() !!}
</div>
