<?php

namespace TripUp\Cache\Contracts;
/**
 *
 */
interface Tagable
{
    /**
     * @return array
     */
    public function getTags(): array;
}
