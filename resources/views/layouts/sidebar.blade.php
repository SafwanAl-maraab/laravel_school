<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- الشعار -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" ">
        <div class="sidebar-brand-text mx-3">قائمة الصفوف</div>
    </a>

    <!-- فاصل -->
    <hr class="sidebar-divider my-0">

    <!-- لوحة القيادة -->
    <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('book.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span> الرئيسية</span>
        </a>
    </li>

    <!-- فاصل -->
    <hr class="sidebar-divider">

    <!-- عنوان -->
    <div class="sidebar-heading">الصف</div>

    <!-- إدارة -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePage"
           aria-expanded="true" aria-controls="collapsePage">
            <i class="fas fa-fw fa-folder"></i>
            <span>اختيار صف</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">الصف الاول</h6>
                <a class="collapse-item">الصف الثاني</a>
{{--                <a class="collapse-item" href="{{ route('emp.index') }}">الموظفون</a>--}}
{{--                <a class="collapse-item" href="{{ route('discount.index') }}">الخصومات</a>--}}
{{--                <a class="collapse-item" href="{{ route('category.index') }}">الفئات</a>--}}
                <div class="collapse-divider">الصف </div>
                <h6 class="collapse-header">الصف </h6>
{{--                <a class="collapse-item" href="{{ route('orders.index') }}">الطلبات</a>--}}
{{--                <a class="collapse-item" href="{{ route('orders.statistics') }}">إحصائيات الطلبات</a>--}}
            </div>
        </div>
    </li>

    <!-- فاصل -->
    <hr class="sidebar-divider">

    <!-- عنوان -->
    <div class="sidebar-heading">الواجهة</div>

    <!-- مكونات -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>المكونات</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">عناصر مخصصة:</h6>
                <a class="collapse-item" href="#">الأزرار</a>
                <a class="collapse-item" href="#">البطاقات</a>
            </div>
        </div>
    </li>

    <!-- الأدوات -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUtilities"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>الأدوات</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">أدوات مخصصة:</h6>
                <a class="collapse-item" href="#">الألوان</a>
                <a class="collapse-item" href="#">الحدود</a>
                <a class="collapse-item" href="#">الرسوم</a>
                <a class="collapse-item" href="#">أخرى</a>
            </div>
        </div>
    </li>

    <!-- فاصل -->
    <hr class="sidebar-divider">

    <!-- عنوان -->
    <div class="sidebar-heading">إضافات</div>

    <!-- الصفحات -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
           aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>الصفحات</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">شاشات الدخول:</h6>
                <a class="collapse-item" href="{{route('logout')}}">تسجيل الدخول</a>
                <a class="collapse-item" href="#">تسجيل جديد</a>
                <a class="collapse-item" href="#">نسيت كلمة المرور</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">صفحات أخرى:</h6>
                <a class="collapse-item" href="#">حول النظام</a>
                <a class="collapse-item" href="#">اتصل بنا</a>
            </div>
        </div>
    </li>

    <!-- المخططات -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>المخططات</span>
        </a>
    </li>

    <!-- الجداول -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-table"></i>
            <span>الجداول</span>
        </a>
    </li>

    <!-- فاصل -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- زر تصغير -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>
    </div>

</ul>

<script>
    // تفعيل الشريط الجانبي
    document.getElementById('sidebarToggle').addEventListener('click', function() {
        document.body.classList.toggle('sidebar-toggled');
        document.querySelector('.sidebar').classList.toggle('toggled');
    });
</script>
