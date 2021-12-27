<?php
namespace TripUp\Cache\Listeners;

use Illuminate\Cache\Events\KeyWritten;
use Spatie\ResponseCache\Serializers\Serializer;
use TripUp\Cache\Tags\ProductsCollectionTags;

class CacheWriteListener
{
    /**
     * @var Serializer
     */
    protected $serializer;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Serializer $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle(KeyWritten $event)
    {
        if (!$this->isResponseCacheEvent($event)) {
            return;
        }
        $data = $this->serializer->unserialize($event->value);
        $tagable = new ProductsCollectionTags($data);
        \Debugbar::debug($event->key);
        \Debugbar::debug($tagable->getTags());

    }

    /**
     * @param KeyWritten $event
     * @return bool
     */
    public function isResponseCacheEvent(KeyWritten $event)
    {
        if (strpos($event->key, "responsecache") !== false) {
            return true;
        }
        return false;
    }
}
