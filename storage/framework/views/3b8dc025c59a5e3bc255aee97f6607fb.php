<?php $__env->startSection('title', 'Edit Affected Household'); ?>

<?php $__env->startSection('content'); ?>
<div class="section-offset">
<nav aria-label="breadcrumb" class="mb-3">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('calamity-affected-households.index')); ?>">Affected Households</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
  </ol>
</nav>

<div class="card">
  <div class="card-body">
    <?php
      $calamities = \App\Models\Calamity::orderBy('date_occurred','desc')->get();
      $households = \App\Models\Household::approved()->with('head')->orderBy('household_id')->get();
    ?>
    <form method="POST" action="<?php echo e(route('calamity-affected-households.update', $calamity_affected_household)); ?>">
      <?php echo csrf_field(); ?>
      <?php echo method_field('PUT'); ?>
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Calamity</label>
          <select name="calamity_id" class="form-select" required>
            <option value="" disabled>Select Calamity</option>
            <?php $__currentLoopData = $calamities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($c->id); ?>" <?php echo e((old('calamity_id',$calamity_affected_household->calamity_id)==$c->id)?'selected':''); ?>>
                <?php echo e($c->calamity_name ?? ucfirst($c->calamity_type)); ?> <?php echo e($c->date_occurred ? '• '.$c->date_occurred->format('Y-m-d') : ''); ?>

              </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
        <div class="col-md-6">
          <label class="form-label">Household</label>
          <select name="household_id" class="form-select" required>
            <option value="" disabled>Select Household</option>
            <?php $__currentLoopData = $households; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($hh->id); ?>" <?php echo e((old('household_id',$calamity_affected_household->household_id)==$hh->id)?'selected':''); ?>>
                <?php echo e($hh->household_id); ?> <?php echo e($hh->head?->full_name ? '• '.$hh->head->full_name : ''); ?>

              </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
        <div class="col-md-3">
          <label class="form-label">Damage Level</label>
          <?php $dl = old('damage_level', $calamity_affected_household->damage_level); ?>
          <select name="damage_level" class="form-select" required>
            <option value="minor" <?php echo e($dl=='minor'?'selected':''); ?>>Minor</option>
            <option value="moderate" <?php echo e($dl=='moderate'?'selected':''); ?>>Moderate</option>
            <option value="severe" <?php echo e($dl=='severe'?'selected':''); ?>>Severe</option>
            <option value="total" <?php echo e($dl=='total'?'selected':''); ?>>Total</option>
          </select>
        </div>
        <div class="col-md-3">
          <label class="form-label">Injuries</label>
          <input type="number" name="injured" class="form-control" min="0" value="<?php echo e(old('injured', $calamity_affected_household->injured)); ?>">
        </div>
        <div class="col-md-3">
          <label class="form-label">Missing</label>
          <input type="number" name="missing" class="form-control" min="0" value="<?php echo e(old('missing', $calamity_affected_household->missing)); ?>">
        </div>
        <div class="col-md-3">
          <label class="form-label">Evacuation Status</label>
          <?php $es = old('evacuation_status', $calamity_affected_household->evacuation_status); ?>
          <select name="evacuation_status" class="form-select">
            <option value="in_home" <?php echo e($es=='in_home'?'selected':''); ?>>In Home</option>
            <option value="evacuated" <?php echo e($es=='evacuated'?'selected':''); ?>>Evacuated</option>
            <option value="returned" <?php echo e($es=='returned'?'selected':''); ?>>Returned</option>
          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label">Damage Cost</label>
          <input type="number" step="0.01" name="house_damage_cost" class="form-control" value="<?php echo e(old('house_damage_cost', $calamity_affected_household->house_damage_cost)); ?>">
        </div>
        <div class="col-md-4">
          <label class="form-label">Needs Temporary Shelter</label>
          <?php $nts = old('needs_temporary_shelter', $calamity_affected_household->needs_temporary_shelter?1:0); ?>
          <select name="needs_temporary_shelter" class="form-select">
            <option value="0" <?php echo e($nts==0?'selected':''); ?>>No</option>
            <option value="1" <?php echo e($nts==1?'selected':''); ?>>Yes</option>
          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label">Relief Received</label>
          <?php $rr = old('relief_received', $calamity_affected_household->relief_received?1:0); ?>
          <select name="relief_received" class="form-select">
            <option value="0" <?php echo e($rr==0?'selected':''); ?>>No</option>
            <option value="1" <?php echo e($rr==1?'selected':''); ?>>Yes</option>
          </select>
        </div>
        <div class="col-md-6">
          <label class="form-label">Relief Items</label>
          <input type="text" name="relief_items[]" class="form-control" value="">
        </div>
        <div class="col-md-6">
          <label class="form-label">Relief Date</label>
          <input type="date" name="relief_date" class="form-control" value="<?php echo e(old('relief_date', optional($calamity_affected_household->relief_date)->format('Y-m-d'))); ?>">
        </div>
        <div class="col-12">
          <label class="form-label">Needs</label>
          <textarea name="needs" class="form-control" rows="3"><?php echo e(old('needs', $calamity_affected_household->needs)); ?></textarea>
        </div>
      </div>
      <div class="mt-4 d-flex justify-content-end gap-2">
        <a href="<?php echo e(route('calamity-affected-households.index')); ?>" class="btn btn-secondary">Cancel</a>
        <button class="btn btn-primary" type="submit">Save</button>
      </div>
    </form>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views\calamity\affected\edit.blade.php ENDPATH**/ ?>