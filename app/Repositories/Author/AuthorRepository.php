<?php

namespace App\Repositories\Author;

use App\Models\Author;
use App\Repositories\BaseRepository;
use App\Repositories\Book\BookRepository;

class AuthorRepository extends BaseRepository
{
    public function __construct(
        Author $author,
        BookRepository $bookRepository
    ) {
        $this->model = $author;
        $this->bookRepository = $bookRepository;
    }

    public function getListAuthor()
    {
        $list_authors = $this->model->lists('name');

        return $list_authors;
    }

    public function delete($id)
    {
        $author = $this->model->find($id);
        if ($author) {
            foreach ($author->books as $book) {
                $this->bookRepository->deleteBook($book->id);
            }
            $author->delete();

            return true;
        }

        return false;
    }
}
