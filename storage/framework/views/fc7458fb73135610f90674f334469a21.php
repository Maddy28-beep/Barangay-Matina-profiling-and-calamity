<?php $__env->startSection('title', 'Add Relief Item'); ?>

<?php $__env->startSection('content'); ?>
<div class="section-offset">
<nav aria-label="breadcrumb" class="mb-3">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('web.relief-items.index')); ?>">Relief Inventory</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add</li>
  </ol>
</nav>

<div class="card">
  <div class="card-body">
    <form method="POST" action="<?php echo e(route('web.relief-items.store')); ?>">
      <?php echo csrf_field(); ?>
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Item Name</label>
          <input type="text" name="name" class="form-control" required value="<?php echo e(old('name')); ?>" placeholder="Enter item name">
        </div>
        <div class="col-md-6">
          <label class="form-label">Category</label>
          <select name="category" class="form-select" required>
            <option value="" disabled <?php echo e(old('category') ? '' : 'selected'); ?>>Select category</option>
            <option value="food">Food</option>
            <option value="water">Water</option>
            <option value="blanket">Blanket</option>
            <option value="medicine">Medicine</option>
            <option value="clothes">Clothes</option>
          </select>
        </div>
        <div class="col-md-6">
          <label class="form-label">Quantity</label>
          <input type="number" name="quantity" class="form-control" min="0" value="<?php echo e(old('quantity')); ?>" placeholder="Enter quantity">
        </div>
        <div class="col-md-6">
          <label class="form-label">Unit</label>
          <input type="text" name="unit" class="form-control" value="<?php echo e(old('unit')); ?>" placeholder="e.g., pcs, kg, box">
        </div>
      </div>
      <div class="mt-4 d-flex justify-content-end gap-2">
        <a href="<?php echo e(route('web.relief-items.index')); ?>" class="btn btn-secondary">Cancel</a>
        <button class="btn btn-primary" type="submit">Submit</button>
      </div>
    </form>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views\calamity\relief_items\create.blade.php ENDPATH**/ ?>