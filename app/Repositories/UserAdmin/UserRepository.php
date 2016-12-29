<?php

namespace App\Repositories\UserAdmin;

use App\Models\User;
use Input;
use Hash;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\UserInterface;
use App\Models\Activity;
use DB;
use App\Repositories\Eloquents\CommentRepository;

class UserRepository extends BaseRepository implements UserInterface
{
    protected $timeline;
    protected $comments;

    public function __construct(
        User $user,
        CommentRepository $comments,
        Activity $timeline
    ) {
        $this->model = $user;
        $this->timeline = $timeline;
        $this->comments = $comments;
    }

    public function createUser($datas)
    {
        return $this->model->create($data);
    }

    public function getUserWithEmail($providerUser)
    {
        $user = $this->model->findByEmail($providerUser->getEmail())->first();

        return $user;
    }

    public function create($request)
    {
        if (isset($request['image'])) {
            $fileName = $this->uploadAvatar(null);
        } else {
            $fileName =  config('settings.avatar_default');
        }

        $user = [
            'name' => $request['name'],
            'email' => $request['email'],
            'image' => $fileName,
            'password' => $request['password'],
            'gender' => $request['gender'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'birthday' => $request['birthday'],
        ];
        $createUser = $this->model->create($user);
        if (!$createUser) {
            throw new Exception('message.create_error');
        }

        return $createUser;
    }

    public function update($inputs, $id)
    {
        try {
            $currentUser = $this->model->find($id);
            if (isset($request['password'])) {
                $inputs['password'] = bcrypt($inputs['password']);
            } else {
                $inputs['password'] = $currentUser->password;
            }

            $oldImage = $currentUser->image;
            if (isset($inputs['image'])) {
                $inputs['image'] = $this->uploadAvatar($oldImage);
            } else {
                $inputs['image'] = $oldImage;
            }

            $data = $this->model->where('id', $id)->update($inputs);
        } catch (Exception $e) {
            throw new Exception(trans('user.message.update_fail'));
        }

        return $data;
    }

    public function uploadAvatar($oldImage)
    {
        $file = Input::file('image');
        $destinationPath = base_path() . '/public' . config('settings.avatar_path');
        $fileName = uniqid(rand(), true) . '.' . $file->getClientOriginalExtension();
        Input::file('image')->move($destinationPath, $fileName);
        if (!empty($oldImage) && file_exists($oldImage)) {
            File::delete($oldImage);
        }

        return $fileName;
    }

    public function getProfile($id)
    {
        return $this->find($id);
    }

    public function delete($id)
    {
        $user = $this->model->find($id);
        DB::beginTransaction();
        try{
            if ($user) {
                $commentsUser = $this->comments->getModel()
                    ->whereIn('review_id', $user->reviews()->get(['id'])->pluck(['id']))
                    ->get(['id'])->pluck(['id']);
                $this->timeline
                    ->orWhere(function ($query) use ($user) {
                        $query->where('target_type', config('settings.relationships'))
                            ->orWhereIn('target_id', $user->followers()->get(['id'])->pluck('id'))
                            ->orWhereIn('target_id', $user->followeds()->get(['id'])->pluck('id'));
                    })
                    ->orWhere(function ($query) use ($user) {
                        $query->where('target_type', config('settings.favorites'))
                            ->whereIn('target_id', $user->favorites()->get(['id'])->pluck(['id']));
                    })
                    ->orWhere(function ($query) use ($commentsUser) {
                        $query->where('target_type', config('settings.comments'))
                            ->whereIn('target_id', $commentsUser);
                    })
                    ->orWhere(function ($query) use ($user) {
                        $query->where('target_type', config('settings.comments'))
                            ->whereIn('target_id', $user->comments()->get(['id'])->pluck(['id']));
                    })
                    ->orWhere(function ($query) use ($user) {
                        $query->where('target_type', config('settings.rates'))
                            ->whereIn('target_id', $user->rates()->get(['id'])->pluck(['id']));
                    })
                    ->orWhere(function ($query) use ($user) {
                        $query->where('target_type', config('settings.reviews'))
                            ->whereIn('target_id', $user->reviews()->get(['id'])->pluck(['id']));
                    })
                    ->orWhere(function ($query) use ($user) {
                        $query->where('target_type', config('settings.marks'))
                            ->whereIn('target_id', $user->marks()->get(['id'])->pluck(['id']));
                    })
                    ->delete();
                $user->comments()->delete();
                foreach ($user->reviews as $review) {
                    $review->comments()->delete();
                }
                $user->reviews()->delete();
                $user->requests()->delete();
                $user->marks()->delete();
                $user->favorites()->delete();
                $user->rates()->delete();
                $user->followers()->delete();
                $user->followeds()->delete();
                $user->likes()->delete();
                $user->delete();

                DB::commit();

                return true;
            }
        } catch(Exception $e) {
        DB::rollback();
        
        return false;
        }
    }

    public function searchUser($value, $currentUser)
    {
        return $this->model
            ->orWhere(function($query) use ($value, $currentUser) {
                $query->where('email', 'LIKE', "%$value%")->where('id', '<>', $currentUser);
            })
            ->orWhere(function($query) use ($value, $currentUser) {
                $query->where('name', 'LIKE', "%$value%")->where('id', '<>', $currentUser);
            })
            ->get();
    }
}
