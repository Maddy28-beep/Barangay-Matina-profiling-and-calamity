<?php $__env->startSection('title', 'Households'); ?>

<?php $__env->startSection('content'); ?>
<div class="section-offset">
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-house"></i> Households</h2>
    <?php if(auth()->user()->isSecretary()): ?>
        <a href="<?php echo e(route('households.create')); ?>" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Register Household
        </a>
    <?php endif; ?>
</div>

<?php
$searchFields = [
    [
        'name' => 'search',
        'type' => 'text',
        'label' => 'Household ID / Address',
        'placeholder' => 'Search by ID or Address...',
        'col' => 4
    ],
    [
        'name' => 'head_name',
        'type' => 'text',
        'label' => 'Primary Head Name',
        'placeholder' => 'Search by head name...',
        'col' => 4
    ],
    [
        'name' => 'purok_id',
        'type' => 'select',
        'label' => 'Purok',
        'placeholder' => 'All Puroks',
        'options' => $puroks->pluck('purok_name', 'id')->toArray(),
        'col' => 4
    ],
    [
        'name' => 'beneficiary_type',
        'type' => 'select',
        'label' => 'Beneficiary Type',
        'placeholder' => 'All Types',
        'options' => [
            'pwd' => 'PWD',
            '4ps' => '4Ps Beneficiary',
            'senior' => 'Senior Citizen',
            'teen' => 'Teen'
        ],
        'col' => 3
    ],
    [
        'name' => 'type',
        'type' => 'select',
        'label' => 'Household Type',
        'placeholder' => 'All Types',
        'options' => [
            'nuclear' => 'Nuclear Family',
            'extended' => 'Extended Family',
            'single' => 'Single Person',
            'other' => 'Other'
        ],
        'col' => 3
    ],
    [
        'name' => 'status',
        'type' => 'select',
        'label' => 'Status',
        'placeholder' => 'All Status',
        'options' => [
            'active' => 'Active',
            'inactive' => 'Inactive',
            'pending' => 'Pending Approval'
        ],
        'col' => 3
    ],
    [
        'name' => 'member_count_min',
        'type' => 'number',
        'label' => 'Min Members',
        'placeholder' => 'Min',
        'min' => 1,
        'col' => 2
    ],
    [
        'name' => 'member_count_max',
        'type' => 'number',
        'label' => 'Max Members',
        'placeholder' => 'Max',
        'min' => 1,
        'col' => 1
    ]
];
?>

<?php if (isset($component)) { $__componentOriginal33e4867731ced0462908f8cc78d5ea1b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal33e4867731ced0462908f8cc78d5ea1b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.search-filter','data' => ['route' => route('households.index'),'title' => 'Search & Filter Households','icon' => 'bi-house-fill','fields' => $searchFields,'advanced' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('search-filter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('households.index')),'title' => 'Search & Filter Households','icon' => 'bi-house-fill','fields' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($searchFields),'advanced' => true]); ?>
    
     <?php $__env->slot('advancedSlot', null, []); ?> 
        <div class="col-md-4">
            <label class="form-label small">Date Registered From</label>
            <input type="date" class="form-control" name="date_from" value="<?php echo e(request('date_from')); ?>">
        </div>
        <div class="col-md-4">
            <label class="form-label small">Date Registered To</label>
            <input type="date" class="form-control" name="date_to" value="<?php echo e(request('date_to')); ?>">
        </div>
        <div class="col-md-4">
            <label class="form-label small">Has Pregnant Member</label>
            <select class="form-select" name="has_pregnant">
                <option value="">All</option>
                <option value="yes" <?php echo e(request('has_pregnant') == 'yes' ? 'selected' : ''); ?>>Yes</option>
                <option value="no" <?php echo e(request('has_pregnant') == 'no' ? 'selected' : ''); ?>>No</option>
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

