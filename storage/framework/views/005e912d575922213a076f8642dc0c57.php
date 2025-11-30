<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Calamities</title>
  <style>
    body { font-family: DejaVu Sans, Arial, sans-serif; font-size: 12px; }
    table { width: 100%; border-collapse: collapse; }
    th, td { border: 1px solid #ccc; padding: 6px; }
    th { background: #f6f6f6; }
  </style>
  </head>
<body>
  <h2>Calamity Incidents</h2>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Type</th>
        <th>Date</th>
        <th>Severity</th>
        <th>Affected Areas</th>
        <th>Affected Puroks</th>
        <th>Total Affected</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $calamities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($c->id); ?></td>
          <td><?php echo e($c->calamity_name); ?></td>
          <td><?php echo e(ucfirst($c->calamity_type)); ?></td>
          <td><?php echo e(optional($c->date_occurred)->format('Y-m-d')); ?></td>
          <td><?php echo e(ucfirst($c->severity_level)); ?></td>
          <td><?php echo e($c->affected_areas); ?></td>
          <td><?php echo e(is_array($c->affected_puroks) ? implode(', ', $c->affected_puroks) : ''); ?></td>
          <td><?php echo e($c->affected_households_count ?? $c->affectedHouseholds()->count()); ?></td>
          <td><?php echo e(ucfirst($c->status)); ?></td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
</body>
</html><?php /**PATH D:\matina_pangi_profiling\resources\views\calamities\export_pdf.blade.php ENDPATH**/ ?>