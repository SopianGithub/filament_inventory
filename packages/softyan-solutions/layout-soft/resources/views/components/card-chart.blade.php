@props([
    'components' => null,
])
@php
    $components = $getComponents() ?? [];
@endphp

<div class="filament-stats-card relative rounded-2xl bg-white p-6 shadow dark:bg-gray-800 filament-stats-overview-widget-card">
    <div class="space-y-2">
        <div class="flex items-center space-x-2 text-lg font-bold text-gray-500 dark:text-gray-200">
            <span>{{ $getTitle() }}</span>
        </div>

        <div class="flex flex-row justify-between">
        @foreach ($components as $component)
            @if (!$component)
                <div></div>
            @elseif ($component instanceof \Filament\Widgets\Widget || $component instanceof \Filament\Tables\Table)
                @if ($component->canView())
                    @livewire(\Livewire\Livewire::getAlias(get_class($component)))
                @endif
            @elseif ($component instanceof \SolutionForest\GridLayoutPlugin\Components\Grid)
                {{ $component }}
            @else
                {{ $component }}
            @endif
        @endforeach
        </div>

    </div>

</div>