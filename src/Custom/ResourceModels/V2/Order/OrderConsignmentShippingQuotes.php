<?php

namespace Hirooks\BigCommerce\Api\Custom\ResourceModels\V2\Order;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class OrderConsignmentShippingQuotes extends ResourceModel
{
    public string $id;
    public string $uuid;
    public string $timestamp;
    public string $shipping_provider_id;
    public array|object $shipping_provider_quote;
    public string $provider_code;
    public string $carrier_code;
    public string $rate_code;
    public string $rate_id;
    public int $method_id;
}
