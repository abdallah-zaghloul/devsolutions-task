<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LongestSubArrayRequest;
use App\Services\LongestSubarrayLengthService;
use App\Traits\Response;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    use Response;

    /**
     * @param LongestSubArrayRequest $request
     * @param LongestSubarrayLengthService $service
     * @return JsonResponse
     */
    public function longestSubarray(LongestSubArrayRequest $request, LongestSubarrayLengthService $service): JsonResponse
    {
        $length = $service->execute($request);
        return $this->data('Longest Sub Array',compact('length'));
    }
}
