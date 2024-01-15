<?php

namespace NextDeveloper\Golf\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Golf\Database\Models\Clubs;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Golf\Http\Transformers\AbstractTransformers\AbstractClubsTransformer;

/**
 * Class ClubsTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Golf\Http\Transformers
 */
class ClubsTransformer extends AbstractClubsTransformer
{

    /**
     * @param Clubs $model
     *
     * @return array
     */
    public function transform(Clubs $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('Clubs', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('Clubs', $model->uuid, 'Transformed'),
            $transformed
        );

        return parent::transform($model);
    }
}
