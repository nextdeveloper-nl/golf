<?php

namespace NextDeveloper\Golf\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Golf\Database\Filters\GolfTeeTimeQueryFilter;
use NextDeveloper\Golf\Services\AbstractServices\AbstractGolfTeeTimeService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait GolfTeeTimeTestTraits
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

    public function test_http_golfteetime_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/golf/golfteetime',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_golfteetime_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/golf/golfteetime', [
            'form_params'   =>  [
                    'tee_time'  =>  now(),
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
    public function test_golfteetime_model_get()
    {
        $result = AbstractGolfTeeTimeService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_golfteetime_get_all()
    {
        $result = AbstractGolfTeeTimeService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_golfteetime_get_paginated()
    {
        $result = AbstractGolfTeeTimeService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_golfteetime_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfTeeTime\GolfTeeTimeRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfteetime_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfTeeTime\GolfTeeTimeCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfteetime_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfTeeTime\GolfTeeTimeCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfteetime_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfTeeTime\GolfTeeTimeSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfteetime_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfTeeTime\GolfTeeTimeSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfteetime_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfTeeTime\GolfTeeTimeUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfteetime_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfTeeTime\GolfTeeTimeUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfteetime_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfTeeTime\GolfTeeTimeDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfteetime_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfTeeTime\GolfTeeTimeDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfteetime_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfTeeTime\GolfTeeTimeRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfteetime_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfTeeTime\GolfTeeTimeRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfteetime_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfTeeTime::first();

            event(new \NextDeveloper\Golf\Events\GolfTeeTime\GolfTeeTimeRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfteetime_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfTeeTime::first();

            event(new \NextDeveloper\Golf\Events\GolfTeeTime\GolfTeeTimeCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfteetime_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfTeeTime::first();

            event(new \NextDeveloper\Golf\Events\GolfTeeTime\GolfTeeTimeCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfteetime_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfTeeTime::first();

            event(new \NextDeveloper\Golf\Events\GolfTeeTime\GolfTeeTimeSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfteetime_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfTeeTime::first();

            event(new \NextDeveloper\Golf\Events\GolfTeeTime\GolfTeeTimeSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfteetime_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfTeeTime::first();

            event(new \NextDeveloper\Golf\Events\GolfTeeTime\GolfTeeTimeUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfteetime_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfTeeTime::first();

            event(new \NextDeveloper\Golf\Events\GolfTeeTime\GolfTeeTimeUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfteetime_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfTeeTime::first();

            event(new \NextDeveloper\Golf\Events\GolfTeeTime\GolfTeeTimeDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfteetime_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfTeeTime::first();

            event(new \NextDeveloper\Golf\Events\GolfTeeTime\GolfTeeTimeDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfteetime_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfTeeTime::first();

            event(new \NextDeveloper\Golf\Events\GolfTeeTime\GolfTeeTimeRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfteetime_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfTeeTime::first();

            event(new \NextDeveloper\Golf\Events\GolfTeeTime\GolfTeeTimeRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfteetime_event_tee_time_filter_start()
    {
        try {
            $request = new Request(
                [
                'tee_timeStart'  =>  now()
                ]
            );

            $filter = new GolfTeeTimeQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfTeeTime::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfteetime_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new GolfTeeTimeQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfTeeTime::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfteetime_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new GolfTeeTimeQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfTeeTime::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfteetime_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new GolfTeeTimeQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfTeeTime::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfteetime_event_tee_time_filter_end()
    {
        try {
            $request = new Request(
                [
                'tee_timeEnd'  =>  now()
                ]
            );

            $filter = new GolfTeeTimeQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfTeeTime::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfteetime_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new GolfTeeTimeQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfTeeTime::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfteetime_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new GolfTeeTimeQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfTeeTime::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfteetime_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new GolfTeeTimeQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfTeeTime::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfteetime_event_tee_time_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'tee_timeStart'  =>  now(),
                'tee_timeEnd'  =>  now()
                ]
            );

            $filter = new GolfTeeTimeQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfTeeTime::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfteetime_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new GolfTeeTimeQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfTeeTime::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfteetime_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new GolfTeeTimeQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfTeeTime::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfteetime_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new GolfTeeTimeQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfTeeTime::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n\n\n\n\n
}