<?php
namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\BaseRepository;
use App\Repositories\Book\BookRepository;
use App\Repositories\Review\ReviewRepository;

class CategoryRepository extends BaseRepository
{
    protected $model;

    public function __construct(
        Category $category,
        BookRepository $bookRepository,
        ReviewRepository $reviewRepository
    ) {
        $this->model = $category;
        $this->bookRepository = $bookRepository;
        $this->reviewRepository = $reviewRepository;
    }

    public function getListCategory()
    {
        $categories = $this->model->lists('name');

        return $categories;
    }
    public function getCategory()
    {
        $categories = $this->model->all();

        return $categories;
    }

    public function delete($id)
    {
        $category = $this->model->find($id);
        if ($category) {
            foreach ($category->books as $book) {
                foreach ($book->reviews as $review) {
                    $this->reviewRepository->delete($review->id);
                }
                $this->bookRepository->delete($book->id);
            }
            $category->delete();

            return true;
        }

        return false;
    }
}
