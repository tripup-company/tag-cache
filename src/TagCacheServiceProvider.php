<?php
namespace TripUp\Cache;

use Illuminate\Cache\Events\KeyWritten;
use Illuminate\Support\ServiceProvider;
use TripUp\Cache\Listeners\CacheWriteListener;

class TagCacheServiceProvider extends ServiceProvider
{
    public function boot(){
        \Event::listen(KeyWritten::class, CacheWriteListener::class);
    }
}
