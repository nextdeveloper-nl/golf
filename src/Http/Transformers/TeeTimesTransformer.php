<?php

namespace NextDeveloper\Golf\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Golf\Database\Models\TeeTimes;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Golf\Http\Transformers\AbstractTransformers\AbstractTeeTimesTransformer;

/**
 * Class TeeTimesTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Golf\Http\Transformers
 */
class TeeTimesTransformer extends AbstractTeeTimesTransformer
{

    /**
     * @param TeeTimes $model
     *
     * @return array
     */
    public function transform(TeeTimes $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('TeeTimes', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('TeeTimes', $model->uuid, 'Transformed'),
            $transformed
        );

        return parent::transform($model);
    }
}
