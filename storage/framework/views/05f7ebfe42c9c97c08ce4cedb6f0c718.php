<?php $__env->startSection('title', 'Edit Calamity Incident'); ?>

<?php $__env->startSection('content'); ?>
<div class="section-offset">
<nav aria-label="breadcrumb" class="mb-3">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('calamities.index')); ?>">Calamity Incidents</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
  </ol>
</nav>

<div class="card">
  <div class="card-body">
    <form method="POST" action="<?php echo e(route('calamities.update', $calamity)); ?>">
      <?php echo csrf_field(); ?>
      <?php echo method_field('PUT'); ?>
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Name</label>
          <input type="text" name="calamity_name" class="form-control" required value="<?php echo e(old('calamity_name', $calamity->calamity_name)); ?>">
        </div>
        <div class="col-md-6">
          <label class="form-label">Type</label>
          <select name="calamity_type" class="form-select" required>
            <?php $type = old('calamity_type', $calamity->calamity_type); ?>
            <option value="typhoon" <?php echo e($type=='typhoon'?'selected':''); ?>>Typhoon</option>
            <option value="flood" <?php echo e($type=='flood'?'selected':''); ?>>Flood</option>
            <option value="earthquake" <?php echo e($type=='earthquake'?'selected':''); ?>>Earthquake</option>
            <option value="fire" <?php echo e($type=='fire'?'selected':''); ?>>Fire</option>
            <option value="landslide" <?php echo e($type=='landslide'?'selected':''); ?>>Landslide</option>
            <option value="drought" <?php echo e($type=='drought'?'selected':''); ?>>Drought</option>
            <option value="other" <?php echo e($type=='other'?'selected':''); ?>>Other</option>
          </select>
        </div>
        <div class="col-md-3">
          <label class="form-label">Date</label>
          <input type="date" name="date_occurred" class="form-control" required value="<?php echo e(old('date_occurred', optional($calamity->date_occurred)->format('Y-m-d'))); ?>">
        </div>
        <div class="col-md-3">
          <label class="form-label">Time</label>
          <input type="time" name="occurred_time" class="form-control" value="<?php echo e(old('occurred_time', $calamity->occurred_time)); ?>">
        </div>
        <div class="col-md-3">
          <label class="form-label">Severity</label>
          <?php $sev = old('severity', $calamity->severity ?? $calamity->severity_level); ?>
          <select name="severity" class="form-select">
            <option value="minor" <?php echo e($sev=='minor'?'selected':''); ?>>Minor</option>
            <option value="moderate" <?php echo e($sev=='moderate'?'selected':''); ?>>Moderate</option>
            <option value="severe" <?php echo e($sev=='severe'?'selected':''); ?>>Severe</option>
            <option value="catastrophic" <?php echo e($sev=='catastrophic'?'selected':''); ?>>Catastrophic</option>
          </select>
        </div>
        <div class="col-md-3">
          <label class="form-label">Status</label>
          <?php $status = old('status', $calamity->status); ?>
          <select name="status" class="form-select">
            <option value="ongoing" <?php echo e($status=='ongoing'?'selected':''); ?>>Ongoing</option>
            <option value="resolved" <?php echo e($status=='resolved'?'selected':''); ?>>Resolved</option>
            <option value="monitoring" <?php echo e($status=='monitoring'?'selected':''); ?>>Monitoring</option>
          </select>
        </div>
        <div class="col-md-6">
          <label class="form-label">Affected Areas</label>
          <input type="text" name="affected_areas" class="form-control" value="<?php echo e(old('affected_areas', $calamity->affected_areas)); ?>">
        </div>
        <div class="col-md-6">
          <label class="form-label">Affected Puroks</label>
          <select name="affected_puroks[]" class="form-select" multiple></select>
        </div>
        <div class="col-12">
          <label class="form-label">Description</label>
          <textarea name="description" class="form-control" rows="4"><?php echo e(old('description', $calamity->description)); ?></textarea>
        </div>
        <div class="col-12">
          <label class="form-label">Response Actions</label>
          <textarea name="response_actions" class="form-control" rows="3"><?php echo e(old('response_actions', $calamity->response_actions)); ?></textarea>
        </div>
      </div>
      <div class="mt-4 d-flex justify-content-end gap-2">
        <a href="<?php echo e(route('calamities.index')); ?>" class="btn btn-secondary">Cancel</a>
        <button class="btn btn-primary" type="submit">Save</button>
      </div>
    </form>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views\calamity\incidents\edit.blade.php ENDPATH**/ ?>