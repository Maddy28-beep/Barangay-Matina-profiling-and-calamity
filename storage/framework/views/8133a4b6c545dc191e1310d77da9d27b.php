<?php $__env->startSection('title', 'Create Announcement'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0"><i class="bi bi-megaphone"></i> Create Announcement</h2>
    <a href="<?php echo e(route('announcements.index')); ?>" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Back</a>
    </div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="<?php echo e(route('announcements.store')); ?>" id="announcementForm">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="filters_json" id="filters_json">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" required value="<?php echo e(old('title')); ?>" placeholder="Enter announcement title">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Urgency</label>
                    <select name="urgency" class="form-select">
                        <option value="" <?php echo e(old('urgency')==='' ? 'selected' : ''); ?>>Normal</option>
                        <option value="High" <?php echo e(old('urgency')==='High' ? 'selected' : ''); ?>>High</option>
                        <option value="Critical" <?php echo e(old('urgency')==='Critical' ? 'selected' : ''); ?>>Critical</option>
                    </select>
                </div>
                <div class="col-12">
                    <label class="form-label">Message</label>
                    <textarea name="message" rows="4" class="form-control" required placeholder="Write announcement message"><?php echo e(old('message')); ?></textarea>
                </div>

                <div class="col-12">
                    <label class="form-label">Target Audience</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="entire_barangay" <?php echo e(old('target_purok') || old('age_range.min') || old('age_range.max') || old('households') ? '' : 'checked'); ?>>
                        <label class="form-check-label" for="entire_barangay">Entire Barangay</label>
                    </div>

                    <div class="mt-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="specific_purok_chk">
                            <label class="form-check-label" for="specific_purok_chk">Specific Purok</label>
                        </div>
                        <div class="mt-2">
                            <select name="target_purok" id="target_purok" class="form-select" disabled>
                                <option value="">Select Purok</option>
                                <?php if(isset($puroks) && $puroks->count()): ?>
                                    <?php $__currentLoopData = $puroks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($p->purok_name); ?>" <?php echo e(old('target_purok')===$p->purok_name ? 'selected' : ''); ?>><?php echo e($p->purok_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <?php for($i=1;$i<=10;$i++): ?>
                                        <option value="Purok <?php echo e($i); ?>" <?php echo e(old('target_purok')==="Purok $i" ? 'selected' : ''); ?>>Purok <?php echo e($i); ?></option>
                                    <?php endfor; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>

                    <div class="mt-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="age_range_chk">
                            <label class="form-check-label" for="age_range_chk">Age Range</label>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <input type="number" name="age_range[min]" id="age_min" class="form-control" placeholder="From Age" min="0" max="120" value="<?php echo e(old('age_range.min')); ?>" disabled>
                            </div>
                            <div class="col-md-3">
                                <input type="number" name="age_range[max]" id="age_max" class="form-control" placeholder="To Age" min="0" max="120" value="<?php echo e(old('age_range.max')); ?>" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="households_chk">
                            <label class="form-check-label" for="households_chk">Specific Households</label>
                        </div>
                        <div class="mt-2">
                            <select name="households[]" id="households_select" class="form-select" multiple disabled>
                                <?php if(isset($households) && $households->count()): ?>
                                    <?php $__currentLoopData = $households; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($hh->id); ?>" <?php echo e(in_array($hh->id, old('households', [])) ? 'selected' : ''); ?>><?php echo e($hh->household_id); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <option value="" disabled>No households available</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>

                    <div class="mt-3">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="only_affected" id="only_affected" value="1" <?php echo e(old('only_affected') ? 'checked' : ''); ?>>
                        <label class="form-check-label" for="only_affected">Only Affected Residents</label>
                    </div>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" name="only_evacuees" id="only_evacuees" value="1" <?php echo e(old('only_evacuees') ? 'checked' : ''); ?>>
                        <label class="form-check-label" for="only_evacuees">Only Evacuees</label>
                    </div>
                </div>
                </div>

                <div class="col-12 mt-3">
                    <label class="form-label">Delivery Options</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="send_sms" id="send_sms" value="1" <?php echo e(old('send_sms') ? 'checked' : ''); ?>>
                        <label class="form-check-label" for="send_sms">Send SMS</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="send_email" id="send_email" value="1" <?php echo e(old('send_email') ? 'checked' : ''); ?>>
                        <label class="form-check-label" for="send_email">Send Email</label>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="<?php echo e(route('announcements.index')); ?>" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary"><i class="bi bi-send"></i> Send Announcement</button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const entire = document.getElementById('entire_barangay');
    const purokChk = document.getElementById('specific_purok_chk');
    const purokSel = document.getElementById('target_purok');
    const ageChk = document.getElementById('age_range_chk');
    const ageMin = document.getElementById('age_min');
    const ageMax = document.getElementById('age_max');
    const hhChk = document.getElementById('households_chk');
    const hhSel = document.getElementById('households_select');
    const form = document.getElementById('announcementForm');
    const filtersJsonInput = document.getElementById('filters_json');
    const hasPurokOld = !!'<?php echo e(old('target_purok')); ?>';
    const hasAgeOld = !!'<?php echo e(old('age_range.min') || old('age_range.max')); ?>';
    const hasHouseholdsOld = <?php echo e(count(old('households', []))); ?> > 0;

    if (hasPurokOld) { purokChk.checked = true; purokSel.disabled = false; }
    if (hasAgeOld) { ageChk.checked = true; ageMin.disabled = false; ageMax.disabled = false; }
    if (hasHouseholdsOld) { hhChk.checked = true; hhSel.disabled = false; }

    function toggle(el, on) { el.disabled = !on; }

    purokChk.addEventListener('change', () => {
        toggle(purokSel, purokChk.checked);
        if (purokChk.checked) entire.checked = false;
    });
    ageChk.addEventListener('change', () => {
        toggle(ageMin, ageChk.checked);
        toggle(ageMax, ageChk.checked);
        if (ageChk.checked) entire.checked = false;
    });
    hhChk.addEventListener('change', () => {
        toggle(hhSel, hhChk.checked);
        if (hhChk.checked) entire.checked = false;
    });

    form.addEventListener('submit', function() {
        const households = Array.from(hhSel.options)
            .filter(o => o.selected)
            .map(o => Number(o.value));
        const payload = {
            title: form.querySelector('[name="title"]').value,
            message: form.querySelector('[name="message"]').value,
            urgency: form.querySelector('[name="urgency"]').value || 'Normal',
            target_purok: purokChk.checked ? (purokSel.value || null) : null,
            age_range: ageChk.checked ? {
                min: ageMin.value ? Number(ageMin.value) : null,
                max: ageMax.value ? Number(ageMax.value) : null
            } : null,
            households: hhChk.checked ? households : [],
            only_affected: document.getElementById('only_affected').checked,
            only_evacuees: document.getElementById('only_evacuees').checked,
            send_sms: document.getElementById('send_sms').checked,
            send_email: document.getElementById('send_email').checked,
        };
        filtersJsonInput.value = JSON.stringify(payload);
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views/announcements/create.blade.php ENDPATH**/ ?>