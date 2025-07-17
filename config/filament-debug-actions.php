<?php

use Mgamal92\FilamentDebugActions\Actions\OptimizeClearAction;
use Mgamal92\FilamentDebugActions\Actions\SendTestEmailAction;

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

    ],

];
