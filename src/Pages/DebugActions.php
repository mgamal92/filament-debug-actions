<?php

namespace Mgamal92\FilamentDebugActions\Pages;

use Filament\Pages\Page;
use Filament\Notifications\Notification;

class DebugActions extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    protected static string $view = 'filament-debug-actions::pages.debug-actions';

    protected static ?string $navigationLabel = 'Debug Actions';

    protected static ?string $slug = 'debug-actions';

    protected static ?string $navigationGroup = 'Developer Tools';

    protected static ?int $navigationSort = 99;

    public $logOutput = '';

    public function getActions(): array
    {
        return collect(config('filament-debug-actions.actions', []))
            ->filter(fn ($action) => $action['enabled'] ?? true)
            ->toArray();
    }

    public function getHeaderActions(): array
    {
        return [];
    }

    public function runAction(string $actionKey)
    {
        $config = config("filament-debug-actions.actions.{$actionKey}");

        if (! $config || empty($config['enabled']) || ! isset($config['class'])) {
            Notification::make()
                ->title("Action [$actionKey] is not properly configured.")
                ->danger()
                ->send();
            return;
        }

        $class = $config['class'];

        if (! class_exists($class)) {
            Notification::make()
                ->title("Class [$class] not found.")
                ->danger()
                ->send();
            return;
        }

        $result = app($class)::execute();

        if (! empty($result['modal']) && isset($result['data']['logOutput'])) {
            $this->logOutput = $result['data']['logOutput'];
            return;
        }

        Notification::make()
            ->title($result['message'] ?? 'Action executed.')
            ->{($result['success'] ?? false) ? 'success' : 'danger'}()
            ->send();
    }

}
