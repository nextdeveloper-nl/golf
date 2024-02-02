<?php

namespace NextDeveloper\Golf\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Golf\Database\Filters\GolfClubQueryFilter;
use NextDeveloper\Golf\Services\AbstractServices\AbstractGolfClubService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait GolfClubTestTraits
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

    public function test_http_golfclub_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/golf/golfclub',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_golfclub_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/golf/golfclub', [
            'form_params'   =>  [
                'name'  =>  'a',
                'description'  =>  'a',
                'address'  =>  'a',
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
    public function test_golfclub_model_get()
    {
        $result = AbstractGolfClubService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_golfclub_get_all()
    {
        $result = AbstractGolfClubService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_golfclub_get_paginated()
    {
        $result = AbstractGolfClubService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_golfclub_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfClub\GolfClubRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfclub_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfClub\GolfClubCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfclub_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfClub\GolfClubCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfclub_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfClub\GolfClubSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfclub_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfClub\GolfClubSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfclub_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfClub\GolfClubUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfclub_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfClub\GolfClubUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfclub_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfClub\GolfClubDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfclub_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfClub\GolfClubDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfclub_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfClub\GolfClubRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfclub_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Golf\Events\GolfClub\GolfClubRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfclub_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfClub::first();

            event(new \NextDeveloper\Golf\Events\GolfClub\GolfClubRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfclub_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfClub::first();

            event(new \NextDeveloper\Golf\Events\GolfClub\GolfClubCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfclub_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfClub::first();

            event(new \NextDeveloper\Golf\Events\GolfClub\GolfClubCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfclub_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfClub::first();

            event(new \NextDeveloper\Golf\Events\GolfClub\GolfClubSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfclub_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfClub::first();

            event(new \NextDeveloper\Golf\Events\GolfClub\GolfClubSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfclub_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfClub::first();

            event(new \NextDeveloper\Golf\Events\GolfClub\GolfClubUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfclub_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfClub::first();

            event(new \NextDeveloper\Golf\Events\GolfClub\GolfClubUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfclub_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfClub::first();

            event(new \NextDeveloper\Golf\Events\GolfClub\GolfClubDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfclub_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfClub::first();

            event(new \NextDeveloper\Golf\Events\GolfClub\GolfClubDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfclub_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfClub::first();

            event(new \NextDeveloper\Golf\Events\GolfClub\GolfClubRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_golfclub_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Golf\Database\Models\GolfClub::first();

            event(new \NextDeveloper\Golf\Events\GolfClub\GolfClubRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfclub_event_name_filter()
    {
        try {
            $request = new Request(
                [
                'name'  =>  'a'
                ]
            );

            $filter = new GolfClubQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfClub::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfclub_event_description_filter()
    {
        try {
            $request = new Request(
                [
                'description'  =>  'a'
                ]
            );

            $filter = new GolfClubQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfClub::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfclub_event_address_filter()
    {
        try {
            $request = new Request(
                [
                'address'  =>  'a'
                ]
            );

            $filter = new GolfClubQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfClub::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfclub_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new GolfClubQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfClub::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfclub_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new GolfClubQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfClub::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfclub_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new GolfClubQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfClub::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfclub_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new GolfClubQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfClub::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfclub_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new GolfClubQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfClub::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfclub_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new GolfClubQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfClub::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfclub_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new GolfClubQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfClub::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfclub_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new GolfClubQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfClub::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_golfclub_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new GolfClubQueryFilter($request);

            $model = \NextDeveloper\Golf\Database\Models\GolfClub::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n\n\n\n\n\n\n\n\n
}