<?php

namespace App\Http\Controllers;

use App\Mail\GolfContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;
use Whitecube\NovaPage\Pages\Manager;
use Whitecube\NovaPage\Pages\Template;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'g-recaptcha-response' => 'required|recaptchav3:contactform,0.5',
            'senderName'    => 'required|string|max:100',
            'senderEmail'   => 'required|email|max:100',
            'message'       => 'required|string',
            'senderHuman'   => ['required', function($attr, $value, $fail) use ($request) {
                $a = (int) $request->input('checkHuman_a');
                $b = (int) $request->input('checkHuman_b');
                if ((int)$value !== $a + $b) {
                    $fail('Die Antwort auf die Sicherheitsfrage ist falsch.');
                }
            }],
        ], [
            'senderName.required'  => 'Bitte geben Sie Ihren vollständigen Namen an.',
            'senderEmail.required' => 'Bitte geben Sie Ihre E-Mail-Adresse an.',
            'senderEmail.email'    => 'Bitte geben Sie eine gültige E-Mail-Adresse ein.',
            'message.required'     => 'Bitte schreiben Sie eine Nachricht.',
            'senderHuman.required' => 'Bitte beantworten Sie die Sicherheitsfrage.',
        ]);

        $data = [
            'senderName'  => $validated['senderName'],
            'senderEmail' => $validated['senderEmail'],
            'bodyText'    => $validated['message']
        ];

        Mail::send('emails.contact', $data, function($m) use ($validated) {
            $m->to(config('mail.from.address'))
                ->subject('Neue Kontaktanfrage von Ihrer Webseite');
        });

        return redirect()->route('kontakt.success')->with('success', 'Ihre Nachricht wurde erfolgreich gesendet.');
    }

    public function kontaktSuccess(Template $template, Manager $novapage)
    {
        $novapage->load('feedback', 'route', false);

        return view('feedback', [
            'page' => $template,
        ]);
    }

    public function golfContactForm(Request $request)
    {
        $validated = $request->validate([
            'g-recaptcha-response' => ['required','recaptchav3:golfform,0.5'],
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'max:255'],
            'zeitraum' => ['nullable', 'string', 'max:255'],
        ], [
            'name.required'  => 'Name is required.',
            'email.required' => 'E-Mail is required.',
            'email.email'    => 'Please enter a valid email address.',
        ]);

        try {
            $payload = $validated;

            $payload['ip'] = $request->ip();
            $payload['agent'] = $request->header('User-Agent');

            Mail::to('baghdasaryan@bt-gs.de')->send(new \App\Mail\GolfContactFormMail($payload));

        } catch (Throwable $e) {
            Log::error('Contact form send failed: ' . $e->getMessage(), [
                'payload' => $validated,
            ]);

            return back()
                ->withInput()
                ->withErrors(['email' => 'Sorry, we could not send your request right now. Please try again later.']);
        }

        return back()->with('success', 'Thanks — your appointment request was sent.');
    }
}
