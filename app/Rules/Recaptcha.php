<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;

class Recaptcha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $recaptcha = config('services.google_recaptcha');

        $response = Http::asForm()->post($recaptcha['url'], [
            'secret' => $recaptcha['secret_key'],
            'response' => $value,
        ])->json();

        if ($response['success'] && $response['score'] > 0.5) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Walidacja Google Recaptcha nie powiodła się.';
    }
}
