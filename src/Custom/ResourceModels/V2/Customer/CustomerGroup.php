<?php

namespace Hirooks\BigCommerce\Api\Custom\ResourceModels\V2\Customer;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class CustomerGroup extends ResourceModel
{
    public string $name;
    public bool $is_default;
    public array $category_access;
    public array $discount_rules;
    public string $date_created;
    public string $date_modified;
    public bool $is_group_for_guests;
}
