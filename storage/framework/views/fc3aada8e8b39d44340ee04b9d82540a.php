<?php $__env->startSection('title', 'Add Relief Distribution'); ?>

<?php $__env->startSection('content'); ?>
<div class="section-offset">
<nav aria-label="breadcrumb" class="mb-3">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('relief-distributions.index')); ?>">Relief Distribution</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add</li>
  </ol>
</nav>

<div class="card">
  <div class="card-body">
    <form method="POST" action="<?php echo e(route('relief-distributions.store')); ?>">
      <?php echo csrf_field(); ?>
      <div class="row g-3">
        <div class="col-md-4">
          <label class="form-label">Calamity</label>
          <select name="calamity_id" class="form-select"></select>
        </div>
        <div class="col-md-4">
          <label class="form-label">Household</label>
          <select name="household_id" class="form-select" required></select>
        </div>
        <div class="col-md-4">
          <label class="form-label">Item</label>
          <select name="relief_item_id" class="form-select" required></select>
        </div>
        <div class="col-md-4">
          <label class="form-label">Quantity</label>
          <input type="number" name="quantity" class="form-control" min="1" value="<?php echo e(old('quantity')); ?>">
        </div>
        <div class="col-md-4">
          <label class="form-label">Date Distributed</label>
          <input type="date" name="distributed_at" class="form-control" value="<?php echo e(old('distributed_at')); ?>">
        </div>
        <div class="col-md-4">
          <label class="form-label">Staff</label>
          <select name="staff_in_charge" class="form-select"></select>
        </div>
      </div>
      <div class="mt-4 d-flex justify-content-end gap-2">
        <a href="<?php echo e(route('relief-distributions.index')); ?>" class="btn btn-secondary">Cancel</a>
        <button class="btn btn-primary" type="submit">Submit</button>
      </div>
    </form>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views\calamity\distributions\create.blade.php ENDPATH**/ ?>