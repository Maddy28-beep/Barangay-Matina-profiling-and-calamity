<?php $__env->startSection('title', 'Household Events - ' . $household->household_id); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">
        <i class="bi bi-calendar-event"></i> Events History
        <small class="text-muted"><?php echo e($household->household_id); ?></small>
    </h2>
    <a href="<?php echo e(route('households.show', $household)); ?>" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back to Household
    </a>
</div>

<!-- Household Info Card -->
<div class="card mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><strong>Household ID:</strong> <?php echo e($household->household_id); ?></p>
                <p><strong>Address:</strong> <?php echo e($household->address); ?></p>
            </div>
            <div class="col-md-6">
                <p><strong>Purok:</strong> <?php echo e($household->purok); ?></p>
                <p><strong>Total Members:</strong> <?php echo e($household->total_members); ?></p>
            </div>
        </div>
    </div>
</div>

<!-- Events Timeline -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Event Timeline (<?php echo e($events->total()); ?> events)</h5>
    </div>
    <div class="card-body">
        <?php $__empty_1 = true; $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="d-flex mb-4 pb-4 <?php echo e(!$loop->last ? 'border-bottom' : ''); ?>">
            <div class="me-3">
                <div class="rounded-circle bg-<?php echo e($event->event_type == 'member_added' ? 'success' : 
                    ($event->event_type == 'member_removed' ? 'danger' : 
                    ($event->event_type == 'relocation' ? 'warning' : 'info'))); ?> text-white d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                    <i class="bi 
                        <?php if($event->event_type == 'member_added'): ?> bi-person-plus
                        <?php elseif($event->event_type == 'member_removed'): ?> bi-person-dash
                        <?php elseif($event->event_type == 'head_change'): ?> bi-arrow-repeat
                        <?php elseif($event->event_type == 'relocation'): ?> bi-geo-alt
                        <?php elseif($event->event_type == 'household_split'): ?> bi-scissors
                        <?php elseif($event->event_type == 'household_merged'): ?> bi-union
                        <?php elseif($event->event_type == 'new_family_created'): ?> bi-house-add
                        <?php else: ?> bi-calendar-event
                        <?php endif; ?>"></i>
                </div>
            </div>
            <div class="flex-grow-1">
                <h6 class="mb-1">
                    <span class="badge bg-<?php echo e($event->event_type == 'member_added' ? 'success' : 
                        ($event->event_type == 'member_removed' ? 'danger' : 
                        ($event->event_type == 'relocation' ? 'warning' : 'info'))); ?>"><?php echo e(ucwords(str_replace('_', ' ', $event->event_type))); ?></span>
                </h6>
                <p class="mb-2"><?php echo e($event->description); ?></p>
                
                <?php if($event->event_type == 'head_change' && $event->oldHead && $event->newHead): ?>
                    <div class="alert alert-info py-2 mb-2">
                        <small>
                            <strong>Old Head:</strong> <?php echo e($event->oldHead->full_name); ?><br>
                            <strong>New Head:</strong> <?php echo e($event->newHead->full_name); ?>

                        </small>
                    </div>
                <?php endif; ?>
                
                <small class="text-muted">
                    <i class="bi bi-calendar"></i> <?php echo e($event->event_date->format('F d, Y')); ?> •
                    <i class="bi bi-person"></i> <?php echo e($event->processor->name ?? 'System'); ?> •
                    <i class="bi bi-tag"></i> <?php echo e(ucfirst($event->reason)); ?>

                </small>
                
                <?php if($event->notes): ?>
                    <p class="mt-2 mb-0 bg-light p-2 rounded">
                        <small><strong>Notes:</strong> <?php echo e($event->notes); ?></small>
                    </p>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="text-center py-5">
            <i class="bi bi-calendar-x" style="font-size: 3rem; color: #ccc;"></i>
            <p class="mt-3 text-muted">No events recorded for this household yet.</p>
        </div>
        <?php endif; ?>

        <?php if($events->hasPages()): ?>
        <div class="mt-4">
            <?php echo e($events->links()); ?>

        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views\household-events\by-household.blade.php ENDPATH**/ ?>