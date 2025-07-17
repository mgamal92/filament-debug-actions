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
                    <form wire:submit.prevent="runAction('{{ $key }}')">
                        <x-filament::button type="submit">Run</x-filament::button>
                    </form>
                </div>
            </div>
        @endforeach

    </x-filament::card>
</x-filament::page>
