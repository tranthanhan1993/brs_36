<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface BookInterface
{
    public function getAllOfBook($categoryId);
    public function getDetailBook($bookId);
    public function searchBook($value, $colum, $options);
}
