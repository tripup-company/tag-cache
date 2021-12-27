<?php
namespace TripUp\Cache\Listeners;

use Illuminate\Cache\Events\KeyWritten;
use Spatie\ResponseCache\Serializers\Serializer;

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
        \Debugbar::debug($event->key);
        \Debugbar::debug($this->serializer->unserialize($event->value));

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
