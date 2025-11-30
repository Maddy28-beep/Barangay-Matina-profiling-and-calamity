<?php $__env->startSection('title','Calamity Report'); ?>
<?php $__env->startSection('content'); ?>
<div class="section-offset">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Calamity Report</h4>
    <div>
      <a href="<?php echo e(route('web.calamity-reports.pdf',$calamity)); ?>" class="btn btn-outline-primary"><i class="bi bi-printer"></i> Export PDF</a>
    </div>
  </div>

  <div class="card mb-4">
    <div class="card-header fw-bold">1. Calamity Incident Report</div>
    <div class="card-body">
      <div class="row g-3">
        <div class="col-md-4"><label class="form-label">Type of Calamity</label><div><?php echo e(ucfirst($calamity->calamity_type)); ?></div></div>
        <div class="col-md-4"><label class="form-label">Date & Time</label><div><?php echo e(optional($calamity->date_occurred)->format('Y-m-d')); ?></div></div>
        <div class="col-md-4"><label class="form-label">Severity Level</label><div><?php echo e($calamity->severity_level); ?></div></div>
        <div class="col-md-12"><label class="form-label">Affected Puroks/Areas</label><div><?php echo e($calamity->affected_areas ?? (is_array($calamity->affected_puroks)? implode(', ',$calamity->affected_puroks):'N/A')); ?></div></div>
        <div class="col-md-12"><label class="form-label">Short Description</label><div><?php echo e($calamity->description ?? 'N/A'); ?></div></div>
      </div>
      <?php if(is_array($calamity->photos) && count($calamity->photos)): ?>
      <div class="mt-3">
        <label class="form-label">Attached Photos</label>
        <div class="d-flex flex-wrap gap-2">
          <?php $__currentLoopData = $calamity->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <img src="<?php echo e(asset($p)); ?>" alt="Incident Photo" style="height:120px;border-radius:6px;object-fit:cover;border:1px solid #eee;">
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>

  <div class="card mb-4">
    <div class="card-header fw-bold">2. Affected Population Report</div>
    <div class="card-body">
      <div class="row g-3">
        <div class="col-md-4"><label class="form-label">Total Affected Households</label><div><?php echo e($totalAffectedHouseholds); ?></div></div>
        <div class="col-md-4"><label class="form-label">Total Affected Residents</label><div><?php echo e($totalAffectedResidents); ?></div></div>
      </div>
      <?php if($affectedHouseholds->count()): ?>
      <details class="mt-3">
        <summary class="mb-2">Optional: List of affected households</summary>
        <ul class="list-group">
          <?php $__currentLoopData = $affectedHouseholds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item">HH-<?php echo e($ah->household?->household_id); ?> • <?php echo e($ah->household?->full_address); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </details>
      <?php endif; ?>
    </div>
  </div>

  <div class="card mb-4">
    <div class="card-header fw-bold">3. Evacuation Report</div>
    <div class="card-body">
      <div class="row g-3">
        <div class="col-md-4"><label class="form-label">Total Evacuees</label><div><?php echo e($totalEvacuees); ?></div></div>
        <div class="col-md-4"><label class="form-label">Total Families Evacuated</label><div><?php echo e($totalFamiliesEvacuated); ?></div></div>
        <div class="col-md-4"><label class="form-label">Evacuation Center Occupancy</label>
          <div>
            <?php if($evacuationCenterOccupancy->count()): ?>
              <?php $__currentLoopData = $evacuationCenterOccupancy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $centerId => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span class="badge bg-info me-1">Center #<?php echo e($centerId); ?>: <?php echo e($count); ?></span>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
              <span class="text-muted">No records</span>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="row g-3 mt-2">
        <div class="col-md-4"><label class="form-label">Center Capacity vs Occupants</label><div>Not recorded</div></div>
        <div class="col-md-4"><label class="form-label">Duration of Evacuation</label><div>Not recorded</div></div>
      </div>
    </div>
  </div>

  <div class="card mb-4">
    <div class="card-header fw-bold">4. Rescue Operations Report</div>
    <div class="card-body">
      <div class="row g-3">
        <div class="col-md-4"><label class="form-label">Total Rescues</label><div><?php echo e($totalRescues); ?></div></div>
      </div>
      <?php if($rescueSummaryByHousehold->count()): ?>
      <details class="mt-3">
        <summary class="mb-2">Who rescued each household and when</summary>
        <ul class="list-group">
          <?php $__currentLoopData = $rescueSummaryByHousehold; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ahId => $rescs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item">
              HH-<?php echo e(optional($rescs->first()->affectedHousehold->household)->household_id); ?>:
              <?php $__currentLoopData = $rescs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e(optional($r->rescuer)->name ?? 'Unknown'); ?> • <?php echo e(optional($r->rescue_time)->format('Y-m-d H:i')); ?><?php if($r->evacuationCenter): ?> → <?php echo e($r->evacuationCenter->name); ?> <?php endif; ?> <?php if(!$loop->last): ?>; <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </details>
      <?php else: ?>
        <div class="text-muted">No recorded rescues.</div>
      <?php endif; ?>
    </div>
  </div>

  <div class="card mb-4">
    <div class="card-header fw-bold">5. Relief Distribution Report</div>
    <div class="card-body">
      <div class="row g-3">
        <div class="col-md-4"><label class="form-label">Total Relief Goods Distributed</label><div><?php echo e($totalReliefDistributed); ?></div></div>
      </div>
      <?php if($reliefSummaryPerHousehold->count()): ?>
      <details class="mt-3">
        <summary class="mb-2">Summary of items given per household</summary>
        <ul class="list-group">
          <?php $__currentLoopData = $reliefSummaryPerHousehold; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hhId => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item">
              HH-<?php echo e(optional($items->first()->household)->household_id); ?>:
              <?php $byItem = $items->groupBy('relief_item_id'); ?>
              <?php $__currentLoopData = $byItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemId => $dist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e(optional($dist->first()->item)->name); ?> (<?php echo e($dist->sum('quantity')); ?>)<?php if(!$loop->last): ?>, <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </details>
      <?php endif; ?>
      <div class="mt-2"><small class="text-muted">Remaining relief goods summary is based on inventory module.</small></div>
    </div>
  </div>

  <div class="card mb-4">
    <div class="card-header fw-bold">6. Damage Report</div>
    <div class="card-body">
      <div class="row g-3">
        <div class="col-md-4"><label class="form-label">Partially Damaged Houses</label><div><?php echo e($partiallyDamaged); ?></div></div>
        <div class="col-md-4"><label class="form-label">Totally Damaged Houses</label><div><?php echo e($totallyDamaged); ?></div></div>
        <div class="col-md-4"><label class="form-label">Basic Cost Estimate</label><div><?php echo e(number_format($estimatedDamageCost,2)); ?></div></div>
      </div>
    </div>
  </div>

  <div class="card mb-4">
    <div class="card-header fw-bold">7. Casualty Report</div>
    <div class="card-body">
      <div class="row g-3">
        <div class="col-md-4"><label class="form-label">Total Injured</label><div><?php echo e($calamity->total_injured ?? $calamity->getTotalInjuredAttribute()); ?></div></div>
        <div class="col-md-4"><label class="form-label">Total Missing</label><div><?php echo e($affectedHouseholds->sum('missing')); ?></div></div>
        <div class="col-md-4"><label class="form-label">Total Fatalities</label><div><?php echo e($affectedHouseholds->sum('casualties')); ?></div></div>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header fw-bold">8. Official Signature</div>
    <div class="card-body">
      <div class="row mt-4">
        <div class="col-md-6">
          <div class="border-top pt-2">Prepared by: <?php echo e($calamity->reporter?->name ?? 'N/A'); ?></div>
        </div>
        <div class="col-md-6">
          <div class="border-top pt-2">Verified by: Barangay Secretary</div>
        </div>
      </div>
    </div>
  </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\matina_pangi_profiling\resources\views\calamity\reports\show.blade.php ENDPATH**/ ?>