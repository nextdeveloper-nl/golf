<?php

namespace NextDeveloper\Golf\Http\Controllers\Clubs;

use Illuminate\Http\Request;
use NextDeveloper\Golf\Http\Controllers\AbstractController;
use NextDeveloper\Generator\Http\Traits\ResponsableFactory;
use NextDeveloper\Golf\Http\Requests\Clubs\ClubsUpdateRequest;
use NextDeveloper\Golf\Database\Filters\ClubsQueryFilter;
use NextDeveloper\Golf\Services\ClubsService;
use NextDeveloper\Golf\Http\Requests\Clubs\ClubsCreateRequest;

class ClubsController extends AbstractController
{
    /**
     * This method returns the list of clubs.
     *
     * optional http params:
     * - paginate: If you set paginate parameter, the result will be returned paginated.
     *
     * @param  ClubsQueryFilter $filter  An object that builds search query
     * @param  Request          $request Laravel request object, this holds all data about request. Automatically populated.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ClubsQueryFilter $filter, Request $request)
    {
        $data = ClubsService::get($filter, $request->all());

        return ResponsableFactory::makeResponse($this, $data);
    }

    /**
     * This method receives ID for the related model and returns the item to the client.
     *
     * @param  $clubsId
     * @return mixed|null
     * @throws \Laravel\Octane\Exceptions\DdException
     */
    public function show($ref)
    {
        //  Here we are not using Laravel Route Model Binding. Please check routeBinding.md file
        //  in NextDeveloper Platform Project
        $model = ClubsService::getByRef($ref);

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method created Clubs object on database.
     *
     * @param  ClubsCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function store(ClubsCreateRequest $request)
    {
        $model = ClubsService::create($request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates Clubs object on database.
     *
     * @param  $clubsId
     * @param  CountryCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function update($clubsId, ClubsUpdateRequest $request)
    {
        $model = ClubsService::update($clubsId, $request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates Clubs object on database.
     *
     * @param  $clubsId
     * @param  CountryCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function destroy($clubsId)
    {
        $model = ClubsService::delete($clubsId);

        return ResponsableFactory::makeResponse($this, $model);
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}