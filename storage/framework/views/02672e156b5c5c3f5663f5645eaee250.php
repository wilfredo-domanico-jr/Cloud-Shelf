<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

?>

<section class="w-full p-6">

    <?php if (isset($component)) { $__componentOriginal7b14f722614ca4623a22488345de18f2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b14f722614ca4623a22488345de18f2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.my-drive.toolbar','data' => ['sortBy' => $sortBy,'view' => $view]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('my-drive.toolbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sortBy' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sortBy),'view' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($view)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7b14f722614ca4623a22488345de18f2)): ?>
<?php $attributes = $__attributesOriginal7b14f722614ca4623a22488345de18f2; ?>
<?php unset($__attributesOriginal7b14f722614ca4623a22488345de18f2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7b14f722614ca4623a22488345de18f2)): ?>
<?php $component = $__componentOriginal7b14f722614ca4623a22488345de18f2; ?>
<?php unset($__componentOriginal7b14f722614ca4623a22488345de18f2); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal37e39418b05e6905faa00002cbd0a556 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal37e39418b05e6905faa00002cbd0a556 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.my-drive.file-section','data' => ['title' => 'FOLDERS','items' => $folders,'emojis' => ['folder' => '📂'],'colors' => ['folder' => 'bg-yellow-200'],'view' => $view]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('my-drive.file-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'FOLDERS','items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($folders),'emojis' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['folder' => '📂']),'colors' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['folder' => 'bg-yellow-200']),'view' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($view)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal37e39418b05e6905faa00002cbd0a556)): ?>
<?php $attributes = $__attributesOriginal37e39418b05e6905faa00002cbd0a556; ?>
<?php unset($__attributesOriginal37e39418b05e6905faa00002cbd0a556); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal37e39418b05e6905faa00002cbd0a556)): ?>
<?php $component = $__componentOriginal37e39418b05e6905faa00002cbd0a556; ?>
<?php unset($__componentOriginal37e39418b05e6905faa00002cbd0a556); ?>
<?php endif; ?>

    <div class="my-8"></div>

    <?php if (isset($component)) { $__componentOriginal37e39418b05e6905faa00002cbd0a556 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal37e39418b05e6905faa00002cbd0a556 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.my-drive.file-section','data' => ['title' => 'FILES','items' => $onlyFiles,'emojis' => $emojis,'colors' => $colors,'view' => $view]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('my-drive.file-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'FILES','items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($onlyFiles),'emojis' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($emojis),'colors' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($colors),'view' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($view)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal37e39418b05e6905faa00002cbd0a556)): ?>
<?php $attributes = $__attributesOriginal37e39418b05e6905faa00002cbd0a556; ?>
<?php unset($__attributesOriginal37e39418b05e6905faa00002cbd0a556); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal37e39418b05e6905faa00002cbd0a556)): ?>
<?php $component = $__componentOriginal37e39418b05e6905faa00002cbd0a556; ?>
<?php unset($__componentOriginal37e39418b05e6905faa00002cbd0a556); ?>
<?php endif; ?>
</section><?php /**PATH D:\Programming_Application\xampp8.2.2\htdocs\CloudShelf\resources\views\livewire/my-drive/drive-files.blade.php ENDPATH**/ ?>