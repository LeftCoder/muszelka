<?php

namespace App\Http\Requests;

use App\Rules\Recaptcha;
use Illuminate\Foundation\Http\FormRequest;

class SendReviewRequest extends FormRequest
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
            'author' => ['required', 'min:3', 'max:255'],
            'body' => ['required', 'min:3', 'max:1024'],
            'policy' => 'accepted',
            'captcha_token' => [new Recaptcha()],
        ];
    }
}
