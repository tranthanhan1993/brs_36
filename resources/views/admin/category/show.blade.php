@extends('layouts.admin_master')
@section('title', trans('category.category_show_detail_title'))
@section('header')
    <h1 class="page-header">{{ trans('category.category_detail') }}</h1>
@endsection
@section('content')
<div class="col-lg-8">
    <table class="table table-bordered table-striped">
        <td>
            <div class="form-group">
            {!! Form::label('id', trans('category.category_id')) !!}
            <p>{!! $category['id'] !!}</p>
        </div>

        <div class="form-group">
            {!! Form::label('name', trans('category.category_name')) !!}
            <p>{!! $category['name'] !!}</p>
        </div>

        <div class="form-group">
            {!! Form::label('created_at', trans('category.category_create_at')) !!}
            <p>{!! $category['created_at'] !!}</p>
        </div>

        <div class="form-group">
            {!! Form::label('updated_at', trans('category.category_update_at')) !!}
            <p>{!! $category['updated_at'] !!}</p>
        </div>
        <a href="{!! action('Admin\CategoryController@index') !!}" class="btn btn-default">{{ trans('category.category_back') }}</a>
        </td>
    </table>
</div>
@endsection
