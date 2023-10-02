<?php

namespace NextDeveloper\Golf\Http\Requests\Clubs;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class ClubsUpdateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'iam_account_id' => 'nullable|exists:iam_accounts,uuid|uuid',
        'iam_user_id'    => 'nullable|exists:iam_users,uuid|uuid',
        'name'           => 'nullable|string|max:500',
        'description'    => 'nullable|string',
        'address'        => 'nullable|string|max:500',
        'facilities'     => 'nullable',
        'city'           => 'nullable|string|max:50',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n
}