<?php

namespace App\Repositories\Interfaces;

interface UserInterface
{
    public function createUser($datas);
    public function getUserWithEmail($providerUser);
    public function create($request);
    public function update($inputs, $id);
    public function uploadAvatar($oldImage);
    public function getProfile($id);
    public function searchUser($value, $currentUser);
}
