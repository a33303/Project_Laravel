<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Source;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class SourceQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Source::query();
    }

    public function getSourceWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->with('source')->paginate($quantity);
    }

    function getAll(): Collection
    {
        return Source::query()->get();
    }
}
