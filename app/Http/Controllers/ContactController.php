<?php

namespace App\Http\Controllers;

use App\Http\Requests\MakeContactRequest;
use App\Mail\ContactRequested;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(MakeContactRequest $request)
    {
        $details = $request->validated();
        $details = $request->safe()->except(['captcha_token']);

        Mail::to('k.d.graczyk@gmail.com')->send(new ContactRequested($details));

        return back()->with(['message' => 'Dziękujemy. Twoja wiadomość została wysłana.']);
    }
}
