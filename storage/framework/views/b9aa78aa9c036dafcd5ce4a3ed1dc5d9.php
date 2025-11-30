<?php $__env->startSection('title', 'Assessment Details'); ?>

<?php $__env->startSection('content'); ?>
<div class="section-offset">
<nav aria-label="breadcrumb" class="mb-3">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('damage-assessments.index')); ?>">Damage Assessment</a></li>
    <li class="breadcrumb-item active" aria-current="page">Details</li>
  </ol>
</nav>

<div class="card">
  <div class="card-body">
    <div class="row g-3">
      <div class="col-md-4"><div class="fw-semibold">Calamity</div><div><?php echo e(optional($damage_assessment->calamity)->calamity_name); ?></div></div>
      <div class="col-md-4"><div class="fw-semibold">Household</div><div><?php echo e(optional($damage_assessment->household)->household_id); ?></div></div>
      <div class="col-md-4"><div class="fw-semibold">Damage Level</div><div><span class="badge bg-<?php echo e(in_array($damage_assessment->damage_level,['severe','total'])?'danger':($damage_assessment->damage_level==='moderate'?'warning':'success')); ?>"><?php echo e(ucfirst($damage_assessment->damage_level)); ?></span></div></div>
      <div class="col-md-4"><div class="fw-semibold">Estimated Cost</div><div><span class="badge bg-info"><?php echo e(number_format($damage_assessment->estimated_cost,2)); ?></span></div></div>
      <div class="col-md-4"><div class="fw-semibold">Assessed At</div><div><?php echo e(optional($damage_assessment->assessed_at)->format('Y-m-d')); ?></div></div>
      <div class="col-md-4"><div class="fw-semibold">Assessor</div><div><?php echo e(optional($damage_assessment->assessor)->name); ?></div></div>
      <div class="col-12"><div class="fw-semibold">Description</div><div><?php echo e($damage_assessment->description); ?></div></div>
    </div>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views\calamity\damage\show.blade.php ENDPATH**/ ?>