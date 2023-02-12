<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Contracts\Parser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param Parser $parser
     * @return Response
     */
    public function __invoke(Request $request, Parser $parser): Response
    {
        $load = $parser->setLink("https://www.vedomosti.ru/rss/issue.xml")
            ->getParseData();

        dd($load);
    }
}
