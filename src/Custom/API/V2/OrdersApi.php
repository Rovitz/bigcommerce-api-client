<?php

namespace Hirooks\BigCommerce\Api\Custom\API\V2;

class OrdersApi extends \BigCommerce\ApiV2\Api\Orders\OrdersApi
{
    public function consignments(): OrderConsignmentsApi
    {
        return new OrderConsignmentsApi($this->getClient(), null, $this->getResourceId());
    }
}
