@extends('layouts.admin_master')
@section('title', trans('category.category_create_title'))
@section('header')
    <h1 class="page-header">{{ trans('category.create_category') }}</h1>
@endsection
@section('content')
<div class="col-lg-7">
    {!! Form::open(['action' => 'Admin\CategoryController@store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
        <div class="form-group">
            {!! Form::label('name', trans('category.category_name'), ['class' => 'col-lg-3 control-label']) !!}
            <div class="col-lg-7">
                {!! Form::text('name', null, ['class' => 'form-control', 'rows' => 3]) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-8 col-lg-offset-2">
                {!! Form::submit(trans('category.save'), ['class' => 'btn btn-lg btn-info pull-right']) !!}
            </div>
        </div>
    {!! Form::close() !!}
</div>
@endsection
