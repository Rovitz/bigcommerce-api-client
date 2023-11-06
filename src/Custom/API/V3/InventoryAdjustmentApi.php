<?php

namespace Hirooks\BigCommerce\Api\Custom\API\V3;

use BigCommerce\ApiV3\Api\Generic\V3ApiBase;
use GuzzleHttp\RequestOptions;

class InventoryAdjustmentApi extends V3ApiBase
{
    private const INVENTORY_ADJUSTMENTS_ENDPOINT = 'inventory/adjustments/absolute';

    public function upsert(object $resource, array $query = [])
    {
        return $this->getClient()->getRestClient()->put(
            self::INVENTORY_ADJUSTMENTS_ENDPOINT,
            [
                RequestOptions::JSON => $resource,
                RequestOptions::QUERY => $query,
            ]
        );
    }
}
