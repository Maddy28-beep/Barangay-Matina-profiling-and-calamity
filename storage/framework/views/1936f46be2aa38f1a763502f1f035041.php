<?php $__env->startSection('title', 'Announcement Details'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0"><i class="bi bi-megaphone"></i> Announcement Details</h2>
    <a href="<?php echo e(route('announcements.index')); ?>" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Back</a>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header"><h5 class="mb-0">Announcement</h5></div>
            <div class="card-body">
                <p><strong>Title:</strong><br><?php echo e($announcement->title); ?></p>
                <p><strong>Urgency:</strong><br><?php echo e($announcement->urgency ?: 'Normal'); ?></p>
                <p><strong>Status:</strong><br><span class="badge bg-<?php echo e($announcement->status==='sent'?'success':'secondary'); ?>"><?php echo e(ucfirst($announcement->status)); ?></span></p>
                <p><strong>Sent At:</strong><br><?php echo e(optional($announcement->sent_at)->format('Y-m-d H:i')); ?></p>
                <p><strong>Message:</strong><br><?php echo e($announcement->message); ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header"><h5 class="mb-0">Recipients (<?php echo e($announcement->recipients->count()); ?>)</h5></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Household</th>
                            <th>Contact</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $announcement->recipients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($r->resident->full_name ?? ($r->resident->first_name.' '.$r->resident->last_name)); ?></td>
                                <td><?php echo e(optional($r->resident->household)->household_id); ?></td>
                                <td><?php echo e($r->resident->contact_number); ?></td>
                                <td><?php echo e($r->resident->email); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views\announcements\show.blade.php ENDPATH**/ ?>