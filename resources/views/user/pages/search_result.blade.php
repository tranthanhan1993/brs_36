@extends('user.master')
@section('content')
<div class="freework" >
    @forelse ($books as $book)
        <div class="khung">
            <a href="{!! URL::action('User\BookController@getDetail', $book->id) !!}">{{ Html::image('user/img/book->image') }}</a>
            <div><a href="{!! URL::action('User\BookController@getDetail', $book->id) !!}">{{ $book->tittle }}</a></div>
            <p class="p_khung">{{ trans('book.author') }}: {{ $book->author->name }}</p>
            <p>{{ trans('book.number_of_likes') }}: {{ $book->num_pages }}</p>
            <p>{{ trans('book.rate') }}: {{ $book->rate_avg }} {{ Html::image('user/img/star.png') }}</p>
        </div>
    @empty
        {{ trans('book_request.dont_have') }}
    @endforelse
    <div class="cclear">
        {!! $books->render() !!}
    </div>
</div>
@endsection
@section('content1')
<div class="list timeacti">
    @include('user.blocks.time_follow', ['activities' => $followActivities])
</div>
@endsection
