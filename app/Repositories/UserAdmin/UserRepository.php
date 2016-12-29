<?php

namespace App\Repositories\UserAdmin;

use App\Models\User;
use Input;
use Hash;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\UserInterface;
use App\Repositories\Review\ReviewRepository;
use App\Repositories\Eloquents\CommentRepository;
use App\Repositories\Eloquents\FavoriteRepository;
use App\Repositories\Eloquents\FollowRepository;
use App\Repositories\Eloquents\RateRepository;
use App\Repositories\Eloquent\MarkRepository;
use App\Repositories\Eloquent\RequestRepository;

class UserRepository extends BaseRepository implements UserInterface
{
    public function __construct(
        User $user,
        ReviewRepository $reviewRepository,
        CommentRepository $commentRepository,
        FavoriteRepository $favoriteRepository,
        FollowRepository $followRepository,
        RateRepository $rateRepository,
        MarkRepository $markRepository,
        RequestRepository $requestRepository
    ) {
        $this->model = $user;
        $this->reviewRepository = $reviewRepository;
        $this->commentRepository = $commentRepository;
        $this->favoriteRepository = $favoriteRepository;
        $this->followRepository = $followRepository;
        $this->rateRepository = $rateRepository;
        $this->markRepository = $markRepository;
        $this->requestRepository = $requestRepository;
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
            'password' => bcrypt($request['password']),
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
        if ($user) {
            foreach ($user->reviews as $review) {
                foreach ($review->comments as $comment) {
                    $this->commentRepository->delete($comment->id);
                }
                $this->reviewRepository->delete($review->id);
            }

            foreach ($user->requests as $request) {
                $this->requestRepository->delete($request->id);
            }

            foreach ($user->comments as $comment) {
                $this->commentRepository->delete($comment->id);
            }

            foreach ($user->favorites as $favorite) {
                $this->favoriteRepository->delete($favorite->id);
            }

            foreach ($user->marks as $mark) {
                $this->markRepository->delete($mark->id);
            }

            foreach ($user->rates as $rate) {
                $this->rateRepository->delete($rate->id);
            }
            $user->delete();

            return true;
        }

        return false;
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
