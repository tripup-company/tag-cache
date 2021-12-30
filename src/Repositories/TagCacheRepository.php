<?php

namespace TripUp\Cache\Repositories;

class TagCacheRepository implements \TripUp\Cache\Contracts\TagCache
{

    public function put($tags, string $responseCacheKey): bool
    {
        \Debugbar::debug("TagCacheRepository");
        \Debugbar::debug($tags);
        \Debugbar::debug($responseCacheKey);
        return true;
    }

    public function reset($tags): bool
    {
        \Debugbar::debug($tags);
        return true;
    }

    public function clearAll(): bool
    {
        \Debugbar::debug("All tag cache was cleared");
        return true;
    }
}
