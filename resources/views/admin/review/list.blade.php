@extends('layouts.admin_master')
@section('title', trans('review.review_list_tittle'))
@section('header')
    <h1 class="page-header">{{ trans('review.list_review') }}</h1>
@endsection

@section('content')
<!-- /.col-lg-12 -->
<div class="col-lg-10">
    <table class="table table-responsive table-hover" id="">
        <thead>
            <tr>
                <th class="text-center">{{ trans('review.review_id') }}</th>
                <th class="text-center" style="width: 120px">{{ trans('book.book_tittle') }}</th>
                <th class="text-center" style="width: 120px">{{ trans('review.user_name') }}</th>
                <th class="text-center">{{ trans('review.content') }}</th>
                <th class="text-center">{{ trans('review.review_delete') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
                <tr class="odd gradeX text-center">
                    <td>{{ $review->id }}</td>
                    <td>
                        <span><img src="{{ $review->book->getImagePath() }}" width="90px" height="70px"></span>
                        <span>{{ $review->book->tittle }}</span>
                    </td>
                    <td>
                        <span><img src="{{ $review->user->getAvatarPath() }}" width="90px" height="70px"></span>
                        <span>{{ $review->user->name }}</span>
                    </td>
                    <td>{{ $review->content }}</td>
                    <td>
                        {!! Form::open(['action' => ['Admin\ReviewController@destroy', $review->id], 'method' => 'DELETE']) !!}
                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("' . trans('review.review_comfirm_delete') . '")']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="col-lg-12 col-lg-offset-9">
        {!! $reviews->render(); !!}
    </div>
</div>
@endsection
