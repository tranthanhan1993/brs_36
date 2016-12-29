@extends('layouts.admin_master')
@section('title', trans('book.book_show_detail_title'))
@section('header')
    <h1 class="page-header">{{ trans('book.book_detail') }}</h1>
@endsection
@section('content')
<div class="col-lg-8">
    <table class="table table-bordered table-striped">
        <td>
            <div class="form-group">
            {!! Form::label('id', trans('book.book_id')) !!}
            <p>{!! $book->id !!}</p>
        </div>

        <div class="form-group">
            {!! Form::label('tittle', trans('book.tittle')) !!}
            <p>{!! $book->tittle !!}</p>
        </div>

        <div class="form-group set_img">
            {!! Form::label('Image', trans('book.image')) !!}
            <img src="{{ $book->getImagePath() }}" alt="Book Image">
        </div>

        <div class="form-group">
            {!! Form::label('category', trans('category.category')) !!}
            <p>{!! $book->category->name !!}</p>
        </div>

        <div class="form-group">
            {!! Form::label('author', trans('author.author')) !!}
            <p>{!! $book->author->name !!}</p>
        </div>

        <div class="form-group">
            {!! Form::label('num_pages', trans('book.num_pages')) !!}
            <p>{!! $book->num_pages !!}</p>
        </div>

        <div class="form-group">
            {!! Form::label('content', trans('book.content')) !!}
            {!! Form::textarea('content', $book->content, ['class' => 'form-control', 'rows' => 5]) !!}
        </div>

        <div class="form-group">
            {!! Form::label('created_at', trans('book.book_create_at')) !!}
            <p>{!! $book->created_at !!}</p>
        </div>

        <div class="form-group">
            {!! Form::label('updated_at', trans('book.book_update_at')) !!}
            <p>{!! $book->updated_at !!}</p>
        </div>
        <a href="{!! action('Admin\BookController@index') !!}" class="btn btn-default">{{ trans('book.book_back') }}</a>
        </td>
    </table>
</div>
@endsection
