<?php $__env->startSection('title', 'Edit Evacuation Center'); ?>

<?php $__env->startSection('content'); ?>
<div class="section-offset">
<nav aria-label="breadcrumb" class="mb-3">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('evacuation-centers.index')); ?>">Evacuation Centers</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
  </ol>
</nav>

<div class="card">
  <div class="card-body">
    <form method="POST" action="<?php echo e(route('evacuation-centers.update', $evacuation_center)); ?>">
      <?php echo csrf_field(); ?>
      <?php echo method_field('PUT'); ?>
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Center Name</label>
          <input type="text" name="name" class="form-control" required value="<?php echo e(old('name', $evacuation_center->name)); ?>">
        </div>
        <div class="col-md-6">
          <label class="form-label">Location</label>
          <input type="text" name="location" class="form-control" value="<?php echo e(old('location', $evacuation_center->location)); ?>">
        </div>
        <div class="col-md-3">
          <label class="form-label">Capacity</label>
          <input type="number" name="capacity" class="form-control" min="0" value="<?php echo e(old('capacity', $evacuation_center->capacity)); ?>">
        </div>
        <div class="col-md-3">
          <label class="form-label">Current Occupancy</label>
          <input type="number" name="current_occupancy" class="form-control" min="0" value="<?php echo e(old('current_occupancy', $evacuation_center->current_occupancy)); ?>" placeholder="Enter current occupancy">
        </div>
        <div class="col-md-6">
          <label class="form-label">Facilities</label>
          <input type="text" name="facilities[]" class="form-control" value="" placeholder="e.g., Beds, Kitchen, Water">
        </div>
      </div>
      <div class="mt-4 d-flex justify-content-end gap-2">
        <a href="<?php echo e(route('evacuation-centers.index')); ?>" class="btn btn-secondary">Cancel</a>
        <button class="btn btn-primary" type="submit">Save</button>
      </div>
    </form>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views\calamity\evacuation_centers\edit.blade.php ENDPATH**/ ?>