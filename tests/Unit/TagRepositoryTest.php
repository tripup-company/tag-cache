<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Cache;
use Tests\TestCase;
use TripUp\Cache\Contracts\TagCache;


class TagRepositoryTest extends TestCase
{
    /**
     * @var TagCache
     */
    protected $repository;
    /**
     * @test
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = $this->app->make(TagCache::class);
    }

    public function testPut()
    {
        $this->repository->put(["tag-1", "tag-2"], "response-cache-1");
        $this->repository->put(["tag-2", "tag-3"], "response-cache-2");

        $this->assertTrue(Cache::has('tag-1'));
        $this->assertTrue(Cache::has('tag-2'));
        $this->assertTrue(Cache::has('tag-3'));
    }
}
