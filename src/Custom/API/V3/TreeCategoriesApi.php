<?php

namespace Hirooks\BigCommerce\Api\Custom\API\V3;


use BigCommerce\ApiV3\Api\Generic\ResourceApi;
use GuzzleHttp\RequestOptions;
use Hirooks\BigCommerce\Api\Custom\ResponseModels\V3\Tree\TreeCategory\TreeCategoriesResponse;
use Hirooks\BigCommerce\Api\Custom\ResponseModels\V3\Tree\TreeCategory\TreeCategoryResponse;
use Psr\Http\Message\ResponseInterface;

class TreeCategoriesApi extends ResourceApi
{
    private const RESOURCE_NAME = 'trees/categories';
    private const CATEGORY_TREE_ENDPOINT = 'catalog/trees/%d/categories';
    private const CATEGORY_TREES_ENDPOINT = 'catalog/trees/categories';

    public function get(): TreeCategoryResponse
    {
        return new TreeCategoryResponse($this->getResource());
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): TreeCategoriesResponse
    {
        return new TreeCategoriesResponse($this->getAllResources($filters, $page, $limit));
    }

    public function create(array $categories): TreeCategoriesResponse
    {
        $response = $this->getClient()->getRestClient()->post(
            $this->multipleResourceUrl(),
            [
                RequestOptions::JSON => $categories
            ]
        );

        return new TreeCategoriesResponse($response);
    }

    protected function singleResourceEndpoint(): string
    {
        return sprintf(self::CATEGORY_TREE_ENDPOINT, $this->getParentResourceId());
    }

    protected function multipleResourcesEndpoint(): string
    {
        return self::CATEGORY_TREES_ENDPOINT;
    }

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }
}
