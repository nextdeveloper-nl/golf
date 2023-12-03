<?php

namespace NextDeveloper\Golf\Http\Requests\Reservations;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class ReservationsUpdateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'golf_tee_time_id' => 'nullable|exists:golf_tee_times,uuid|uuid',
        'golf_club_id'     => 'nullable|exists:golf_clubs,uuid|uuid',
        'golf_course_id'   => 'nullable|exists:golf_courses,uuid|uuid',
        'reservation_data' => 'nullable',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n
}