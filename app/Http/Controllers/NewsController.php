<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    use NewsTrait;

    public function index(): View|Factory|Application
    {
        $model = new News();
        $model_2 = new Category();
        $listNews = $model->getNews();
        $listCategories = $model_2->getCategories();

        return \view('news.index', [
            'listNews' => $listNews,
            'listCategories' => $listCategories,
        ]);

//        return \view('news.index', [
//            'news' => $this->getNews(),
//            'categories' => $this->getCategories(),
//        ]);
    }
    public function show(int $id): View|Factory|Application
    {
        $model = new News();
        $model_2 = new Category();
        $listNews = $model->getNewsById($id);
        $listCategories = $model_2->getCategoryById($id);

        return \view('news.show', [
            'listNews' => $listNews,
            'listCategories' => $listCategories,
        ]);
    }
}
