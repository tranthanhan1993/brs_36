<?php
namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\BaseRepository;
use App\Repositories\Book\BookRepository;
use App\Repositories\Review\ReviewRepository;
use App\Repositories\Interfaces\CategoryInterface;
use DB;

class CategoryRepository extends BaseRepository implements CategoryInterface
{
    protected $model;
    protected $bookRepository;

    public function __construct(
        Category $category,
        BookRepository $bookRepository
    ) {
        $this->model = $category;
        $this->bookRepository = $bookRepository;
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
            DB::beginTransaction();
            try {
                foreach ($category->books as $book) {
                    $this->bookRepository->deleteBook($book->id);
                }

                $category->delete();
                DB::commit();

                return true;
            } catch (Exception $e) {
                DB::rollback();

                return false;
            }
        }

        return false;

    }

    public function findByName($name)
    {
        return $this->model->where('name', 'LIKE', "%$name%")->pluck('id')->toArray();
    }
}
