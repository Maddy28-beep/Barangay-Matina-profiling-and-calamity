<?php $__env->startSection('title', 'Residents'); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .btn-group-sm > .btn {
        white-space: nowrap;
    }
    .btn-group {
        display: inline-flex !important;
        flex-wrap: nowrap !important;
    }
    
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="section-offset">
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-people"></i> Residents</h2>
    <div class="alert alert-info mb-0 py-2 px-3">
        <i class="bi bi-info-circle"></i> To add residents, go to <strong>Households</strong> → Select household → <strong>Add Member</strong>
    </div>
</div>

<?php
$residentSearchFields = [
    [
        'name' => 'search',
        'type' => 'text',
        'label' => 'Name or ID',
        'placeholder' => 'Search by name or ID...',
        'col' => 4
    ],
    [
        'name' => 'category',
        'type' => 'select',
        'label' => 'Category',
        'placeholder' => 'All Categories',
        'options' => [
            'pwd' => 'PWD',
            'senior' => 'Senior Citizens',
            'teen' => 'Teens',
            'voter' => 'Voters',
            '4ps' => '4Ps Beneficiaries',
            'head' => 'Household Heads'
        ],
        'col' => 3
    ],
    [
        'name' => 'gender',
        'type' => 'select',
        'label' => 'Gender',
        'placeholder' => 'All Genders',
        'options' => [
            'Male' => 'Male',
            'Female' => 'Female'
        ],
        'col' => 2
    ],
    [
        'name' => 'civil_status',
        'type' => 'select',
        'label' => 'Civil Status',
        'placeholder' => 'All Status',
        'options' => [
            'Single' => 'Single',
            'Married' => 'Married',
            'Widowed' => 'Widowed',
            'Separated' => 'Separated'
        ],
        'col' => 3
    ]
];
?>

<?php if (isset($component)) { $__componentOriginal33e4867731ced0462908f8cc78d5ea1b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal33e4867731ced0462908f8cc78d5ea1b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.search-filter','data' => ['route' => route('residents.index'),'title' => 'Search & Filter Residents','icon' => 'bi-people-fill','fields' => $residentSearchFields,'advanced' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('search-filter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('residents.index')),'title' => 'Search & Filter Residents','icon' => 'bi-people-fill','fields' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($residentSearchFields),'advanced' => true]); ?>
    
     <?php $__env->slot('advancedSlot', null, []); ?> 
        <div class="col-md-3">
            <label class="form-label small">Age From</label>
            <input type="number" class="form-control" name="age_from" value="<?php echo e(request('age_from')); ?>" min="0" max="120">
        </div>
        <div class="col-md-3">
            <label class="form-label small">Age To</label>
            <input type="number" class="form-control" name="age_to" value="<?php echo e(request('age_to')); ?>" min="0" max="120">
        </div>
        <div class="col-md-3">
            <label class="form-label small">Purok</label>
            <select class="form-select" name="purok">
                <option value="">All Puroks</option>
                <?php for($i = 1; $i <= 10; $i++): ?>
                    <option value="Purok <?php echo e($i); ?>" <?php echo e(request('purok') == "Purok $i" ? 'selected' : ''); ?>>Purok <?php echo e($i); ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label small">Employment Status</label>
            <select class="form-select" name="employment">
                <option value="">All</option>
                <option value="employed" <?php echo e(request('employment') == 'employed' ? 'selected' : ''); ?>>Employed</option>
                <option value="unemployed" <?php echo e(request('employment') == 'unemployed' ? 'selected' : ''); ?>>Unemployed</option>
                <option value="student" <?php echo e(request('employment') == 'student' ? 'selected' : ''); ?>>Student</option>
                <option value="retired" <?php echo e(request('employment') == 'retired' ? 'selected' : ''); ?>>Retired</option>
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

<!-- Residents Table -->
<div class="card">
    <div class="card-body">
        <?php if($residents->count() > 0): ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Resident ID</th>
                            <th>Name</th>
                            <th>Age/Sex</th>
                            <th>Household</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Categories</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $residents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resident): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><strong><?php echo e($resident->resident_id); ?></strong></td>
                            <td>
                                <a href="<?php echo e(route('residents.show', $resident)); ?>">
                                    <?php echo e($resident->full_name); ?>

                                </a>
                                <?php if($resident->is_household_head): ?>
                                    <br><span class="badge bg-success">Household Head</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php echo e($resident->age); ?> / <?php echo e(ucfirst($resident->sex)); ?>

                                <br><small class="text-muted"><?php echo e($resident->age_category); ?></small>
                            </td>
                            <td>
                                <a href="<?php echo e(route('households.show', $resident->household)); ?>">
                                    <?php echo e($resident->household->household_id); ?>

                                </a>
                            </td>
                            <td>
                                <small><?php echo e(Str::limit($resident->household->full_address, 30)); ?></small>
                            </td>
                            <td>
                                <span class="badge bg-<?php echo e($resident->status_badge_color); ?>">
                                    <?php echo e(ucfirst($resident->status)); ?>

                                </span>
                                <?php if($resident->isPending()): ?>
                                    <br><span class="badge bg-<?php echo e($resident->approval_badge_color); ?>">
                                        Pending Approval
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($resident->is_pwd): ?>
                                    <span class="badge bg-info">PWD</span>
                                <?php endif; ?>
                                <?php if($resident->is_senior_citizen): ?>
                                    <span class="badge bg-warning">Senior</span>
                                <?php endif; ?>
                                <?php if($resident->is_teen): ?>
                                    <span class="badge bg-secondary">Teen</span>
                                <?php endif; ?>
                                <?php if($resident->is_voter): ?>
                                    <span class="badge bg-success">Voter</span>
                                <?php endif; ?>
                                <?php if($resident->is_4ps_beneficiary): ?>
                                    <span class="badge bg-primary">4Ps</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="<?php echo e(route('residents.show', $resident)); ?>" 
                                       class="btn btn-primary" title="View">
                                        <i class="bi bi-eye"></i> View
                                    </a>
                                    <?php if(auth()->user()->isSecretary()): ?>
                                        <a href="<?php echo e(route('residents.edit', $resident)); ?>" 
                                           class="btn btn-warning" title="Edit">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <button type="button" class="btn btn-secondary" title="Archive"
                                                onclick="if(confirm('Are you sure you want to archive this resident?')) { document.getElementById('archive-form-<?php echo e($resident->id); ?>').submit(); }">
                                            <i class="bi bi-archive"></i> Archive
                                        </button>
                                        <form id="archive-form-<?php echo e($resident->id); ?>" 
                                              action="<?php echo e(route('residents.archive', $resident)); ?>" 
                                              method="POST" class="d-none">
                                            <?php echo csrf_field(); ?>
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
                <?php echo e($residents->links()); ?>

            </div>
        <?php else: ?>
            <div class="text-center py-5">
                <i class="bi bi-people" style="font-size: 64px; color: #ccc;"></i>
                <p class="text-muted mt-3">No residents found.</p>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views/residents/index.blade.php ENDPATH**/ ?>