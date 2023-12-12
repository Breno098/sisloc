<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;

class ProductService
{
     /**
     * @param array $filters
     * @param null|integer $rowsPerPage
     * @param null|string $orderBy
     * @param null|string $sort
     * @param null|string $pageName
     * @return Collection<Product>|LengthAwarePaginator
     */
    public function index(
        array $filters = [],
        null|int $rowsPerPage = 10,
        null|string $orderBy = 'id',
        null|string $sort = 'asc',
        null|string $pageName = 'page'
    ): LengthAwarePaginator|Collection
    {
         /** @var Product|Builder */
        $query = Product::query()->select(['products.*']);

        if ($name = Arr::get($filters, 'name')) {
            $query->where('name', 'like', "%{$name}%");
        }

        if (in_array($orderBy, (new Product)->getFillable())) {
            $query->orderBy("products.{$orderBy}", $sort);
        }

        return $rowsPerPage ? $query->paginate($rowsPerPage, ['*'], $pageName) : $query->get();
    }
}
