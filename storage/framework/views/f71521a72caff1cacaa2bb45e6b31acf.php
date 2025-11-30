<?php $__env->startSection('title', 'Incident Details'); ?>

<?php $__env->startSection('content'); ?>
<div class="section-offset">
<nav aria-label="breadcrumb" class="mb-3">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('calamities.index')); ?>">Calamity Incidents</a></li>
    <li class="breadcrumb-item active" aria-current="page">Details</li>
  </ol>
</nav>

<div class="card mb-4">
  <div class="card-body">
    <div class="row g-3">
      <div class="col-md-4"><div class="fw-semibold">Name</div><div><?php echo e($calamity->calamity_name); ?></div></div>
      <div class="col-md-4"><div class="fw-semibold">Type</div><div><span class="badge bg-info"><?php echo e(ucfirst($calamity->calamity_type)); ?></span></div></div>
      <div class="col-md-4"><div class="fw-semibold">Status</div><div><span class="badge bg-<?php echo e($calamity->status==='ongoing'?'warning':($calamity->status==='resolved'?'success':'secondary')); ?>"><?php echo e(ucfirst($calamity->status)); ?></span></div></div>
      <div class="col-md-4"><div class="fw-semibold">Date</div><div><?php echo e($calamity->date_occurred?->format('Y-m-d')); ?></div></div>
      <div class="col-md-4"><div class="fw-semibold">Time</div><div><?php echo e($calamity->occurred_time); ?></div></div>
      <div class="col-md-4"><div class="fw-semibold">Severity</div><div><?php $sev=$calamity->severity ?? $calamity->severity_level; $color=$sev==='severe'||$sev==='catastrophic'?'danger':($sev==='moderate'?'warning':'success'); ?> <span class="badge bg-<?php echo e($color); ?>"><?php echo e(ucfirst($sev)); ?></span></div></div>
      <div class="col-md-6"><div class="fw-semibold">Affected Areas</div><div><?php echo e($calamity->affected_areas); ?></div></div>
      <div class="col-md-6"><div class="fw-semibold">Description</div><div><?php echo e($calamity->description); ?></div></div>
    </div>
  </div>
</div>

<?php if($calamity->affectedHouseholds?->count()): ?>
<div class="card">
  <div class="card-header bg-light">Affected Households</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-hover">
        <thead class="table-light">
          <tr>
            <th>Household</th>
            <th>Damage Level</th>
            <th>Casualties</th>
            <th>Injured</th>
            <th>Missing</th>
            <th>Relief Received</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $calamity->affectedHouseholds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e(optional($ah->household)->household_id); ?></td>
            <td><span class="badge bg-<?php echo e(in_array($ah->damage_level,['severe','total'])?'danger':($ah->damage_level==='moderate'?'warning':'success')); ?>"><?php echo e(ucfirst($ah->damage_level)); ?></span></td>
            <td><span class="badge bg-danger"><?php echo e($ah->casualties); ?></span></td>
            <td><span class="badge bg-warning"><?php echo e($ah->injured); ?></span></td>
            <td><span class="badge bg-secondary"><?php echo e($ah->missing); ?></span></td>
            <td><span class="badge bg-<?php echo e($ah->relief_received?'success':'secondary'); ?>"><?php echo e($ah->relief_received?'Yes':'No'); ?></span></td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
 </div>
<?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views\calamity\incidents\show.blade.php ENDPATH**/ ?>