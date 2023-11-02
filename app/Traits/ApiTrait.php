<?php

namespace App\Traits;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait ApiTrait
{
    public function sendResponse(string $message, mixed $data = null, int $code = Response::HTTP_OK): JsonResponse
    {
        $response = [
            'success' => true,
            'message' => $message
        ];

        if (!is_null($data)){
            $response['data'] = $data;
        }

        return response()->json($response, $code);
    }

    public function errorResponse(string $message, int $code = Response::HTTP_NOT_FOUND)
    {
        $response = [
            'success' => false,
            'message' => $message
        ];

        throw new HttpResponseException(
            response()->json($response, $code)
        );
    }

    public function isFound($model): void
    {
        if (is_null($model)) {
            $this->errorResponse(class_basename(self::class) . " Not Found");
        }
    }
}
