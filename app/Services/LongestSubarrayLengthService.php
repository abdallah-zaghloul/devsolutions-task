<?php

namespace App\Services;

use App\Http\Requests\Api\LongestSubArrayRequest;

class LongestSubarrayLengthService
{
    /**
     * @param LongestSubArrayRequest $request
     * @return int
     */
    public function execute(LongestSubArrayRequest $request) :int
    {
        [$n , $maxLength , $current , $next , $set[]] = [count($request->arr) , 1 , 0 , 1 , @$request->arr[0]];
        if ($n <= 1) return $n;

        while ($next < $n) {
            if (!in_array($request->arr[$next], $set)) {
                $set[] = $request->arr[$next];
                $next++;
                $maxLength = max($maxLength, count($set));
            }else {
                $index = array_search($request->arr[$current], $set);
                unset($set[$index]);
                $current++;
            }
        }
        return $maxLength;
    }

}
