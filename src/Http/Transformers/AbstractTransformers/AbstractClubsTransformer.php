<?php

namespace NextDeveloper\Golf\Http\Transformers\AbstractTransformers;

use NextDeveloper\Golf\Database\Models\Clubs;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;

/**
 * Class ClubsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Golf\Http\Transformers
 */
class AbstractClubsTransformer extends AbstractTransformer
{

    /**
     * @param Clubs $model
     *
     * @return array
     */
    public function transform(Clubs $model)
    {
                        $iamAccountId = \NextDeveloper\IAM\Database\Models\Accounts::where('id', $model->iam_account_id)->first();
                    $iamUserId = \NextDeveloper\IAM\Database\Models\Users::where('id', $model->iam_user_id)->first();
        
        return $this->buildPayload(
            [
            'id'  =>  $model->uuid,
            'iam_account_id'  =>  $iamAccountId ? $iamAccountId->uuid : null,
            'iam_user_id'  =>  $iamUserId ? $iamUserId->uuid : null,
            'name'  =>  $model->name,
            'description'  =>  $model->description,
            'address'  =>  $model->address,
            'facilities'  =>  $model->facilities,
            'city'  =>  $model->city,
            'created_at'  =>  $model->created_at ? $model->created_at->toIso8601String() : null,
            'updated_at'  =>  $model->updated_at ? $model->updated_at->toIso8601String() : null,
            'deleted_at'  =>  $model->deleted_at ? $model->deleted_at->toIso8601String() : null,
            ]
        );
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n




}
