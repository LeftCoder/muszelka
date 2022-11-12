<?php

namespace App\Http\Requests;

use App\Rules\Limit;
use App\Rules\Recaptcha;
use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:255'],
            'surname' => ['required', 'max:255'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string', 'nullable', 'max:11'],
            'start' => ['required', 'date', 'before_or_equal:end'],
            'end' => ['required', 'date', 'after_or_equal:start'],
            'max' => [new Limit],
            'apartment_id' => ['required', 'numeric', 'integer', 'exists:apartments,id'],
            'adults' => ['required', 'numeric', 'integer', 'min:1'],
            'children' => ['numeric', 'integer', 'min:0'],
            'animals' => 'boolean',
            'policy' => 'accepted',
            'captcha_token' => [new Recaptcha],
        ];
    }
}
