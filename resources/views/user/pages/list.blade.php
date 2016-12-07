@extends('user.master')
@section('content')
<div class="freework" >
    <h3 class="h3_list">{{ trans('book.category') }}: Novel </h3>
        <div class="khung">
            <a href="">{{ Html::image('user/img/page3_pic2.jpg') }}
            </a>
            <div ><a> Harry botter </a></div>
            <p class="p_khung">{{ trans('book.author') }}: Tokio takesi</p>
            <p>{{ trans('book.number_of_likes') }}: 45</p>
            <p>{{ trans('book.rate') }}: 3 {{ Html::image('user/img/star.png') }}</p>
        </div>
        <div class="khung">

        </div>
        <div class="khung">

        </div>
        <div class="khung">

        </div>
        <div class="khung">

        </div>
        <div class="khung">

        </div>
        <div class="khung">

        </div>
        <div class="khung">

        </div>
        <div class="khung">

        </div>
        <div class="cclear">
        <div class="pagination1">
            <a href="#" class="page gradient">{{ trans('book.first') }}</a>
            <a href="#" class="page gradient">2</a>
            <a href="#" class="page gradient">3</a>
            <span class="page active">4</span>
            <a href="#" class="page gradient">5</a>
            <a href="#" class="page gradient">6</a>
            <a href="#" class="page gradient">{{ trans('book.last') }}</a>
        </div>
    </div>
</div>
@endsection
@section('content1')
<div class="list timeacti">
    @include('user.blocks.time_follow')
</div>
@endsection



