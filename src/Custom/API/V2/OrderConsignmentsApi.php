<?php

namespace Hirooks\BigCommerce\Api\Custom\API\V2;

use BigCommerce\ApiV2\Api\Generic\V2ApiBase;
use BigCommerce\ApiV3\Api\Generic\GetResource;
use Hirooks\BigCommerce\Api\Custom\ResourceModels\V2\Order\OrderConsignments;

class OrderConsignmentsApi extends V2ApiBase
{
    use GetResource;

    private const ORDER_CONSIGNMENTS_ENDPOINT = 'orders/%d/consignments';

    public function singleResourceUrl(): string
    {
        return sprintf(self::ORDER_CONSIGNMENTS_ENDPOINT, $this->getParentResourceId());
    }

    public function get(): OrderConsignments
    {
        $response = $this->getResource();

        return new OrderConsignments(json_decode($response->getBody()));
    }

    public function shipping(int $shippingConsignmentId): OrderConsignmentShippingApi
    {
        return new OrderConsignmentShippingApi($this->getClient(), $shippingConsignmentId, $this->getParentResourceId());
    }
}
