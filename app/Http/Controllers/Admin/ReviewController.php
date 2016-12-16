<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\Review\ReviewRepository;
use App\Http\Controllers\BaseController;

class ReviewController extends BaseController
{
    protected $reviewRepository;

    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function index()
    {
        $reviews = $this->reviewRepository->paginate(5);

        return view('admin.review.list', compact('reviews'));
    }

    public function destroy($id)
    {
        $review = $this->reviewRepository->find($id);
        if (!$review) {
            return redirect()->action('Admin\ReviewController@index')
                ->with('fails', trans('review.review_not_found'));
        }

        if ($this->reviewRepository->delete($id)) {
            return redirect()->action('Admin\ReviewController@index')
                ->with('success', trans('review.delete_review_successfully'));
        }

        return redirect()->action('Admin\ReviewController@index')->with('fails', trans('review.delete_review_fail'));
    }
}
