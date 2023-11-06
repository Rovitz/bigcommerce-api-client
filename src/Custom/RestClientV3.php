<?php

namespace Hirooks\BigCommerce\Api\Custom;

use BigCommerce\ApiV3\Client as ClientV3;
use Hirooks\BigCommerce\Api\Custom\API\V3\InventoryAdjustmentApi;
use Hirooks\BigCommerce\Api\Custom\API\V3\PriceListsApi;

/**
 * Custom REST API client.
 *
 * This client extends the BigCommerce\ApiV3\Client class
 * to handle custom/complex operations.
 */
class RestClientV3 extends ClientV3
{
    public function customPriceLists(): PriceListsApi
    {
        return new PriceListsApi($this);
    }

    public function customInventoryAdjustments(): InventoryAdjustmentApi
    {
        return new InventoryAdjustmentApi($this);
    }
}
