<?php

namespace NextDeveloper\Golf\Http\Requests\Courses;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class CoursesCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'golf_club_id'       => 'nullable|exists:golf_clubs,uuid|uuid',
        'name'               => 'required|string|max:500',
        'description'        => 'nullable|string',
        'facilities'         => 'nullable',
        'price'              => 'nullable|numeric',
        'common_currency_id' => 'nullable|exists:common_currencies,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n
}