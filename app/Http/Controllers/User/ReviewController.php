<?php

namespace App\Http\Controllers\User;

use Request;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquents\ReviewRepository;
use App\Repositories\Eloquents\TimelineRepository;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    protected $reviewRepository;
    protected $timelineRepository;

    public function __construct(ReviewRepository $reviewRepository,TimelineRepository $timelineRepository)
    {
        $this->reviewRepository = $reviewRepository;
        $this->timelineRepository = $timelineRepository;
    }

    public function store()
    {
        if (Request::ajax()) {
            $data = Request::get('data');
            $idbook = (int) Request::get('idbook');
            $user_name = Auth::user()->name;
            $review = [
                'content' => $data,
                'book_id' => $idbook,
                'user_id' => Auth::user()->id,
            ];
            $timeline = [
                'target_type' => 'reviews',
                'target_id' => $idbook,
                'user_id' => Auth::user()->id,
            ];
               
            if ($this->timelineRepository->insertAction($reviews) && $review = $this->reviewRepository->create($inputs)) {

                return [ 
                    'success' => true, 
                    'data' => view('user.temps.temp_detail', compact('data', 'review'))->render(), 
                ];
            } else {

                return ['success' => false];
            }
        }
    }
}
