<?php

namespace NextDeveloper\Golf\Services\AbstractServices;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;
use NextDeveloper\IAM\Helpers\UserHelper;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Commons\Helpers\DatabaseHelper;
use NextDeveloper\Golf\Database\Models\TeeTimes;
use NextDeveloper\Golf\Database\Filters\TeeTimesQueryFilter;
use NextDeveloper\Commons\Exceptions\ModelNotFoundException;
use NextDeveloper\Events\Services\Events;

/**
 * This class is responsible from managing the data for TeeTimes
 *
 * Class TeeTimesService.
 *
 * @package NextDeveloper\Golf\Database\Models
 */
class AbstractTeeTimesService
{
    public static function get(TeeTimesQueryFilter $filter = null, array $params = []) : Collection|LengthAwarePaginator
    {
        $enablePaginate = array_key_exists('paginate', $params);

        /**
        * Here we are adding null request since if filter is null, this means that this function is called from
        * non http application. This is actually not I think its a correct way to handle this problem but it's a workaround.
        *
        * Please let me know if you have any other idea about this; baris.bulut@nextdeveloper.com
        */
        if($filter == null) {
            $filter = new TeeTimesQueryFilter(new Request());
        }

        $perPage = config('commons.pagination.per_page');

        if($perPage == null) {
            $perPage = 20;
        }

        if(array_key_exists('per_page', $params)) {
            $perPage = intval($params['per_page']);

            if($perPage == 0) {
                $perPage = 20;
            }
        }

        if(array_key_exists('orderBy', $params)) {
            $filter->orderBy($params['orderBy']);
        }

        $model = TeeTimes::filter($filter);

        if($model && $enablePaginate) {
            return $model->paginate($perPage);
        } else {
            return $model->get();
        }
    }

    public static function getAll()
    {
        return TeeTimes::all();
    }

    /**
     * This method returns the model by looking at reference id
     *
     * @param  $ref
     * @return mixed
     */
    public static function getByRef($ref) : ?TeeTimes
    {
        return TeeTimes::findByRef($ref);
    }

    /**
     * This method returns the model by lookint at its id
     *
     * @param  $id
     * @return TeeTimes|null
     */
    public static function getById($id) : ?TeeTimes
    {
        return TeeTimes::where('id', $id)->first();
    }

    /**
     * This method returns the sub objects of the related models
     *
     * @param  $uuid
     * @param  $object
     * @return void
     * @throws \Laravel\Octane\Exceptions\DdException
     */
    public static function relatedObjects($uuid, $object)
    {
        try {
            $obj = TeeTimes::where('uuid', $uuid)->first();

            if(!$obj) {
                throw new ModelNotFoundException('Cannot find the related model');
            }

            if($obj) {
                return $obj->$object;
            }
        } catch (\Exception $e) {
            dd($e);
        }
    }

    /**
     * This method created the model from an array.
     *
     * Throws an exception if stuck with any problem.
     *
     * @param  array $data
     * @return mixed
     * @throw  Exception
     */
    public static function create(array $data)
    {
        if (array_key_exists('golf_club_id', $data)) {
            $data['golf_club_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\Golf\Database\Models\Clubs',
                $data['golf_club_id']
            );
        }
        if (array_key_exists('golf_course_id', $data)) {
            $data['golf_course_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\Golf\Database\Models\Courses',
                $data['golf_course_id']
            );
        }
    
        try {
            $model = TeeTimes::create($data);
        } catch(\Exception $e) {
            throw $e;
        }

        Events::fire('created:NextDeveloper\Golf\TeeTimes', $model);

        return $model->fresh();
    }

    /**
     * This function expects the ID inside the object.
     *
     * @param  array $data
     * @return TeeTimes
     */
    public static function updateRaw(array $data) : ?TeeTimes
    {
        if(array_key_exists('id', $data)) {
            return self::update($data['id'], $data);
        }

        return null;
    }

    /**
     * This method updated the model from an array.
     *
     * Throws an exception if stuck with any problem.
     *
     * @param
     * @param  array $data
     * @return mixed
     * @throw  Exception
     */
    public static function update($id, array $data)
    {
        $model = TeeTimes::where('uuid', $id)->first();

        if (array_key_exists('golf_club_id', $data)) {
            $data['golf_club_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\Golf\Database\Models\Clubs',
                $data['golf_club_id']
            );
        }
        if (array_key_exists('golf_course_id', $data)) {
            $data['golf_course_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\Golf\Database\Models\Courses',
                $data['golf_course_id']
            );
        }
    
        Events::fire('updating:NextDeveloper\Golf\TeeTimes', $model);

        try {
            $isUpdated = $model->update($data);
            $model = $model->fresh();
        } catch(\Exception $e) {
            throw $e;
        }

        Events::fire('updated:NextDeveloper\Golf\TeeTimes', $model);

        return $model->fresh();
    }

    /**
     * This method updated the model from an array.
     *
     * Throws an exception if stuck with any problem.
     *
     * @param
     * @param  array $data
     * @return mixed
     * @throw  Exception
     */
    public static function delete($id)
    {
        $model = TeeTimes::where('uuid', $id)->first();

        Events::fire('deleted:NextDeveloper\Golf\TeeTimes', $model);

        try {
            $model = $model->delete();
        } catch(\Exception $e) {
            throw $e;
        }

        return $model;
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}
