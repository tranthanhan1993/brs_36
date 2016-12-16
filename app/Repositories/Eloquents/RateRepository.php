<?php

namespace App\Repositories\Eloquents;

use App\Models\Rate;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\RateInterface;
use App\Repositories\Eloquents\BookRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RateRepository extends BaseRepository implements RateInterface
{
    protected $model;
    protected $bookRepository;

    public function __construct(Rate $rate, BookRepository $bookRepository)
    {
        $this->model = $rate;
        $this->bookRepository = $bookRepository;
    }

    public function setRate($userId, $bookId, $point)
    {

        try {
            $bookRate = $this->model->create(['book_id' => $bookId, 'user_id' => $userId, 'point' => $point]);
            $this->rateAvg($bookId);

            return true;
        } catch (Exception $e) {
            throw new Exception(trans('message.create_error'));

            return false;
        }
    }

    public function rateAvg($bookId)
    {
        $rate = $this->model->where('book_id', $bookId)->avg('point');
        $point = $this->bookRepository->update(['rate_avg' => $rate], $bookId);

        return $point;
    }
}
