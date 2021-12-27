<?php

namespace TripUp\Cache\Tags;

use Illuminate\Support\Collection;
use TripUp\Cache\Contracts\Tagable;

class ProductsCollectionTags implements Tagable
{
    /**
     * @var Collection
     */
    protected $data;

    /**
     * @param $data
     */
    public function __construct(Collection $data)
    {
        $this->data = $data;
    }

    public function getTags(): array
    {
        $this->data->map(function ($item) {
            return new ProductTag($item->id);
        })->toArray();
    }
}
