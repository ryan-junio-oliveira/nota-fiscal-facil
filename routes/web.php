<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NFeController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // NFe Routes
    Route::get('nfe', [NFeController::class, 'index'])->name('nfe.index');
    Route::get('nfe/create', [NFeController::class, 'create'])->name('nfe.create');
    Route::post('nfe', [NFeController::class, 'store'])->name('nfe.store');
    Route::get('nfe/{nfe}', [NFeController::class, 'show'])->name('nfe.show');
    Route::get('nfe/{nfe}/edit', [NFeController::class, 'edit'])->name('nfe.edit');
    Route::put('nfe/{nfe}', [NFeController::class, 'update'])->name('nfe.update');
    Route::delete('nfe/{nfe}', [NFeController::class, 'destroy'])->name('nfe.destroy');

    // Client Routes
    Route::get('clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get('clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('clients', [ClientController::class, 'store'])->name('clients.store');
    Route::get('clients/{client}', [ClientController::class, 'show'])->name('clients.show');
    Route::get('clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('clients/{client}', [ClientController::class, 'update'])->name('clients.update');
    Route::delete('clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');

    // Product Routes
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('products', [ProductController::class, 'store'])->name('products.store');
    Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    // Sale Routes
    Route::get('sales/create', [SaleController::class, 'create'])->name('sales.create');
    Route::post('sales', [SaleController::class, 'store'])->name('sales.store');
    Route::get('sales', [SaleController::class, 'index'])->name('sales.index');
    Route::get('sales/{sale}', [SaleController::class, 'show'])->name('sales.show');
    Route::get('sales/{sale}/edit', [SaleController::class, 'edit'])->name('sales.edit');
    Route::put('sales/{sale}', [SaleController::class, 'update'])->name('sales.update');
    Route::delete('sales/{sale}', [SaleController::class, 'destroy'])->name('sales.destroy');
});

require __DIR__ . '/auth.php';
