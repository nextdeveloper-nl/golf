<?php

namespace NextDeveloper\Golf\Http\Transformers\AbstractTransformers;

use GPBMetadata\Google\Api\Auth;
use NextDeveloper\Golf\Database\Models\TeeTimes;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\IAM\Database\Scopes\AuthorizationScope;

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

        $golfer1 = null;

        if ($model->golfer1) {
            $golfer1 = \NextDeveloper\IAM\Database\Models\Users::withoutGlobalScope(AuthorizationScope::class)
                ->where('id', $model->golfer1)
                ->first();

            $golfer1 = \NextDeveloper\CRM\Database\Models\Users::withoutGlobalScopes()
                ->where('iam_user_id', $golfer1->id)
                ->first();

            if($golfer1) {
                $golfer1 = $golfer1->uuid;
            }
        }

        $golfer2 = null;

        if ($model->golfer2) {
            $golfer2 = \NextDeveloper\IAM\Database\Models\Users::withoutGlobalScope(AuthorizationScope::class)
                ->where('id', $model->golfer2)
                ->first();

            $golfer2 = \NextDeveloper\CRM\Database\Models\Users::withoutGlobalScopes()
                ->where('iam_user_id', $golfer2->id)
                ->first();

            if($golfer2) {
                $golfer2 = $golfer2->uuid;
            }
        }

        $golfer3 = null;

        if ($model->golfer3) {
            $golfer3 = \NextDeveloper\IAM\Database\Models\Users::withoutGlobalScope(AuthorizationScope::class)
                ->where('id', $model->golfer3)
                ->first();

            $golfer3 = \NextDeveloper\CRM\Database\Models\Users::withoutGlobalScopes()
                ->where('iam_user_id', $golfer3->id)
                ->first();

            if($golfer3) {
                $golfer3 = $golfer3->uuid;
            }
        }

        $golfer4 = null;

        if ($model->golfer4) {
            $golfer4 = \NextDeveloper\IAM\Database\Models\Users::withoutGlobalScope(AuthorizationScope::class)
                ->where('id', $model->golfer4)
                ->first();

            $golfer4 = \NextDeveloper\CRM\Database\Models\Users::withoutGlobalScopes()
                ->where('iam_user_id', $golfer4->id)
                ->first();

            if($golfer4) {
                $golfer4 = $golfer4->uuid;
            }
        }

        return $this->buildPayload(
            [
                'id' => $model->uuid,
                'tee_time' => $model->tee_time,
                'features' => $model->features,
                'golfer1'   => $golfer1,
                'golfer2'   => $golfer2,
                'golfer3'   => $golfer3,
                'golfer4'   => $golfer4,
                'golf_club_id' => $golfClubId ? $golfClubId->uuid : null,
                'golf_course_id' => $golfCourseId ? $golfCourseId->uuid : null,
                'golf_club_name'    =>  $golfClubId ? $golfClubId->name : null,
                'golf_course_name'  =>  $golfCourseId ? $golfCourseId->name : null,
                'created_at' => $model->created_at,
                'updated_at' => $model->updated_at,
                'deleted_at' => $model->deleted_at,
            ]
        );
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n


}
