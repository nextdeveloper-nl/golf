<?php

namespace NextDeveloper\Golf\Http\Transformers\AbstractTransformers;

use NextDeveloper\Golf\Database\Models\TeeTimes;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;

/**
 * Class TeeTimesTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Golf\Http\Transformers
 */
class AbstractTeeTimesTransformer extends AbstractTransformer
{

    /**
     * @param TeeTimes $model
     *
     * @return array
     */
    public function transform(TeeTimes $model)
    {
                        $golfClubId = \NextDeveloper\Golf\Database\Models\Clubs::where('id', $model->golf_club_id)->first();
                    $golfCourseId = \NextDeveloper\Golf\Database\Models\Courses::where('id', $model->golf_course_id)->first();
        
        return $this->buildPayload(
            [
            'id'  =>  $model->uuid,
            'tee_time'  =>  $model->tee_time,
            'features'  =>  $model->features,
            'golf_club_id'  =>  $golfClubId ? $golfClubId->uuid : null,
            'golf_course_id'  =>  $golfCourseId ? $golfCourseId->uuid : null,
            'created_at'  =>  $model->created_at,
            'updated_at'  =>  $model->updated_at,
            'deleted_at'  =>  $model->deleted_at,
            ]
        );
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n

















}
