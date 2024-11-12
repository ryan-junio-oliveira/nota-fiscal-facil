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
            <a href="<?php echo e(route('dashboard')); ?>">
                <svg class="inline-block w-6 h-6 text-blue-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4l-8 8 8 8" />
                </svg>
            </a>
            <?php echo e(__('Produtos')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-semibold"><?php echo e(__('Lista de Produtos')); ?></h3>
                        <a href="<?php echo e(route('products.create')); ?>" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600"><?php echo e(__('Cadastrar Novo Produto')); ?></a>
                    </div>

                    <!-- Tabela de Produtos -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600"><?php echo e(__('Nome')); ?></th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600"><?php echo e(__('Preço')); ?></th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600"><?php echo e(__('Estoque')); ?></th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600"><?php echo e(__('Ações')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="border-b">
                                    <td class="px-4 py-2 text-sm text-gray-700"><?php echo e($product->name); ?></td>
                                    <td class="px-4 py-2 text-sm text-gray-700"><?php echo e(number_format($product->price, 2, ',', '.')); ?></td>
                                    <td class="px-4 py-2 text-sm text-gray-700"><?php echo e($product->stock); ?></td>
                                    <td class="px-4 py-2 text-sm text-gray-700 flex space-x-2">
                                        <a href="<?php echo e(route('products.show', $product->id)); ?>" class="text-blue-500 hover:text-blue-700"><?php echo e(__('Ver')); ?></a>
                                        <a href="<?php echo e(route('products.edit', $product->id)); ?>" class="text-yellow-500 hover:text-yellow-700"><?php echo e(__('Editar')); ?></a>
                                        <form action="<?php echo e(route('products.destroy', $product->id)); ?>" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este produto?')" class="inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="text-red-500 hover:text-red-700"><?php echo e(__('Excluir')); ?></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Paginação -->
                    <div class="mt-4">
                        <?php echo e($products->links()); ?>

                    </div>
                </div>
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
<?php endif; ?><?php /**PATH /home/ryan/Projects/nota-fiscal-facil/resources/views/products/index.blade.php ENDPATH**/ ?>