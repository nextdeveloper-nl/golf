<?php

namespace NextDeveloper\Golf\Http\Controllers\Reservations;

use Illuminate\Http\Request;
use NextDeveloper\Golf\Http\Controllers\AbstractController;
use NextDeveloper\Commons\Http\Response\ResponsableFactory;
use NextDeveloper\Golf\Http\Requests\Reservations\ReservationsUpdateRequest;
use NextDeveloper\Golf\Database\Filters\ReservationsQueryFilter;
use NextDeveloper\Golf\Database\Models\Reservations;
use NextDeveloper\Golf\Services\ReservationsService;
use NextDeveloper\Golf\Http\Requests\Reservations\ReservationsCreateRequest;
use NextDeveloper\Commons\Http\Traits\Tags;
class ReservationsController extends AbstractController
{
    private $model = Reservations::class;

    use Tags;
    /**
     * This method returns the list of reservations.
     *
     * optional http params:
     * - paginate: If you set paginate parameter, the result will be returned paginated.
     *
     * @param  ReservationsQueryFilter $filter  An object that builds search query
     * @param  Request                 $request Laravel request object, this holds all data about request. Automatically populated.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ReservationsQueryFilter $filter, Request $request)
    {
        $data = ReservationsService::get($filter, $request->all());

        return ResponsableFactory::makeResponse($this, $data);
    }

    /**
     * This method receives ID for the related model and returns the item to the client.
     *
     * @param  $reservationsId
     * @return mixed|null
     * @throws \Laravel\Octane\Exceptions\DdException
     */
    public function show($ref)
    {
        //  Here we are not using Laravel Route Model Binding. Please check routeBinding.md file
        //  in NextDeveloper Platform Project
        $model = ReservationsService::getByRef($ref);

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method returns the list of sub objects the related object. Sub object means an object which is preowned by
     * this object.
     *
     * It can be tags, addresses, states etc.
     *
     * @param  $ref
     * @param  $subObject
     * @return void
     */
    public function relatedObjects($ref, $subObject)
    {
        $objects = ReservationsService::relatedObjects($ref, $subObject);

        return ResponsableFactory::makeResponse($this, $objects);
    }

    /**
     * This method created Reservations object on database.
     *
     * @param  ReservationsCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function store(ReservationsCreateRequest $request)
    {
        $model = ReservationsService::create($request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates Reservations object on database.
     *
     * @param  $reservationsId
     * @param  CountryCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function update($reservationsId, ReservationsUpdateRequest $request)
    {
        $model = ReservationsService::update($reservationsId, $request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates Reservations object on database.
     *
     * @param  $reservationsId
     * @param  CountryCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function destroy($reservationsId)
    {
        $model = ReservationsService::delete($reservationsId);

        return $this->noContent();
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}
