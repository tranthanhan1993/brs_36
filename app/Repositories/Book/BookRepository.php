<?php

namespace App\Repositories\Book;

use App\Models\Book;
use App\Repositories\BaseRepository;
use Input;
use App\Repositories\Eloquents\ReviewRepository;
use DB;
use App\Repositories\Eloquents\FavoriteRepository;
use App\Repositories\Eloquent\MarkRepository;
use App\Repositories\Eloquents\RateRepository;
use App\Repositories\Eloquent\LikeRepository;
use App\Repositories\Eloquents\TimelineRepository;

class BookRepository extends BaseRepository
{
    protected $reviewRepository;
    protected $favoriteRepository;
    protected $markRepository;
    protected $rateRepository;
    protected $timelineRepository;
    protected $likeRepository;

    public function __construct(
        Book $book,
        ReviewRepository $reviewRepository,
        FavoriteRepository $favoriteRepository,
        MarkRepository $markRepository,
        RateRepository $rateRepository,
        LikeRepository $likeRepository,
        TimelineRepository $timelineRepository
    ) {
        $this->model = $book;
        $this->reviewRepository = $reviewRepository;
        $this->favoriteRepository = $favoriteRepository;
        $this->markRepository = $markRepository;
        $this->rateRepository = $rateRepository;
        $this->timelineRepository = $timelineRepository;
        $this->likeRepository = $likeRepository;
    }

    public function create($request)
    {
        $fileName = config('settings.image_default');
        if (isset($request['image'])) {
            $fileName = $this->uploadImage(null);
        }

        $book = [
            'tittle' => $request['tittle'],
            'content' => $request['content'],
            'image' => $fileName,
            'num_pages' => $request['num_pages'],
            'public_date' => $request['public_date'],
            'category_id' => $request['category_id'],
            'author_id' => $request['author_id'],
        ];
        $createBook = $this->model->create($book);
        if (!$createBook) {
            throw new Exception('message.create_error');
        }

        return $createBook;
    }

    public function update($inputs, $id)
    {
        try {
            $currentBook = $this->model->find($id);
            $oldImage = $currentBook->image;
            if (isset($inputs['image'])) {
                $inputs['image'] = $this->uploadImage($oldImage);
            } else {
                $inputs['image'] = $oldImage;
            }

            $data = parent::update($inputs, $id);
        } catch (Exception $e) {
            throw new Exception(trans('book.update_user_fail'));
        }

        return $data;
    }

    public function uploadImage($oldImage)
    {
        $file = Input::file('image');
        $destinationPath = base_path() . config('settings.image_url');
        $fileName = uniqid(rand(), true) . '.' . $file->getClientOriginalExtension();
        Input::file('image')->move($destinationPath, $fileName);
        if (!empty($oldImage) && file_exists($oldImage)) {
            File::delete($oldImage);
        }

        return $fileName;
    }

    public function deleteBook($id)
    {
        $book = $this->model->find($id);
        DB::beginTransaction();

        if ($book) {
            try {
                $this->timelineRepository->getModel()
                    ->orWhere(function ($query) use ($book) {
                        $query->where('target_type', config('settings.reviews'))
                            ->whereIn('target_id', $book->reviews()->get(['id'])->pluck('id'));
                    })
                    ->orWhere(function ($query) use ($book) {
                        $query->where('target_type', config('settings.favorites'))
                            ->whereIn('target_id', $book->favorites()->get(['id'])->pluck('id'));
                    })
                    ->orWhere(function ($query) use ($book) {
                        $query->where('target_type', config('settings.rates'))
                            ->whereIn('target_id', $book->rates()->get(['id'])->pluck('id'));
                    })
                    ->orWhere(function ($query) use ($book) {
                        $query->where('target_type', config('settings.marks'))
                            ->whereIn('target_id', $book->marks()->get(['id'])->pluck('id'));
                    })
                    ->delete();
                $book->reviews()->delete();
                $book->favorites()->delete();
                $book->rates()->delete();
                $book->marks()->delete();
                $this->delete($id);
                DB::commit();

                return true;
            } catch (Exception $e) {
                DB::rollback();

                return false;
            }
        }
    }
}
