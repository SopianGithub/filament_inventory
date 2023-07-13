@props([
    'getDescription' => null,
    'getResultChart' => null,
    'getIcon' => null,
    'getIconColor' => null,
])

<div class="flex flex-col gap-4 p-8 justify-center items-center">
    
    <div
        @class([
            'flex items-center space-x-1 text-sm font-medium rtl:space-x-reverse h-8',
            match ($getIconColor()) {
                'danger' => 'text-danger-600',
                'primary' => 'text-primary-600',
                'success' => 'text-success-600',
                'warning' => 'text-warning-600',
                default => 'text-gray-600',
            },
        ])
    >
        @if ($icon)
            <x-dynamic-component :component="$getIcon" class="h-4 w-4" />
        @endif
    </div>

    <div class="flex flex-row flex-wrap gap-4 justify-center text-gray-900 dark:text-white">
        <span>{{ $getDescription }}</span>
        <span class="text-sm font-semibold flex justify-center">{{ $getResultChart }}</span>    
    </div>
</div>