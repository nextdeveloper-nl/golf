<?php

namespace NextDeveloper\Golf\Services\AbstractServices;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;
use NextDeveloper\IAM\Helpers\UserHelper;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Commons\Helpers\DatabaseHelper;
use NextDeveloper\Golf\Database\Models\Reservations;
use NextDeveloper\Golf\Database\Filters\ReservationsQueryFilter;
use NextDeveloper\Golf\Events\Reservations\ReservationsCreatedEvent;
use NextDeveloper\Golf\Events\Reservations\ReservationsCreatingEvent;
use NextDeveloper\Golf\Events\Reservations\ReservationsUpdatedEvent;
use NextDeveloper\Golf\Events\Reservations\ReservationsUpdatingEvent;
use NextDeveloper\Golf\Events\Reservations\ReservationsDeletedEvent;
use NextDeveloper\Golf\Events\Reservations\ReservationsDeletingEvent;


/**
 * This class is responsible from managing the data for Reservations
 *
 * Class ReservationsService.
 *
 * @package NextDeveloper\Golf\Database\Models
 */
class AbstractReservationsService
{
    public static function get(ReservationsQueryFilter $filter = null, array $params = []) : Collection|LengthAwarePaginator
    {
        $enablePaginate = array_key_exists('paginate', $params);

        /**
        * Here we are adding null request since if filter is null, this means that this function is called from
        * non http application. This is actually not I think its a correct way to handle this problem but it's a workaround.
        *
        * Please let me know if you have any other idea about this; baris.bulut@nextdeveloper.com
        */
        if($filter == null) {
            $filter = new ReservationsQueryFilter(new Request());
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

        $model = Reservations::filter($filter);

        if($model && $enablePaginate) {
            return $model->paginate($perPage);
        } else {
            return $model->get();
        }
    }

    public static function getAll()
    {
        return Reservations::all();
    }

    /**
     * This method returns the model by looking at reference id
     *
     * @param  $ref
     * @return mixed
     */
    public static function getByRef($ref) : ?Reservations
    {
        return Reservations::findByRef($ref);
    }

    /**
     * This method returns the model by lookint at its id
     *
     * @param  $id
     * @return Reservations|null
     */
    public static function getById($id) : ?Reservations
    {
        return Reservations::where('id', $id)->first();
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
        event(new ReservationsCreatingEvent());

        if (array_key_exists('golf_tee_time_id', $data)) {
            $data['golf_tee_time_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\Golf\Database\Models\TeeTimes',
                $data['golf_tee_time_id']
            );
        }
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
        if (array_key_exists('iam_user_id', $data)) {
            $data['iam_user_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\IAM\Database\Models\Users',
                $data['iam_user_id']
            );
        }
            
        try {
            $model = Reservations::create($data);
        } catch(\Exception $e) {
            throw $e;
        }

        event(new ReservationsCreatedEvent($model));

        return $model->fresh();
    }

    /**
     This function expects the ID inside the object.
    
     @param  array $data
     @return Reservations
     */
    public static function updateRaw(array $data) : ?Reservations
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
        $model = Reservations::where('uuid', $id)->first();

        if (array_key_exists('golf_tee_time_id', $data)) {
            $data['golf_tee_time_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\Golf\Database\Models\TeeTimes',
                $data['golf_tee_time_id']
            );
        }
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
        if (array_key_exists('iam_user_id', $data)) {
            $data['iam_user_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\IAM\Database\Models\Users',
                $data['iam_user_id']
            );
        }
    
        event(new ReservationsUpdatingEvent($model));

        try {
            $isUpdated = $model->update($data);
            $model = $model->fresh();
        } catch(\Exception $e) {
            throw $e;
        }

        event(new ReservationsUpdatedEvent($model));

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
    public static function delete($id, array $data)
    {
        $model = Reservations::where('uuid', $id)->first();

        event(new ReservationsDeletingEvent());

        try {
            $model = $model->delete();
        } catch(\Exception $e) {
            throw $e;
        }

        event(new ReservationsDeletedEvent($model));

        return $model;
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}
