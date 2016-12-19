<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Category\CategoryRepository;

class BaseController extends Controller
{
    protected $categoryRepository;

    public function __construct()
    {
        $this->categoryRepository = \App::make('App\Repositories\Category\CategoryRepository');
        view()->share('categoryMaster',  $this->categoryRepository->getCategory());
    }
}
