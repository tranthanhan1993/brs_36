<div id="cont_review{{ $review->id }}">
{{ Html::image($review->user->getAvatarPath(), 'a picture', ['class' => 'imgreview']) }}

<div class="edit_rv{{ $review->id }} edit_rv">
    <input 
        type="text" 
        name="editReview" 
        value="{{ $review->content }}" 
        class="editrv content-review{{ $review->id }}" 
        id="{{ $review->id }}"
    >
    <a class="esc" idReview="{{ $review->id }}">Cancle</a>
</div>

<div class="div_review" id="review{{ $review->id }}">
    <div>
        <a href="{{ action('User\TimelineController@getTimelineUser', $review->user->id) }}" class="ava_cmt">
            {{ $review->user->name }}
        </a>
        <span class="ctReview{{ $review->id }}">
            {{ $review->content }}
        </span> 
    </div>
    <div >
        <a class="a like_a_cm">{{ trans('book.like') }}</a>
        <a class="b like_a_cm" book-a="{{ $review->id }}" >{{ trans('book.comment') }}</a>
        <p class="p_date">{{ $review->created_at }}</p>
        <a class="review glyphicon glyphicon-remove" idReview="{{ $review->id }}"></a>
        <a class="review glyphicon glyphicon-pencil"></a>
    </div>
    <div class="cclear"></div>
    <div class="show{{ $review->id }} show_cmt">
        @foreach ($review->comments as $comment)
            <div id="cont_cm{{ $comment->id }}">
                {{ Html::image($comment->user->getAvatarPath(), 'a picture', ['class' => 'img_cmt']) }}
                <div class="contain_cm{{ $comment->id }}" >
                    <a href="{{ action('User\TimelineController@getTimelineUser', $comment->user->id) }}" class="show_name" >
                        {{ $comment->user->name }}
                    </a> 
                    <span class="content{{ $comment->id }}" >
                        {{ $comment->content }}
                    </span>
                </div>
                <div class="edit_cm{{ $comment->id }} edit">
                    <input type="text" name="txtedit" class="input_edit" value="{{ $comment->content }}"> 
                    <a class="Cancle" idComment="{{ $comment->id }}">Cancle</a>
                </div>
                <div class="ava_cmt1" id="comment{{ $comment->id }}">
                    <a class="like_cmt">{{ trans('book.like') }}</a>
                    <p class="p_date_cmt">{{ $comment->created_at }}</p>
                    <a class="comment glyphicon glyphicon-remove" idComment="{{ $comment->id }}"></a>
                    <a class="comment glyphicon glyphicon-pencil"></a>
                </div>
                <div class="cclear"></div>
            </div>
        @endforeach
        <div id="temp_comment{{ $review->id }}">
            {{ Html::image(Auth::user()->getAvatarPath(), 'a picture', ['class' => 'img_cmt']) }}
            <input 
                type="text" 
                name="txtcomment" 
                id="txtrv{{ $review->id }}" 
                id_review="{{ $review->id }}" 
                class="input_cmt" 
                placeholder="{{ trans('book.write_comment_here') }}..."
            >
        </div>
    </div>
</div>
</div>
<div class="clear_mer" id="cont_review review{{ $review->id }}"></div>