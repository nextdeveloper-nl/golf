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
            'name' => 'nullable|string',
        'description' => 'nullable|string',
        'address' => 'nullable|string',
        'facilities' => 'nullable',
        'common_city_id' => 'nullable|exists:common_cities,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n
}