<?php

namespace App\Repositories\Interfaces;

interface ReviewInterface
{
    public function getReview($bookId);
    public function setReview($userId, $bookId, $content);
    public function editReview($userId, $bookId, $content);
    public function deleteReview($reviewId);
    public function getContent($id);
}
