<?php

namespace NextDeveloper\Golf\Http\Transformers\AbstractTransformers;

use NextDeveloper\Golf\Database\Models\Reservations;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;

/**
 * Class ReservationsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Golf\Http\Transformers
 */
class AbstractReservationsTransformer extends AbstractTransformer
{

    /**
     * @param Reservations $model
     *
     * @return array
     */
    public function transform(Reservations $model)
    {
                        $golfTeeTimeId = \NextDeveloper\Golf\Database\Models\TeeTimes::where('id', $model->golf_tee_time_id)->first();
                    $golfClubId = \NextDeveloper\Golf\Database\Models\Clubs::where('id', $model->golf_club_id)->first();
                    $golfCourseId = \NextDeveloper\Golf\Database\Models\Courses::where('id', $model->golf_course_id)->first();
                    $iamUserId = \NextDeveloper\IAM\Database\Models\Users::where('id', $model->iam_user_id)->first();
        
        return $this->buildPayload(
            [
            'id'  =>  $model->uuid,
            'golf_tee_time_id'  =>  $golfTeeTimeId ? $golfTeeTimeId->uuid : null,
            'golf_club_id'  =>  $golfClubId ? $golfClubId->uuid : null,
            'golf_course_id'  =>  $golfCourseId ? $golfCourseId->uuid : null,
            'iam_user_id'  =>  $iamUserId ? $iamUserId->uuid : null,
            'reservation_data'  =>  $model->reservation_data,
            'created_at'  =>  $model->created_at ? $model->created_at->toIso8601String() : null,
            'updated_at'  =>  $model->updated_at ? $model->updated_at->toIso8601String() : null,
            'deleted_at'  =>  $model->deleted_at ? $model->deleted_at->toIso8601String() : null,
            ]
        );
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n


}
