<?php

namespace App\Http\Controllers\User;

use Request;
use App\Repositories\Eloquent\LikeRepository;
use App\Repositories\Eloquents\TimelineRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LikeController extends Controller
{
    protected $likeRepository;

    public function __construct(LikeRepository $LikeRepository, TimelineRepository $TimelineRepository) 
    {
        $this->likeRepository = $LikeRepository;
        $this->timelineRepository = $TimelineRepository;
    }

    public function maskLike()
    {
        if (Request::ajax()) {
            $type = Request::get('type');
            $idBook = (int) Request::get('idBook');
            $temp = Request::get('temp');

            if ($temp == 'Mark favorite') {
                $inputs = [
                    'target_type' => $type,
                    'target_id' => $idBook,
                    'user_id' => Auth::user()->id,
                ];
                $this->timelineRepository->insertAction( $inputs);   
                $this->likeRepository->create($inputs);

                return 1;
            } else {
                $this->likeRepository->delLike($type, $idBook, Auth::user()->id);
                $this->timelineRepository->deleteAction(Auth::user()->id, $type, $idBook);

                return 2;
            }
        }
    }
}
