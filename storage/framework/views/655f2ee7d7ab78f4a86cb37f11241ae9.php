<?php $__env->startSection('title', 'Notification Details'); ?>

<?php $__env->startSection('content'); ?>
<div class="section-offset">
<nav aria-label="breadcrumb" class="mb-3">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('web.notifications.index')); ?>">Notifications</a></li>
    <li class="breadcrumb-item active" aria-current="page">Details</li>
  </ol>
</nav>

<div class="card">
  <div class="card-body">
    <div class="row g-3">
      <div class="col-md-4"><div class="fw-semibold">Title</div><div><?php echo e($notification->title); ?></div></div>
      <div class="col-md-4"><div class="fw-semibold">Type</div><div><span class="badge bg-info"><?php echo e(strtoupper($notification->type)); ?></span></div></div>
      <div class="col-md-4"><div class="fw-semibold">Status</div><div><span class="badge bg-<?php echo e($notification->status==='sent'?'success':($notification->status==='failed'?'danger':'secondary')); ?>"><?php echo e(ucfirst($notification->status)); ?></span></div></div>
      <div class="col-md-6"><div class="fw-semibold">Message</div><div><?php echo e($notification->message); ?></div></div>
      <div class="col-md-6"><div class="fw-semibold">Calamity</div><div><?php echo e(optional($notification->calamity)->calamity_name); ?></div></div>
    </div>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views\calamity\notifications\show.blade.php ENDPATH**/ ?>