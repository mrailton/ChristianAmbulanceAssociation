@props([
    'type' => 'info',
    'message',
])

@php
    $styles = match ($type) {
        'success' => [
            'container' => 'border-green-200 bg-green-50 text-green-900',
            'icon' => 'text-caa-green',
        ],
        'error' => [
            'container' => 'border-red-200 bg-red-50 text-red-900',
            'icon' => 'text-red-600',
        ],
        'warning' => [
            'container' => 'border-amber-200 bg-amber-50 text-amber-900',
            'icon' => 'text-amber-600',
        ],
        default => [
            'container' => 'border-sky-200 bg-sky-50 text-sky-900',
            'icon' => 'text-sky-600',
        ],
    };
@endphp

<div
    x-data="{ visible: true }"
    x-show="visible"
    x-transition.opacity.duration.200ms
    role="alert"
    {{ $attributes->merge(['class' => "flex items-start gap-3 rounded-2xl border px-4 py-3 shadow-sm {$styles['container']}"]) }}
>
    <svg class="mt-0.5 h-5 w-5 shrink-0 {{ $styles['icon'] }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
        @if ($type === 'success')
            <path stroke-linecap="round" stroke-linejoin="round" d="m5 12 4 4L19 6" />
        @elseif ($type === 'error')
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6l12 12M18 6 6 18" />
        @elseif ($type === 'warning')
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4m0 4h.01M10.3 4.6 2.8 18a2 2 0 0 0 1.7 3h15a2 2 0 0 0 1.7-3l-7.5-13.4a2 2 0 0 0-3.4 0Z" />
        @else
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 16v-4m0-4h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        @endif
    </svg>

    <p class="flex-1 text-sm font-medium leading-6">{{ $message }}</p>

    <button type="button" class="rounded-lg p-1 transition hover:bg-black/5" @click="visible = false" aria-label="Dismiss notification">
        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6l12 12M18 6 6 18" />
        </svg>
    </button>
</div>
