<?php

use Mgamal92\FilamentDebugActions\Actions\OptimizeClearAction;
use Mgamal92\FilamentDebugActions\Actions\SendTestEmailAction;
use Mgamal92\FilamentDebugActions\Actions\TailLogsAction;

return [

    'actions' => [
        'optimize_clear' => [
            'label' => 'Clear All Caches',
            'description' => 'Run all clear commands: config, route, view, cache, optimize',
            'enabled' => true,
            'class' => OptimizeClearAction::class,
        ],

        'send_test_email' => [
            'label' => 'Send Test Email',
            'description' => 'Send a test email to verify mail configuration.',
            'enabled' => true,
            'class' => SendTestEmailAction::class,
            'receiver' => 'receiver@demo.com'
        ],

        'tail_logs' => [
            'label' => 'Tail Laravel Log',
            'description' => 'Show the last 30 lines from laravel.log',
            'enabled' => true,
            'class' => TailLogsAction::class,
        ],
    ],

];
