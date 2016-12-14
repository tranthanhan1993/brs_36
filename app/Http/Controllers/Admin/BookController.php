<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Repositories\Author\AuthorRepository;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Book\BookRepository;

class BookController extends Controller
{
    protected $bookRepository;
    protected $authorRepository;
    protected $categoryRepository;

    public function __construct(
        BookRepository $bookRepository, 
        CategoryRepository $categoryRepository, 
        AuthorRepository $authorRepository
    ) {
        $this->bookRepository = $bookRepository;
        $this->authorRepository = $authorRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $books = $this->bookRepository->paginate(5);

        return view('admin.book.list', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->lists('name', 'id');
        $authors = $this->authorRepository->lists('name', 'id');

        return view('admin.book.create', compact('categories', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBookRequest $request)
    {
        $input = $request->only('tittle', 'num_pages', 'content', 'public_date', 'image', 'author_id', 'category_id');
        if ($this->bookRepository->create($input)) {
            return redirect()->action('Admin\BookController@index')
                ->with('success', trans('book.create_book_successfully'));
        }

        return redirect()->action('Admin\BookController@index')->with('fails', trans('book.create_book_fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = $this->bookRepository->find($id);

        if (!$book) {
            return redirect()->action('Admin\BookController@index')
                ->with('fails', trans('book.book_not_found'));
        }

        return view('admin.book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = $this->bookRepository->find($id);
        $categories = $this->categoryRepository->lists('name', 'id');
        $authors = $this->authorRepository->lists('name', 'id');
        if (!$book) {
            return redirect()->action('Admin\BookController@index')->with('fails', trans('book.book_not_found'));
        }

        return view('admin.book.edit', compact('book', 'categories', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, $id)
    {
        $input = $request->only('tittle', 'num_pages', 'content', 'public_date', 'image', 'author_id', 'category_id');
        if ($this->bookRepository->update($input, $id)) {
            return redirect()->action('Admin\BookController@index')
                ->with('success', trans('book.edit_book_successfully'));
        }

        return redirect()->action('Admin\BookController@index')->with('fails', trans('book.edit_book_fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = $this->bookRepository->find($id);

        if (!$book) {
            return redirect()->action('Admin\BookController@index')
                ->with('fails', trans('book.book_not_found'));
        }

        if ($this->bookRepository->delete($id)) {
            return redirect()->action('Admin\BookController@index')
                ->with('success', trans('book.delete_book_successfully'));
        }

        return redirect()->action('Admin\BookController@index')->with('fails', trans('book.delete_book_fail'));
    }
}
