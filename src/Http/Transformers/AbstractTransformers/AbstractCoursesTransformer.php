<?php

namespace NextDeveloper\Golf\Http\Transformers\AbstractTransformers;

use NextDeveloper\Golf\Database\Models\Courses;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;

/**
 * Class CoursesTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Golf\Http\Transformers
 */
class AbstractCoursesTransformer extends AbstractTransformer
{

    /**
     * @param Courses $model
     *
     * @return array
     */
    public function transform(Courses $model)
    {
                        $golfClubId = \NextDeveloper\Golf\Database\Models\Clubs::where('id', $model->golf_club_id)->first();
                    $commonCurrencyId = \NextDeveloper\Commons\Database\Models\Currencies::where('id', $model->common_currency_id)->first();
        
        return $this->buildPayload(
            [
            'id'  =>  $model->uuid,
            'golf_club_id'  =>  $golfClubId ? $golfClubId->uuid : null,
            'name'  =>  $model->name,
            'description'  =>  $model->description,
            'facilities'  =>  $model->facilities,
            'price'  =>  $model->price,
            'common_currency_id'  =>  $commonCurrencyId ? $commonCurrencyId->uuid : null,
            'created_at'  =>  $model->created_at,
            'updated_at'  =>  $model->updated_at,
            'deleted_at'  =>  $model->deleted_at,
            ]
        );
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n

















}
