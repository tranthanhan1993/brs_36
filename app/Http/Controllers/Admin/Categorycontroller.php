<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateCategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepository;
use App\Http\Requests\UpdateCategoryRequest;

class Categorycontroller extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->paginate(5);

        return view('admin.category.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $input = $request->only('name');

        if ($this->categoryRepository->create($input)) {
            return redirect()->action('Admin\CategoryController@index')
                ->with('success', trans('category.create_category_successfully'));
        }

        return redirect()->action('Admin\CategoryController@index')->with('fails', trans('category.create_category_fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->categoryRepository->find($id);

        if (!$category) {
            return redirect()->action('Admin\CategoryController@index')->with('fails', trans('category.category_not_found'));
        }

        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);

        if (!$category) {
            return redirect()->action('Admin\CategoryController@index')->with('fails', trans('category.category_not_found'));
        }

        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $input = $request->only('name');

        if ($this->categoryRepository->update($input, $id)) {
            return redirect()->action('Admin\CategoryController@index')
                ->with('success', trans('category.update_category_successfully'));
        }

        return redirect()->action('Admin\CategoryController@index')->with('fails', trans('category.update_category_fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->categoryRepository->find($id);

        if (!$category) {
            return redirect()->action('Admin\CategoryController@index')->with('fails', trans('category.category_not_found'));
        }

        if ($this->categoryRepository->delete($id)) {
            return redirect()->action('Admin\CategoryController@index')
                ->with('success', trans('category.delete_category_successfully'));
        }

        return redirect()->action('Admin\CategoryController@index')->with('fails', trans('category.delete_category_fail'));
    }
}
