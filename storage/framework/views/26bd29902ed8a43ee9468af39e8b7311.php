<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['title', 'items', 'emojis', 'colors', 'view' => 'grid']));

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

foreach (array_filter((['title', 'items', 'emojis', 'colors', 'view' => 'grid']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="mt-6">
    <div class="flex items-center justify-between mb-4 py-3 border-b border-neutral-200 dark:border-zinc-700">
        <div class="text-xs font-bold text-neutral-400 tracking-widest uppercase"><?php echo e($title); ?></div>
    </div>

    
    <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([ 'grid gap-4' , 'grid-cols-[repeat(auto-fill,minmax(12rem,1fr))]'=> $view === 'grid',
        'grid-cols-1' => $view === 'list',
        ]); ?>">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal1fb8be6ae051348acb25bf356ef7d1c9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1fb8be6ae051348acb25bf356ef7d1c9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.my-drive.file-card','data' => ['view' => $view,'title' => $item['name'],'date' => $item['modified'],'color' => $colors[$item['type']] ?? 'bg-neutral-100','icon' => $emojis[$item['type']] ?? '📄']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('my-drive.file-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['view' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($view),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['name']),'date' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['modified']),'color' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($colors[$item['type']] ?? 'bg-neutral-100'),'icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($emojis[$item['type']] ?? '📄')]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1fb8be6ae051348acb25bf356ef7d1c9)): ?>
<?php $attributes = $__attributesOriginal1fb8be6ae051348acb25bf356ef7d1c9; ?>
<?php unset($__attributesOriginal1fb8be6ae051348acb25bf356ef7d1c9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1fb8be6ae051348acb25bf356ef7d1c9)): ?>
<?php $component = $__componentOriginal1fb8be6ae051348acb25bf356ef7d1c9; ?>
<?php unset($__componentOriginal1fb8be6ae051348acb25bf356ef7d1c9); ?>
<?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>
</div><?php /**PATH D:\Programming_Application\xampp8.2.2\htdocs\CloudShelf\resources\views/components/my-drive/file-section.blade.php ENDPATH**/ ?>