<?php $__env->startSection('title', 'Distribution Details'); ?>

<?php $__env->startSection('content'); ?>
<div class="section-offset">
<nav aria-label="breadcrumb" class="mb-3">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('relief-distributions.index')); ?>">Relief Distribution</a></li>
    <li class="breadcrumb-item active" aria-current="page">Details</li>
  </ol>
</nav>

<div class="card">
  <div class="card-body">
    <div class="row g-3">
      <div class="col-md-4"><div class="fw-semibold">Calamity</div><div><?php echo e(optional($relief_distribution->calamity)->calamity_name); ?></div></div>
      <div class="col-md-4"><div class="fw-semibold">Household</div><div><?php echo e(optional($relief_distribution->household)->household_id); ?></div></div>
      <div class="col-md-4"><div class="fw-semibold">Item</div><div><?php echo e(optional($relief_distribution->item)->name); ?></div></div>
      <div class="col-md-4"><div class="fw-semibold">Quantity</div><div><span class="badge bg-success"><?php echo e($relief_distribution->quantity); ?></span></div></div>
      <div class="col-md-4"><div class="fw-semibold">Date</div><div><?php echo e(optional($relief_distribution->distributed_at)->format('Y-m-d')); ?></div></div>
      <div class="col-md-4"><div class="fw-semibold">Staff</div><div><?php echo e(optional($relief_distribution->staff)->name); ?></div></div>
    </div>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views\calamity\distributions\show.blade.php ENDPATH**/ ?>