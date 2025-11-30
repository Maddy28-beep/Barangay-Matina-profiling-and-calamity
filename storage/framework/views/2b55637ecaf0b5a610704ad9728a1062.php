<?php $__env->startSection('content'); ?>
<div class="container">
    <h2 class="mb-4">Edit Household</h2>
    
    <div class="card">
        <div class="card-body">
            <form action="<?php echo e(route('households.update', $household)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                
                <h5 class="mb-3">Household Information</h5>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Household ID</label>
                        <input type="text" class="form-control" value="<?php echo e($household->household_id); ?>" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Household Type <span class="text-danger">*</span></label>
                        <select name="household_type" class="form-select <?php $__errorArgs = ['household_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                            <option value="">Select Type</option>
                            <option value="solo" <?php echo e($household->household_type == 'solo' ? 'selected' : ''); ?>>Solo (Living Alone)</option>
                            <option value="family" <?php echo e($household->household_type == 'family' ? 'selected' : ''); ?>>Family</option>
                            <option value="extended" <?php echo e($household->household_type == 'extended' ? 'selected' : ''); ?>>Extended Family</option>
                        </select>
                        <?php $__errorArgs = ['household_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Purok</label>
                        <select class="form-select <?php $__errorArgs = ['purok'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="purok">
                            <option value="">Select Purok</option>
                            <?php $__currentLoopData = $puroks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purok): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($purok); ?>" <?php echo e(old('purok', $household->purok) == $purok ? 'selected' : ''); ?>>
                                    <?php echo e($purok); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['purok'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    
                    <div class="col-md-8">
                        <label class="form-label">Address <span class="text-danger">*</span></label>
                        <select class="form-select <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="address" name="address" required>
                            <option value="">Select Address</option>
                            <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $addr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($addr); ?>" <?php echo e(old('address', $household->address) == $addr ? 'selected' : ''); ?>>
                                    <?php echo e($addr); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <option value="__new__">+ Add New Address</option>
                        </select>
                        <input type="text" class="form-control mt-2 d-none" id="new_address" 
                               placeholder="Enter new address (House No., Street Name)">
                        <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Total Members</label>
                        <input type="number" class="form-control" value="<?php echo e($household->total_members); ?>" disabled>
                        <small class="text-muted">To change members, add or remove residents from this household</small>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Update Household
                    </button>
                    <a href="<?php echo e(route('households.show', $household)); ?>" class="btn btn-secondary">
                        <i class="bi bi-x-circle"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle "Add New Address" option
    document.getElementById('address').addEventListener('change', function() {
        const newAddressInput = document.getElementById('new_address');
        if (this.value === '__new__') {
            newAddressInput.classList.remove('d-none');
            newAddressInput.required = true;
            newAddressInput.focus();
        } else {
            newAddressInput.classList.add('d-none');
            newAddressInput.required = false;
            newAddressInput.value = '';
        }
    });
    
    // Before form submit, use new address if provided
    document.querySelector('form').addEventListener('submit', function(e) {
        const addressSelect = document.getElementById('address');
        const newAddressInput = document.getElementById('new_address');
        
        if (addressSelect.value === '__new__' && newAddressInput.value.trim()) {
            // Create a hidden input with the new address
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'address';
            hiddenInput.value = newAddressInput.value.trim();
            this.appendChild(hiddenInput);
            
            // Remove name from select to avoid conflict
            addressSelect.removeAttribute('name');
        }
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views\households\edit.blade.php ENDPATH**/ ?>