<?php

namespace NextDeveloper\Golf\Http\Transformers;

use Illuminate\Support\Facades\Cache;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Golf\Database\Models\Courses;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\Golf\Http\Transformers\AbstractTransformers\AbstractCoursesTransformer;

/**
 * Class CoursesTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Golf\Http\Transformers
 */
class CoursesTransformer extends AbstractCoursesTransformer
{

    /**
     * @param Courses $model
     *
     * @return array
     */
    public function transform(Courses $model)
    {
        $transformed = Cache::get(
            CacheHelper::getKey('Courses', $model->uuid, 'Transformed')
        );

        if($transformed) {
            return $transformed;
        }

        $transformed = parent::transform($model);

        Cache::set(
            CacheHelper::getKey('Courses', $model->uuid, 'Transformed'),
            $transformed
        );

        return $transformed;
    }
}
