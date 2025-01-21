<div class="sidebar" style="width: 250px; min-height: 100vh; position: fixed; left: 0; top: 0; background-color: #FFC107;">
    <div class="p-3">
        <div class="d-flex align-items-center justify-content-center mb-4 mt-2">
            <i class="fas fa-cash-register text-light me-2 fs-4"></i>
            <h4 class="text-light mb-0" style="font-style: italic ">CashDash</h4>
        </div>
        
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="{{ route('dashboard.index') }}" class="nav-link text-dark {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home me-2"></i> Dashboard
                </a>
            </li>
            
            <li class="nav-item mb-2">
                <a href="{{ route('barang.index') }}" class="nav-link text-dark {{ request()->routeIs('barang.*') ? 'active' : '' }}">
                    <i class="fas fa-box me-2"></i> Barang
                </a>
            </li>
            
            <li class="nav-item mb-2">
                <a href="{{ route('kategori.index') }}" class="nav-link text-dark {{ request()->routeIs('kategori.*') ? 'active' : '' }}">
                    <i class="fas fa-tags me-2"></i> Kategori
                </a>
            </li>
            
            <li class="nav-item mb-2">
                <a href="{{ route('toko.index') }}" class="nav-link text-dark {{ request()->routeIs('toko.*') ? 'active' : '' }}">
                    <i class="fas fa-store me-2"></i> Toko
                </a>
            </li>
            
            <li class="nav-item mb-2">
                <a href="{{ route('kasir.index') }}" class="nav-link text-dark {{ request()->routeIs('kasir.*') ? 'active' : '' }}">
                    <i class="fas fa-cash-register me-2"></i> Kasir
                </a>
            </li>
            
            <li class="nav-item mb-2">
                <a href="{{ route('customer.index') }}" class="nav-link text-dark {{ request()->routeIs('customer.*') ? 'active' : '' }}">
                    <i class="fas fa-users me-2"></i> Customer
                </a>
            </li>
            
            <li class="nav-item mb-2">
                <a href="{{ route('supplier.index') }}" class="nav-link text-dark {{ request()->routeIs('supplier.*') ? 'active' : '' }}">
                    <i class="fas fa-truck me-2"></i> Supplier
                </a>
            </li>
            
            <li class="nav-item mb-2">
                <a href="{{ route('pajak.index') }}" class="nav-link text-dark {{ request()->routeIs('pajak.*') ? 'active' : '' }}">
                    <i class="fas fa-percent me-2"></i> Pajak
                </a>
            </li>
            
            <li class="nav-item mb-2">
                <a href="{{ route('diskon.index') }}" class="nav-link text-dark {{ request()->routeIs('diskon.*') ? 'active' : '' }}">
                    <i class="fas fa-tag me-2"></i> Diskon
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="{{ route('shift.index') }}" class="nav-link text-dark {{ request()->routeIs('shift.*') ? 'active' : '' }}">
                    <i class="fas fa-clock me-2"></i> Shift
                </a>
            </li>
            
            <li class="nav-item mb-2">
                <a href="{{ route('cashdrawer.index') }}" class="nav-link text-dark {{ request()->routeIs('cashdrawer.*') ? 'active' : '' }}">
                    <i class="fas fa-cash-register me-2"></i> Cashdrawer
                </a>
            </li>   
            <li class="nav-item mb-2">
                <a href="{{ route('logout') }}" class="nav-link text-dark">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                </a>
            </li>
        </ul>
    </div>
</div>
