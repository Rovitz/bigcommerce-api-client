<?php

namespace Hirooks\BigCommerce\Api\Custom\ResponseModels\V3\Tree;

use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use Hirooks\BigCommerce\Api\Custom\ResourceModels\V3\Tree\Tree;
use stdClass;

class TreeResponse extends SingleResourceResponse
{
    private Tree $tree;

    public function getCategoryTree(): Tree
    {
        return $this->tree;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->tree = new Tree($rawData);
    }
}
