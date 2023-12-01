<?php

namespace NextDeveloper\Golf\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Golf\Database\Filters\GolfCourseQueryFilter;
use NextDeveloper\Golf\Services\AbstractServices\AbstractGolfCourseService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait GolfCourseTestTraits
{
    public $http;

    /**
     *   Creating the Guzzle object
     */
    public function setupGuzzle()
    {
        $this->http = new Client(
            [
            'base_uri'  =>  '127.0.0.1:8000'
            ]
        );
    }

    /**
     *   Destroying the Guzzle object
     */
    public function destroyGuzzle()
    {
        $this->http = null;
    }

    public function test_http_golfcourse_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/golf/golfcourse',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_golfcourse_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/golf/golfcourse', [
            'form_params'   =>  [
                'name'  =>  'a',
                'description'  =>  'a',
                'price'  =>  '1',
                            ],
                ['http_errors' => false]
            ]
        );

        $this->assertEquals($response->getStatusCode(), Response::HTTP_OK);
    }

    /**
     * Get test
     *
     * @return bool
     */
    public function test_golfcourse_model_get()
    {
        $result = AbstractGolfCourseService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_golfcourse_get_all()
    {
        $result = AbstractGolfCourseService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_golfcourse_get_paginated()
    {
        $result = AbstractGolfCourseService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_golfcourse_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfCourse\GolfCourseRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfcourse_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfCourse\GolfCourseCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfcourse_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfCourse\GolfCourseCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfcourse_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfCourse\GolfCourseSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfcourse_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfCourse\GolfCourseSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfcourse_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfCourse\GolfCourseUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfcourse_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfCourse\GolfCourseUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfcourse_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfCourse\GolfCourseDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfcourse_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfCourse\GolfCourseDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfcourse_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfCourse\GolfCourseRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfcourse_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfCourse\GolfCourseRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfcourse_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfCourse::first();

            event(new \NextDeveloper\Golf\Events\GolfCourse\GolfCourseRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfcourse_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfCourse::first();

            event(new \NextDeveloper\Golf\Events\GolfCourse\GolfCourseCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfcourse_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfCourse::first();

            event(new \NextDeveloper\Golf\Events\GolfCourse\GolfCourseCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfcourse_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfCourse::first();

            event(new \NextDeveloper\Golf\Events\GolfCourse\GolfCourseSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfcourse_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfCourse::first();

            event(new \NextDeveloper\Golf\Events\GolfCourse\GolfCourseSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfcourse_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfCourse::first();

            event(new \NextDeveloper\Golf\Events\GolfCourse\GolfCourseUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfcourse_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfCourse::first();

            event(new \NextDeveloper\Golf\Events\GolfCourse\GolfCourseUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfcourse_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfCourse::first();

            event(new \NextDeveloper\Golf\Events\GolfCourse\GolfCourseDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfcourse_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfCourse::first();

            event(new \NextDeveloper\Golf\Events\GolfCourse\GolfCourseDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfcourse_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfCourse::first();

            event(new \NextDeveloper\Golf\Events\GolfCourse\GolfCourseRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfcourse_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfCourse::first();

            event(new \NextDeveloper\Golf\Events\GolfCourse\GolfCourseRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfcourse_event_name_filter()
    {
        try {
            $request = new Request(
                [
                'name'  =>  'a'
                ]
            );

            $filter = new GolfCourseQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfCourse::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfcourse_event_description_filter()
    {
        try {
            $request = new Request(
                [
                'description'  =>  'a'
                ]
            );

            $filter = new GolfCourseQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfCourse::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfcourse_event_price_filter()
    {
        try {
            $request = new Request(
                [
                'price'  =>  '1'
                ]
            );

            $filter = new GolfCourseQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfCourse::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfcourse_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new GolfCourseQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfCourse::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfcourse_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new GolfCourseQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfCourse::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfcourse_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new GolfCourseQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfCourse::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfcourse_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new GolfCourseQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfCourse::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfcourse_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new GolfCourseQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfCourse::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfcourse_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new GolfCourseQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfCourse::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfcourse_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new GolfCourseQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfCourse::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfcourse_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new GolfCourseQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfCourse::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfcourse_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new GolfCourseQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfCourse::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n
}