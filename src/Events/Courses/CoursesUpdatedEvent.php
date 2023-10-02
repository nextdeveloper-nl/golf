<?php

namespace NextDeveloper\Golf\Events\Courses;

use Illuminate\Queue\SerializesModels;
use NextDeveloper\Golf\Database\Models\Courses;

/**
 * Class CoursesUpdatedEvent
 *
 * @package NextDeveloper\Golf\Events
 */
class CoursesUpdatedEvent
{
    use SerializesModels;

    /**
     * @var Courses
     */
    public $_model;

    /**
     * @var int|null
     */
    protected $timestamp = null;

    public function __construct(Courses $model = null)
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