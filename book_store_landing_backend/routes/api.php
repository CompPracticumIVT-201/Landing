<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController;
use \App\Http\Controllers\Api\GenreController;
use \App\Http\Controllers\Api\ReviewController;
use \App\Http\Controllers\Api\SubscriberController;

Route::apiResources([
    'books' => BookController::class,
    'genres' => GenreController::class,
    'reviews' => ReviewController::class,
    'subscribers' => SubscriberController::class,
]);

Route::post('books', 'App\Http\Controllers\Api\SubscribersController@store')->name('subscribers.store');
