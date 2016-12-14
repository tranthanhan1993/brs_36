@extends('layouts.admin_master')

@section('header')
    <h1 class="page-header">{!! trans('book.edit_book') !!}</h1>
@endsection    

@section('content')
<div class="col-lg-8" style="padding-bottom:120px">
    {!! Form::model($book,
        [
            'action' => ['Admin\BookController@update', $book->id], 
            'method' => 'PUT', 
            'class' => 'form-horizontal', 
            'enctype' => 'multipart/form-data',
        ]
    ) !!}

        @include('admin.book.fields')

    {!! Form::close() !!}
</div>
@endsection
