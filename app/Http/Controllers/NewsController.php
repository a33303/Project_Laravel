<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class NewsController extends Controller
{
    use NewsTrait;

    public function index(): View|Factory|Application
    {
        return \view('news.index', [
            'news' => $this->getNews()
        ]);
    }
    public function show(int $id): View|Factory|Application
    {
        return \view('news.show', [
            'news' => $this->getNews($id)
        ]);
    }
}
