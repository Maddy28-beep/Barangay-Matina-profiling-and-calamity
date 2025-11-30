<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Calamity Report</title>
  <style>
    body { font-family: DejaVu Sans, Arial, sans-serif; font-size: 12px; color: #111; }
    h1 { font-size: 18px; margin: 0 0 8px; }
    h2 { font-size: 14px; margin: 18px 0 6px; }
    .section { margin-bottom: 12px; }
    .grid { display: table; width: 100%; }
    .grid .col { display: table-cell; padding-right: 10px; vertical-align: top; }
    .grid .col-3 { width: 33%; }
    .grid .col-2 { width: 50%; }
    .box { border: 1px solid #ddd; padding: 8px; }
    .photos img { height: 90px; margin-right: 6px; border: 1px solid #ccc; }
    .list li { margin-bottom: 4px; }
    .signature { margin-top: 24px; }
    .signature .sig { border-top: 1px solid #000; padding-top: 4px; width: 60%; }
  </style>
</head>
<body>
  <h1>Calamity Report</h1>

  <div class="section">
    <h2>1. Calamity Incident Report</h2>
    <div class="grid">
      <div class="col col-3"><strong>Type of Calamity:</strong> <?php echo e(ucfirst($calamity->calamity_type)); ?></div>
      <div class="col col-3"><strong>Date & Time:</strong> <?php echo e(optional($calamity->date_occurred)->format('Y-m-d')); ?></div>
      <div class="col col-3"><strong>Severity Level:</strong> <?php echo e($calamity->severity_level); ?></div>
    </div>
    <div class="box" style="margin-top:6px"><strong>Affected Puroks/Areas:</strong> <?php echo e($calamity->affected_areas ?? (is_array($calamity->affected_puroks)? implode(', ',$calamity->affected_puroks):'N/A')); ?></div>
    <div class="box" style="margin-top:6px"><strong>Short Description:</strong> <?php echo e($calamity->description ?? 'N/A'); ?></div>
    <?php if(is_array($calamity->photos) && count($calamity->photos)): ?>
      <div class="photos" style="margin-top:6px">
        <?php $__currentLoopData = $calamity->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <img src="<?php echo e(public_path($p)); ?>" alt="Incident Photo">
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    <?php endif; ?>
  </div>

  <div class="section">
    <h2>2. Affected Population Report</h2>
    <div class="grid">
      <div class="col col-3"><strong>Total Affected Households:</strong> <?php echo e($totalAffectedHouseholds); ?></div>
      <div class="col col-3"><strong>Total Affected Residents:</strong> <?php echo e($totalAffectedResidents); ?></div>
    </div>
  </div>

  <div class="section">
    <h2>3. Evacuation Report</h2>
    <div class="grid">
      <div class="col col-3"><strong>Total Evacuees:</strong> <?php echo e($totalEvacuees); ?></div>
      <div class="col col-3"><strong>Total Families Evacuated:</strong> <?php echo e($totalFamiliesEvacuated); ?></div>
      <div class="col col-3"><strong>Evacuation Center Occupancy:</strong>
        <?php if($evacuationCenterOccupancy->count()): ?>
          <?php $__currentLoopData = $evacuationCenterOccupancy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $centerId => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            Center #<?php echo e($centerId); ?>: <?php echo e($count); ?><?php if(!$loop->last): ?>; <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
          No records
        <?php endif; ?>
      </div>
    </div>
    <div class="grid" style="margin-top:6px">
      <div class="col col-2"><strong>Center Capacity vs Occupants:</strong> Not recorded</div>
      <div class="col col-2"><strong>Duration of Evacuation:</strong> Not recorded</div>
    </div>
  </div>

  <div class="section">
    <h2>4. Rescue Operations Report</h2>
    <div class="grid">
      <div class="col col-3"><strong>Total Rescues:</strong> <?php echo e($totalRescues); ?></div>
    </div>
    <?php if($rescueSummaryByHousehold->count()): ?>
      <ul class="list" style="margin-top:6px">
        <?php $__currentLoopData = $rescueSummaryByHousehold; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ahId => $rescs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li>
            HH-<?php echo e(optional($rescs->first()->affectedHousehold->household)->household_id); ?>:
            <?php $__currentLoopData = $rescs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php echo e(optional($r->rescuer)->name ?? 'Unknown'); ?> • <?php echo e(optional($r->rescue_time)->format('Y-m-d H:i')); ?><?php if($r->evacuationCenter): ?> → <?php echo e($r->evacuationCenter->name); ?> <?php endif; ?> <?php if(!$loop->last): ?>; <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    <?php endif; ?>
  </div>

  <div class="section">
    <h2>5. Relief Distribution Report</h2>
    <div class="grid">
      <div class="col col-3"><strong>Total Relief Goods Distributed:</strong> <?php echo e($totalReliefDistributed); ?></div>
    </div>
    <?php if($reliefSummaryPerHousehold->count()): ?>
      <ul class="list" style="margin-top:6px">
        <?php $__currentLoopData = $reliefSummaryPerHousehold; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hhId => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li>
            HH-<?php echo e(optional($items->first()->household)->household_id); ?>:
            <?php $byItem = $items->groupBy('relief_item_id'); ?>
            <?php $__currentLoopData = $byItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemId => $dist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php echo e(optional($dist->first()->item)->name); ?> (<?php echo e($dist->sum('quantity')); ?>)<?php if(!$loop->last): ?>, <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    <?php endif; ?>
  </div>

  <div class="section">
    <h2>6. Damage Report</h2>
    <div class="grid">
      <div class="col col-3"><strong>Partially Damaged Houses:</strong> <?php echo e($partiallyDamaged); ?></div>
      <div class="col col-3"><strong>Totally Damaged Houses:</strong> <?php echo e($totallyDamaged); ?></div>
      <div class="col col-3"><strong>Basic Cost Estimate:</strong> <?php echo e(number_format($estimatedDamageCost,2)); ?></div>
    </div>
  </div>

  <div class="section">
    <h2>7. Casualty Report</h2>
    <div class="grid">
      <div class="col col-3"><strong>Total Injured:</strong> <?php echo e($calamity->getTotalInjuredAttribute()); ?></div>
      <div class="col col-3"><strong>Total Missing:</strong> <?php echo e($affectedHouseholds->sum('missing')); ?></div>
      <div class="col col-3"><strong>Total Fatalities:</strong> <?php echo e($affectedHouseholds->sum('casualties')); ?></div>
    </div>
  </div>

  <div class="section signature">
    <div class="grid">
      <div class="col col-2"><div class="sig">Prepared by: <?php echo e($calamity->reporter?->name ?? 'N/A'); ?></div></div>
      <div class="col col-2"><div class="sig">Verified by: Barangay Secretary</div></div>
    </div>
  </div>
</body>
</html><?php /**PATH D:\matina_pangi_profiling\resources\views\calamity\reports\pdf.blade.php ENDPATH**/ ?>