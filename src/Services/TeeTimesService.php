<?php

namespace NextDeveloper\Golf\Services;

use Illuminate\Support\Facades\Log;
use NextDeveloper\CRM\Database\Models\Users;
use NextDeveloper\Golf\Database\Models\TeeTimes;
use NextDeveloper\Golf\Services\AbstractServices\AbstractTeeTimesService;
use NextDeveloper\IAM\Database\Scopes\AuthorizationScope;
use NextDeveloper\IAM\Helpers\UserHelper;

/**
 * This class is responsible from managing the data for TeeTimes
 *
 * Class TeeTimesService.
 *
 * @package NextDeveloper\Golf\Database\Models
 */
class TeeTimesService extends AbstractTeeTimesService
{

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

    /**
     * @param $teeTime
     * @param $data
     * @return TeeTimes
     */
    public static function update($teeTimeId, $data) : TeeTimes
    {
        if(array_key_exists('golfer1', $data)) {
            $golfer1 = Users::withoutGlobalScope(AuthorizationScope::class)
                ->where('uuid', $data['golfer1'])
                ->first();

            $data['golfer1'] = $golfer1->iam_user_id;
        }

        Log::info('[TT] Here 2');

        if(array_key_exists('golfer2', $data)) {
            $golfer2 = Users::withoutGlobalScope(AuthorizationScope::class)
                ->where('uuid', $data['golfer2'])
                ->first();

            $data['golfer2'] = $golfer2->iam_user_id;
        }

        Log::info('[TT] Here 3');

        if(array_key_exists('golfer3', $data)) {
            $golfer3 = Users::withoutGlobalScope(AuthorizationScope::class)
                ->where('uuid', $data['golfer3'])
                ->first();

            $data['golfer3'] = $golfer3->iam_user_id;
        }

        Log::info('[TT] Here 4');

        if(array_key_exists('golfer4', $data)) {
            $golfer4 = Users::withoutGlobalScope(AuthorizationScope::class)
                ->where('uuid', $data['golfer4'])
                ->first();

            $data['golfer4'] = $golfer4->iam_user_id;
        }

        $teeTime = parent::update($teeTimeId, $data);

        return $teeTime;
    }

    public static function create($data) : TeeTimes
    {
        $data['iam_account_id']  =  UserHelper::currentAccount()->id;
        $data['iam_user_id']     =  UserHelper::me()->id;

        Log::info('[TT] Here 1');

        if(array_key_exists('golfer1', $data)) {
            $golfer1 = Users::withoutGlobalScope(AuthorizationScope::class)
                ->where('uuid', $data['golfer1'])
                ->first();

            $data['golfer1'] = $golfer1->iam_user_id;
        }

        Log::info('[TT] Here 2');

        if(array_key_exists('golfer2', $data)) {
            $golfer2 = Users::withoutGlobalScope(AuthorizationScope::class)
                ->where('uuid', $data['golfer2'])
                ->first();

            $data['golfer2'] = $golfer2->iam_user_id;
        }

        Log::info('[TT] Here 3');

        if(array_key_exists('golfer3', $data)) {
            $golfer3 = Users::withoutGlobalScope(AuthorizationScope::class)
                ->where('uuid', $data['golfer3'])
                ->first();

            $data['golfer3'] = $golfer3->iam_user_id;
        }

        Log::info('[TT] Here 4');

        if(array_key_exists('golfer4', $data)) {
            $golfer4 = Users::withoutGlobalScope(AuthorizationScope::class)
                ->where('uuid', $data['golfer4'])
                ->first();

            $data['golfer4'] = $golfer4->iam_user_id;
        }

        Log::info('[TT] Create Tee Time');

        $teeTime = parent::create($data);

        return $teeTime;
    }
}
