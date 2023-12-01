<?php

namespace Hirooks\BigCommerce\Api\Custom\ResponseModels\V3\Webhook;

use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use Hirooks\BigCommerce\Api\Custom\ResourceModels\V3\Webhook\Webhook;
use stdClass;

class WebhookResponse extends SingleResourceResponse
{
    private Webhook $webhook;

    public function getWebhook(): Webhook
    {
        return $this->webhook;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->webhook = new Webhook($rawData);
    }
}
