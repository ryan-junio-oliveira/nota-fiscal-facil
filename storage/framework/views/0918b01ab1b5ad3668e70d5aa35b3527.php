<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
            <!-- Ícone ao lado do título -->
            <a href="<?php echo e(route('clients.index')); ?>">
                <svg class="inline-block w-6 h-6 text-blue-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4l-8 8 8 8" />
                </svg>
            </a>
            <?php echo e(__('Edição de Produto')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="<?php echo e(route('products.update', $product->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block font-medium text-gray-700"><?php echo e(__('Nome do Produto')); ?></label>
                            <input type="text" id="name" name="name" class="mt-1 block w-full" value="<?php echo e(old('name', $product->name)); ?>" required>
                        </div>

                        <div>
                            <label for="description" class="block font-medium text-gray-700"><?php echo e(__('Descrição')); ?></label>
                            <input type="text" id="description" name="description" class="mt-1 block w-full" value="<?php echo e(old('description', $product->description)); ?>">
                        </div>

                        <div>
                            <label for="price" class="block font-medium text-gray-700"><?php echo e(__('Preço')); ?></label>
                            <input type="number" id="price" name="price" class="mt-1 block w-full" value="<?php echo e(old('price', $product->price)); ?>" required>
                        </div>

                        <div>
                            <label for="stock" class="block font-medium text-gray-700"><?php echo e(__('Estoque')); ?></label>
                            <input type="number" id="stock" name="stock" class="mt-1 block w-full" value="<?php echo e(old('stock', $product->stock)); ?>" required>
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="bg-yellow-500 text-white py-2 px-4 rounded-lg hover:bg-yellow-600">
                            <?php echo e(__('Atualizar Produto')); ?>

                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH /home/ryan/Projects/nota-fiscal-facil/resources/views/products/edit.blade.php ENDPATH**/ ?>