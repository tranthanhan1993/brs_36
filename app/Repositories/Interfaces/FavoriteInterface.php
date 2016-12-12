<?php

namespace App\Repositories\Interfaces;

interface FavoriteInterface
{
    public function getFavoriteBook($id);
    public function getContent($id);
}
