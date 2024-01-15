<?php

namespace NextDeveloper\Golf\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Golf\Database\Filters\GolfReservationQueryFilter;
use NextDeveloper\Golf\Services\AbstractServices\AbstractGolfReservationService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait GolfReservationTestTraits
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

    public function test_http_golfreservation_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/golf/golfreservation',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_golfreservation_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/golf/golfreservation', [
            'form_params'   =>  [
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
    public function test_golfreservation_model_get()
    {
        $result = AbstractGolfReservationService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_golfreservation_get_all()
    {
        $result = AbstractGolfReservationService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_golfreservation_get_paginated()
    {
        $result = AbstractGolfReservationService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_golfreservation_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfReservation\GolfReservationRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfreservation_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfReservation\GolfReservationCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfreservation_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfReservation\GolfReservationCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfreservation_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfReservation\GolfReservationSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfreservation_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfReservation\GolfReservationSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfreservation_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfReservation\GolfReservationUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfreservation_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfReservation\GolfReservationUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfreservation_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfReservation\GolfReservationDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfreservation_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfReservation\GolfReservationDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfreservation_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfReservation\GolfReservationRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfreservation_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfReservation\GolfReservationRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfreservation_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfReservation::first();

            event(new \NextDeveloper\Golf\Events\GolfReservation\GolfReservationRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfreservation_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfReservation::first();

            event(new \NextDeveloper\Golf\Events\GolfReservation\GolfReservationCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfreservation_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfReservation::first();

            event(new \NextDeveloper\Golf\Events\GolfReservation\GolfReservationCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfreservation_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfReservation::first();

            event(new \NextDeveloper\Golf\Events\GolfReservation\GolfReservationSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfreservation_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfReservation::first();

            event(new \NextDeveloper\Golf\Events\GolfReservation\GolfReservationSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfreservation_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfReservation::first();

            event(new \NextDeveloper\Golf\Events\GolfReservation\GolfReservationUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfreservation_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfReservation::first();

            event(new \NextDeveloper\Golf\Events\GolfReservation\GolfReservationUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfreservation_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfReservation::first();

            event(new \NextDeveloper\Golf\Events\GolfReservation\GolfReservationDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfreservation_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfReservation::first();

            event(new \NextDeveloper\Golf\Events\GolfReservation\GolfReservationDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfreservation_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfReservation::first();

            event(new \NextDeveloper\Golf\Events\GolfReservation\GolfReservationRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfreservation_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfReservation::first();

            event(new \NextDeveloper\Golf\Events\GolfReservation\GolfReservationRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfreservation_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new GolfReservationQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfReservation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfreservation_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new GolfReservationQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfReservation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfreservation_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new GolfReservationQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfReservation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfreservation_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new GolfReservationQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfReservation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfreservation_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new GolfReservationQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfReservation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfreservation_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new GolfReservationQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfReservation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfreservation_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new GolfReservationQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfReservation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfreservation_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new GolfReservationQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfReservation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfreservation_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new GolfReservationQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfReservation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n\n\n\n\n\n\n
}