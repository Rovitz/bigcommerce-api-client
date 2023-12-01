<?php

namespace Hirooks\BigCommerce\Api\Custom\ResponseModels\V3\Tree\TreeCategory;

use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use Hirooks\BigCommerce\Api\Custom\ResourceModels\V3\Tree\Tree;
use Hirooks\BigCommerce\Api\Custom\ResourceModels\V3\Tree\TreeCategory\TreeCategory;
use stdClass;

class TreeCategoryResponse extends SingleResourceResponse
{
    private TreeCategory $treeCategory;

    public function getTreeCategory(): TreeCategory
    {
        return $this->treeCategory;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->treeCategory = new TreeCategory($rawData);
    }
}
