<?php

declare(strict_types=1);

namespace App\Providers;

use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use App\QueryBuilders\OrderSourceQueryBuilder;
use App\QueryBuilders\QueryBuilder;
use App\QueryBuilders\SourceQueryBuilder;
use App\Services\Contracts\Parser;
use App\Services\Contracts\Social;
use App\Services\ParserServices;
use App\Services\SocialServices;
use App\Services\UploadService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(QueryBuilder::class, CategoriesQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, NewsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, SourceQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, OrderSourceQueryBuilder::class);

        //Services
        $this->app->bind(Parser::class, ParserServices::class);
        $this->app->bind(Social::class, SocialServices::class);
        $this->app->bind(UploadService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Paginator::useBootstrapFour();
    }
}
