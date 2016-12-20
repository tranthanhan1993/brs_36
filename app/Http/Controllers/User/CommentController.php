<?php

namespace App\Http\Controllers\user;

use Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Eloquents\TimelineRepository;
use App\Repositories\Eloquents\CommentRepository;

class CommentController extends Controller
{
    protected $commentRepository;

    public function __construct(CommentRepository $commentRepository, TimelineRepository $timelineRepository)
    {
        $this->commentRepository = $commentRepository;
        $this->timelineRepository = $timelineRepository;
    }

    public function store()
    {
        if (Request::ajax()) {
            $data = Request::get('data');
            $reviewId = (int) Request::get('reviewId');
            $inputs = [
                'content' => $data,
                'review_id' => $reviewId,
                'user_id' => Auth::user()->id,
            ];
            $comments = [
                'target_type' => 'comments',
                'target_id' => $reviewId,
                'user_id' => Auth::user()->id,
            ];

            if ($this->timelineRepository->insertAction($comments) && $comment = $this->commentRepository->create($inputs)) {

                return [
                    'success' => true,
                    'data' => view('user.temps.temp_comment', compact('data', 'comment'))->render(), 
                ];
            } else {

                return [ 'success' => false ];
            }
        }
    }
}