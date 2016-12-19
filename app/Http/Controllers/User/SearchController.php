<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\CategoryInterface;
use App\Repositories\Interfaces\BookInterface;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;
use App\Repositories\Interfaces\TimelineInterface;

class SearchController extends BaseController
{
    protected $books;
    protected $categories;
    protected $timeline;

    public function __construct(
        BookInterface $book,
        CategoryInterface $categories,
        TimelineInterface $timeline
    ) {
        parent::__construct();
        $this->books = $book;
        $this->categories = $categories;
        $this->timeline = $timeline;
    }

    public function search(Request $request)
    {
        $books = $this->searchBy($request->get('search'));
        $followActivities = $this->timeline
            ->getActivityFollow(Auth::user()->id, Auth::user()->id);

        return view('user.pages.search_result', compact('books', 'followActivities'));
    }

    public function searchBy($value)
    {
        return $this->books
            ->searchBook($value, 'category_id',  $this->categories->findByName($value));
    }
}
