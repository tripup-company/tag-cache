<?php

namespace TripUp\Cache\Events;

use TripUp\Cache\Contracts\Event;

class PubSubEvent implements Event
{

    public function getProject(): string
    {
        return "";
    }

    public function getActionType(): int
    {
        return 1;
    }

    public function getEntityType(): string
    {
        return "";
    }

    public function getEntityId(): string
    {
        return "";
    }

    public function hasPayload(): bool
    {
        return "";
    }

    public function getPayload()
    {
        return "";
    }

    public function getTags(): array
    {
        return [];
    }
}
