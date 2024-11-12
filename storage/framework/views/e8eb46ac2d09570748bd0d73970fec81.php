<!-- resources/views/sales/create.blade.php -->

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
            <?php echo e(__('Registrar Venda')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="<?php echo e(route('sales.store')); ?>">
                    <?php echo csrf_field(); ?>

                    <!-- Selecionar Cliente -->
                    <div class="mb-4">
                        <label for="client_id" class="block text-gray-700"><?php echo e(__('Cliente')); ?></label>
                        <select name="client_id" id="client_id" class="w-full p-2 border rounded-md">
                            <option value="" disabled selected>Selecione um cliente</option>
                            <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($client->id); ?>"><?php echo e($client->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <!-- Selecionar Produtos -->
                    <div class="mb-4">
                        <label for="products" class="block text-gray-700"><?php echo e(__('Produtos')); ?></label>
                        <div id="product-list">
                            <div class="mb-2">
                                <select name="products[0][id]" class="product-select w-full p-2 border rounded-md" required>
                                    <option value="" disabled selected>Selecione um produto</option>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?> - R$ <?php echo e(number_format($product->price, 2, ',', '.')); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <input type="number" name="products[0][quantity]" placeholder="Quantidade" class="w-full p-2 border rounded-md mt-2" required>
                            </div>
                        </div>
                        <button type="button" id="add-product" class="mt-2 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Adicionar Produto</button>
                    </div>

                    <!-- Botão de Submissão -->
                    <div class="mt-6">
                        <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600">Registrar Venda</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('add-product').addEventListener('click', function() {
            const productCount = document.querySelectorAll('.product-select').length;
            const newProductDiv = document.createElement('div');
            newProductDiv.classList.add('mb-2');
            newProductDiv.classList.add('product-item');
            newProductDiv.innerHTML = `
        <select name="products[${productCount}][id]" class="product-select w-full p-2 border rounded-md" required>
            <option value="" disabled selected>Selecione um produto</option>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?> - R$ <?php echo e(number_format($product->price, 2, ',', '.')); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <input type="number" name="products[${productCount}][quantity]" placeholder="Quantidade" class="w-full p-2 border rounded-md mt-2" required>
        <button type="button" class="remove-product mt-2 p-2 bg-red-500 text-white rounded-md">Remover</button>
    `;

            // Adiciona o novo produto à lista de produtos
            const productList = document.getElementById('product-list');
            productList.appendChild(newProductDiv);

            // Adiciona o evento de remoção do produto
            newProductDiv.querySelector('.remove-product').addEventListener('click', function() {
                newProductDiv.remove();
            });
        });
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH /home/ryan/Projects/nota-fiscal-facil/resources/views/sales/create.blade.php ENDPATH**/ ?>