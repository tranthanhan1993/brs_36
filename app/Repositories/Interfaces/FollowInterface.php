<?php

namespace App\Repositories\Interfaces;

interface FollowInterface
{
    public function getFollow($id, $currentUser);
    public function unFollow($currentUser, $id);
    public function getRow($followerId, $followedId);
    public function getContent($id);
}
