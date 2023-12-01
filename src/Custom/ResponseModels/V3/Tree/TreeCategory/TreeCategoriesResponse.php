<?php

namespace Hirooks\BigCommerce\Api\Custom\ResponseModels\V3\Tree\TreeCategory;

use BigCommerce\ApiV3\ResponseModels\PaginatedBatchableResponse;
use Hirooks\BigCommerce\Api\Custom\ResourceModels\V3\Tree\TreeCategory\TreeCategory;

class TreeCategoriesResponse extends PaginatedBatchableResponse
{
    /**
     * @return TreeCategory[]
     */
    public function getTreeCategories(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return TreeCategory::class;
    }
}
