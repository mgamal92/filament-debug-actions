<x-filament::page>
    <x-filament::card>
        <h2 class="text-xl font-bold mb-4">Debug Actions</h2>

        @foreach ($this->getActions() as $key => $action)
            <div class="mb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold">{{ $action['label'] }}</h3>
                        <p class="text-sm text-gray-500">{{ $action['description'] }}</p>
                    </div>

                    @if ($key === 'tail_logs')
                        <x-filament::modal id="tail-logs-modal" alignment="center" width="7xl">
                            <x-slot name="trigger">
                                <x-filament::button wire:click="runAction('{{ $key }}')">
                                    Run
                                </x-filament::button>
                            </x-slot>

                            <x-slot name="heading">
                                Laravel Log Output
                            </x-slot>

                            <x-slot name="description">
                                Displaying the last 5 exceptions from <code>laravel.log</code>.
                            </x-slot>

                            <div class="p-6">
                                <pre class="bg-gray-900 text-white p-4 rounded overflow-auto max-h-[400px] text-sm whitespace-pre-wrap">
{{ $logOutput }}
                                </pre>
                            </div>
                        </x-filament::modal>
                    @else
                        <form wire:submit.prevent="runAction('{{ $key }}')">
                            <x-filament::button type="submit">
                                Run
                            </x-filament::button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    </x-filament::card>
</x-filament::page>
