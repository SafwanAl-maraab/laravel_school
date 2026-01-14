<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- زر إظهار القائمة -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle me-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- مربع البحث -->
    <form class="d-none d-sm-inline-block form-inline me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="ابحث..."
                   aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- القائمة العلوية -->
    <ul class="navbar-nav ms-auto">

        <!-- التنبيهات -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- العداد -->
                <span class="badge bg-danger badge-counter">3+</span>
            </a>
            <!-- القائمة المنسدلة للتنبيهات -->
            <div class="dropdown-list dropdown-menu dropdown-menu-end shadow animated--grow-in"
                 aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    مركز التنبيهات
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="me-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">ديسمبر 12, 2025</div>
                        <span class="font-weight-bold">طلب جديد تم استلامه</span>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="me-3">
                        <div class="icon-circle bg-success">
                            <i class="fas fa-donate text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">ديسمبر 7, 2025</div>
                        تم دفع فاتورة ديسمبر
                    </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">عرض جميع التنبيهات</a>
            </div>
        </li>

        <!-- الرسائل -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- العداد -->
                <span class="badge bg-danger badge-counter">7</span>
            </a>
            <!-- القائمة المنسدلة للرسائل -->
            <div class="dropdown-list dropdown-menu dropdown-menu-end shadow animated--grow-in"
                 aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    مركز الرسائل
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image me-3">
                        <img class="rounded-circle" src="https://via.placeholder.com/40" alt="">
                        <div class="status-indicator bg-success"></div>

                    </div>
                    <div class="font-weight-bold">
                        <div class="text-truncate">هل هناك معلومات جديدة حول الطلب؟</div>
                        <div class="small text-gray-500">أحمد محمد · 58 د</div>
                    </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">قراءة المزيد من الرسائل</a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- حساب المستخدم -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="me-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name ?? 'اسم المستخدم' }}</span>
                <img class="img-profile rounded-circle" src="https://via.placeholder.com/40">
            </a>
            <!-- القائمة المنسدلة للمستخدم -->
            <div class="dropdown-menu dropdown-menu-end shadow animated--grow-in"
                 aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>الملف الشخصي
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>الإعدادات
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>سجل النشاط
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('logout')}}" data-bs-toggle="modal" data-bs-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>تسجيل الخروج
                </a>
            </div>
        </li>

    </ul>
</nav>

<style>
    .badge-counter {
        position: absolute;
        transform: scale(0.7);
        transform-origin: top right;
        right: -0.5rem;
        margin-top: -0.5rem;
    }

    .animated--grow-in {
        animation-name: growIn;
        animation-duration: 200ms;
    }

    @keyframes growIn {
        0% {
            transform: scale(0.9);
            opacity: 0;
        }
        100% {
            transform: scale(1);
            opacity: 1;
        }
    }
</style>


