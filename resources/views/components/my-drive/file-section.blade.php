@props(['title', 'items', 'emojis', 'colors', 'view' => 'grid'])

<div class="mt-6">
    <div class="flex items-center justify-between mb-4 py-3 border-b border-neutral-200 dark:border-zinc-700">
        <div class="text-xs font-bold text-neutral-400 tracking-widest uppercase">{{ $title }}</div>
    </div>

    {{-- DYNAMIC GRID CLASSES --}}
    <div @class([ 'grid gap-4' , 'grid-cols-[repeat(auto-fill,minmax(12rem,1fr))]'=> $view === 'grid',
        'grid-cols-1' => $view === 'list',
        ])>
        @foreach ($items as $item)
        <x-my-drive.file-card
            :view="$view"
            :title="$item['name']"
            :date="$item['modified']"
            :color="$colors[$item['type']] ?? 'bg-neutral-100'"
            :icon="$emojis[$item['type']] ?? '📄'" />
        @endforeach
    </div>
</div>