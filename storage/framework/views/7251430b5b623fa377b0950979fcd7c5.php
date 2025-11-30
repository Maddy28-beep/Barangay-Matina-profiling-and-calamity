<?php $__env->startSection('title', 'Calamity Management - Barangay Matina Pangi'); ?>

<?php $__env->startSection('content'); ?>
<div class="section-offset">
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0"><i class="bi bi-exclamation-triangle"></i> Calamity Management</h2>
    <div class="d-flex align-items-center gap-2">
        <a href="<?php echo e(route('calamities.create')); ?>" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Record Calamity
        </a>
        
        <div class="dropdown">
            <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-download"></i> Export
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="<?php echo e(route('calamities.export.pdf', request()->query())); ?>">
                        <i class="bi bi-file-pdf"></i> PDF
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="<?php echo e(route('calamities.export.excel', request()->query())); ?>">
                        <i class="bi bi-file-excel"></i> Excel
                    </a>
                </li>
            </ul>
        </div>
        <a href="<?php echo e(route('calamities.archived')); ?>" class="btn btn-outline-secondary">
            <i class="bi bi-archive"></i> Archived Incidents
        </a>
    </div>
</div>

<div class="card mb-3">
    <div class="card-body">
        <form method="GET" action="<?php echo e(route('calamities.index')); ?>">
            <div class="row g-2">
                <div class="col-md-3">
                    <label class="form-label">Date From</label>
                    <input type="date" name="from" class="form-control" value="<?php echo e($filters['from'] ?? ''); ?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Date To</label>
                    <input type="date" name="to" class="form-control" value="<?php echo e($filters['to'] ?? ''); ?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Type</label>
                    <select name="type" class="form-select">
                        <option value="">All</option>
                        <?php $__currentLoopData = ['typhoon','flood','earthquake','fire','landslide','drought','other']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($t); ?>" <?php echo e(($filters['type'] ?? '') === $t ? 'selected' : ''); ?>><?php echo e(ucfirst($t)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Severity</label>
                    <select name="severity" class="form-select">
                        <option value="">All</option>
                        <?php $__currentLoopData = ['minor','moderate','severe','catastrophic']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($s); ?>" <?php echo e(($filters['severity'] ?? '') === $s ? 'selected' : ''); ?>><?php echo e(ucfirst($s)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Affected Area / Purok</label>
                    <input type="text" name="area" class="form-control" value="<?php echo e($filters['area'] ?? ''); ?>" placeholder="Enter area or purok">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Sort</label>
                    <select name="sort" class="form-select">
                        <?php $sort = $filters['sort'] ?? 'date_desc'; ?>
                        <option value="date_desc" <?php echo e($sort==='date_desc' ? 'selected' : ''); ?>>Date (Newest)</option>
                        <option value="date_asc" <?php echo e($sort==='date_asc' ? 'selected' : ''); ?>>Date (Oldest)</option>
                        <option value="type_asc" <?php echo e($sort==='type_asc' ? 'selected' : ''); ?>>Type (A→Z)</option>
                        <option value="type_desc" <?php echo e($sort==='type_desc' ? 'selected' : ''); ?>>Type (Z→A)</option>
                        <option value="severity_asc" <?php echo e($sort==='severity_asc' ? 'selected' : ''); ?>>Severity (Low→High)</option>
                        <option value="severity_desc" <?php echo e($sort==='severity_desc' ? 'selected' : ''); ?>>Severity (High→Low)</option>
                    </select>
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-outline-primary w-100"><i class="bi bi-filter"></i> Apply Filters</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Calamities Table -->
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Calamity Name</th>
                        <th>Type</th>
                        <th>Date Occurred</th>
                        <th>Severity</th>
                        <th>Affected Households</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $calamities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $calamity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><strong><?php echo e($calamity->calamity_name); ?></strong></td>
                            <td><span class="badge bg-warning"><?php echo e(ucfirst($calamity->calamity_type)); ?></span></td>
                            <td><?php echo e($calamity->date_occurred->format('M d, Y')); ?></td>
                            <td>
                                <?php if($calamity->severity_level == 'catastrophic'): ?>
                                    <span class="badge bg-danger">Catastrophic</span>
                                <?php elseif($calamity->severity_level == 'severe'): ?>
                                    <span class="badge bg-danger">Severe</span>
                                <?php elseif($calamity->severity_level == 'moderate'): ?>
                                    <span class="badge bg-warning">Moderate</span>
                                <?php else: ?>
                                    <span class="badge bg-info">Minor</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($calamity->affected_households_count); ?> households</td>
                            <td>
                                <?php if($calamity->status == 'ongoing'): ?>
                                    <span class="badge bg-danger">Ongoing</span>
                                <?php elseif($calamity->status == 'monitoring'): ?>
                                    <span class="badge bg-warning">Monitoring</span>
                                <?php else: ?>
                                    <span class="badge bg-success">Resolved</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="<?php echo e(route('calamities.show', $calamity)); ?>" class="btn btn-primary">
                                        <i class="bi bi-eye"></i> View
                                    </a>
                                    <a href="<?php echo e(route('calamities.edit', $calamity)); ?>" class="btn btn-warning">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <form method="POST" action="<?php echo e(route('calamities.destroy', $calamity)); ?>" onsubmit="return confirm('Archive this record? You can restore it from Archived Incidents.');" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-secondary">
                                            <i class="bi bi-archive"></i> Archive
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                <i class="bi bi-inbox" style="font-size: 3rem;"></i>
                                <p class="mt-2">No calamity records found.</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            <?php echo e($calamities->links()); ?>

        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views/calamities/index.blade.php ENDPATH**/ ?>