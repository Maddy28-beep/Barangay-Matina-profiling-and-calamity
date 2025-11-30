<?php $__env->startSection('title', 'Household Details'); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('households.index')); ?>">Households</a></li>
            <li class="breadcrumb-item active"><?php echo e($household->household_id); ?></li>
        </ol>
    </nav>
</div>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-house"></i> Household Details</h2>
    <div>
        <?php if(auth()->user()->isSecretary()): ?>
            <a href="<?php echo e(route('households.add-member', $household)); ?>" class="btn btn-success">
                <i class="bi bi-person-plus"></i> Add Member
            </a>
            <a href="<?php echo e(route('households.edit', $household)); ?>" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Edit
            </a>
        <?php endif; ?>
        <a href="<?php echo e(route('households.index')); ?>" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>
</div>

<!-- Household Information -->
<div class="row g-3 mb-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-info-circle"></i> Household Information</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="text-muted small">Household ID</label>
                        <p class="mb-0 fw-bold"><?php echo e($household->household_id); ?></p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Household Type</label>
                        <p class="mb-0">
                            <span class="badge bg-info"><?php echo e(ucfirst($household->household_type)); ?></span>
                        </p>
                    </div>
                    <div class="col-md-12">
                        <label class="text-muted small">Complete Address</label>
                        <p class="mb-0"><?php echo e($household->full_address); ?></p>
                    </div>
                    <div class="col-md-4">
                        <label class="text-muted small">Housing Type</label>
                        <p class="mb-0"><?php echo e(ucfirst($household->housing_type)); ?></p>
                    </div>
                    <div class="col-md-4">
                        <label class="text-muted small">Electricity</label>
                        <p class="mb-0">
                            <?php if($household->has_electricity): ?>
                                <i class="bi bi-lightning-fill text-warning"></i> Yes
                                <?php if($household->electric_account_number): ?>
                                    <br><small class="text-muted"><?php echo e($household->electric_account_number); ?></small>
                                <?php endif; ?>
                            <?php else: ?>
                                <i class="bi bi-x-circle text-danger"></i> No
                            <?php endif; ?>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <label class="text-muted small">Total Members</label>
                        <p class="mb-0">
                            <span class="badge bg-primary"><?php echo e($household->total_members); ?></span>
                        </p>
                    </div>
                    <?php if($household->parentHousehold): ?>
                        <div class="col-md-12">
                            <label class="text-muted small">Parent Household</label>
                            <p class="mb-0">
                                <a href="<?php echo e(route('households.show', $household->parentHousehold)); ?>">
                                    <?php echo e($household->parentHousehold->household_id); ?> - 
                                    <?php echo e($household->parentHousehold->head ? $household->parentHousehold->head->full_name : 'N/A'); ?>

                                </a>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-cash"></i> Household Income</h5>
            </div>
            <div class="card-body">
                <h3 class="mb-0">₱<?php echo e(number_format($household->total_income, 2)); ?></h3>
                <p class="text-muted small mb-0">Total Monthly Income</p>
                <hr>
                <p class="mb-0">
                    <strong>Average per Member:</strong><br>
                    ₱<?php echo e(number_format($household->total_members > 0 ? $household->total_income / $household->total_members : 0, 2)); ?>

                </p>
            </div>
        </div>
    </div>
</div>

<!-- Household Members -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="bi bi-people"></i> Household Members</h5>
    </div>
    <div class="card-body">
        <?php if($household->residents->count() > 0): ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Resident ID</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Age</th>
                            <th>Sex</th>
                            <th>Civil Status</th>
                            <th>Categories</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $household->residents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resident): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($resident->resident_id); ?></td>
                            <td>
                                <a href="<?php echo e(route('residents.show', $resident)); ?>">
                                    <?php echo e($resident->full_name); ?>

                                </a>
                                <?php if($resident->is_household_head): ?>
                                    <span class="badge bg-success">Head</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e(ucfirst($resident->household_role)); ?></td>
                            <td><?php echo e($resident->age); ?></td>
                            <td><?php echo e(ucfirst($resident->sex)); ?></td>
                            <td><?php echo e(ucfirst($resident->civil_status)); ?></td>
                            <td>
                                <?php if($resident->is_pwd): ?>
                                    <span class="badge bg-info">PWD</span>
                                <?php endif; ?>
                                <?php if($resident->is_senior_citizen): ?>
                                    <span class="badge bg-warning">Senior</span>
                                <?php endif; ?>
                                <?php if($resident->is_voter): ?>
                                    <span class="badge bg-success">Voter</span>
                                <?php endif; ?>
                                <?php if($resident->is_4ps_beneficiary): ?>
                                    <span class="badge bg-primary">4Ps</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo e(route('residents.show', $resident)); ?>" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="text-muted text-center mb-0">No members found.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Child Households -->
<?php if($household->childHouseholds->count() > 0): ?>
<div class="card mt-3">
    <div class="card-header">
        <h5 class="mb-0"><i class="bi bi-diagram-3"></i> Child Households (New Family Heads)</h5>
    </div>
    <div class="card-body">
        <div class="list-group">
            <?php $__currentLoopData = $household->childHouseholds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('households.show', $child)); ?>" class="list-group-item list-group-item-action">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong><?php echo e($child->household_id); ?></strong> - 
                            <?php echo e($child->head ? $child->head->full_name : 'N/A'); ?>

                            <br>
                            <small class="text-muted"><?php echo e($child->full_address); ?></small>
                        </div>
                        <span class="badge bg-primary"><?php echo e($child->total_members); ?> member(s)</span>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- Audit Information -->
<div class="card mt-3">
    <div class="card-body">
        <small class="text-muted">
            <strong>Registered:</strong> <?php echo e($household->created_at->format('F d, Y h:i A')); ?>

            <span class="mx-2">|</span>
            <strong>Last Updated:</strong> <?php echo e($household->updated_at->format('F d, Y h:i A')); ?>

        </small>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views\households\show-old-backup.blade.php ENDPATH**/ ?>