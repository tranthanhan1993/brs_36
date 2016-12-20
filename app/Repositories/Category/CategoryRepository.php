<?php
namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository
{
    protected $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
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

    public function deletes($id, $bookRepository, $reviewRepository)
    {
        $category = $this->model->find($id);
        if ($category) {
            foreach ($category->books as $book) {
                foreach ($book->reviews as $review) {
                    $reviewRepository->delete($review->id);
                }
                $bookRepository->delete($book->id);
            }
            $category->delete();

            return true;
        }

        return false;
    }
}
