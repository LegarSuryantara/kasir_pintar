<div class="sidebar" style="width: 250px; min-height: 100vh; position: fixed; left: 0; top: 0; background-color: #FFC107;">
    <div class="p-3">
        <div class="d-flex align-items-center justify-content-center mb-4 mt-2">
            <i class="fas fa-cash-register text-light me-2 fs-4"></i>
            <h4 class="text-light mb-0" style="font-style: italic ">CashDash</h4>
        </div>
        
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="{{ route('dashboardKasir.index') }}" class="nav-link text-dark {{ request()->routeIs('dashboardKasir.index') ? 'active' : '' }}">
                    <i class="fas fa-box me-2"></i> Kasir
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('shift.form') }}" class="nav-link text-dark {{ request()->routeIs('shift.form') ? 'active' : '' }}">
                    <i class="fas fa-tags me-2"></i> shift
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('logoutKasir') }}" class="nav-link text-dark">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                </a>
            </li>
        </ul>
    </div>
</div>
