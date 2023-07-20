<?php

namespace App\Http\Controllers\Api\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Info(
 *     title="PasteBin Clone API",
 *     version="1.0",
 * ),
 * @OA\PathItem(
 *     path="/api/pastes/"
 * )
 * @OA\Post(
 *     path="/api/pastes",
 *     summary="Создание пасты",
 *     tags={"Paste"},
 *
 *     @OA\RequestBody(
 *          @OA\JsonContent(
 *              allOf={
 *                   @OA\Schema(
 *                      @OA\Property(property="title", type="string", example="Daily Routine"),
 *                      @OA\Property(property="body", type="string", example="Wash Dishes"),
 *                      @OA\Property(property="status", type="enum", example=0),
 *                      @OA\Property(property="hide_in", type="integer", example=30),
 *                      @OA\Property(property="language", type="string", example="php"),
 *     )
 *     }
 * )
 *     ),
 *
 *     @OA\Response(
            response=200,
 *          description="OK",
 *     ),
 * ),
 *
 */
class PasteApiController extends Controller
{

}
