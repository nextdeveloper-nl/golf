<?php

namespace NextDeveloper\Golf\Http\Controllers\TeeTimes;

use Illuminate\Http\Request;
use NextDeveloper\Golf\Http\Controllers\AbstractController;
use NextDeveloper\Commons\Http\Response\ResponsableFactory;
use NextDeveloper\Golf\Http\Requests\TeeTimes\TeeTimesUpdateRequest;
use NextDeveloper\Golf\Database\Filters\TeeTimesQueryFilter;
use NextDeveloper\Golf\Database\Models\TeeTimes;
use NextDeveloper\Golf\Services\TeeTimesService;
use NextDeveloper\Golf\Http\Requests\TeeTimes\TeeTimesCreateRequest;
use NextDeveloper\Commons\Http\Traits\Tags;
class TeeTimesController extends AbstractController
{
    private $model = TeeTimes::class;

    use Tags;
    /**
     * This method returns the list of teetimes.
     *
     * optional http params:
     * - paginate: If you set paginate parameter, the result will be returned paginated.
     *
     * @param  TeeTimesQueryFilter $filter  An object that builds search query
     * @param  Request             $request Laravel request object, this holds all data about request. Automatically populated.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(TeeTimesQueryFilter $filter, Request $request)
    {
        $data = TeeTimesService::get($filter, $request->all());

        return ResponsableFactory::makeResponse($this, $data);
    }

    /**
     * This method receives ID for the related model and returns the item to the client.
     *
     * @param  $teeTimesId
     * @return mixed|null
     * @throws \Laravel\Octane\Exceptions\DdException
     */
    public function show($ref)
    {
        //  Here we are not using Laravel Route Model Binding. Please check routeBinding.md file
        //  in NextDeveloper Platform Project
        $model = TeeTimesService::getByRef($ref);

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
        $objects = TeeTimesService::relatedObjects($ref, $subObject);

        return ResponsableFactory::makeResponse($this, $objects);
    }

    /**
     * This method created TeeTimes object on database.
     *
     * @param  TeeTimesCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function store(TeeTimesCreateRequest $request)
    {
        $model = TeeTimesService::create($request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates TeeTimes object on database.
     *
     * @param  $teeTimesId
     * @param  CountryCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function update($teeTimesId, TeeTimesUpdateRequest $request)
    {
        $model = TeeTimesService::update($teeTimesId, $request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates TeeTimes object on database.
     *
     * @param  $teeTimesId
     * @param  CountryCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function destroy($teeTimesId)
    {
        $model = TeeTimesService::delete($teeTimesId);

        return $this->noContent();
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}
