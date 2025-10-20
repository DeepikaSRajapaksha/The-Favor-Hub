<div class="sidebar d-flex flex-column justify-content-between">
    <div>
        <div class="text-center py-3 border-bottom">
            <h4 class="fw-bold text-warning mb-0">Admin Panel</h4>
        </div>

        <nav class="mt-4">
            <a href="{{ route('admin.dashboard.index') }}"
               class="nav-link d-flex align-items-center px-3 py-2 {{ request()->routeIs('admin.dashboard.index') ? 'active' : '' }}">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>

            <a href="{{ route('admin.users.index') }}"
               class="nav-link d-flex align-items-center px-3 py-2 {{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
                <i class="bi bi-journal-text me-2"></i> Users
            </a>

            <a href="{{ route('admin.menuCategory.index') }}"
               class="nav-link d-flex align-items-center px-3 py-2 {{ request()->routeIs('admin.menuCategory.index') ? 'active' : '' }}">
                <i class="bi bi-journal-text me-2"></i> Menu Category
            </a>

            <a href="{{ route('admin.Menu.index') }}"
               class="nav-link d-flex align-items-center px-3 py-2 {{ request()->routeIs('admin.Menu.index') ? 'active' : '' }}">
                <i class="bi bi-journal-text me-2"></i> Menu Item
            </a>

            <a href="{{ route('admin.Order.index') }}" 
                class="nav-link d-flex align-items-center px-3 py-2 {{ request()->routeIs('admin.Order.index') ? 'active' : '' }}">
                <i class="bi bi-calendar2-event me-2"></i> Order History
            </a>

            <a href="{{ route('admin.POS.index') }}" 
                class="nav-link d-flex align-items-center px-3 py-2 {{ request()->routeIs('admin.POS.index') ? 'active' : '' }}">
                <i class="bi bi-calendar2-event me-2"></i> POS
            </a>
        </nav>
    </div>

    <div class="p-3 border-top">
        <a href="#" class="btn btn-danger w-100 fw-semibold">
            <i class="bi bi-box-arrow-right me-1"></i> Logout
        </a>
    </div>
</div>

