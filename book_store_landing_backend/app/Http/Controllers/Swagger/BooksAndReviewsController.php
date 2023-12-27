<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Get(
 *     path="/api/books",
 *     summary="Получение книг, жанров и отзывов",
 *     tags={"Книги, жанры и отзывы"},
 *     @OA\Response(
 *         response="200",
 *         description="Successful operation",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 @OA\Property(property="books.title", type="string", example="какой-то заголовок"),
 *                 @OA\Property(property="books.author", type="string", example="какой-то автор"),
 *                 @OA\Property(property="books.description", type="string", example="какое-то описание"),
 *                 @OA\Property(property="books.cover_image", type="string", example="images/cover_books/some_image.png"),
 *                 @OA\Property(property="genres.name", type="string", example="какой-то жанр"),
 *                 @OA\Property(property="reviews.user_name", type="string", example="какое-то имя пользователя"),
 *                 @OA\Property(property="reviews.review_text", type="string", example="какой-то текст отзыва"),
 *                 @OA\Property(property="reviews.user_photo", type="string", example="какое-то фото пользователя"),
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response="404",
 *         description="No books found"
 *     )
 * )
 */

class BooksAndReviewsController extends Controller
{

}
