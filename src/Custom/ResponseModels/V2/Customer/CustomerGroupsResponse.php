<?php

namespace Hirooks\BigCommerce\Api\Custom\ResponseModels\V2\Customer;

use BigCommerce\ApiV3\ResponseModels\PaginatedBatchableResponse;
use Hirooks\BigCommerce\Api\Custom\ResourceModels\V2\Customer\CustomerGroup;

class CustomerGroupsResponse extends PaginatedBatchableResponse
{
    /**
     * @return CustomerGroup[]
     */
    public function getCustomerGroups(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return CustomerGroup::class;
    }
}
