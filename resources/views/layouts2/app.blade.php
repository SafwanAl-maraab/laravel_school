<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'لوحة التحكم') - {{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    <!-- الخطوط -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- تنسيقات مخصصة -->
    <style>
        :root {
            --primary: #4e73df;
            --success: #1cc88a;
            --info: #36b9cc;
            --warning: #f6c23e;
            --danger: #e74a3b;
            --secondary: #858796;
            --light: #f8f9fc;
            --dark: #5a5c69;
        }

        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f8f9fc;
        }

        /* تحسينات الشريط الجانبي */
        .sidebar {
            background: linear-gradient(180deg, var(--primary) 0%, #224abe 100%);
        }

        .sidebar .nav-item .nav-link {
            text-align: center;
            padding: 0.75rem 1rem;
            transition: all 0.3s;
        }

        .sidebar .nav-item .nav-link:hover {
            background-color: rgba(255,255,255,0.1);
        }

        .sidebar .nav-item .nav-link i {
            margin-left: 0;
            margin-bottom: 5px;
            display: block;
            font-size: 1.1rem;
        }

        .sidebar .nav-item .nav-link span {
            display: block;
            font-size: 0.85rem;
        }

        .sidebar-brand {
            justify-content: center;
            text-align: center;
            padding: 1.5rem 1rem;
        }

        .sidebar-brand-text {
            font-size: 1.1rem;
            font-weight: 800;
        }

        .sidebar .sidebar-heading {
            text-align: center;
            padding: 0 1rem;
            font-weight: 800;
            font-size: 0.65rem;
            color: rgba(255,255,255,.4);
        }

        /* تحسين القوائم المنسدلة */
        .collapse-item {
            text-align: center;
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
            transition: all 0.3s;
        }

        .collapse-item:hover {
            background-color: #f8f9fa;
        }

        .collapse-header {
            text-align: center;
            font-weight: 800;
            margin-top: 10px;
            font-size: 0.65rem;
            color: #b7b9cc;
        }

        /* تحسين شريط البحث */
        .input-group {
            box-shadow: 0 0.15rem 0.5rem rgba(0, 0, 0, 0.1);
        }

        .input-group-append .btn {
            border-top-right-radius: 0.35rem !important;
            border-bottom-right-radius: 0.35rem !important;
            border-top-left-radius: 0 !important;
            border-bottom-left-radius: 0 !important;
            background: var(--primary);
            border-color: var(--primary);
        }

        .form-control {
            border-top-left-radius: 0.35rem !important;
            border-bottom-left-radius: 0.35rem !important;
            border-top-right-radius: 0 !important;
            border-bottom-right-radius: 0 !important;
            border: 1px solid #d1d3e2;
        }

        /* تحسين القوائم العلوية */
        .dropdown-menu {
            text-align: right;
            border: none;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }

        .dropdown-item {
            text-align: right;
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
        }

        .dropdown-item i {
            margin-left: 0.5rem;
            margin-right: 0;
            color: #b7b9cc;
        }

        .topbar .dropdown-list .dropdown-item {
            align-items: center;
            padding: 0.75rem 1rem;
        }

        /* تحسين البطاقات */
        .card {
            border: none;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            margin-bottom: 1.5rem;
        }

        .card-header {
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
            padding: 0.75rem 1.25rem;
        }

        /* تخصيص الألوان للحدود */
        .border-left-primary {
            border-left: 0.25rem solid var(--primary) !important;
        }

        .border-left-success {
            border-left: 0.25rem solid var(--success) !important;
        }

        .border-left-info {
            border-left: 0.25rem solid var(--info) !important;
        }

        .border-left-warning {
            border-left: 0.25rem solid var(--warning) !important;
        }

        /* تحسين التذييل */
        .sticky-footer {
            background-color: #fff;
            box-shadow: 0 -0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }

        /* زر الصعود للأعلى */
        .scroll-to-top {
            position: fixed;
            right: 1rem;
            bottom: 1rem;
            display: none;
            width: 2.75rem;
            height: 2.75rem;
            text-align: center;
            color: #fff;
            background: rgba(58, 59, 69, 0.5);
            line-height: 46px;
        }

        .scroll-to-top:focus, .scroll-to-top:hover {
            color: #fff;
            background: rgba(58, 59, 69, 0.7);
        }

        /* نافذة تسجيل الخروج */
        .modal-header {
            border-bottom: 1px solid #e3e6f0;
        }

        .modal-footer {
            border-top: 1px solid #e3e6f0;
        }

        /* تخصيص التقدم */
        .progress {
            border-radius: 0.35rem;
            background-color: #eaecf4;
        }

        .progress-bar {
            background-color: var(--primary);
        }

        /* الأيقونات الدائرية */
        .icon-circle {
            height: 2.5rem;
            width: 2.5rem;
            border-radius: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* حالة التنبيهات */
        .status-indicator {
            height: 0.8rem;
            width: 0.8rem;
            border-radius: 100%;
            border: 0.15rem solid #fff;
        }

        .bg-success {
            background-color: var(--success) !important;
        }

        /* تحسين الاستجابة */
        @media (max-width: 768px) {
            .sidebar {
                width: 100% !important;
                height: auto;
                position: relative;
            }

            #content-wrapper {
                width: 100% !important;
            }
        }
    </style>

    @yield('styles')
</head>

<body id="page-top" dir="rtl">

<!-- غلاف الصفحة -->
<div id="wrapper">

    <!-- الشريط الجانبي -->
    @include('layouts.sidebar')

    <!-- غلاف المحتوى -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- المحتوى الرئيسي -->
        <div id="content">

            <!-- الشريط العلوي -->
            @include('layouts.topbar')

            <!-- المحتوى الديناميكي -->
            <main class="container-fluid">
                @yield('content')
            </main>
        </div>

        <!-- التذييل -->
        @include('layouts.footer')
    </div>
</div>

<!-- زر الصعود للأعلى -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<!-- نافذة تسجيل الخروج -->
@include('layouts.logout-modal')

<!-- سكربتات -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // تفعيل زر الصعود للأعلى
    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('.scroll-to-top').fadeIn();
            } else {
                $('.scroll-to-top').fadeOut();
            }
        });

        $('.scroll-to-top').click(function() {
            $('html, body').animate({scrollTop: 0}, 800);
            return false;
        });

        // تفعيل القوائم المنسدلة في الشريط الجانبي
        $('.nav-link.collapsed').click(function() {
            var target = $(this).data('bs-target');
            $(target).collapse('toggle');
        });
    });
</script>

@yield('scripts')
</body>
</html>
