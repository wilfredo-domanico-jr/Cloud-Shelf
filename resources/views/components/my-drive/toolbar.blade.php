@props([
'sortBy' => 'name',
'view' => 'grid'
])

<div class="flex items-center justify-between py-3 bg-white dark:bg-zinc-900">
    <div class="flex items-center gap-2 text-sm text-neutral-600 dark:text-neutral-300">
        <a href="#" class="hover:underline" cursor-pointer>My Drive</a>
    </div>

    <div class="flex items-center gap-2">
        <button wire:click="toggleSort" class="cursor-pointer flex items-center gap-2 px-3 py-1.5 rounded-lg border border-neutral-200 dark:border-neutral-700 hover:bg-neutral-50 dark:hover:bg-zinc-800 text-sm">
            <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <line x1="3" y1="6" x2="21" y2="6" />
                <line x1="3" y1="12" x2="15" y2="12" />
                <line x1="3" y1="18" x2="9" y2="18" />
            </svg>
            <span class="capitalize">{{ $sortBy }}</span>
        </button>

        <div class="flex rounded-lg border border-neutral-200 dark:border-neutral-700 overflow-hidden">
            <button wire:click="setView('grid')"
                class="cursor-pointer p-2 {{ $view === 'grid' ? 'bg-neutral-100 dark:bg-zinc-800 text-blue-600' : '' }}">
                <svg width="13" height="13" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M1 1h6v6H1zm8 0h6v6H9zM1 9h6v6H1zm8 0h6v6H9z" />
                </svg>
            </button>

            <button wire:click="setView('list')"
                class="cursor-pointer p-2 {{ $view === 'list' ? 'bg-neutral-100 dark:bg-zinc-800 text-blue-600' : '' }}">
                <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <line x1="3" y1="6" x2="21" y2="6" />
                    <line x1="3" y1="12" x2="21" y2="12" />
                    <line x1="3" y1="18" x2="21" y2="18" />
                </svg>
            </button>
        </div>
    </div>
</div>