# Navigation Update Guide - Health Module

## 📋 How to Add Health Module Link to Sidebar

### Step 1: Locate Your Sidebar Navigation File

Your sidebar navigation is likely in one of these files:
- `resources/views/layouts/app.blade.php`
- `resources/views/layouts/sidebar.blade.php`
- `resources/views/partials/sidebar.blade.php`

### Step 2: Add Health Module Link

Add this code block to your sidebar navigation menu, ideally after the Census or Dashboard link:

```html
<!-- Health Module -->
<li class="nav-item">
    <a class="nav-link {{ Request::is('health*') ? 'active' : '' }}" 
       href="{{ route('health.dashboard') }}">
        <i class="fas fa-heartbeat me-2"></i>
        <span>Health Module</span>
        @if(\App\Models\HealthAssistance::where('status', 'pending')->count() > 0)
            <span class="badge bg-warning text-dark ms-auto">
                {{ \App\Models\HealthAssistance::where('status', 'pending')->count() }}
            </span>
        @endif
    </a>
</li>
```

### Alternative: Dropdown Menu Style

If you prefer a dropdown with sub-items:

```html
<!-- Health Module Dropdown -->
<li class="nav-item">
    <a class="nav-link dropdown-toggle {{ Request::is('health*') ? 'active' : '' }}" 
       href="#" 
       id="healthDropdown" 
       role="button" 
       data-bs-toggle="collapse" 
       data-bs-target="#healthSubmenu"
       aria-expanded="false">
        <i class="fas fa-heartbeat me-2"></i>
        <span>Health Module</span>
        <i class="fas fa-chevron-down ms-auto"></i>
    </a>
    <div class="collapse {{ Request::is('health*') ? 'show' : '' }}" id="healthSubmenu">
        <ul class="nav flex-column ms-3">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('health/dashboard') ? 'active' : '' }}" 
                   href="{{ route('health.dashboard') }}">
                    <i class="fas fa-chart-line me-2"></i>Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('health/maternal-health*') ? 'active' : '' }}" 
                   href="{{ route('health.maternal-health.index') }}">
                    <i class="fas fa-baby me-2"></i>Maternal Health
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('health/child-health*') ? 'active' : '' }}" 
                   href="{{ route('health.child-health.index') }}">
                    <i class="fas fa-child me-2"></i>Child Health
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('health/senior-health*') ? 'active' : '' }}" 
                   href="{{ route('health.senior-health.index') }}">
                    <i class="fas fa-user-md me-2"></i>Senior Health
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('health/disease-monitoring*') ? 'active' : '' }}" 
                   href="{{ route('health.disease-monitoring.index') }}">
                    <i class="fas fa-virus me-2"></i>Disease Monitoring
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('health/health-assistance*') ? 'active' : '' }}" 
                   href="{{ route('health.health-assistance.index') }}">
                    <i class="fas fa-hand-holding-medical me-2"></i>Health Assistance
                    @if(\App\Models\HealthAssistance::where('status', 'pending')->count() > 0)
                        <span class="badge bg-warning text-dark ms-2">
                            {{ \App\Models\HealthAssistance::where('status', 'pending')->count() }}
                        </span>
                    @endif
                </a>
            </li>
            @can('secretary')
            <li class="nav-item">
                <a class="nav-link {{ Request::is('health/reports*') ? 'active' : '' }}" 
                   href="{{ route('health.reports.index') }}">
                    <i class="fas fa-file-medical me-2"></i>Reports
                </a>
            </li>
            @endcan
        </ul>
    </div>
</li>
```

### Step 3: Add Icons (if not already included)

Make sure Font Awesome is included in your layout header:

```html
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
```

### Step 4: Add Active State Styling (Optional)

If you don't have active state styling yet, add this to your CSS:

```css
.nav-link.active {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: white !important;
    border-radius: 8px;
}

.nav-link.active i {
    color: white;
}
```

### Step 5: Test Navigation

1. Refresh your page
2. Click on the Health Module link
3. Verify you're redirected to `/health/dashboard`
4. Check that the active state works when navigating between health pages

---

## 🎨 Icon Reference

Use these Font Awesome icons for consistency:

- **Health Module**: `fa-heartbeat` or `fa-heart-pulse`
- **Dashboard**: `fa-chart-line` or `fa-chart-pie`
- **Maternal**: `fa-baby` or `fa-baby-carriage`
- **Child**: `fa-child` or `fa-children`
- **Senior**: `fa-user-md` or `fa-user-nurse`
- **Disease**: `fa-virus` or `fa-disease`
- **Assistance**: `fa-hand-holding-medical` or `fa-hands-helping`
- **Reports**: `fa-file-medical` or `fa-file-chart-line`

---

## 🔔 Notification Badge

The pending assistance count badge will automatically show:
- Yellow badge with count when there are pending requests
- Only visible when count > 0
- Updates in real-time on page refresh

---

## 📱 Responsive Behavior

The navigation will automatically:
- Collapse on mobile devices
- Show active states
- Maintain dropdown state when navigating between sub-pages

---

## ✅ Quick Checklist

- [ ] Located sidebar navigation file
- [ ] Added Health Module link
- [ ] Tested navigation works
- [ ] Verified active states
- [ ] Checked on mobile view
- [ ] Confirmed badge shows for pending items
- [ ] Tested dropdown (if using dropdown style)

---

## 🎯 Example Placement

Your sidebar might look like this after adding:

```
├── Dashboard
├── Residents
├── Households
├── Census
├── Health Module ← NEW!
│   ├── Dashboard
│   ├── Maternal Health
│   ├── Child Health
│   ├── Senior Health
│   ├── Disease Monitoring
│   ├── Health Assistance (3) ← Badge
│   └── Reports (Secretary only)
├── Certificates
├── Puroks
└── ...
```

---

Need help? Check your existing sidebar code and follow the pattern used for other menu items!
