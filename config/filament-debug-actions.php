<?php

use Mgamal92\FilamentDebugActions\Actions\OptimizeClearAction;

return [

    'actions' => [

        'optimize_clear' => [
            'label' => 'Clear All Caches',
            'description' => 'Run all clear commands: config, route, view, cache, optimize',
            'enabled' => true,
            'class' => OptimizeClearAction::class,
        ],
    ],

];
