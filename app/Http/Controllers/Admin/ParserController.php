<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\JobNewsParser;
use App\Models\News;
use App\Models\Source;
use App\QueryBuilders\SourceQueryBuilder;
use App\Services\Contracts\Parser;
use App\Services\ParserServices;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param SourceQueryBuilder $sourceQueryBuilder
     * @param Request $request
     * @return Application|Factory|View
     */
    public function __invoke(SourceQueryBuilder $sourceQueryBuilder, Request $request): View|Factory|Application
    {

        $urls = $sourceQueryBuilder->getAll()->pluck('link');
//        dd($urls);
        foreach ($urls as $url){
            \dispatch(new JobNewsParser($url));

        }
        return \view('admin.parser.index');
    }
}
