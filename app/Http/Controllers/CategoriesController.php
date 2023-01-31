<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\QueryBuilders\CategoriesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    use NewsTrait;

    public function index(CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
        return \view('categories.index', [
            'listCategories' => $categoriesQueryBuilder->getAll()
        ]);
    }
    public function show(int $id): View|Factory|Application
    {
        $model = new Category();
        $listCategories = $model->getCategoryById($id);
        return \view('categories.show', [
            'listCategories' => $listCategories
        ]);
    }
}
