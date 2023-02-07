<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\OrderSource;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class OrderSourceQueryBuilder extends QueryBuilder
{

    public Builder $model;

    public function __construct()
    {
        $this->model = OrderSource::query();
    }

    public function getOrderSourceWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->with('order_source')->paginate($quantity);
    }

    function getAll(): Collection
    {
        return OrderSource::query()->get();
    }
}
