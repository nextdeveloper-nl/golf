<?php

namespace NextDeveloper\Golf\Services;

use NextDeveloper\Golf\Database\Filters\ReservationsQueryFilter;
use NextDeveloper\Golf\Database\Models\TeeTimes;
use NextDeveloper\Golf\Services\AbstractServices\AbstractReservationsService;
use NextDeveloper\IAM\Database\Scopes\AuthorizationScope;
use NextDeveloper\IAM\Helpers\UserHelper;

/**
 * This class is responsible from managing the data for Reservations
 *
 * Class ReservationsService.
 *
 * @package NextDeveloper\Golf\Database\Models
 */
class ReservationsService extends AbstractReservationsService
{

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

    public static function get(ReservationsQueryFilter $filter = null, array $params = []) : \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Collection
    {
        return TeeTimes::withoutGlobalScope(AuthorizationScope::class)
            ->where('golfer1', UserHelper::me()->iam_user_id)
            ->orWhere('golfer2', UserHelper::me()->iam_user_id)
            ->orWhere('golfer3', UserHelper::me()->iam_user_id)
            ->orWhere('golfer4', UserHelper::me()->iam_user_id)
            ->get();
    }
}
