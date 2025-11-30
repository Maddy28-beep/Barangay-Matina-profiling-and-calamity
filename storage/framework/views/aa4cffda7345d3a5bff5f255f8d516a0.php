<?php $__env->startSection('title', 'Resident Transfers'); ?>

<?php $__env->startPush('styles'); ?>
<style></style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="section-offset">
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0"><i class="bi bi-arrow-left-right"></i> Resident Transfers</h2>
    <div class="btn-group">
        <?php if(auth()->user()->isSecretary()): ?>
        <a href="<?php echo e(route('resident-transfers.pending')); ?>" class="btn btn-warning">
            <i class="bi bi-clock-history"></i> Pending Approvals
        </a>
        <?php endif; ?>
        <a href="<?php echo e(route('resident-transfers.create')); ?>" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Request Transfer
        </a>
    </div>
</div>

<?php
$transferSearchFields = [
    [
        'name' => 'search',
        'type' => 'text',
        'label' => 'Resident Name',
        'placeholder' => 'Search by resident name...',
        'col' => 4
    ],
    [
        'name' => 'status',
        'type' => 'select',
        'label' => 'Status',
        'placeholder' => 'All Status',
        'options' => [
            'pending' => 'Pending',
            'approved' => 'Approved',
            'completed' => 'Completed',
            'rejected' => 'Rejected'
        ],
        'col' => 3
    ],
    [
        'name' => 'type',
        'type' => 'select',
        'label' => 'Transfer Type',
        'placeholder' => 'All Types',
        'options' => [
            'internal' => 'Internal Transfer',
            'external' => 'External Transfer'
        ],
        'col' => 3
    ],
    [
        'name' => 'reason',
        'type' => 'select',
        'label' => 'Reason',
        'placeholder' => 'All Reasons',
        'options' => [
            'marriage' => 'Marriage',
            'work' => 'Work/Employment',
            'education' => 'Education',
            'family' => 'Family Reasons',
            'housing' => 'Housing',
            'other' => 'Other'
        ],
        'col' => 2
    ]
];
?>

<?php if (isset($component)) { $__componentOriginal33e4867731ced0462908f8cc78d5ea1b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal33e4867731ced0462908f8cc78d5ea1b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.search-filter','data' => ['route' => route('resident-transfers.index'),'title' => 'Search & Filter Resident Transfers','icon' => 'bi-arrow-left-right','fields' => $transferSearchFields,'advanced' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('search-filter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('resident-transfers.index')),'title' => 'Search & Filter Resident Transfers','icon' => 'bi-arrow-left-right','fields' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($transferSearchFields),'advanced' => true]); ?>
    
     <?php $__env->slot('advancedSlot', null, []); ?> 
        <div class="col-md-3">
            <label class="form-label small">Transfer Date From</label>
            <input type="date" class="form-control" name="date_from" value="<?php echo e(request('date_from')); ?>">
        </div>
        <div class="col-md-3">
            <label class="form-label small">Transfer Date To</label>
            <input type="date" class="form-control" name="date_to" value="<?php echo e(request('date_to')); ?>">
        </div>
        <div class="col-md-3">
            <label class="form-label small">Processed By</label>
            <select class="form-select" name="processed_by">
                <option value="">All Staff</option>
                <?php if(isset($staff)): ?>
                    <?php $__currentLoopData = $staff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($member->id); ?>" <?php echo e(request('processed_by') == $member->id ? 'selected' : ''); ?>>
                            <?php echo e($member->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label small">From Purok</label>
            <select class="form-select" name="from_purok">
                <option value="">All Puroks</option>
                <?php for($i = 1; $i <= 10; $i++): ?>
                    <option value="Purok <?php echo e($i); ?>" <?php echo e(request('from_purok') == "Purok $i" ? 'selected' : ''); ?>>Purok <?php echo e($i); ?></option>
                <?php endfor; ?>
            </select>
        </div>
     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal33e4867731ced0462908f8cc78d5ea1b)): ?>
<?php $attributes = $__attributesOriginal33e4867731ced0462908f8cc78d5ea1b; ?>
<?php unset($__attributesOriginal33e4867731ced0462908f8cc78d5ea1b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal33e4867731ced0462908f8cc78d5ea1b)): ?>
<?php $component = $__componentOriginal33e4867731ced0462908f8cc78d5ea1b; ?>
<?php unset($__componentOriginal33e4867731ced0462908f8cc78d5ea1b); ?>
<?php endif; ?>

