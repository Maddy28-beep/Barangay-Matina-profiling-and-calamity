<?php $__env->startSection('title', 'User Settings'); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-4 d-flex justify-content-between align-items-center">
    <div>
        <h2><i class="bi bi-gear"></i> User Settings</h2>
        <p class="text-muted mb-0">Manage user activation, assignment, and creation.</p>
    </div>
    <button class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#createUserForm">
        <i class="bi bi-person-plus"></i> Create User
    </button>
</div>

<div id="createUserForm" class="collapse mb-4">
    <div class="card">
        <div class="card-header"><h5 class="mb-0">New Account</h5></div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('settings.users.store')); ?>" class="row g-3">
                <?php echo csrf_field(); ?>
                <div class="col-md-4">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" required value="<?php echo e(old('name')); ?>">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required value="<?php echo e(old('email')); ?>">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-select" required>
                        <?php $roleOld = old('role'); ?>
                        <option value="staff" <?php echo e($roleOld==='staff'?'selected':''); ?>>Staff</option>
                        <option value="calamity_head" <?php echo e($roleOld==='calamity_head'?'selected':''); ?>>Calamity Head</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required minlength="8">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required minlength="8">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Assigned App (optional)</label>
                    <select name="assigned_app" class="form-select">
                        <?php $appOld = old('assigned_app'); ?>
                        <option value="" <?php echo e(empty($appOld)?'selected':''); ?>>None</option>
                        <option value="profiling_only" <?php echo e($appOld==='profiling_only'?'selected':''); ?>>Profiling Only</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Initial Status</label>
                    <?php $statusOld = old('status','active'); ?>
                    <select name="status" class="form-select">
                        <option value="active" <?php echo e($statusOld==='active'?'selected':''); ?>>Active</option>
                        <option value="deactivated" <?php echo e($statusOld==='deactivated'?'selected':''); ?>>Deactivated</option>
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success"><i class="bi bi-check2"></i> Create Account</button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Accounts</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Assigned App</th>
                        <th class="text-end">Access</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($u->name); ?></td>
                        <td><?php echo e($u->email); ?></td>
                        <td><span class="badge bg-light text-dark"><?php echo e(ucfirst(str_replace('_',' ', $u->role))); ?></span></td>
                        <td>
                            <form action="<?php echo e(route('settings.users.update-status', $u)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                    <option value="active" <?php echo e(($u->status ?? 'active') === 'active' ? 'selected' : ''); ?>>Active</option>
                                    <option value="deactivated" <?php echo e(($u->status ?? 'active') === 'deactivated' ? 'selected' : ''); ?>>Deactivated</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <form action="<?php echo e(route('settings.users.update-assignment', $u)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <select name="assigned_app" class="form-select form-select-sm" onchange="this.form.submit()">
                                    <option value="" <?php echo e(empty($u->assigned_app) ? 'selected' : ''); ?>>None</option>
                                    <option value="profiling_only" <?php echo e(($u->assigned_app ?? '') === 'profiling_only' ? 'selected' : ''); ?>>Profiling Only</option>
                                </select>
                            </form>
                        </td>
                        <td class="text-end">
                            <?php if(($u->status ?? 'active') === 'deactivated'): ?>
                                <span class="badge bg-warning text-dark">Limited Access</span>
                            <?php else: ?>
                                <span class="badge bg-success">Full Access</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views/settings/users.blade.php ENDPATH**/ ?>