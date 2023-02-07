<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    use NewsTrait;

    public function index(NewsQueryBuilder $newsQueryBuilder,
                          CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
//        $model = new News();
//        $model_2 = new Category();
//        $listNews = $model->getNews();
//        $listCategories = $model_2->getCategories();

        return \view('news.index', [
            'listNews' => $newsQueryBuilder->getAll(),
            'listCategories' => $categoriesQueryBuilder->getAll(),
        ]);

//        return \view('news.index', [
//            'news' => $this->getNews(),
//            'categories' => $this->getCategories(),
//        ]);
    }
    public function show(int $id, NewsQueryBuilder $newsQueryBuilder): View
    {
        $model = new News();
//        $model_2 = new Category();
        $listNews = $model->getNewsById($id);
//        $listCategories = $model_2->getCategoryById($id);

        return \view('news.show', [
            'listNews' => $listNews
        ]);
    }
}
