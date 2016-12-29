<?php

namespace App\Repositories\Eloquents;

use App\Models\Review;
use App\Repositories\Interfaces\ReviewInterface;
use App\Repositories\BaseRepository;
use Carbon\Carbon;

class ReviewRepository extends BaseRepository implements ReviewInterface
{
    protected $model;

    public function __construct(Review $review)
    {
        $this->model = $review;
    }

    public function getReview($bookId)
    {
        return $this->findBy('book_id', $bookId);
    }

    public function setReview($userId, $bookId, $content)
    {
        try {
            $review = $this->create([
                'user_id' => $user_id,
                'book_id' => $bookId,
                'content' => $content,
            ]);

            return true;
        } catch (Exception $e) {
            throw new Exception(trans('message.create_error'));

            return false;
        }
    }

    public function editReview($userId, $bookId, $content)
    {
        $review = $this->update(['content' => $content], $bookId);

        if ($review) {
            return true;
        }

        return false;
    }

    public function deleteReview($bookId)
    {
        $review = $this->delete($bookId);

        if ($review) {
            return true;
        }

        return false;
    }

    public function getContent($id)
    {
        return $this->find($id)->book;
    }

    public function getModel()
    {
        return $this->model;
    }
}
