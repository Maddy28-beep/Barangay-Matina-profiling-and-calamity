<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><?php echo e($purok->purok_name); ?></h2>
        <div class="d-flex gap-2">
            <?php if(auth()->user()->isSecretary()): ?>
            <a href="<?php echo e(route('puroks.edit', $purok)); ?>" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <?php endif; ?>
            <a href="<?php echo e(route('puroks.index')); ?>" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="text-primary"><?php echo e($purok->households->count()); ?></h3>
                    <p class="text-muted mb-0">Households</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="text-success"><?php echo e($purok->residents->count()); ?></h3>
                    <p class="text-muted mb-0">Residents</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="text-info"><?php echo e($purok->residents->where('sex', 'male')->count()); ?></h3>
                    <p class="text-muted mb-0">Male</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="text-warning"><?php echo e($purok->residents->where('sex', 'female')->count()); ?></h3>
                    <p class="text-muted mb-0">Female</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Purok Information</h5>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <tr>
                            <td><strong>Code:</strong></td>
                            <td><?php echo e($purok->purok_code); ?></td>
                        </tr>
                        <?php if($purok->purok_leader_name): ?>
                        <tr>
                            <td><strong>Leader:</strong></td>
                            <td><?php echo e($purok->purok_leader_name); ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if($purok->purok_leader_contact): ?>
                        <tr>
                            <td><strong>Contact:</strong></td>
                            <td><?php echo e($purok->purok_leader_contact); ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if($purok->description): ?>
                        <tr>
                            <td colspan="2">
                                <strong>Description:</strong><br>
                                <?php echo e($purok->description); ?>

                            </td>
                        </tr>
                        <?php endif; ?>
                        <?php if($purok->boundaries): ?>
                        <tr>
                            <td colspan="2">
                                <strong>Boundaries:</strong><br>
                                <?php echo e($purok->boundaries); ?>

                            </td>
                        </tr>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Households in this Purok</h5>
                </div>
                <div class="card-body">
                    <?php if($purok->households->count() > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Household ID</th>
                                    <th>Head</th>
                                    <th>Members</th>
                                    <th>Address</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $purok->households; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $household): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($household->household_id); ?></td>
                                    <td><?php echo e($household->head->full_name ?? 'N/A'); ?></td>
                                    <td><?php echo e($household->total_members); ?></td>
                                    <td><?php echo e(Str::limit($household->address, 30)); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('households.show', $household)); ?>" class="btn btn-sm btn-primary">
                                            <i class="bi bi-eye"></i> View
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <?php else: ?>
                    <p class="text-muted">No households in this purok yet.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views\puroks\show.blade.php ENDPATH**/ ?>