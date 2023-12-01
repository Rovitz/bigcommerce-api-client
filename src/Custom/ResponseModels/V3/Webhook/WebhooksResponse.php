<?php

namespace Hirooks\BigCommerce\Api\Custom\ResponseModels\V3\Webhook;

use BigCommerce\ApiV3\ResponseModels\PaginatedBatchableResponse;
use Hirooks\BigCommerce\Api\Custom\ResourceModels\V3\Webhook\Webhook;

class WebhooksResponse extends PaginatedBatchableResponse
{
    /**
     * @return Webhook[]
     */
    public function getWebhooks(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return Webhook::class;
    }
}
