<?php

namespace Hirooks\BigCommerce\Api\Custom\API\V3;


use BigCommerce\ApiV3\Api\Generic\ResourceApi;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use Hirooks\BigCommerce\Api\Custom\ResponseModels\V3\Tree\TreesResponse;

class TreesApi extends ResourceApi
{
    private const RESOURCE_NAME = 'trees';
    private const CATEGORY_TREES_ENDPOINT = 'catalog/trees';

    public function categories(): TreeCategoriesApi
    {
        return new TreeCategoriesApi($this->getClient(), $this->getParentResourceId());
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): TreesResponse
    {
        return new TreesResponse($this->getAllResources($filters, $page, $limit));
    }

    protected function multipleResourcesEndpoint(): string
    {
        return self::CATEGORY_TREES_ENDPOINT;
    }

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }

    protected function singleResourceEndpoint(): string
    {
    }

    public function get(): SingleResourceResponse
    {
    }
}
