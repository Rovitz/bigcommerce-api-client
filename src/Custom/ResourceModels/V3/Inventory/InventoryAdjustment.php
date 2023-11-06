<?php

namespace Hirooks\BigCommerce\Api\Custom\ResourceModels\V3\Inventory;

use BigCommerce\ApiV3\ResourceModels\ResourceModel;

class InventoryAdjustment extends ResourceModel
{
    public string $reason;
    public array $items;
}
