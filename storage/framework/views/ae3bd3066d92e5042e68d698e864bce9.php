<?php $__env->startSection('title', 'Add Damage Assessment'); ?>

<?php $__env->startSection('content'); ?>
<div class="section-offset">
<nav aria-label="breadcrumb" class="mb-3">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('web.damage-assessments.index')); ?>">Damage Assessment</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add</li>
  </ol>
</nav>

<div class="card">
  <div class="card-body">
    <form method="POST" action="<?php echo e(route('web.damage-assessments.store')); ?>" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Calamity</label>
          <select name="calamity_id" class="form-select" required>
            <option value="">Select Calamity</option>
            <?php $__currentLoopData = $calamities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($c->id); ?>" <?php echo e(old('calamity_id') == $c->id ? 'selected' : ''); ?>>
                <?php echo e($c->calamity_name); ?>

              </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
        <div class="col-md-6">
          <label class="form-label">Household</label>
          <select name="household_id" class="form-select">
            <option value="">Select Household (optional)</option>
            <?php $__currentLoopData = $households; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($h->id); ?>" <?php echo e(old('household_id') == $h->id ? 'selected' : ''); ?>>
                <?php echo e($h->household_id); ?> <?php echo e($h->purok ? ' - Purok '.$h->purok : ''); ?>

              </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label">Damage Level</label>
          <select name="damage_level" class="form-select" required>
            <option value="minor">Minor</option>
            <option value="moderate">Moderate</option>
            <option value="severe">Severe</option>
            <option value="total">Total</option>
          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label">Estimated Cost</label>
          <input type="number" step="0.01" name="estimated_cost" class="form-control" value="<?php echo e(old('estimated_cost')); ?>">
        </div>
        <div class="col-md-4">
          <label class="form-label">Assessed At</label>
          <input type="date" name="assessed_at" class="form-control" value="<?php echo e(old('assessed_at')); ?>">
        </div>
        <div class="col-12">
          <label class="form-label">Description</label>
          <textarea name="description" class="form-control" rows="4"><?php echo e(old('description')); ?></textarea>
        </div>
        <div class="col-12">
          <label class="form-label">Photo</label>
          <input type="file" name="photo_path" class="form-control">
        </div>
      </div>
      <div class="mt-4 d-flex justify-content-end gap-2">
        <a href="<?php echo e(route('web.damage-assessments.index')); ?>" class="btn btn-secondary">Cancel</a>
        <button class="btn btn-primary" type="submit">Submit</button>
      </div>
    </form>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
  function ensureDownward(el) {
    var rect = el.getBoundingClientRect();
    var vh = window.innerHeight || document.documentElement.clientHeight;
    var needed = 280;
    var gap = vh - rect.bottom;
    if (gap < needed) {
      window.scrollBy({ top: (needed - gap) + 20, behavior: 'smooth' });
    }
  }
  document.querySelectorAll('.form-select').forEach(function(el){
    ['focus','mousedown'].forEach(function(ev){
      el.addEventListener(ev, function(){ ensureDownward(el); });
    });
  });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views/calamity/damage/create.blade.php ENDPATH**/ ?>