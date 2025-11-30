<?php $__env->startSection('title', 'Center Details'); ?>

<?php $__env->startSection('content'); ?>
<div class="section-offset">
<nav aria-label="breadcrumb" class="mb-3">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('evacuation-centers.index')); ?>">Evacuation Centers</a></li>
    <li class="breadcrumb-item active" aria-current="page">Details</li>
  </ol>
</nav>

<div class="card">
  <div class="card-body">
    <div class="row g-3">
      <div class="col-md-4"><div class="fw-semibold">Name</div><div><?php echo e($evacuation_center->name); ?></div></div>
      <div class="col-md-4"><div class="fw-semibold">Location</div><div><?php echo e($evacuation_center->location); ?></div></div>
      <div class="col-md-4"><div class="fw-semibold">Capacity</div><div><span class="badge bg-info"><?php echo e($evacuation_center->capacity); ?></span></div></div>
      <div class="col-md-4"><div class="fw-semibold">Current Occupancy</div><div><span class="badge bg-<?php echo e(($evacuation_center->current_occupancy ?? 0) > ($evacuation_center->capacity ?? 0) ? 'danger' : 'success'); ?>"><?php echo e($evacuation_center->current_occupancy); ?></span></div></div>
      <div class="col-md-8"><div class="fw-semibold">Facilities</div><div><?php echo e(is_array($evacuation_center->facilities) ? implode(', ', $evacuation_center->facilities) : $evacuation_center->facilities); ?></div></div>
    </div>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views\calamity\evacuation_centers\show.blade.php ENDPATH**/ ?>