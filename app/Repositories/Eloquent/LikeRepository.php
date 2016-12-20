<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\LikeInterface;
use App\Models\Like;
use App\Repositories\BaseRepository;

class LikeRepository extends BaseRepository implements LikeInterface
{

    public function __construct(Like $like)
    {
        $this->model = $like;
    }

    public function delLike($type, $tagert_id, $userId)
    {
    	$this->model->where('user_id', $userId)->where('target_type', $type)->where('target_id', $tagert_id)->delete();
    }
}