<!-- Transfers Table -->
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table transfer-table">
                <thead>
                    <tr>
                        <th><i class="bi bi-person"></i> Resident</th>
                        <th><i class="bi bi-house-door"></i> From</th>
                        <th><i class="bi bi-house-check"></i> To</th>
                        <th><i class="bi bi-tag"></i> Type</th>
                        <th><i class="bi bi-calendar"></i> Date</th>
                        <th><i class="bi bi-info-circle"></i> Status</th>
                        <th><i class="bi bi-gear"></i> Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $transfers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transfer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-primary bg-opacity-10 p-2 me-2">
                                        <i class="bi bi-person-fill text-primary"></i>
                                    </div>
                                    <div>
                                        <strong class="d-block"><?php echo e($transfer->resident->full_name); ?></strong>
                                        <small class="text-muted"><?php echo e($transfer->resident->resident_id); ?></small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <?php if($transfer->oldHousehold): ?>
                                    <strong class="text-danger"><?php echo e($transfer->oldHousehold->household_id); ?></strong><br>
                                    <small class="text-muted"><i class="bi bi-geo-alt"></i> <?php echo e($transfer->old_purok); ?></small>
                                <?php else: ?>
                                    <span class="text-muted">N/A</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($transfer->transfer_type === 'transfer_in' && $transfer->newHousehold): ?>
                                    <strong class="text-success"><?php echo e($transfer->newHousehold->household_id); ?></strong><br>
                                    <small class="text-muted"><i class="bi bi-geo-alt"></i> <?php echo e($transfer->new_purok ?? $transfer->newHousehold->purok); ?></small>
                                <?php elseif($transfer->transfer_type === 'transfer_out'): ?>
                                    <span class="badge bg-warning">External Location</span><br>
                                    <small class="text-muted"><?php echo e($transfer->destination_barangay ?? 'Outside Barangay'); ?></small>
                                <?php else: ?>
                                    <span class="text-muted">Pending Assignment</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($transfer->transfer_type === 'transfer_in'): ?>
                                    <span class="badge bg-info"><i class="bi bi-arrow-left-right"></i> Internal</span>
                                <?php elseif($transfer->transfer_type === 'transfer_out'): ?>
                                    <span class="badge bg-warning"><i class="bi bi-box-arrow-right"></i> External</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Unknown</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <i class="bi bi-calendar-event"></i>
                                <?php echo e($transfer->transfer_date->format('M d, Y')); ?><br>
                                <small class="text-muted"><?php echo e($transfer->transfer_date->diffForHumans()); ?></small>
                            </td>
                            <td>
                                <?php if($transfer->status === 'pending'): ?>
                                    <span class="status-badge pending">
                                        <i class="bi bi-clock-history"></i> Pending
                                    </span>
                                <?php elseif($transfer->status === 'approved'): ?>
                                    <span class="status-badge approved">
                                        <i class="bi bi-check-circle"></i> Approved
                                    </span>
                                <?php elseif($transfer->status === 'completed'): ?>
                                    <span class="status-badge completed">
                                        <i class="bi bi-check-circle-fill"></i> Completed
                                    </span>
                                <?php else: ?>
                                    <span class="status-badge rejected">
                                        <i class="bi bi-x-circle"></i> Rejected
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="action-btn-group">
                                    <a href="<?php echo e(route('resident-transfers.show', $transfer)); ?>" class="btn btn-sm btn-primary" title="View Details">
                                        <i class="bi bi-eye"></i> View
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7">
                                <div class="empty-state">
                                    <i class="bi bi-inbox"></i>
                                    <h5>No Transfer Records Found</h5>
                                    <p class="text-muted">There are no resident transfer records matching your criteria.</p>
                                    <a href="<?php echo e(route('resident-transfers.create')); ?>" class="btn btn-primary mt-3">
                                        <i class="bi bi-plus-circle"></i> Create New Transfer Request
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if($transfers->hasPages()): ?>
        <div class="mt-3">
            <?php echo e($transfers->links()); ?>

        </div>
        <?php endif; ?>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views\resident-transfers\index.blade.php ENDPATH**/ ?>