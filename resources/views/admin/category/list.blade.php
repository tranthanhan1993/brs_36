@extends('layouts.admin_master')
@section('title', trans('category.category_list_title'))
@section('header')
    <h1 class="page-header">{{ trans('category.create_list') }}</h1>
@endsection
@section('content')
<div class="col-lg-8">
    <table class="table table-responsive table-hover" id="">
        <thead>
            <tr>
                <th class="text-center">{{ trans('category.category_id') }}</th>
                <th class="text-center">{{ trans('category.category_name') }}</th>
                <th class="text-center">{{ trans('category.category_action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr class="odd gradeX text-center">
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        {!! Form::open(['action' => ['Admin\CategoryController@destroy', $category->id], 'method' => 'DELETE']) !!}
                            <div class="btn-group">
                                <a href="{!! action('Admin\CategoryController@show', $category->id) !!}" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
                                <a href="{!! action('Admin\CategoryController@edit', $category->id) !!}" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
                                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("' . trans('category.category_comfirm_delete') . '")']) !!}
                            </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="col-lg-12 col-lg-offset-8">
        {!! $categories->render(); !!}
    </div>
</div>
@endsection
