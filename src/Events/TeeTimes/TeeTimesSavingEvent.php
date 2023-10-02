<?php

namespace NextDeveloper\Golf\Events\TeeTimes;

use Illuminate\Queue\SerializesModels;
use NextDeveloper\Golf\Database\Models\TeeTimes;

/**
 * Class TeeTimesSavingEvent
 *
 * @package NextDeveloper\Golf\Events
 */
class TeeTimesSavingEvent
{
    use SerializesModels;

    /**
     * @var TeeTimes
     */
    public $_model;

    /**
     * @var int|null
     */
    protected $timestamp = null;

    public function __construct(TeeTimes $model = null)
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