<?php $__env->startSection('title', 'Archived Calamity Incidents'); ?>
<?php $__env->startSection('content'); ?>
<div class="section-offset">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0"><i class="bi bi-archive"></i> Archived Calamity Incidents</h2>
    <a href="<?php echo e(route('calamities.index')); ?>" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Back</a>
  </div>

  <div class="card">
    <div class="card-body">
      <?php if($calamities->count()): ?>
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Type</th>
              <th>Date Occurred</th>
              <th>Severity</th>
              <th>Deleted At</th>
              <th class="text-end">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $calamities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($c->id); ?></td>
              <td><?php echo e($c->calamity_name); ?></td>
              <td><?php echo e(ucfirst($c->calamity_type)); ?></td>
              <td><?php echo e(optional($c->date_occurred)->format('Y-m-d')); ?></td>
              <td><?php echo e(ucfirst($c->severity_level)); ?></td>
              <td><?php echo e(optional($c->deleted_at)->format('Y-m-d H:i')); ?></td>
              <td class="text-end">
                <div class="btn-group btn-group-sm">
                  <form method="POST" action="<?php echo e(route('calamities.restore', $c->id)); ?>" class="me-2 d-inline">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-primary" title="Restore"><i class="bi bi-arrow-counterclockwise"></i> Restore</button>
                  </form>
                  <form method="POST" action="<?php echo e(route('calamities.delete', $c->id)); ?>" onsubmit="return confirm('Permanently delete this incident? This cannot be undone.');" class="d-inline">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger" title="Delete Permanently"><i class="bi bi-trash"></i> Delete</button>
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
      <div class="text-center py-5 text-muted">No archived incidents.</div>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views\calamities\archived.blade.php ENDPATH**/ ?>