<?php

namespace Hirooks\BigCommerce\Api\Custom\ResponseModels\V3\Tree;

use BigCommerce\ApiV3\ResponseModels\PaginatedBatchableResponse;
use Hirooks\BigCommerce\Api\Custom\ResourceModels\V3\Tree\Tree;

class TreesResponse extends PaginatedBatchableResponse
{
    /**
     * @return Tree[]
     */
    public function getCategoryTrees(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return Tree::class;
    }
}
