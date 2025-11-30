<?php $__env->startSection('title', 'Item Details'); ?>

<?php $__env->startSection('content'); ?>
<div class="section-offset">
<nav aria-label="breadcrumb" class="mb-3">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('web.relief-items.index')); ?>">Relief Inventory</a></li>
    <li class="breadcrumb-item active" aria-current="page">Details</li>
  </ol>
</nav>

<div class="card">
  <div class="card-body">
    <div class="row g-3">
      <div class="col-md-4"><div class="fw-semibold">Item</div><div><?php echo e($relief_item->name); ?></div></div>
      <div class="col-md-4"><div class="fw-semibold">Category</div><div><span class="badge bg-info"><?php echo e(ucfirst($relief_item->category)); ?></span></div></div>
      <div class="col-md-4"><div class="fw-semibold">Quantity</div><div><span class="badge bg-success"><?php echo e($relief_item->quantity); ?></span></div></div>
    </div>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views\calamity\relief_items\show.blade.php ENDPATH**/ ?>