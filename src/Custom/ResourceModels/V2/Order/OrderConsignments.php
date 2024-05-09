<?php

namespace Hirooks\BigCommerce\Api\Custom\ResourceModels\V2\Order;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class OrderConsignments extends ResourceModel
{
    public array $pickups;
    public array $shipping;
    public array $downloads;
    public object $email;
}
