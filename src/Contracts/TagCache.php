<?php

namespace TripUp\Cache\Contracts;

interface TagCache
{
    /**
     * @param Tag $tag
     * @param string $responseCacheKey
     * @return bool
     */
    public function put($tags, string $responseCacheKey): bool;

    /**
     * @param Tag|Tag[] $tags
     * @return bool
     */
    public function reset($tags): bool;

    /**
     * @return bool
     */
    public function clearAll(): bool;
}
