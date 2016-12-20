<?php

namespace App\Repositories\Author;

use App\Models\Author;
use App\Repositories\BaseRepository;

class AuthorRepository extends BaseRepository
{
    public function __construct(Author $author)
    {
        $this->model = $author;
    }

    public function getListAuthor()
    {
        $list_authors = $this->model->lists('name');

        return $list_authors;
    }

    public function deletes($id, $bookRepository)
    {
        $author = $this->model->find($id);
        if($author) {
            foreach ($author->books as $book) {
                $bookRepository->delete($book->id);
            }
            $author->delete();

            return true;
        }

        return false;
    }
}
