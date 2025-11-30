<?php $__env->startSection('title', 'Add Response Team Member'); ?>

<?php $__env->startSection('content'); ?>
<div class="section-offset">
<nav aria-label="breadcrumb" class="mb-3">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('web.response-team-members.index')); ?>">Response Team</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add</li>
  </ol>
</nav>

<div class="card">
  <div class="card-body">
    <?php
      $calamities = \App\Models\Calamity::orderBy('date_occurred','desc')->get();
      $centers = \App\Models\EvacuationCenter::orderBy('name')->get();
    ?>
    <form method="POST" action="<?php echo e(route('web.response-team-members.store')); ?>" id="rtForm">
      <?php echo csrf_field(); ?>
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Name</label>
          <input type="text" name="name" class="form-control" required value="<?php echo e(old('name')); ?>" placeholder="Enter full name">
        </div>
        <div class="col-md-6">
          <label class="form-label">Role</label>
          <input type="text" name="role" class="form-control" value="<?php echo e(old('role')); ?>" placeholder="e.g., Medic, Rescuer">
        </div>
        <div class="col-md-6">
          <label class="form-label">Calamity</label>
          <select name="calamity_id" class="form-select">
            <option value="">Unassigned</option>
            <?php $__currentLoopData = $calamities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($c->id); ?>"><?php echo e($c->calamity_name ?? ucfirst($c->calamity_type)); ?> <?php echo e($c->date_occurred ? '• '.$c->date_occurred->format('Y-m-d') : ''); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
        <div class="col-md-6">
          <label class="form-label">Evacuation Center</label>
          <select name="evacuation_center_id" class="form-select">
            <option value="">Unassigned</option>
            <?php $__currentLoopData = $centers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($ec->id); ?>"><?php echo e($ec->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
        <div class="col-12">
          <label class="form-label">Skills (comma-separated)</label>
          <input type="text" name="skills_text" class="form-control" placeholder="First aid, Search and rescue, Logistics" value="<?php echo e(old('skills_text')); ?>">
        </div>
        <div class="col-12">
          <label class="form-label">Assignment Notes</label>
          <textarea name="assignment_notes" rows="3" class="form-control" placeholder="Details about assignment..."><?php echo e(old('assignment_notes')); ?></textarea>
        </div>
      </div>
      <div class="mt-4 d-flex justify-content-end gap-2">
        <a href="<?php echo e(route('web.response-team-members.index')); ?>" class="btn btn-secondary">Cancel</a>
        <button class="btn btn-primary" type="submit">Save</button>
      </div>
    </form>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views\calamity\response_team\create.blade.php ENDPATH**/ ?>