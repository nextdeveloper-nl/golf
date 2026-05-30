<?php

namespace NextDeveloper\Golf\EventHandlers\ReservationsCreatedEvent;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

/**
 * Class ReservationsCreatedEvent
 *
 * @package PlusClouds\Account\Handlers\Events
 */
class ReservationsCreatedEvent implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle($event)
    {

    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}
