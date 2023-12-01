<?php

namespace Hirooks\BigCommerce\Api\Custom\API\V3;


use BigCommerce\ApiV3\Api\Generic\ResourceApi;
use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use Hirooks\BigCommerce\Api\Custom\ResponseModels\V3\Webhook\WebhookResponse;
use Hirooks\BigCommerce\Api\Custom\ResponseModels\V3\Webhook\WebhooksResponse;
use Psr\Http\Message\ResponseInterface;

class WebhooksApi extends ResourceApi
{
    private const RESOURCE_NAME = 'hooks';
    private const HOOKS_ENDPOINT = 'hooks';
    private const HOOK_ENDPOINT = 'hooks/%d';

    public function getAll(array $filters = [], int $page = 1, int $limit = 250): WebhooksResponse
    {
        return new WebhooksResponse($this->getAllResources($filters, $page, $limit));
    }

    public function get(): SingleResourceResponse
    {
        return new WebhookResponse($this->getResource());
    }

    public function create(object $data): SingleResourceResponse
    {
        return new WebhookResponse($this->createResource($data));
    }

    protected function multipleResourcesEndpoint(): string
    {
        return self::HOOKS_ENDPOINT;
    }

    protected function resourceName(): string
    {
        return self::RESOURCE_NAME;
    }

    protected function singleResourceEndpoint(): string
    {
        return self::HOOK_ENDPOINT;
    }
}
