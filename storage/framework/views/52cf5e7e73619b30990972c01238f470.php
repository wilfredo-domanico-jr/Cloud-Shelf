<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
'sortBy' => 'name',
'view' => 'grid'
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
'sortBy' => 'name',
'view' => 'grid'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="flex items-center justify-between py-3">
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
            <span class="capitalize"><?php echo e($sortBy); ?></span>
        </button>

        <div class="flex rounded-lg border border-neutral-200 dark:border-neutral-700 overflow-hidden">
            <button wire:click="setView('grid')"
                class="cursor-pointer p-2 <?php echo e($view === 'grid' ? 'bg-neutral-100 dark:bg-zinc-800 text-blue-600 dark:text-blue-400' : ''); ?>">
                <svg width="13" height="13" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M1 1h6v6H1zm8 0h6v6H9zM1 9h6v6H1zm8 0h6v6H9z" />
                </svg>
            </button>

            <button wire:click="setView('list')"
                class="cursor-pointer p-2 <?php echo e($view === 'list' ? 'bg-neutral-100 dark:bg-zinc-800 text-blue-600' : ''); ?>">
                <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <line x1="3" y1="6" x2="21" y2="6" />
                    <line x1="3" y1="12" x2="21" y2="12" />
                    <line x1="3" y1="18" x2="21" y2="18" />
                </svg>
            </button>
        </div>
    </div>
</div><?php /**PATH D:\Programming_Application\xampp8.2.2\htdocs\CloudShelf\resources\views/components/my-drive/toolbar.blade.php ENDPATH**/ ?>