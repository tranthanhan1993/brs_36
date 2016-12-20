<?php

namespace App\Repositories\Author;

use App\Models\Author;
use App\Repositories\BaseRepository;
use App\Repositories\Book\BookRepository;
use App\Repositories\Review\ReviewRepository;

class AuthorRepository extends BaseRepository
{
    public function __construct(
        Author $author,
        BookRepository $bookRepository,
        ReviewRepository $reviewRepository
    ) {
        $this->model = $author;
        $this->bookRepository = $bookRepository;
        $this->reviewRepository = $reviewRepository;
    }

    public function getListAuthor()
    {
        $list_authors = $this->model->lists('name');

        return $list_authors;
    }

    public function delete ($id)
    {
        $author = $this->model->find($id);
        if($author) {
            foreach ($author->books as $book) {
                foreach ($book->reviews as $review) {
                    $this->reviewRepository->delete($review->id);
                }
                $this->bookRepository->delete($book->id);
            }
            $author->delete();

            return true;
        }

        return false;
    }
}
