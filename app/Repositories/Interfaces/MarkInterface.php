<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface MarkInterface
{
    public function findMark($book_id, $userId);
}
