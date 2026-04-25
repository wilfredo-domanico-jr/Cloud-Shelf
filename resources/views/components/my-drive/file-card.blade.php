@props(['title', 'date', 'icon', 'color', 'view' => 'grid'])

<flux:card @class([ 'overflow-hidden p-0' , 'w-full'=> $view === 'grid',
    'flex flex-row items-center p-2' => $view === 'list'
    ])>
    @if($view === 'grid')
    <div class="h-28 {{ $color }} flex items-center justify-center text-4xl">{{ $icon }}</div>
    <div class="p-3">
        <div class="text-sm font-semibold truncate">{{ $title }}</div>
        <div class="text-xs text-neutral-500 dark:text-zinc-100">{{ $date }}</div>
    </div>
    @else
    <div class="w-10 h-10 {{ $color }} rounded flex items-center justify-center text-xl mr-3">{{ $icon }}</div>
    <div class="flex-1 min-w-0">
        <div class="text-sm font-semibold truncate">{{ $title }}</div>
    </div>
    <div class="text-xs text-neutral-500 ml-4">{{ $date }}</div>
    @endif
</flux:card>