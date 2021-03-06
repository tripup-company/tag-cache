<?php
namespace TripUp\Cache;

use Illuminate\Cache\Events\KeyWritten;
use Illuminate\Container\Container;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use TripUp\Cache\Contracts\ResponseTagResolver;
use TripUp\Cache\Contracts\TagCache;
use TripUp\Cache\Listeners\CacheWriteListener;

class TagCacheServiceProvider extends PackageServiceProvider
{
    public function packageBooted()
    {
        \Event::listen(KeyWritten::class, CacheWriteListener::class);

        $this->app->singleton(ResponseTagResolver::class, function (Container $app) {
            return $app->make(config('tagcache.tag_resolver'));
        });

        $this->app->singleton(TagCache::class, function (Container $app) {
            return $app->make(config('tagcache.tag_store'));
        });

    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name('tagcache')
            ->hasConfigFile();
    }
}
