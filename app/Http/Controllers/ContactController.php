<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
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

        // Отправка письма (синхронно)
        Mail::send('emails.contact', $data, function($m) use ($validated) {
            $m->to(config('mail.from.address'))
                ->subject('Neue Kontaktanfrage von Ihrer Webseite');
        });

        // Редирект назад с флеш-сообщением
        return redirect()->back()->with('success', 'Ihre Nachricht wurde erfolgreich gesendet.');
    }
}
