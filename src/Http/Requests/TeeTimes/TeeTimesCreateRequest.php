<?php

namespace NextDeveloper\Golf\Http\Requests\TeeTimes;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class TeeTimesCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'tee_time'       => 'nullable|date',
        'features'       => 'nullable',
        'golf_club_id'   => 'nullable|exists:golf_clubs,uuid|uuid',
        'golf_course_id' => 'nullable|exists:golf_courses,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}