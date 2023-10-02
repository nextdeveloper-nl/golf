<?php

namespace NextDeveloper\Golf\Events\Reservations;

use Illuminate\Queue\SerializesModels;
use NextDeveloper\Golf\Database\Models\Reservations;

/**
 * Class ReservationsUpdatingEvent
 *
 * @package NextDeveloper\Golf\Events
 */
class ReservationsUpdatingEvent
{
    use SerializesModels;

    /**
     * @var Reservations
     */
    public $_model;

    /**
     * @var int|null
     */
    protected $timestamp = null;

    public function __construct(Reservations $model = null)
    {
        $this->_model = $model;
    }

    /**
     * @param int $value
     *
     * @return AbstractEvent
     */
    public function setTimestamp($value)
    {
        $this->timestamp = $value;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}