<?php

namespace NextDeveloper\Golf\Http\Requests\Clubs;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class ClubsCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name'           => 'required|string|max:500',
        'description'    => 'nullable|string',
        'address'        => 'required|string|max:500',
        'facilities'     => 'nullable',
        'city'           => 'nullable|string|max:50',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n
}