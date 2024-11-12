<!-- resources/views/sales/show.blade.php -->

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
            <?php echo e(__('Detalhes da Venda')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Exibição dos Dados da Venda -->
                    <div class="space-y-4 mb-8">
                        <div class="text-lg font-semibold"><?php echo e(__('Cliente')); ?>:</div>
                        <div class="text-xl text-gray-700"><?php echo e($sale->client->name); ?></div>

                        <div class="text-lg font-semibold mt-4"><?php echo e(__('Valor Total')); ?>:</div>
                        <div class="text-gray-700">R$ <?php echo e(number_format($sale->total_amount, 2, ',', '.')); ?></div>

                        <div class="text-lg font-semibold mt-4"><?php echo e(__('Status')); ?>:</div>
                        <div class="text-gray-700"><?php echo e(ucfirst($sale->status)); ?></div>

                        <div class="text-lg font-semibold mt-4"><?php echo e(__('Produtos')); ?>:</div>
                        <ul class="text-gray-700">
                            <?php $__currentLoopData = $sale->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($product->name); ?> (<?php echo e($product->pivot->quantity); ?> x R$ <?php echo e(number_format($product->pivot->price, 2, ',', '.')); ?>)</li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>

                        <div class="text-lg font-semibold mt-4"><?php echo e(__('Data da Venda')); ?>:</div>
                        <div class="text-gray-700"><?php echo e($sale->created_at->format('d/m/Y H:i')); ?></div>
                    </div>

                    <!-- Ações -->
                    <div class="mt-6 flex justify-start space-x-4">
                        <a href="<?php echo e(route('sales.edit', $sale->id)); ?>" class="bg-yellow-500 text-white py-2 px-4 rounded-md hover:bg-yellow-600 transition duration-200 ease-in-out transform hover:scale-105">
                            <?php echo e(__('Editar Venda')); ?>

                        </a>

                        <form method="POST" action="<?php echo e(route('sales.destroy', $sale->id)); ?>" class="inline" onsubmit="return confirm('Tem certeza que deseja excluir esta venda?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600 transition duration-200 ease-in-out transform hover:scale-105">
                                <?php echo e(__('Excluir Venda')); ?>

                            </button>
                        </form>
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
<?php endif; ?>
<?php /**PATH /home/ryan/Projects/nota-fiscal-facil/resources/views/sales/show.blade.php ENDPATH**/ ?>