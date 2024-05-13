<?php

Route::prefix('golf')->group(
    function () {
        Route::prefix('tee-times')->group(
            function () {
                Route::get('/', 'TeeTimes\TeeTimesController@index');
                Route::get('/actions', 'TeeTimes\TeeTimesController@getActions');

                Route::get('{golf_tee_times}/tags ', 'TeeTimes\TeeTimesController@tags');
                Route::post('{golf_tee_times}/tags ', 'TeeTimes\TeeTimesController@saveTags');
                Route::get('{golf_tee_times}/addresses ', 'TeeTimes\TeeTimesController@addresses');
                Route::post('{golf_tee_times}/addresses ', 'TeeTimes\TeeTimesController@saveAddresses');

                Route::get('/{golf_tee_times}/{subObjects}', 'TeeTimes\TeeTimesController@relatedObjects');
                Route::get('/{golf_tee_times}', 'TeeTimes\TeeTimesController@show');

                Route::post('/', 'TeeTimes\TeeTimesController@store');
                Route::post('/{golf_tee_times}/do/{action}', 'TeeTimes\TeeTimesController@doAction');

                Route::patch('/{golf_tee_times}', 'TeeTimes\TeeTimesController@update');
                Route::delete('/{golf_tee_times}', 'TeeTimes\TeeTimesController@destroy');
            }
        );

        Route::prefix('reservations')->group(
            function () {
                Route::get('/', 'Reservations\ReservationsController@index');
                Route::get('/actions', 'Reservations\ReservationsController@getActions');

                Route::get('{golf_reservations}/tags ', 'Reservations\ReservationsController@tags');
                Route::post('{golf_reservations}/tags ', 'Reservations\ReservationsController@saveTags');
                Route::get('{golf_reservations}/addresses ', 'Reservations\ReservationsController@addresses');
                Route::post('{golf_reservations}/addresses ', 'Reservations\ReservationsController@saveAddresses');

                Route::get('/{golf_reservations}/{subObjects}', 'Reservations\ReservationsController@relatedObjects');
                Route::get('/{golf_reservations}', 'Reservations\ReservationsController@show');

                Route::post('/', 'Reservations\ReservationsController@store');
                Route::post('/{golf_reservations}/do/{action}', 'Reservations\ReservationsController@doAction');

                Route::patch('/{golf_reservations}', 'Reservations\ReservationsController@update');
                Route::delete('/{golf_reservations}', 'Reservations\ReservationsController@destroy');
            }
        );

        Route::prefix('courses')->group(
            function () {
                Route::get('/', 'Courses\CoursesController@index');
                Route::get('/actions', 'Courses\CoursesController@getActions');

                Route::get('{golf_courses}/tags ', 'Courses\CoursesController@tags');
                Route::post('{golf_courses}/tags ', 'Courses\CoursesController@saveTags');
                Route::get('{golf_courses}/addresses ', 'Courses\CoursesController@addresses');
                Route::post('{golf_courses}/addresses ', 'Courses\CoursesController@saveAddresses');

                Route::get('/{golf_courses}/{subObjects}', 'Courses\CoursesController@relatedObjects');
                Route::get('/{golf_courses}', 'Courses\CoursesController@show');

                Route::post('/', 'Courses\CoursesController@store');
                Route::post('/{golf_courses}/do/{action}', 'Courses\CoursesController@doAction');

                Route::patch('/{golf_courses}', 'Courses\CoursesController@update');
                Route::delete('/{golf_courses}', 'Courses\CoursesController@destroy');
            }
        );

        Route::prefix('clubs')->group(
            function () {
                Route::get('/', 'Clubs\ClubsController@index');
                Route::get('/actions', 'Clubs\ClubsController@getActions');

                Route::get('{golf_clubs}/tags ', 'Clubs\ClubsController@tags');
                Route::post('{golf_clubs}/tags ', 'Clubs\ClubsController@saveTags');
                Route::get('{golf_clubs}/addresses ', 'Clubs\ClubsController@addresses');
                Route::post('{golf_clubs}/addresses ', 'Clubs\ClubsController@saveAddresses');

                Route::get('/{golf_clubs}/{subObjects}', 'Clubs\ClubsController@relatedObjects');
                Route::get('/{golf_clubs}', 'Clubs\ClubsController@show');

                Route::post('/', 'Clubs\ClubsController@store');
                Route::post('/{golf_clubs}/do/{action}', 'Clubs\ClubsController@doAction');

                Route::patch('/{golf_clubs}', 'Clubs\ClubsController@update');
                Route::delete('/{golf_clubs}', 'Clubs\ClubsController@destroy');
            }
        );

        // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE





















































    }
);














