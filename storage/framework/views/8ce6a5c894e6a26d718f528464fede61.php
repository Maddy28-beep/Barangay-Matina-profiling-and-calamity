<?php $__env->startSection('title', 'Announcements'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0"><i class="bi bi-megaphone"></i> Announcements</h2>
    <a href="<?php echo e(route('announcements.create')); ?>" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Add New</a>
</div>

<div class="card">
    <div class="card-body">
        <?php if($announcements->count()): ?>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Title</th>
                        <th>Urgency</th>
                        <th>Status</th>
                        <th>Sent At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><strong class="text-primary"><?php echo e($a->title); ?></strong></td>
                        <td><?php echo e($a->urgency ?: 'Normal'); ?></td>
                        <td><span class="badge bg-<?php echo e($a->status==='sent' ? 'success' : 'secondary'); ?>"><?php echo e(ucfirst($a->status)); ?></span></td>
                        <td><?php echo e(optional($a->sent_at)->format('Y-m-d H:i')); ?></td>
                        <td>
                            <a href="<?php echo e(route('announcements.show', $a)); ?>" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i> View</a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <div class="mt-3"><?php echo e($announcements->links()); ?></div>
        <?php else: ?>
        <div class="text-center py-5">
            <i class="bi bi-megaphone" style="font-size:64px;color:#ccc;"></i>
            <p class="text-muted mt-3">No announcements yet.</p>
        </div>
        <?php endif; ?>
    </div>
 </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views\announcements\index.blade.php ENDPATH**/ ?>