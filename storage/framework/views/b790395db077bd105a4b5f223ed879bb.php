<?php $__env->startSection('title', 'Edit Damage Assessment'); ?>

<?php $__env->startSection('content'); ?>
<div class="section-offset">
<nav aria-label="breadcrumb" class="mb-3">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('damage-assessments.index')); ?>">Damage Assessment</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
  </ol>
</nav>

<div class="card">
  <div class="card-body">
    <form method="POST" action="<?php echo e(route('damage-assessments.update', $damage_assessment)); ?>" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
      <?php echo method_field('PUT'); ?>
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Calamity</label>
          <select name="calamity_id" class="form-select" required></select>
        </div>
        <div class="col-md-6">
          <label class="form-label">Household</label>
          <select name="household_id" class="form-select"></select>
        </div>
        <div class="col-md-4">
          <label class="form-label">Damage Level</label>
          <?php $dl = old('damage_level', $damage_assessment->damage_level); ?>
          <select name="damage_level" class="form-select" required>
            <option value="minor" <?php echo e($dl=='minor'?'selected':''); ?>>Minor</option>
            <option value="moderate" <?php echo e($dl=='moderate'?'selected':''); ?>>Moderate</option>
            <option value="severe" <?php echo e($dl=='severe'?'selected':''); ?>>Severe</option>
            <option value="total" <?php echo e($dl=='total'?'selected':''); ?>>Total</option>
          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label">Estimated Cost</label>
          <input type="number" step="0.01" name="estimated_cost" class="form-control" value="<?php echo e(old('estimated_cost', $damage_assessment->estimated_cost)); ?>">
        </div>
        <div class="col-md-4">
          <label class="form-label">Assessed At</label>
          <input type="date" name="assessed_at" class="form-control" value="<?php echo e(old('assessed_at', optional($damage_assessment->assessed_at)->format('Y-m-d'))); ?>">
        </div>
        <div class="col-12">
          <label class="form-label">Description</label>
          <textarea name="description" class="form-control" rows="4"><?php echo e(old('description', $damage_assessment->description)); ?></textarea>
        </div>
        <div class="col-12">
          <label class="form-label">Photo</label>
          <input type="file" name="photo_path" class="form-control">
        </div>
      </div>
      <div class="mt-4 d-flex justify-content-end gap-2">
        <a href="<?php echo e(route('damage-assessments.index')); ?>" class="btn btn-secondary">Cancel</a>
        <button class="btn btn-primary" type="submit">Save</button>
      </div>
    </form>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views\calamity\damage\edit.blade.php ENDPATH**/ ?>