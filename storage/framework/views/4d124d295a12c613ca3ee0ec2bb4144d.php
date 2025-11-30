<?php $__env->startSection('title', 'Edit Notification'); ?>

<?php $__env->startSection('content'); ?>
<div class="section-offset">
<nav aria-label="breadcrumb" class="mb-3">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('web.notifications.index')); ?>">Notifications</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
  </ol>
</nav>

<div class="card">
  <div class="card-body">
    <form method="POST" action="<?php echo e(route('web.notifications.update', $notification)); ?>">
      <?php echo csrf_field(); ?>
      <?php echo method_field('PUT'); ?>
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Title</label>
          <input type="text" name="title" class="form-control" required value="<?php echo e(old('title', $notification->title)); ?>">
        </div>
        <div class="col-md-6">
          <label class="form-label">Type</label>
          <?php $type = old('type', $notification->type); ?>
          <select name="type" class="form-select" required>
            <option value="sms" <?php echo e($type=='sms'?'selected':''); ?>>SMS</option>
            <option value="email" <?php echo e($type=='email'?'selected':''); ?>>Email</option>
            <option value="system" <?php echo e($type=='system'?'selected':''); ?>>System</option>
          </select>
        </div>
        <div class="col-12">
          <label class="form-label">Message</label>
          <textarea name="message" class="form-control" rows="4"><?php echo e(old('message', $notification->message)); ?></textarea>
        </div>
        <div class="col-md-6">
          <label class="form-label">Target</label>
          <input type="text" name="target" class="form-control" placeholder="Purok / Household / General" value="<?php echo e(old('target')); ?>">
        </div>
        <div class="col-md-6">
          <label class="form-label">Calamity</label>
          <select name="calamity_id" class="form-select">
            <option value="">Select Calamity</option>
            <?php $__currentLoopData = $calamities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($c->id); ?>" <?php echo e((old('calamity_id', $notification->calamity_id)==$c->id)?'selected':''); ?>>
                <?php echo e($c->calamity_name ?? ucfirst($c->calamity_type)); ?>

                <?php echo e($c->date_occurred ? ' • '.$c->date_occurred->format('Y-m-d') : ''); ?>

                <?php echo e($c->severity_level ? ' • '.$c->severity_level : ''); ?>

              </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
      </div>
      <div class="mt-4 d-flex justify-content-end gap-2">
        <a href="<?php echo e(route('web.notifications.index')); ?>" class="btn btn-secondary">Cancel</a>
        <button class="btn btn-primary" type="submit">Save</button>
      </div>
    </form>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views\calamity\notifications\edit.blade.php ENDPATH**/ ?>