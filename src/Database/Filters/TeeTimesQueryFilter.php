<?php

namespace NextDeveloper\Golf\Database\Filters;

use Illuminate\Database\Eloquent\Builder;
use NextDeveloper\Commons\Database\Filters\AbstractQueryFilter;
        

/**
 * This class automatically puts where clause on database so that use can filter
 * data returned from the query.
 */
class TeeTimesQueryFilter extends AbstractQueryFilter
{

    /**
     * @var Builder
     */
    protected $builder;

    public function teeTimeStart($date)
    {
        return $this->builder->where('tee_time', '>=', $date);
    }

    public function teeTimeEnd($date)
    {
        return $this->builder->where('tee_time', '<=', $date);
    }

    public function createdAtStart($date)
    {
        return $this->builder->where('created_at', '>=', $date);
    }

    public function createdAtEnd($date)
    {
        return $this->builder->where('created_at', '<=', $date);
    }

    public function updatedAtStart($date)
    {
        return $this->builder->where('updated_at', '>=', $date);
    }

    public function updatedAtEnd($date)
    {
        return $this->builder->where('updated_at', '<=', $date);
    }

    public function deletedAtStart($date)
    {
        return $this->builder->where('deleted_at', '>=', $date);
    }

    public function deletedAtEnd($date)
    {
        return $this->builder->where('deleted_at', '<=', $date);
    }

    public function golfClubId($value)
    {
            $golfClub = \NextDeveloper\Golf\Database\Models\Clubs::where('uuid', $value)->first();

        if($golfClub) {
            return $this->builder->where('golf_club_id', '=', $golfClub->id);
        }
    }

    public function golfCourseId($value)
    {
            $golfCourse = \NextDeveloper\Golf\Database\Models\Courses::where('uuid', $value)->first();

        if($golfCourse) {
            return $this->builder->where('golf_course_id', '=', $golfCourse->id);
        }
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n\n\n
}
