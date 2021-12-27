<?php
namespace TripUp\Cache;

use Illuminate\Cache\Events\KeyWritten;
use Illuminate\Container\Container;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use TripUp\Cache\Contracts\Tag;
use TripUp\Cache\Contracts\Tagable;
use TripUp\Cache\Listeners\CacheWriteListener;

class TagCacheServiceProvider extends PackageServiceProvider
{
    public function packageBooted()
    {
        \Event::listen(KeyWritten::class, CacheWriteListener::class);

        $this->app->bind(Tag::class, function (Container $app) {
            return $app->make(config('tagcache.cache_tag'));
        });
        $this->app->bind(Tagable::class, function (Container $app) {
            return $app->make(config('tagcache.cache_tag_collection'));
        });

    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name('tag-cache')
            ->hasConfigFile();
    }
}
