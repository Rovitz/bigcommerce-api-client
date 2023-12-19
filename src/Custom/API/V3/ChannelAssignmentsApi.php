<?php

namespace Hirooks\BigCommerce\Api\Custom\API\V3;

use BigCommerce\ApiV3\Api\Generic\ResourceApi;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use GuzzleHttp\RequestOptions;
use Hirooks\BigCommerce\Api\Custom\ResponseModels\V3\ChannelAssignment\ChannelAssignmentsResponse;
use Psr\Http\Message\ResponseInterface;

class ChannelAssignmentsApi extends ResourceApi
{
    private const RESOURCE_NAME = 'channel-assignments';
    private const CHANNEL_ASSIGNMENTS_ENDPOINT = 'catalog/products/channel-assignments';

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): ChannelAssignmentsResponse
    {
        return new ChannelAssignmentsResponse($this->getAllResources($filters, $page, $limit));
    }

    public function create(array $channel_assignments): ChannelAssignmentsResponse
    {
        $response = $this->getClient()->getRestClient()->put(
            $this->multipleResourceUrl(),
            [
                RequestOptions::JSON => $channel_assignments
            ]
        );

        return new ChannelAssignmentsResponse($response);
    }

    public function delete(array $product_ids = []): ResponseInterface
    {
        return $this->getClient()->getRestClient()->delete(
            $this->multipleResourceUrl(),
            [
                RequestOptions::QUERY => [
                    'product_id:in'  => implode(',', $product_ids),
                ]
            ]
        );
    }

    protected function multipleResourcesEndpoint(): string
    {
        return self::CHANNEL_ASSIGNMENTS_ENDPOINT;
    }

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }
    
    protected function singleResourceEndpoint(): string
    {
        return self::CHANNEL_ASSIGNMENTS_ENDPOINT;
    }
    
    public function get(): SingleResourceResponse
    {
        // TODO: Implement get() method.
    }
}
