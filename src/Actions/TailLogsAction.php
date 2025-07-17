<?php

namespace Mgamal92\FilamentDebugActions\Actions;

use Illuminate\Support\Str;

class TailLogsAction
{
    public static function execute(): array
    {
        $logFile = storage_path('logs/laravel.log');

        if (! file_exists($logFile)) {
            return [
                'success' => false,
                'message' => 'Log file not found.',
            ];
        }

        $lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $lines = array_reverse($lines);

        $exceptions = [];

        foreach ($lines as $line) {
            if (Str::startsWith($line, '[') && Str::contains($line, 'ERROR')) {
                $exceptions[] = $line;
            }

            if (count($exceptions) >= 5) {
                break;
            }
        }

        $output = implode("\n", array_reverse($exceptions));

        return [
            'success' => true,
            'modal' => true,
            'data' => [
                'logOutput' => $output ?: 'No recent exceptions found.',
            ],
        ];
    }
}
