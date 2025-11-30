<?php $__env->startSection('title', 'Response Team'); ?>

<?php $__env->startSection('content'); ?>
<div class="section-offset">
<nav aria-label="breadcrumb" class="mb-3">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Response Team</li>
  </ol>
</nav>

<div class="d-flex justify-content-between align-items-center mb-4">
  <h2><i class="bi bi-people-fill"></i> Response Team</h2>
  <a href="<?php echo e(route('web.response-team-members.create')); ?>" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Add New</a>
</div>

<?php
  $calamities = \App\Models\Calamity::orderByDesc('date_occurred')->get();
  $query = \App\Models\ResponseTeamMember::with(['calamity','evacuationCenter']);
  if (request('search')) { $s = request('search'); $query->where('name','like',"%{$s}%"); }
  if (request('role')) { $query->where('role','like',"%".request('role')."%"); }
  if (request('calamity_id')) { $query->where('calamity_id', request('calamity_id')); }
  $members = $query->latest()->paginate(20);
?>

<form method="GET" action="<?php echo e(route('web.response-team-members.index')); ?>" class="card mb-4">
  <div class="card-body">
    <div class="row g-3">
      <div class="col-md-4">
        <label class="form-label small">Search</label>
        <input type="text" name="search" class="form-control" placeholder="Name or role" value="<?php echo e(request('search')); ?>">
      </div>
      <div class="col-md-3">
        <label class="form-label small">Role</label>
        <input type="text" name="role" class="form-control" value="<?php echo e(request('role')); ?>">
      </div>
      <div class="col-md-3">
        <label class="form-label small">Calamity</label>
        <select name="calamity_id" class="form-select">
          <option value="">All</option>
          <?php $__currentLoopData = $calamities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($c->id); ?>" <?php echo e(request('calamity_id')==$c->id?'selected':''); ?>><?php echo e($c->calamity_name); ?> (<?php echo e($c->date_occurred); ?>)</option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    <?php if($members->count()): ?>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead class="table-light">
          <tr>
            <th>Name</th>
            <th>Role</th>
            <th>Skills</th>
            <th>Assigned Center</th>
            <th>Rescues</th>
            <th>Households Helped</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><strong class="text-primary"><?php echo e($m->name); ?></strong></td>
            <td><span class="badge bg-info"><?php echo e($m->role); ?></span></td>
            <td><?php echo e(is_array($m->skills) ? implode(', ', $m->skills) : $m->skills); ?></td>
            <td><?php echo e(optional($m->evacuationCenter)->name); ?></td>
            <td><?php echo e($m->rescueOperations()->count()); ?></td>
            <td><?php echo e($m->rescueOperations()->distinct('calamity_affected_household_id')->count('calamity_affected_household_id')); ?></td>
            
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
    <div class="mt-3"><?php echo e($members->withQueryString()->links()); ?></div>
    <?php else: ?>
    <div class="text-center py-5">
      <i class="bi bi-people-fill" style="font-size:64px;color:#ccc;"></i>
      <p class="text-muted mt-3">No response team members found.</p>
    </div>
    <?php endif; ?>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views\calamity\response_team\index.blade.php ENDPATH**/ ?>