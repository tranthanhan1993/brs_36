@extends('layouts.admin_master')
@section('header')
    <h1 class="page-header">{{ trans('book.list_book') }}</h1>
@endsection
@section('content')
<div class="col-lg-10">
    <table class="table table-striped table-bordered table-hover" id="">
        <thead>
            <tr>
                <th class="text-center">{{ trans('book.book_id') }}</th>
                <th class="text-center">{{ trans('book.title') }}</th>
                <th class="text-center">{{ trans('author.author') }}</th>
                <th class="text-center">{{ trans('category.category') }}</th>
                <th class="text-center">{{ trans('book.public_day') }}</th>
                <th class="text-center">{{ trans('book.book_action') }}</th>
            </tr>
        </thead>
        @foreach ($books as $book)
            <tbody>
                <tr class="odd gradeX" align="center">
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->tittle }}</td>
                    <td>{{ $book->author->name }}</td>
                    <td>{{ $book->category->name }}</td>
                    <td>{{ $book->public_date }}</td>
                    <td>
                        {!! Form::open(['action' => ['Admin\BookController@destroy', $book->id], 'method' => 'DELETE']) !!}
                            <div class="btn-group">
                                <a href="{!! action('Admin\BookController@show', $book->id) !!}" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
                                <a href="{!! action('Admin\BookController@edit', $book->id) !!}" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
                                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("' . trans('book.book_comfirm_delete') . '")']) !!}
                            </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>
    <div class="col-lg-12 col-lg-offset-9">
        {!! $books->render(); !!}
    </div>
</div>
@endsection
