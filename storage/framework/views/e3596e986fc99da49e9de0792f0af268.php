
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'route' => '',
    'title' => 'Search & Filter',
    'icon' => 'bi-funnel-fill',
    'fields' => [],
    'advanced' => false
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'route' => '',
    'title' => 'Search & Filter',
    'icon' => 'bi-funnel-fill',
    'fields' => [],
    'advanced' => false
]); ?>
<?php foreach (array_filter(([
    'route' => '',
    'title' => 'Search & Filter',
    'icon' => 'bi-funnel-fill',
    'fields' => [],
    'advanced' => false
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="card mb-4">
    <div class="card-header bg-light">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <i class="<?php echo e($icon); ?>"></i> <?php echo e($title); ?>

            </h5>
            <?php if($advanced): ?>
                <button type="button" class="btn btn-sm btn-outline-secondary" id="toggleAdvanced">
                    <i class="bi bi-gear"></i> Advanced
                </button>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">
        <form action="<?php echo e($route); ?>" method="GET" id="searchForm">
            <div class="row g-3">
                <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-<?php echo e($field['col'] ?? 4); ?>">
                        <label class="form-label small"><?php echo e($field['label']); ?></label>
                        
                        <?php if($field['type'] === 'text'): ?>
                            <input type="text" 
                                   class="form-control" 
                                   name="<?php echo e($field['name']); ?>" 
                                   placeholder="<?php echo e($field['placeholder'] ?? ''); ?>" 
                                   value="<?php echo e(request($field['name'])); ?>">
                        
                        <?php elseif($field['type'] === 'select'): ?>
                            <select class="form-select" name="<?php echo e($field['name']); ?>">
                                <option value=""><?php echo e($field['placeholder'] ?? 'All'); ?></option>
                                <?php $__currentLoopData = $field['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value); ?>" 
                                            <?php echo e(request($field['name']) == $value ? 'selected' : ''); ?>>
                                        <?php echo e($label); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        
                        <?php elseif($field['type'] === 'date'): ?>
                            <input type="date" 
                                   class="form-control" 
                                   name="<?php echo e($field['name']); ?>" 
                                   value="<?php echo e(request($field['name'])); ?>">
                        
                        <?php elseif($field['type'] === 'number'): ?>
                            <input type="number" 
                                   class="form-control" 
                                   name="<?php echo e($field['name']); ?>" 
                                   placeholder="<?php echo e($field['placeholder'] ?? ''); ?>" 
                                   value="<?php echo e(request($field['name'])); ?>"
                                   min="<?php echo e($field['min'] ?? ''); ?>"
                                   max="<?php echo e($field['max'] ?? ''); ?>">
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                
                <div class="col-md-12">
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-search"></i> Search
                        </button>
                        <a href="<?php echo e($route); ?>" class="btn btn-secondary">
                            <i class="bi bi-x-circle"></i> Clear
                        </a>
                        <?php if(isset($exportRoute)): ?>
                            <div class="btn-group">
                                <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown">
                                    <i class="bi bi-download"></i> Export
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?php echo e($exportRoute); ?>?<?php echo e(http_build_query(request()->all())); ?>">
                                        <i class="bi bi-file-excel"></i> Export to Excel
                                    </a></li>
                                    <li><a class="dropdown-item" href="<?php echo e($exportRoute); ?>?format=pdf&<?php echo e(http_build_query(request()->all())); ?>">
                                        <i class="bi bi-file-pdf"></i> Export to PDF
                                    </a></li>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            
            <?php if($advanced): ?>
                <div id="advancedFilters" class="mt-3" style="display: none;">
                    <hr>
                    <div class="row g-3">
                        <?php echo e($advancedSlot ?? ''); ?>

                    </div>
                </div>
            <?php endif; ?>
        </form>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Toggle advanced filters
    const toggleBtn = document.getElementById('toggleAdvanced');
    const advancedFilters = document.getElementById('advancedFilters');
    
    if (toggleBtn && advancedFilters) {
        toggleBtn.addEventListener('click', function() {
            if (advancedFilters.style.display === 'none') {
                advancedFilters.style.display = 'block';
                this.innerHTML = '<i class="bi bi-gear-fill"></i> Hide Advanced';
            } else {
                advancedFilters.style.display = 'none';
                this.innerHTML = '<i class="bi bi-gear"></i> Advanced';
            }
        });
    }
    
    // Auto-submit on select change (optional)
    const autoSubmitSelects = document.querySelectorAll('.auto-submit');
    autoSubmitSelects.forEach(select => {
        select.addEventListener('change', function() {
            document.getElementById('searchForm').submit();
        });
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\matina_pangi_profiling\resources\views\components\search-filter.blade.php ENDPATH**/ ?>