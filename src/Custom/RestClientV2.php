<?php

namespace Hirooks\BigCommerce\Api\Custom;

use BigCommerce\ApiV2\V2ApiClient as ClientV2;
use Hirooks\BigCommerce\Api\Custom\API\V2\CustomerGroupsApi;
use Hirooks\BigCommerce\Api\Custom\API\V2\OrdersApi;

/**
 * Custom REST API client.
 *
 * This client extends the BigCommerce\ApiV2\V2ApiClient class
 * to handle custom/complex operations.
 */
class RestClientV2 extends ClientV2
{
    public function customCustomerGroups(): CustomerGroupsApi
    {
        return new CustomerGroupsApi($this);
    }

    public function customCustomerGroup(int $customerGroupId): CustomerGroupsApi
    {
        return new CustomerGroupsApi($this, $customerGroupId);
    }

    public function orders(): OrdersApi
    {
        return new OrdersApi($this);
    }

    public function order(int $orderId): OrdersApi
    {
        return new OrdersApi($this, $orderId);
    }
}
