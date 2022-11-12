<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\InvokableRule;

class Limit implements DataAwareRule, InvokableRule
{
    protected $data = [];

    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        if ($value === null) {
            $fail('Nie wybrano domku.');
        }

        if ($this->data['adults'] + $this->data['children'] > $value) {
            $fail('Nie można wybrać tylu gości.');
        }
    }

    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }
}