<!-- Households Table -->
<div class="card">
    <div class="card-body">
        <?php if($households->count() > 0): ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Household ID</th>
                            <th>Primary Head</th>
                            <th>Address / Purok</th>
                            <th>Members / Families</th>
                            <th>Housing</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $households; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $household): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <strong class="text-primary"><?php echo e($household->household_id); ?></strong>
                            </td>
                            <td>
                                <?php if($household->officialHead): ?>
                                    <div class="d-flex align-items-center gap-2 text-nowrap">
                                        <a href="<?php echo e(route('residents.show', $household->officialHead)); ?>" class="text-decoration-none">
                                            <strong><?php echo e($household->officialHead->full_name); ?></strong>
                                        </a>
                                        <small class="text-muted"><?php echo e($household->officialHead->age); ?> yrs, <?php echo e(ucfirst($household->officialHead->sex)); ?></small>
                                    </div>
                                <?php elseif($household->head): ?>
                                    <a href="<?php echo e(route('residents.show', $household->head)); ?>">
                                        <?php echo e($household->head->full_name); ?>

                                    </a>
                                <?php else: ?>
                                    <span class="text-muted">N/A</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div><?php echo e($household->address); ?></div>
                                <?php if($household->purok): ?>
                                    <small class="text-muted">
                                        <i class="bi bi-geo-alt-fill"></i> <?php echo e(is_object($household->purok) ? $household->purok->purok_name : $household->purok); ?>

                                    </small>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="badge bg-primary">
                                    <i class="bi bi-people-fill"></i> <?php echo e($household->total_members); ?> Members
                                </span>
                                <?php
                                    $familyCount = $household->subFamilies ? $household->subFamilies->count() : 0;
                                ?>
                                <?php if($familyCount > 1): ?>
                                    <br><span class="badge bg-info mt-1">
                                        <i class="bi bi-diagram-3-fill"></i> <?php echo e($familyCount); ?> Families
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <small>
                                    <span class="badge bg-<?php echo e($household->housing_type === 'owned' ? 'success' : ($household->housing_type === 'rented' ? 'warning' : 'info')); ?>">
                                        <?php echo e(ucfirst($household->housing_type)); ?>

                                    </span>
                                    <?php if($household->has_electricity): ?>
                                        <br><span class="text-muted">Electricity</span>
                                    <?php endif; ?>
                                </small>
                            </td>
                            <td>
                                <span class="badge bg-<?php echo e($household->approval_badge_color); ?>">
                                    <?php echo e(ucfirst($household->approval_status)); ?>

                                </span>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="<?php echo e(route('households.show', $household)); ?>" 
                                       class="btn btn-primary" title="View">
                                        <i class="bi bi-eye"></i> View
                                    </a>
                                    <?php if(auth()->user()->isSecretary()): ?>
                                        <a href="<?php echo e(route('households.edit', $household)); ?>" 
                                           class="btn btn-warning" title="Edit">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <form action="<?php echo e(route('households.archive', $household)); ?>" 
                                              method="POST" class="d-inline"
                                              onsubmit="return confirm('Are you sure you want to archive this household? All residents will also be archived.')">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn btn-secondary" title="Archive">
                                                <i class="bi bi-archive"></i> Archive
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            
            <div class="mt-3">
                <?php echo e($households->links()); ?>

            </div>
        <?php else: ?>
            <div class="text-center py-5">
                <i class="bi bi-house" style="font-size: 64px; color: #ccc;"></i>
                <p class="text-muted mt-3">No households found.</p>
                <?php if(auth()->user()->isSecretary()): ?>
                    <a href="<?php echo e(route('households.create')); ?>" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Register First Household
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
.table .btn-group { display: inline-flex !important; flex-wrap: nowrap !important; }
.table .btn-group .btn { padding: 0.375rem 0.5rem !important; border-radius: 6px !important; white-space: nowrap !important; }
.table .btn-group form { display: inline-block !important; }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views\households\index.blade.php ENDPATH**/ ?>