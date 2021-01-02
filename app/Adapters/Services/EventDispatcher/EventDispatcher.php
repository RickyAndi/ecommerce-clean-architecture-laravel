<?php


namespace App\Adapters\Services\EventDispatcher;

use ECommerce\Events\EventInterface;
use ECommerce\Services\EventDispatcher\EventDispatcherInterface;
use Illuminate\Support\Facades\Event;

class EventDispatcher implements EventDispatcherInterface
{
    public function dispatch(EventInterface $event): void
    {
        Event::dispatch($event);
    }
}
