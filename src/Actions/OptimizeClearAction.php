<?php

namespace Mgamal92\FilamentDebugActions\Actions;

use Illuminate\Support\Facades\Artisan;

class OptimizeClearAction
{
    public static function execute(): array
    {
        $commands = [
            'config:clear',
            'route:clear',
            'view:clear',
            'cache:clear',
            'optimize:clear',
        ];

        $output = [];

        foreach ($commands as $command) {
            Artisan::call($command);
            $output[] = [
                'command' => $command,
                'output' => trim(Artisan::output()),
            ];
        }

        return [
            'success' => true,
            'message' => 'All caches cleared successfully.',
            'details' => $output,
        ];
    }
}
