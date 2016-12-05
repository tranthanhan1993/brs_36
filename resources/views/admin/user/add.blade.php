@extends('layouts.admin.master')

@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel-heading">
            <h2> {{ trans('user.add') }} </h2>
        </div>
                {!! Form::open(['url' => 'foo/bar']) !!}

                @include('admin.user.fields')

                {!! Form::close() !!}
    </div>    
</div>
@endsection
