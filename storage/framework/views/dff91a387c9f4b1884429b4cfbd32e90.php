<?php $__env->startSection('title','Calamity Report'); ?>
<?php $__env->startSection('content'); ?>
<div class="section-offset">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Calamity Report</h4>
  </div>
  <div class="card">
    <div class="card-body">
      <?php if($calamities->count()): ?>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Type</th>
              <th>Date</th>
              <th>Severity</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $calamities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($c->id); ?></td>
              <td><?php echo e($c->calamity_name ?? ucfirst($c->calamity_type)); ?></td>
              <td><?php echo e(ucfirst($c->calamity_type)); ?></td>
              <td><?php echo e(optional($c->date_occurred)->format('Y-m-d')); ?></td>
              <td><?php echo e($c->severity_level); ?></td>
              <td class="text-end">
                <a href="<?php echo e(route('web.calamity-reports.show',$c)); ?>" class="btn btn-primary btn-sm"><i class="bi bi-file-text"></i> View Report</a>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
      <div class="mt-3"><?php echo e($calamities->links()); ?></div>
      <?php else: ?>
      <div class="text-center py-5 text-muted">No calamity records found.</div>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views\calamity\reports\index.blade.php ENDPATH**/ ?>