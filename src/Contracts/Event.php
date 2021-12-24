<?php

namespace TripUp\Cache\Contracts;

interface Event extends Tagable
{
    public function getProject():string;
    public function getActionType():int;
    public function getEntityType():string;
    public function getEntityId():string;
    public function hasPayload():bool;
    public function getPayload();
}
