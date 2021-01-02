<?php

namespace ECommerce\Services\EventDispatcher;

use ECommerce\Events\EventInterface;

interface EventDispatcherInterface
{
    public function dispatch(EventInterface $event): void;
}
