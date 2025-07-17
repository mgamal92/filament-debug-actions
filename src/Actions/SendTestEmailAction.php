<?php

namespace Mgamal92\FilamentDebugActions\Actions;

use Illuminate\Support\Facades\Mail;

class SendTestEmailAction
{
    public static function execute(): array
    {
        $receiver = config('filament-debug-actions.actions.send_test_email.receiver');

        if (!$receiver) {
            return [
                'success' => false,
                'message' => 'No recipient email found.',
            ];
        }

        try {
            Mail::raw('This is a test email from Filament Debug Actions.', function ($message) use ($receiver) {
                $message->to($receiver)->subject('Test Email');
            });

            return [
                'success' => true,
                'message' => "Test email sent successfully to {$receiver}.",
            ];

        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => "Failed to send test email: {$e->getMessage()}",
            ];
        }

    }
}
