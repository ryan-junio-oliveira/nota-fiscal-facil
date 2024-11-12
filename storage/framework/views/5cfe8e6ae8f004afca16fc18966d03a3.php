<!-- resources/views/nfe/index.blade.php -->

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
            <?php echo e(__('NF-e Lista')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <!-- Button to Edit Default Model -->
                <div class="mb-4">
                    <a href="<?php echo e(route('nfe.editXml')); ?>" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Editar modelo padrão
                    </a>
                </div>

                <!-- NF-e Table -->
                <table class="min-w-full bg-white border border-gray-200 rounded-md">
                    <thead>
                        <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Numero</th>
                            <th class="py-3 px-6 text-left">Date Emissao</th>
                            <th class="py-3 px-6 text-left">Cliente</th>
                            <th class="py-3 px-6 text-left">Valor Total</th>
                            <th class="py-3 px-6 text-left">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-sm font-light">
                        <?php $__currentLoopData = $nfes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nfe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6"><?php echo e($nfe->numero); ?></td>
                                <td class="py-3 px-6"><?php echo e($nfe->data_emissao); ?></td>
                                <td class="py-3 px-6"><?php echo e($nfe->cliente); ?></td>
                                <td class="py-3 px-6">R$ <?php echo e(number_format($nfe->valor_total, 2, ',', '.')); ?></td>
                                <td class="py-3 px-6">
                                    <a href="<?php echo e(route('nfe.show', $nfe->id)); ?>" class="text-blue-500 hover:text-blue-700">Detalhes</a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
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
<?php /**PATH /home/ryan/Projects/nota-fiscal-facil/resources/views/nfe/index.blade.php ENDPATH**/ ?>