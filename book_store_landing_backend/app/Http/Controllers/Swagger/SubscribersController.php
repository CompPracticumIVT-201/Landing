<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 *     path="/api/books",
 *     summary="Создание нового подписчика",
 *     tags={"Подписчики"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 required={"email", "question", "frequency", "new_arrivals", "selection_by_genre", "recommended_papers", "discount_notifications"},
 *                 @OA\Property(property="email", type="string", example="какой-то email"),
 *                 @OA\Property(property="question", type="string", example="какой-то вопрос"),
 *                 @OA\Property(property="frequency", type="string", example="какая-то частота отправлений"),
 *                 @OA\Property(property="new_arrivals", type="boolean", example="false"),
 *                 @OA\Property(property="selection_by_genre", type="boolean", example="false"),
 *                 @OA\Property(property="recommended_papers", type="boolean", example="false"),
 *                 @OA\Property(property="discount_notifications", type="boolean", example="false")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response="201",
 *         description="Subscription created successfully"
 *     ),
 *     @OA\Response(
 *         response="400",
 *         description="Invalid input"
 *     )
 * )
 */

class SubscribersController extends Controller
{

}
