<?php
/** @noinspection PhpLanguageLevelInspection */

namespace App\Http\Requests\Api;

use App\Rules\IsIndexedArrayRule;
use App\Traits\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class LongestSubArrayRequest extends FormRequest
{
    use Response;

    /**
     * @var array
     */
    public array $arr;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            "arr"=> ["present","array","max:1000", app(IsIndexedArrayRule::class)],
            "arr.*"=> ["integer"],
        ];
    }

    /**
     * @return void
     */
    protected function passedValidation()
    {
        $this->arr = $this->input("arr");
    }


    /**
     * @param Validator $validator
     * @return HttpResponseException
     */
    protected function failedValidation(Validator $validator): HttpResponseException
    {
        return $this->error($validator->errors()->first(),$this->statusCodeBadRequest);
    }

}
