<?php

namespace App\Repositories\Interfaces;

interface RateInterface
{
    public function setRate($userId, $bookId, $point);
    public function rateAvg($bookId);
    public function getContent($id);
}
