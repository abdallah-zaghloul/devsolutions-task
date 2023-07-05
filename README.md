<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Abdallah Zaghloul - DevSolutions Task <br>
###(PHP 7.4 - Laravel 8.3) <br>

Write a Laravel controller method that takes an array of integers as input and returns the length of the longest subarray that contains only unique elements. The implementation should use a sliding window approach with a set to keep track of unique elements. The algorithm should have a time complexity of O(n), where n is the length of the input array.

Your implementation should use the following specifications:

The controller method should be named longestSubarray and should accept a POST request with a JSON payload containing the input array. The input array should be passed as a key-value pair with the key arr.

The controller method should return a JSON response containing the length of the longest subarray that contains only unique elements.
If the input array is empty or has only one element, the controller method should return the length of the input array.

Your solution should have a time complexity of O(n), where n is the length of the input array.

Write a unit test that tests this method after.

- Example Input:

    {
    "arr": [1, 2, 3, 4, 5, 1, 2, 3, 4]
    }


- Example output: 5
