<?php $__env->startSection('title', 'Edit Relief Item'); ?>

<?php $__env->startSection('content'); ?>
<div class="section-offset">
<nav aria-label="breadcrumb" class="mb-3">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('web.relief-items.index')); ?>">Relief Inventory</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
  </ol>
</nav>

<div class="card">
  <div class="card-body">
    <form method="POST" action="<?php echo e(route('web.relief-items.update', $relief_item)); ?>">
      <?php echo csrf_field(); ?>
      <?php echo method_field('PUT'); ?>
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Item Name</label>
          <input type="text" name="name" class="form-control" required value="<?php echo e(old('name', $relief_item->name)); ?>">
        </div>
        <div class="col-md-6">
          <label class="form-label">Category</label>
          <?php $cat = old('category', $relief_item->category); ?>
          <select name="category" class="form-select" required>
            <option value="food" <?php echo e($cat=='food'?'selected':''); ?>>Food</option>
            <option value="water" <?php echo e($cat=='water'?'selected':''); ?>>Water</option>
            <option value="blanket" <?php echo e($cat=='blanket'?'selected':''); ?>>Blanket</option>
            <option value="medicine" <?php echo e($cat=='medicine'?'selected':''); ?>>Medicine</option>
            <option value="clothes" <?php echo e($cat=='clothes'?'selected':''); ?>>Clothes</option>
          </select>
        </div>
        <div class="col-md-6">
          <label class="form-label">Quantity</label>
          <input type="number" name="quantity" class="form-control" min="0" value="<?php echo e(old('quantity', $relief_item->quantity)); ?>">
        </div>
        <div class="col-md-6">
          <label class="form-label">Unit</label>
          <input type="text" name="unit" class="form-control" value="<?php echo e(old('unit')); ?>">
        </div>
      </div>
      <div class="mt-4 d-flex justify-content-end gap-2">
        <a href="<?php echo e(route('web.relief-items.index')); ?>" class="btn btn-secondary">Cancel</a>
        <button class="btn btn-primary" type="submit">Save</button>
      </div>
    </form>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views\calamity\relief_items\edit.blade.php ENDPATH**/ ?>