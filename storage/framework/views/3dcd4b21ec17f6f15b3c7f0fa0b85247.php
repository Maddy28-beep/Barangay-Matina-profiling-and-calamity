<?php $__env->startSection('title', 'Relief Distribution'); ?>

<?php $__env->startSection('content'); ?>
<div class="section-offset">
<nav aria-label="breadcrumb" class="mb-3">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Relief Distribution</li>
  </ol>
</nav>

<div class="d-flex justify-content-between align-items-center mb-4">
  <h2><i class="bi bi-truck"></i> Relief Distribution</h2>
  <a href="<?php echo e(route('web.relief-distributions.create')); ?>" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Add New</a>
</div>

<form method="GET" action="<?php echo e(route('web.relief-distributions.index')); ?>" class="card mb-4">
  <div class="card-body">
    <div class="row g-3">
      <div class="col-md-4">
        <label class="form-label small">Search</label>
        <input type="text" name="search" class="form-control" placeholder="Household or item" value="<?php echo e(request('search')); ?>">
      </div>
      <div class="col-md-3">
        <label class="form-label small">Date</label>
        <input type="date" name="date" class="form-control" value="<?php echo e(request('date')); ?>">
      </div>
      <div class="col-md-3">
        <label class="form-label small">Item</label>
        <select name="item" class="form-select"></select>
      </div>
      <div class="col-md-2 align-self-end">
        <button class="btn btn-outline-secondary w-100"><i class="bi bi-search"></i> Search</button>
      </div>
    </div>
  </div>
</form>

<div class="card">
  <div class="card-body">
    <?php if(isset($distributions) && $distributions->count()): ?>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead class="table-light">
          <tr>
            <th>Calamity</th>
            <th>Household</th>
            <th>Item</th>
            <th>Quantity</th>
            <th>Date</th>
            <th>Staff</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $distributions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e(optional($d->calamity)->calamity_name); ?></td>
            <td><?php echo e(optional($d->household)->household_id); ?></td>
            <td><?php echo e(optional($d->item)->name); ?></td>
            <td><span class="badge bg-success"><?php echo e($d->quantity); ?></span></td>
            <td><?php echo e(optional($d->distributed_at)->format('Y-m-d')); ?></td>
            <td><?php echo e(optional($d->staff)->name); ?></td>
            <td>
              <div class="btn-group btn-group-sm">
                <a href="<?php echo e(route('relief-distributions.show',$d)); ?>" class="btn btn-primary"><i class="bi bi-eye"></i> View</a>
                <a href="<?php echo e(route('relief-distributions.edit',$d)); ?>" class="btn btn-warning"><i class="bi bi-pencil"></i> Edit</a>
                <form action="<?php echo e(route('relief-distributions.destroy',$d)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Delete this distribution?')">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('DELETE'); ?>
                  <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</button>
                </form>
              </div>
            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
    <div class="mt-3"><?php echo e($distributions->links()); ?></div>
    <?php else: ?>
    <div class="text-center py-5">
      <i class="bi bi-truck" style="font-size:64px;color:#ccc;"></i>
      <p class="text-muted mt-3">No distributions found.</p>
    </div>
    <?php endif; ?>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views\calamity\distributions\index.blade.php ENDPATH**/ ?>