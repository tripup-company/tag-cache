<?php
namespace TripUp\Cache\Listeners;

use Illuminate\Cache\Events\KeyWritten;
use Spatie\ResponseCache\Serializers\Serializer;
use TripUp\Cache\Contracts\ResponseTagResolver;
use TripUp\Cache\Tags\ProductsCollectionTags;

class CacheWriteListener
{
    /**
     * @var Serializer
     */
    protected $serializer;
    /**
     * @var ResponseTagResolver
     */
    protected $resolver;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Serializer $serializer, ResponseTagResolver $resolver)
    {
        $this->serializer = $serializer;
        $this->resolver = $resolver;
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
        $response = $this->serializer->unserialize($event->value);
        $tags = $this->resolver->resolveTags($response);
        \Debugbar::debug($event->key);
        \Debugbar::debug($tags);

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
