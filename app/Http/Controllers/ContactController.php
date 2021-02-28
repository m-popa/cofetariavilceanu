<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactForm;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function __invoke(ContactFormRequest $request)
    {
        Mail::to(config('cofetarie.contact_email'))
            ->queue(
                new ContactForm(
                    $request->first_name,
                    $request->last_name,
                    $request->email,
                    $request->subject,
                    $request->message
                )
            );

        return redirect()->back()->with('message', 'Mesajul dumnveavoastră fost trimis!');
    }
}
