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
            <a href="<?php echo e(route('sales.index')); ?>">
                <svg class="inline-block w-6 h-6 text-blue-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4l-8 8 8 8" />
                </svg>
            </a>
            <?php echo e(__('Editar Venda')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="<?php echo e(route('sales.update', $sale->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <!-- Cliente -->
                        <div class="mb-4">
                            <label for="client_id" class="block text-sm font-semibold text-gray-700"><?php echo e(__('Cliente')); ?></label>
                            <select name="client_id" id="client_id" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($client->id); ?>" <?php echo e($sale->client_id == $client->id ? 'selected' : ''); ?>>
                                    <?php echo e($client->name); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <!-- Produtos e Quantidade -->
                        <div class="mb-4">
                            <label for="products" class="block text-sm font-semibold text-gray-700"><?php echo e(__('Produtos')); ?></label>
                            <div class="space-y-4">
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="flex items-center space-x-2">
                                    <input type="checkbox" name="products[]" value="<?php echo e($product->id); ?>"
                                        <?php echo e($sale->products->contains($product->id) ? 'checked' : ''); ?>>
                                    <span class="text-gray-700"><?php echo e($product->name); ?> - R$ <?php echo e(number_format($product->price, 2, ',', '.')); ?></span>
                                    <input type="number" name="quantities[<?php echo e($product->id); ?>]" min="1" value="<?php echo e(old('quantities.' . $product->id, 1)); ?>" class="w-16 border-gray-300 rounded-md shadow-sm">
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <!-- Valor Total -->
                        <div class="mb-4">
                            <label for="total_amount" class="block text-sm font-semibold text-gray-700"><?php echo e(__('Valor Total')); ?></label>
                            <input type="text" name="total_amount" id="total_amount" value="<?php echo e(old('total_amount', $sale->total_amount)); ?>" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" readonly>
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-semibold text-gray-700"><?php echo e(__('Status')); ?></label>
                            <select name="status" id="status" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="pending" <?php echo e($sale->status == 'pending' ? 'selected' : ''); ?>>Pendente</option>
                                <option value="completed" <?php echo e($sale->status == 'completed' ? 'selected' : ''); ?>>Concluída</option>
                                <option value="cancelled" <?php echo e($sale->status == 'cancelled' ? 'selected' : ''); ?>>Cancelada</option>
                            </select>
                        </div>

                        <!-- Botões -->
                        <div class="flex justify-end space-x-4">
                            <a href="<?php echo e(route('sales.index')); ?>" class="bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600">
                                <?php echo e(__('Cancelar')); ?>

                            </a>
                            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">
                                <?php echo e(__('Salvar Alterações')); ?>

                            </button>
                        </div>
                    </form>
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
<?php endif; ?><?php /**PATH /home/ryan/Projects/nota-fiscal-facil/resources/views/sales/edit.blade.php ENDPATH**/ ?>