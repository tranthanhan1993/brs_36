@extends('layouts.admin_master')

@section('header')
    <h1 class="page-header">{!! trans('book.add_book') !!}</h1>
@endsection    

@section('content')
<div class="col-lg-8" style="padding-bottom:120px">
    {!! Form::open(
        [
            'action' => 'Admin\BookController@store', 
            'method' => 'POST', 
            'class' => 'form-horizontal', 
            'enctype' => 'multipart/form-data',
        ]
    ) !!}

        @include('admin.book.fields')

    {!! Form::close() !!}
</div>
@endsection
