
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo e($theme); ?> Products</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">
  <div class="max-w-4xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4"><?php echo e($theme); ?> Products</h1>

    <p class="mb-4">
      Choose theme:
      <a href="<?php echo e(route('products.index', ['theme'=>'Gadgets'])); ?>" class="underline">Gadgets</a> |
      <a href="<?php echo e(route('products.index', ['theme'=>'Books'])); ?>" class="underline">Books</a> |
      <a href="<?php echo e(route('products.index', ['theme'=>'Movies'])); ?>" class="underline">Movies</a> |
      <a href="<?php echo e(route('products.index', ['theme'=>'Anime'])); ?>" class="underline">Anime</a> |
      <a href="<?php echo e(route('products.index', ['theme'=>'Restaurants'])); ?>" class="underline">Restaurants</a>
    </p>

    <?php if(count($products) === 0): ?>
      <p>No products found for <?php echo e($theme); ?>.</p>
    <?php else: ?>
      <div class="grid grid-cols-1 gap-4">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="bg-white p-4 rounded shadow">
            <h2 class="font-semibold text-lg"><?php echo e($p['name'] ?? 'Untitled'); ?></h2>
            <div class="text-sm text-gray-600">
              <?php $__currentLoopData = $p; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($key !== 'name'): ?>
                  <div><strong><?php echo e(ucfirst($key)); ?>:</strong> <?php echo e($value); ?></div>
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    <?php endif; ?>
  </div>
</body>
</html><?php /**PATH C:\Users\ASUS\PISTOLA_Midterm_Exam_Application\resources\views/products/index.blade.php ENDPATH**/ ?>