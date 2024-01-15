<?php

namespace NextDeveloper\Golf\Events\Clubs;

use Illuminate\Queue\SerializesModels;
use NextDeveloper\Golf\Database\Models\Clubs;

/**
 * Class ClubsCreatedEvent
 *
 * @package NextDeveloper\Golf\Events
 */
class ClubsCreatedEvent
{
    use SerializesModels;

    /**
     * @var Clubs
     */
    public $_model;

    /**
     * @var int|null
     */
    protected $timestamp = null;

    public function __construct(Clubs $model = null)
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