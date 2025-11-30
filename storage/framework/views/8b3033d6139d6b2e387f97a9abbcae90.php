<?php $__env->startSection('title', 'Add Notification'); ?>

<?php $__env->startSection('content'); ?>
<div class="section-offset">
<nav aria-label="breadcrumb" class="mb-3">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('web.notifications.index')); ?>">Notifications</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add</li>
  </ol>
</nav>

<div class="card">
  <div class="card-body">
    <form method="POST" action="<?php echo e(route('web.notifications.store')); ?>" id="notificationForm">
      <?php echo csrf_field(); ?>
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Title</label>
          <input type="text" name="title" class="form-control" required value="<?php echo e(old('title')); ?>" placeholder="Enter notification title">
        </div>
        <div class="col-md-6">
          <label class="form-label">Type</label>
          <select name="type" class="form-select" required>
            <option value="" disabled <?php echo e(old('type') ? '' : 'selected'); ?>>Select type</option>
            <option value="sms" <?php echo e(old('type')==='sms' ? 'selected' : ''); ?>>SMS</option>
            <option value="email" <?php echo e(old('type')==='email' ? 'selected' : ''); ?>>Email</option>
            <option value="system" <?php echo e(old('type')==='system' ? 'selected' : ''); ?>>System</option>
          </select>
        </div>
        <div class="col-12">
          <label class="form-label">Message</label>
          <textarea name="message" class="form-control" rows="4" placeholder="Write notification message"><?php echo e(old('message')); ?></textarea>
        </div>
        <div class="col-md-6">
          <label class="form-label">Target</label>
          <select name="target" id="target" class="form-select">
            <option value="" disabled <?php echo e(old('target') ? '' : 'selected'); ?>>Select target</option>
            <option value="Barangay Wide" <?php echo e(old('target')==='Barangay Wide' ? 'selected' : ''); ?>>Barangay Wide</option>
            <?php for($i=1;$i<=10;$i++): ?>
              <option value="Purok <?php echo e($i); ?>" <?php echo e(old('target')==="Purok $i" ? 'selected' : ''); ?>>Purok <?php echo e($i); ?></option>
            <?php endfor; ?>
          </select>
        </div>
        <div class="col-md-6">
          <label class="form-label">Calamity</label>
          <select name="calamity_id" id="calamity_id" class="form-select">
            <option value="">Select Calamity</option>
            <?php if(isset($calamities) && $calamities->count()): ?>
              <?php $__currentLoopData = $calamities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($c->id); ?>" <?php echo e(old('calamity_id')==$c->id ? 'selected' : ''); ?>>
                  <?php echo e($c->calamity_name ?? ucfirst($c->calamity_type) ?? 'Calamity #'.$c->id); ?>

                  <?php echo e($c->date_occurred ? ' • '.$c->date_occurred->format('Y-m-d') : ''); ?>

                  <?php echo e($c->severity_level ? ' • '.$c->severity_level : ''); ?>

                  <?php echo e($c->status ? ' • '.$c->status : ''); ?>

                </option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
              <option value="" disabled>No calamities found</option>
            <?php endif; ?>
          </select>
        </div>
      </div>
      <div class="mt-4 d-flex justify-content-end gap-2">
        <a href="<?php echo e(route('web.notifications.index')); ?>" class="btn btn-secondary">Cancel</a>
        <button class="btn btn-primary" type="submit">Submit</button>
      </div>
    </form>
  </div>
</div>
</div>
<script>
// No JS population needed; calamities are rendered server-side
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views\calamity\notifications\create.blade.php ENDPATH**/ ?>