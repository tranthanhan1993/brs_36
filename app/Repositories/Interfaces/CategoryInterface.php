<?php

namespace App\Repositories\Interfaces;

interface CategoryInterface
{
    public function getListCategory();
    public function getCategory();
    public function findByName($name);
}
