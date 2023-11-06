<?php

namespace Hirooks\BigCommerce\Api\Custom;

use BigCommerce\ApiV2\V2ApiClient as ClientV2;
use Hirooks\BigCommerce\Api\Custom\API\V2\CustomerGroupsApi;

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
}
