<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>لوحة تحكم - أضواء الخليج للسفريات والسياحة</title>
    <style>[x-cloak]{ display:none !important; }</style>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <style>
        /* إخفاء شكل السكرول */
        .no-scrollbar::-webkit-scrollbar { width: 0; height: 0; }
        .no-scrollbar { scrollbar-width: none; }
    </style>
</head>
<body class="bg-gray-100 text-gray-800 antialiased">

<script src="//unpkg.com/alpinejs" defer></script>

<div class="flex">

    <!-- Sidebar ثابت -->
    <aside class="w-64 bg-white border-l border-gray-200 p-6 hidden lg:block fixed top-0 bottom-0 right-0 overflow-hidden">

        <a href="/" class="flex items-center mb-8">
            <div class="h-10 w-10 rounded bg-indigo-600 flex items-center justify-center text-white font-bold">AG</div>
            <div class="mr-3">
                <h1 class="text-lg font-semibold">أضواء الخليج للسفريات والسياحة</h1>
                <p class="text-sm text-gray-500">نظام إدارة الحجز</p>
            </div>
        </a>

        <nav class="space-y-2 h-[calc(100vh-120px)] overflow-y-auto no-scrollbar">
            <a href="/book" class="block p-2 rounded hover:bg-gray-100">الرئيسية</a>
            <a href="/book" class="block p-2 rounded hover:bg-gray-100">الصف الاول</a>
            <a href="/customers" class="block p-2 rounded hover:bg-gray-100">العملاء</a>
            <a href="/employees" class="block p-2 rounded hover:bg-gray-100">الموظفين</a>
            <a href="/drivers" class="block p-2 rounded hover:bg-gray-100">السائقين</a>
            <a href="/vehicles" class="block p-2 rounded hover:bg-gray-100">المركبات</a>
            <a href="/payments" class="block p-2 rounded hover:bg-gray-100">المدفوعات</a>
            <a href="/cashboxes" class="block p-2 rounded hover:bg-gray-100">الصندوق</a>
            <a href="/bank" class="block p-2 rounded hover:bg-gray-100">البنك</a>
            <a href="/expenses" class="block p-2 rounded hover:bg-gray-100">المصروفات</a>
            <a href="/passports" class="block p-2 rounded hover:bg-gray-100">الجوازات</a>
        </nav>

    </aside>

    <!-- Main Content -->
    <div class="flex-1 mr-64">

        <!-- Topbar ثابت -->
        <header class="bg-white shadow p-4 flex items-center justify-between sticky top-0 z-50">
            <div class="flex items-center space-x-4">
                <button class="lg:hidden p-2 bg-gray-100 rounded">قائمة</button>
                <h2 class="text-xl font-semibold">@yield('title')</h2>
            </div>

            <div class="flex items-center space-x-4">
                <div class="text-sm text-gray-600">
                    مرحبا <span class="font-medium">{{ auth()->user()->name ?? 'المستخدم' }}</span>
                </div>
            </div>
        </header>

        <!-- محتوى يتحرك فقط -->
        <main class="p-6 overflow-y-auto" style="height: calc(100vh - 70px);">
            @yield('content')
        </main>

    </div>
</div>

</body>
</html>
