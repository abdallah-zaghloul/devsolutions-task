<?php
/** @noinspection PhpLanguageLevelInspection */

namespace App\Rules;
use Illuminate\Contracts\Validation\Rule;

class IsIndexedArrayRule implements Rule
{
    /**
     * @var string
     */
    protected string $attribute;

    /**
     * @var array
     */
    protected array $value;

    /**
     * @var string|null
     */
    protected ?array $indexes;

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        [$this->attribute , $this->value] = [$attribute , $value];
        return collect($this->value)->every(fn($value,$key) => $this->valid($key));
    }

    /**
     * @param $key
     * @return bool
     */
    protected function valid($key): bool
    {
        $validKey = is_integer($key);
        !$validKey and $this->indexes[] = "$this->attribute.$key key";
        return $validKey;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return trans('validation.integer',['attribute'=> implode(',',$this->indexes)]);
    }
}
