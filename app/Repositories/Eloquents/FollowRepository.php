<?php

namespace App\Repositories\Eloquents;

use App\Models\Relationship;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\FollowInterface;
use App\Repositories\Interfaces\TimelineInterface;

class FollowRepository extends BaseRepository implements FollowInterface
{
    protected $timeline;

    public function __construct(Relationship $relationship)
    {
        $this->model = $relationship;
    }

    public function getFollow($followerId, $currentUser)
    {
        $follows = $this->model->where('follower_id', $followerId)
            ->where('followed_id', '<>', $currentUser)
            ->orderBy('created_at', 'desc')
            ->get();
        $users = [];
        foreach ($follows as $follow) {
            $data = [
                'id'=> $follow->followed->id,
                'name' => $follow->followed->name,
                'image' => $follow->followed->image,
                'follower' => $follow->follower->id,
                'countFollowed' => $this->model->where('follower_id', $follow->followed_id)->count('followed_id'),
                'countFollower' => $this->model->where('followed_id', $follow->followed_id)->count('follower_id'),
            ];
            $users [] = $data;
        }

        return $users;
    }

    public function unFollow($currentUser ,$id)
    {
        try {
            $unFollowId = $this->model->where("follower_id", $currentUser)->where("followed_id", $id)->first();
            $this->delete($unFollowId->id);

            return true;
        } catch (Exception $ex) {
            throw $ex;

            return false;
        }
    }

    public function getRow($followerId, $followedId)
    {
        return $this->model->where('follower_id', $followerId)->where('followed_id', $followedId)->first();
    }

    public function getContent($id)
    {
        return $this->find($id)->followed;
    }
}
