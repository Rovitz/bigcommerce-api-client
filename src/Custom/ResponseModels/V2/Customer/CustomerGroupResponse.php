<?php

namespace Hirooks\BigCommerce\Api\Custom\ResponseModels\V2\Customer;

use BigCommerce\ApiV3\ResponseModels\SingleResourceResponse;
use Hirooks\BigCommerce\Api\Custom\ResourceModels\V2\Customer\CustomerGroup;
use stdClass;

class CustomerGroupResponse extends SingleResourceResponse
{
    private CustomerGroup $customerGroup;

    public function getCustomerGroup(): CustomerGroup
    {
        return $this->customerGroup;
    }

    protected function addData(stdClass $rawData): void
    {
        $this->customerGroup = new CustomerGroup($rawData);
    }
}
