<?php

use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return redirect('/products');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');