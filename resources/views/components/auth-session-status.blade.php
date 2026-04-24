@props([
'status',
'type' => 'success',
])

@if ($status)
<div {{ $attributes->merge([
        'class' => match ($type) {
            'error' => 'font-medium text-sm text-red-600',
            'warning' => 'font-medium text-sm text-yellow-600',
            default => 'font-medium text-sm text-green-600',
        }
    ]) }}>
    {{ $status }}
</div>
@endif