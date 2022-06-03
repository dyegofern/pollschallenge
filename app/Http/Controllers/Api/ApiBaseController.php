<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ApiBaseController extends Controller
{

    public function sendResponse($result): JsonResponse
    {
        return response()->json($result, Response::HTTP_OK);
    }


    /**
     * return error response.
     * @param Exception $exception
     * @param int $code
     * @return JsonResponse
     */
    public function sendError(Exception $exception, int $code = Response::HTTP_INTERNAL_SERVER_ERROR): JsonResponse
    {

        return response()->json($exception->getMessage(), $code);
    }


    /**
     * return error response.
     *
     * @return JsonResponse
     */
    public function sendUnauthorized(): JsonResponse
    {

        return response()->json('Unauthorized', Response::HTTP_UNAUTHORIZED);
    }

    /**
     * return error response.
     *
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    public function sendBadRequest(string $message, int $code = Response::HTTP_BAD_REQUEST): JsonResponse
    {

        return response()->json($message, $code);
    }

    /**
     * return error response.
     *
     * @return JsonResponse
     */
    public function sendNotFound(): JsonResponse
    {

        return response()->json('404 Not Found', Response::HTTP_NOT_FOUND);
    }
}
