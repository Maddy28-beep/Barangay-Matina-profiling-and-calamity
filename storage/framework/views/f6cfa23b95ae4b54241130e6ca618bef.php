<?php $__env->startSection('title', 'Profiling Hub'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Profiling Only</h2>
        <div class="d-flex gap-2">
            <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-outline-secondary">Back to Dashboard</a>
        </div>
    </div>

    <div class="row g-3">
        <?php if(auth()->user()->isStaff()): ?>
        <div class="col-md-3">
            <a href="<?php echo e(route('staff.residents.index')); ?>" class="card h-100 text-decoration-none">
                <div class="card-body">
                    <div class="mb-2"><i class="bi bi-people fs-3 text-primary"></i></div>
                    <h5 class="mb-1">Residents</h5>
                    <small class="text-muted">Browse resident profiles</small>
                </div>
            </a>
        </div>
        <?php else: ?>
        <div class="col-md-3">
            <a href="<?php echo e(route('households.index')); ?>" class="card h-100 text-decoration-none">
                <div class="card-body">
                    <div class="mb-2"><i class="bi bi-house fs-3 text-primary"></i></div>
                    <h5 class="mb-1">Households</h5>
                    <small class="text-muted">Manage household records</small>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="<?php echo e(route('residents.index')); ?>" class="card h-100 text-decoration-none">
                <div class="card-body">
                    <div class="mb-2"><i class="bi bi-people fs-3 text-primary"></i></div>
                    <h5 class="mb-1">Residents</h5>
                    <small class="text-muted">Browse resident profiles</small>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="<?php echo e(route('census.index')); ?>" class="card h-100 text-decoration-none">
                <div class="card-body">
                    <div class="mb-2"><i class="bi bi-bar-chart fs-3 text-primary"></i></div>
                    <h5 class="mb-1">Census</h5>
                    <small class="text-muted">Population analytics</small>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="<?php echo e(route('resident-transfers.index')); ?>" class="card h-100 text-decoration-none">
                <div class="card-body">
                    <div class="mb-2"><i class="bi bi-arrow-left-right fs-3 text-primary"></i></div>
                    <h5 class="mb-1">Transfers</h5>
                    <small class="text-muted">Resident transfers</small>
                </div>
            </a>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views\apps\profiling-only\index.blade.php ENDPATH**/ ?>