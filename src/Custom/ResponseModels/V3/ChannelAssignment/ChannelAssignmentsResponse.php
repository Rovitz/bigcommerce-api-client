<?php

namespace Hirooks\BigCommerce\Api\Custom\ResponseModels\V3\ChannelAssignment;

use BigCommerce\ApiV3\ResponseModels\PaginatedBatchableResponse;
use Hirooks\BigCommerce\Api\Custom\ResourceModels\V3\ChannelAssignment\ChannelAssignment;

class ChannelAssignmentsResponse extends PaginatedBatchableResponse
{
    /**
     * @return ChannelAssignment[]
     */
    public function getChannelAssignments(): array
    {
        return $this->getData();
    }

    protected function resourceClass(): string
    {
        return ChannelAssignment::class;
    }
}
