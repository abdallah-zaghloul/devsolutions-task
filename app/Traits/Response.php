<?php

namespace App\Traits;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

trait Response
{
    public $statusCodeSuccess = 200;
    public $statusCodeBadRequest = 400;
    public $statusCodeToManyRequests = 429;
    public $statusCodeUnAuthorized = 401;
    public $statusCodeForbidden = 403;
    public $statusCodeNotFound = 404;
    public $statusCodeUnAvailable = 503;
    public $statusCodeInternalServerError = 500;
    public $statusCodeServerTimeOut = 504;


    /**
     * @param string $message
     * @param int $status
     * @return HttpResponseException
     */
    public function error(string $message, int $status) : HttpResponseException
    {
        throw new HttpResponseException(response()->json([
            'status'=> false,
            'message'=> $message,
        ],$status));
    }

    /**
     * @param string $message
     * @return JsonResponse
     */
    public function success(string $message) : JsonResponse
    {
        return response()->json([
            'status'=> true,
            'message'=> $message,
        ],$this->statusCodeSuccess);
    }

    /**
     * @param string $message
     * @param $data
     * @return JsonResponse
     */
    public function data(string $message, $data) : JsonResponse
    {
        return response()->json([
            'status'=> true,
            'message'=> $message,
            'data'=> $data,
        ],$this->statusCodeSuccess);
    }

}
