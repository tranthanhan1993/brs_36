<?php

namespace App\Repositories\Eloquent;

use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\MarkInterface;
use App\Models\Mark;
use App\Repositories\BaseRepository;

class MarkRepository extends BaseRepository implements MarkInterface
{

    public function __construct(Mark $mark)
    {
        $this->model = $mark;
    }

    public function findMark($book_id, $userId){

        return $this->model->where('user_id', $userId)->where('book_id', $book_id)->first();
    }
}