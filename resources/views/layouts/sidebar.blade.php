<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">لوحة التحكم</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1"
            aria-expanded="true" aria-controls="collapsePages1">
            <i class="fas fa-fw fa-tv"></i>
            <span>اعدادات الصفحة الرئيسية</span>
        </a>
        <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">اللايفات:</h6>
                <a class="collapse-item" href="">
                    <i class="fas fa-fw fa-users"></i>
                    <span>العائلات</span>
                </a>
                <a class="collapse-item" href="">
                    <i class="fas fa-fw fa-tv"></i>
                    <span>اللايفات الحية</span>
                </a>
                <a class="collapse-item" href="">
                    <i class="fas fa-fw fa-building"></i>
                    <span>الوكالات</span>
                </a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2"
            aria-expanded="true" aria-controls="collapsePages2">
            <i class="fas fa-fw fa-users"></i>
            <span>اعدادات المتسابقين</span>
        </a>
        <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">اللايفات:</h6>
                <a class="collapse-item" href="">
                    <i class="fas fa-fw fa-users"></i>
                    <span>العائلات</span>
                </a>
                <a class="collapse-item" href="">
                    <i class="fas fa-fw fa-tv"></i>
                    <span>اللايفات الحية</span>
                </a>
                <a class="collapse-item" href="">
                    <i class="fas fa-fw fa-building"></i>
                    <span>الوكالات</span>
                </a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3"
            aria-expanded="true" aria-controls="collapsePages3">
            <i class="fas fa-fw fa-cogs"></i>
            <span>اعدادات الصفحة المسابقة</span>
        </a>
        <div id="collapsePages3" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">الصفحة المسابقة:</h6>
                <a class="collapse-item" href="">
                    <i class="fas fa-fw fa-tv"></i>
                    <span>السلايدر</span>
                </a>
                <a class="collapse-item" href="">
                    <i class="fas fa-fw fa-users"></i>
                    <span>الداعمين</span>
                </a>
            </div>
        </div>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
