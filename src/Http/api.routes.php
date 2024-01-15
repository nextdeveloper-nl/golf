<?php

Route::prefix('golf')->group(function () {
    Route::prefix('clubs')->group(
        function () {
            Route::get('/', 'Clubs\ClubsController@index');

            Route::get('{golf_clubs}/tags ', 'Clubs\ClubsController@tags');
            Route::post('{golf_clubs}/tags ', 'Clubs\ClubsController@saveTags');

            Route::get('/{golf_clubs}/{subObjects}', 'Clubs\ClubsController@relatedObjects');
            Route::get('/{golf_clubs}', 'Clubs\ClubsController@show');

            Route::post('/', 'Clubs\ClubsController@store');
            Route::patch('/{golf_clubs}', 'Clubs\ClubsController@update');
            Route::delete('/{golf_clubs}', 'Clubs\ClubsController@destroy');
        }
    );

    Route::prefix('courses')->group(
        function () {
            Route::get('/', 'Courses\CoursesController@index');

            Route::get('{golf_courses}/tags ', 'Courses\CoursesController@tags');
            Route::post('{golf_courses}/tags ', 'Courses\CoursesController@saveTags');

            Route::get('/{golf_courses}/{subObjects}', 'Courses\CoursesController@relatedObjects');
            Route::get('/{golf_courses}', 'Courses\CoursesController@show');

            Route::post('/', 'Courses\CoursesController@store');
            Route::patch('/{golf_courses}', 'Courses\CoursesController@update');
            Route::delete('/{golf_courses}', 'Courses\CoursesController@destroy');
        }
    );

    Route::prefix('reservations')->group(
        function () {
            Route::get('/', 'Reservations\ReservationsController@index');

            Route::get('{golf_reservations}/tags ', 'Reservations\ReservationsController@tags');
            Route::post('{golf_reservations}/tags ', 'Reservations\ReservationsController@saveTags');

            Route::get('/{golf_reservations}/{subObjects}', 'Reservations\ReservationsController@relatedObjects');
            Route::get('/{golf_reservations}', 'Reservations\ReservationsController@show');

            Route::post('/', 'Reservations\ReservationsController@store');
            Route::patch('/{golf_reservations}', 'Reservations\ReservationsController@update');
            Route::delete('/{golf_reservations}', 'Reservations\ReservationsController@destroy');
        }
    );

    Route::prefix('tee-times')->group(
        function () {
            Route::get('/', 'TeeTimes\TeeTimesController@index');

            Route::get('{golf_tee_times}/tags ', 'TeeTimes\TeeTimesController@tags');
            Route::post('{golf_tee_times}/tags ', 'TeeTimes\TeeTimesController@saveTags');

            Route::get('/{golf_tee_times}/{subObjects}', 'TeeTimes\TeeTimesController@relatedObjects');
            Route::get('/{golf_tee_times}', 'TeeTimes\TeeTimesController@show');

            Route::post('/', 'TeeTimes\TeeTimesController@store');
            Route::patch('/{golf_tee_times}', 'TeeTimes\TeeTimesController@update');
            Route::delete('/{golf_tee_times}', 'TeeTimes\TeeTimesController@destroy');
        }
    );

// EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

    }
);
