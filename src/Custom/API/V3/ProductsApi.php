<?php

namespace Hirooks\BigCommerce\Api\Custom\API\V3;

class ProductsApi extends \BigCommerce\ApiV3\Api\Catalog\ProductsApi
{
    public function channelAssignments(): ChannelAssignmentsApi
    {
        return new ChannelAssignmentsApi($this->getClient());
    }
}
