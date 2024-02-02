<?php

namespace NextDeveloper\Golf\Http\Controllers\Courses;

use Illuminate\Http\Request;
use NextDeveloper\Golf\Http\Controllers\AbstractController;
use NextDeveloper\Commons\Http\Response\ResponsableFactory;
use NextDeveloper\Golf\Http\Requests\Courses\CoursesUpdateRequest;
use NextDeveloper\Golf\Database\Filters\CoursesQueryFilter;
use NextDeveloper\Golf\Database\Models\Courses;
use NextDeveloper\Golf\Services\CoursesService;
use NextDeveloper\Golf\Http\Requests\Courses\CoursesCreateRequest;
use NextDeveloper\Commons\Http\Traits\Tags;
class CoursesController extends AbstractController
{
    private $model = Courses::class;

    use Tags;
    /**
     * This method returns the list of courses.
     *
     * optional http params:
     * - paginate: If you set paginate parameter, the result will be returned paginated.
     *
     * @param  CoursesQueryFilter $filter  An object that builds search query
     * @param  Request            $request Laravel request object, this holds all data about request. Automatically populated.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(CoursesQueryFilter $filter, Request $request)
    {
        $data = CoursesService::get($filter, $request->all());

        return ResponsableFactory::makeResponse($this, $data);
    }

    /**
     * This method receives ID for the related model and returns the item to the client.
     *
     * @param  $coursesId
     * @return mixed|null
     * @throws \Laravel\Octane\Exceptions\DdException
     */
    public function show($ref)
    {
        //  Here we are not using Laravel Route Model Binding. Please check routeBinding.md file
        //  in NextDeveloper Platform Project
        $model = CoursesService::getByRef($ref);

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
        $objects = CoursesService::relatedObjects($ref, $subObject);

        return ResponsableFactory::makeResponse($this, $objects);
    }

    /**
     * This method created Courses object on database.
     *
     * @param  CoursesCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function store(CoursesCreateRequest $request)
    {
        $model = CoursesService::create($request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates Courses object on database.
     *
     * @param  $coursesId
     * @param  CountryCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function update($coursesId, CoursesUpdateRequest $request)
    {
        $model = CoursesService::update($coursesId, $request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates Courses object on database.
     *
     * @param  $coursesId
     * @param  CountryCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function destroy($coursesId)
    {
        $model = CoursesService::delete($coursesId);

        return $this->noContent();
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}
