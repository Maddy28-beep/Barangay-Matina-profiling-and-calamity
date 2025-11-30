<?php $__env->startSection('title', 'Relief Inventory'); ?>

<?php $__env->startSection('content'); ?>
<div class="section-offset">
<nav aria-label="breadcrumb" class="mb-3">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Relief Inventory</li>
  </ol>
</nav>

<div class="d-flex justify-content-between align-items-center mb-4">
  <h2><i class="bi bi-box-seam"></i> Relief Inventory</h2>
  <a href="<?php echo e(route('web.relief-items.create')); ?>" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Add New</a>
</div>

<form method="GET" action="<?php echo e(route('web.relief-items.index')); ?>" class="card mb-4">
  <div class="card-body">
    <div class="row g-3">
      <div class="col-md-4">
        <label class="form-label small">Search</label>
        <input type="text" name="search" class="form-control" placeholder="Item or category" value="<?php echo e(request('search')); ?>">
      </div>
      <div class="col-md-3">
        <label class="form-label small">Category</label>
        <select name="category" class="form-select">
          <option value="">All</option>
          <option value="food">Food</option>
          <option value="water">Water</option>
          <option value="blanket">Blanket</option>
          <option value="medicine">Medicine</option>
          <option value="clothes">Clothes</option>
        </select>
      </div>
      <div class="col-md-3">
        <label class="form-label small">Min Quantity</label>
        <input type="number" name="min_qty" class="form-control" value="<?php echo e(request('min_qty')); ?>">
      </div>
      <div class="col-md-2 align-self-end">
        <button class="btn btn-outline-secondary w-100"><i class="bi bi-search"></i> Search</button>
      </div>
    </div>
  </div>
</form>

<div class="card">
  <div class="card-body">
    <?php if(isset($items) && $items->count()): ?>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead class="table-light">
          <tr>
            <th>Item</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><strong class="text-primary"><?php echo e($item->name); ?></strong></td>
            <td><span class="badge bg-info"><?php echo e(ucfirst($item->category)); ?></span></td>
            <td><span class="badge bg-success"><?php echo e($item->quantity); ?></span></td>
            <td>
              <div class="btn-group btn-group-sm">
                <a href="<?php echo e(route('web.relief-items.show',$item)); ?>" class="btn btn-primary"><i class="bi bi-eye"></i> View</a>
                <a href="<?php echo e(route('web.relief-items.edit',$item)); ?>" class="btn btn-warning"><i class="bi bi-pencil"></i> Edit</a>
                <form action="<?php echo e(route('web.relief-items.destroy',$item)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Delete this item?')">
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
    <div class="mt-3"><?php echo e($items->links()); ?></div>
    <?php else: ?>
    <div class="text-center py-5">
      <i class="bi bi-box-seam" style="font-size:64px;color:#ccc;"></i>
      <p class="text-muted mt-3">No inventory items found.</p>
    </div>
    <?php endif; ?>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views\calamity\relief_items\index.blade.php ENDPATH**/ ?>