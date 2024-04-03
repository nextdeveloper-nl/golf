<?php

namespace NextDeveloper\Golf\Database\Filters;

use Illuminate\Database\Eloquent\Builder;
use NextDeveloper\Commons\Database\Filters\AbstractQueryFilter;
                

/**
 * This class automatically puts where clause on database so that use can filter
 * data returned from the query.
 */
class ReservationsQueryFilter extends AbstractQueryFilter
{

    /**
     * @var Builder
     */
    protected $builder;

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

    public function golfTeeTimeId($value)
    {
            $golfTeeTime = \NextDeveloper\Golf\Database\Models\TeeTimes::where('uuid', $value)->first();

        if($golfTeeTime) {
            return $this->builder->where('golf_tee_time_id', '=', $golfTeeTime->id);
        }
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

    public function iamUserId($value)
    {
            $iamUser = \NextDeveloper\IAM\Database\Models\Users::where('uuid', $value)->first();

        if($iamUser) {
            return $this->builder->where('iam_user_id', '=', $iamUser->id);
        }
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n\n\n
}
