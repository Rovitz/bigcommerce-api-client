<?php

namespace Hirooks\BigCommerce\Api\Custom\API\V2;

use BigCommerce\ApiV2\Api\Generic\V2ApiBase;
use BigCommerce\ApiV3\Api\Generic\CreateResource;
use BigCommerce\ApiV3\Api\Generic\GetAllResources;
use BigCommerce\ApiV3\Api\Generic\GetResource;
use BigCommerce\ApiV3\Api\Generic\UpdateResource;
use Hirooks\BigCommerce\Api\Custom\ResourceModels\V2\Customer\CustomerGroup;
use Hirooks\BigCommerce\Api\Custom\ResponseModels\V2\Customer\CustomerGroupResponse;
use Hirooks\BigCommerce\Api\Custom\ResponseModels\V2\Customer\CustomerGroupsResponse;

class CustomerGroupsApi extends V2ApiBase
{
    use CreateResource;
    use UpdateResource;
    use GetResource;
    use GetAllResources;

    private const CUSTOMER_GROUPS_ENDPOINT = 'customer_groups';
    private const CUSTOMER_GROUP_ENDPOINT = 'customer_groups/%d';

    public function create(CustomerGroup $customerGroup): object
    {
        return new CustomerGroupResponse($this->createResource($customerGroup));
    }

    public function update(CustomerGroup $customerGroup): object
    {
        return new CustomerGroupResponse($this->updateResource($customerGroup));
    }

    public function getAll(array $filters = [], int $page = 1, int $limit = 250)
    {
        return new CustomerGroupsResponse($this->getAllResources($filters, $page, $limit));
    }

    public function multipleResourceUrl(): string
    {
        return self::CUSTOMER_GROUPS_ENDPOINT;
    }

    public function singleResourceUrl(): string
    {
        return sprintf(self::CUSTOMER_GROUP_ENDPOINT, $this->getResourceId());
    }
}
