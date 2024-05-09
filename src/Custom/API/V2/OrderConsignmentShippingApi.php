<?php

namespace Hirooks\BigCommerce\Api\Custom\API\V2;

use BigCommerce\ApiV2\Api\Generic\V2ApiBase;
use BigCommerce\ApiV3\Api\Generic\GetResource;
use Hirooks\BigCommerce\Api\Custom\ResourceModels\V2\Order\OrderConsignmentShippingQuotes;

class OrderConsignmentShippingApi extends V2ApiBase
{
    use GetResource;

    private const ORDER_CONSIGNMENT_SHIPPING_QUOTES_ENDPOINT = 'orders/%d/consignments/shipping/%d/shipping_quotes';

    public function singleResourceUrl(): string
    {
        return sprintf(self::ORDER_CONSIGNMENT_SHIPPING_QUOTES_ENDPOINT, $this->getParentResourceId(), $this->getResourceId());
    }

    public function getShippingQuotes(): OrderConsignmentShippingQuotes
    {
        $response = $this->getResource();

        return new OrderConsignmentShippingQuotes(json_decode($response->getBody()));
    }
}
