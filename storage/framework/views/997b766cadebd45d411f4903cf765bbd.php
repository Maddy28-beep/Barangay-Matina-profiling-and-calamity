<?php $__env->startSection('title', 'Calamity Incidents'); ?>

<?php $__env->startSection('content'); ?>
<div class="section-offset">
<nav aria-label="breadcrumb" class="mb-3">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Calamity Incidents</li>
  </ol>
</nav>

<div class="d-flex justify-content-between align-items-center mb-4">
  <h2><i class="bi bi-lightning-fill"></i> Calamity Incidents</h2>
  <a href="<?php echo e(route('calamities.create')); ?>" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Add New</a>
}</div>

<form method="GET" action="<?php echo e(route('calamities.index')); ?>" class="card mb-4">
  <div class="card-body">
    <div class="row g-3">
      <div class="col-md-4">
        <label class="form-label small">Search</label>
        <input type="text" name="search" class="form-control" placeholder="Type or description" value="<?php echo e(request('search')); ?>">
      </div>
      <div class="col-md-3">
        <label class="form-label small">Type</label>
        <select name="calamity_type" class="form-select">
          <option value="">All</option>
          <option value="typhoon" <?php echo e(request('calamity_type')=='typhoon'?'selected':''); ?>>Typhoon</option>
          <option value="flood" <?php echo e(request('calamity_type')=='flood'?'selected':''); ?>>Flood</option>
          <option value="earthquake" <?php echo e(request('calamity_type')=='earthquake'?'selected':''); ?>>Earthquake</option>
          <option value="fire" <?php echo e(request('calamity_type')=='fire'?'selected':''); ?>>Fire</option>
          <option value="landslide" <?php echo e(request('calamity_type')=='landslide'?'selected':''); ?>>Landslide</option>
          <option value="drought" <?php echo e(request('calamity_type')=='drought'?'selected':''); ?>>Drought</option>
          <option value="other" <?php echo e(request('calamity_type')=='other'?'selected':''); ?>>Other</option>
        </select>
      </div>
      <div class="col-md-3">
        <label class="form-label small">Status</label>
        <select name="status" class="form-select">
          <option value="">All</option>
          <option value="ongoing" <?php echo e(request('status')=='ongoing'?'selected':''); ?>>Ongoing</option>
          <option value="resolved" <?php echo e(request('status')=='resolved'?'selected':''); ?>>Resolved</option>
          <option value="monitoring" <?php echo e(request('status')=='monitoring'?'selected':''); ?>>Monitoring</option>
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
    <?php if(isset($calamities) && $calamities->count()): ?>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead class="table-light">
          <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Date</th>
            <th>Time</th>
            <th>Severity</th>
            <th>Status</th>
            <th>Affected Areas</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $calamities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $calamity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><strong class="text-primary"><?php echo e($calamity->calamity_name); ?></strong></td>
            <td><span class="badge bg-info"><?php echo e(ucfirst($calamity->calamity_type)); ?></span></td>
            <td><?php echo e($calamity->date_occurred?->format('Y-m-d')); ?></td>
            <td><?php echo e($calamity->occurred_time); ?></td>
            <td>
              <?php $sev = $calamity->severity ?? $calamity->severity_level; $color = $sev==='severe'||$sev==='catastrophic'?'danger':($sev==='moderate'?'warning':'success'); ?>
              <span class="badge bg-<?php echo e($color); ?>"><?php echo e(ucfirst($sev)); ?></span>
            </td>
            <td><span class="badge bg-<?php echo e($calamity->status==='ongoing'?'warning':($calamity->status==='resolved'?'success':'secondary')); ?>"><?php echo e(ucfirst($calamity->status)); ?></span></td>
            <td><?php echo e($calamity->affected_areas); ?></td>
            <td>
              <div class="btn-group btn-group-sm">
                <a href="<?php echo e(route('calamities.show',$calamity)); ?>" class="btn btn-primary"><i class="bi bi-eye"></i> View</a>
                <a href="<?php echo e(route('calamities.edit',$calamity)); ?>" class="btn btn-warning"><i class="bi bi-pencil"></i> Edit</a>
                <form action="<?php echo e(route('calamities.destroy',$calamity)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Archive this incident? You can restore it from Archived Incidents.')">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('DELETE'); ?>
                  <button type="submit" class="btn btn-secondary"><i class="bi bi-archive"></i> Archive</button>
                </form>
              </div>
            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
    <div class="mt-3"><?php echo e($calamities->links()); ?></div>
    <?php else: ?>
    <div class="text-center py-5">
      <i class="bi bi-lightning-fill" style="font-size:64px;color:#ccc;"></i>
      <p class="text-muted mt-3">No incidents found.</p>
    </div>
    <?php endif; ?>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views\calamity\incidents\index.blade.php ENDPATH**/ ?>