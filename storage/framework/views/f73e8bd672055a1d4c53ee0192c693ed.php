<?php $__env->startSection('title', 'Add Evacuation Center'); ?>

<?php $__env->startSection('content'); ?>
<div class="section-offset">
<nav aria-label="breadcrumb" class="mb-3">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('evacuation-centers.index')); ?>">Evacuation Centers</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add</li>
  </ol>
</nav>

<div class="card">
  <div class="card-body">
    <form method="POST" action="<?php echo e(route('evacuation-centers.store')); ?>">
      <?php echo csrf_field(); ?>
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Center Name</label>
          <input type="text" name="name" class="form-control" required value="<?php echo e(old('name')); ?>">
        </div>
        <div class="col-md-6">
          <label class="form-label">Location</label>
          <input type="text" name="location" class="form-control" value="<?php echo e(old('location')); ?>">
        </div>
        <div class="col-md-3">
          <label class="form-label">Capacity</label>
          <input type="number" name="capacity" class="form-control" min="0" value="<?php echo e(old('capacity')); ?>">
        </div>
        <div class="col-md-3">
          <label class="form-label">Current Occupancy</label>
          <input type="number" name="current_occupancy" class="form-control" min="0" value="<?php echo e(old('current_occupancy')); ?>">
        </div>
        <div class="col-md-6">
          <label class="form-label">Facilities</label>
          <div class="d-flex flex-wrap gap-2">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="facilities[]" value="Power" id="fac_power">
              <label class="form-check-label" for="fac_power">Power</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="facilities[]" value="Water" id="fac_water">
              <label class="form-check-label" for="fac_water">Water</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="facilities[]" value="Medical" id="fac_med">
              <label class="form-check-label" for="fac_med">Medical</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="facilities[]" value="Sanitation" id="fac_san">
              <label class="form-check-label" for="fac_san">Sanitation</label>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-4 d-flex justify-content-end gap-2">
        <a href="<?php echo e(route('evacuation-centers.index')); ?>" class="btn btn-secondary">Cancel</a>
        <button class="btn btn-primary" type="submit">Submit</button>
      </div>
    </form>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views\calamity\evacuation_centers\create.blade.php ENDPATH**/ ?>