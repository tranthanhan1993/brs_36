<?php

namespace App\Repositories\Review;

use App\Models\Review;
use App\Repositories\BaseRepository;

class ReviewRepository extends BaseRepository
{
    public function __construct(Review $review)
    {
        $this->model = $review;
    }
}
