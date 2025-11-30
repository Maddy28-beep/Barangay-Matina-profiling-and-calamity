<?php $__env->startSection('title', 'Affected Households'); ?>


<?php $__env->startPush('styles'); ?>
<style>
  .affected-scope .badge { background: transparent !important; border: 0 !important; border-radius: 0 !important; padding: 0 !important; font-weight: 600; box-shadow: none !important; }
  .affected-scope .badge.bg-success { color: var(--success) !important; }
  .affected-scope .badge.bg-warning { color: var(--warning) !important; }
  .affected-scope .badge.bg-info { color: var(--info) !important; }
  .affected-scope .badge.bg-danger { color: var(--danger, #dc3545) !important; }
  .affected-scope .badge.bg-secondary { color: var(--gray-600, #6c757d) !important; }
  .affected-scope .badge.bg-light { color: #374151 !important; }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="section-offset affected-scope">
<nav aria-label="breadcrumb" class="mb-3">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Affected Households</li>
  </ol>
</nav>

<div class="d-flex justify-content-between align-items-center mb-4">
  <h2><i class="bi bi-people"></i> Affected Households</h2>
  <a href="<?php echo e(route('web.calamity-affected-households.create')); ?>" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Add New</a>
</div>

<form method="GET" action="<?php echo e(route('web.calamity-affected-households.index')); ?>" class="card mb-4">
  <div class="card-body">
    <div class="row g-3">
      <div class="col-md-4">
        <label class="form-label small">Search</label>
        <input type="text" name="search" class="form-control" placeholder="Household ID or notes" value="<?php echo e(request('search')); ?>">
      </div>
      <div class="col-md-3">
        <label class="form-label small">Damage Level</label>
        <select name="damage_level" class="form-select">
          <option value="">All</option>
          <option value="minor" <?php echo e(request('damage_level')=='minor'?'selected':''); ?>>Minor</option>
          <option value="moderate" <?php echo e(request('damage_level')=='moderate'?'selected':''); ?>>Moderate</option>
          <option value="severe" <?php echo e(request('damage_level')=='severe'?'selected':''); ?>>Severe</option>
          <option value="total" <?php echo e(request('damage_level')=='total'?'selected':''); ?>>Total</option>
        </select>
      </div>
      <div class="col-md-3">
        <label class="form-label small">Evacuation Status</label>
        <select name="evacuation_status" class="form-select">
          <option value="">All</option>
          <option value="in_home" <?php echo e(request('evacuation_status')=='in_home'?'selected':''); ?>>In Home</option>
          <option value="evacuated" <?php echo e(request('evacuation_status')=='evacuated'?'selected':''); ?>>Evacuated</option>
          <option value="returned" <?php echo e(request('evacuation_status')=='returned'?'selected':''); ?>>Returned</option>
        </select>
      </div>
      <div class="col-md-2 align-self-end">
        <button class="btn btn-outline-secondary w-100"><i class="bi bi-search"></i> Search</button>
      </div>
    </div>
  </div>
</form>

<div class="card">
  <div class="card-body">
    <?php if(isset($affectedHouseholds) && $affectedHouseholds->count()): ?>
    <div class="table-responsive affected-table">
      <table class="table table-hover">
        <thead class="table-light">
          <tr>
            <th>Household</th>
            <th>Damage</th>
            <th>Casualties</th>
            <th>Injured</th>
            <th>Missing</th>
            <th>Evacuation</th>
            <th>Relief</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $affectedHouseholds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e(optional($ah->household)->household_id); ?></td>
            <td><span class="badge bg-<?php echo e(in_array($ah->damage_level,['severe','total'])?'danger':($ah->damage_level==='moderate'?'warning':'success')); ?>"><?php echo e(ucfirst($ah->damage_level)); ?></span></td>
            <td><span class="badge bg-danger"><?php echo e($ah->casualties); ?></span></td>
            <td><span class="badge bg-warning"><?php echo e($ah->injured); ?></span></td>
            <td><span class="badge bg-secondary"><?php echo e($ah->missing); ?></span></td>
            <td><span class="badge bg-<?php echo e($ah->evacuation_status==='evacuated'?'info':($ah->evacuation_status==='returned'?'success':'secondary')); ?>"><?php echo e(ucfirst(str_replace('_',' ',$ah->evacuation_status))); ?></span></td>
            <td><span class="badge bg-<?php echo e($ah->relief_received?'success':'secondary'); ?>"><?php echo e($ah->relief_received?'Yes':'No'); ?></span></td>
            <td>
              <div class="btn-group btn-group-sm">
                <a href="<?php echo e(route('web.calamity-affected-households.show',$ah)); ?>" class="btn btn-primary"><i class="bi bi-eye"></i> View</a>
                <a href="<?php echo e(route('web.calamity-affected-households.show',$ah)); ?>#rescue-operations" class="btn btn-info"><i class="bi bi-life-preserver"></i> Rescue Operations</a>
                
              </div>
            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
    <div class="mt-3"><?php echo e($affectedHouseholds->links()); ?></div>
    <?php else: ?>
    <div class="text-center py-5">
      <i class="bi bi-people" style="font-size:64px;color:#ccc;"></i>
      <p class="text-muted mt-3">No affected households recorded.</p>
    </div>
    <?php endif; ?>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views/calamity/affected/index.blade.php ENDPATH**/ ?>