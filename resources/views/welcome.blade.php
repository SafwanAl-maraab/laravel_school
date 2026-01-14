<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>لارافيل - لوحة البداية</title>

    <!-- خطوط -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- ستايلات / سكريبت -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            body { font-family: Figtree, ui-sans-serif, system-ui, sans-serif; direction: rtl; margin: 0; }
            .text-center { text-align: center; }
            .flex { display: flex; }
            .items-center { align-items: center; }
            .justify-center { justify-content: center; }
            .min-h-screen { min-height: 100vh; }
            .bg-gray-50 { background-color: #f9fafb; }
            .text-black { color: #000; }
            .text-gray-700 { color: #4a5568; }
            .font-semibold { font-weight: 600; }
            .py-10 { padding-top: 2.5rem; padding-bottom: 2.5rem; }
            .px-6 { padding-left: 1.5rem; padding-right: 1.5rem; }
            .max-w-2xl { max-width: 42rem; margin: auto; }
            .max-w-7xl { max-width: 80rem; margin: auto; }
            .relative { position: relative; }
            .absolute { position: absolute; }
            .-left-20 { left: -5rem; }
            .top-0 { top: 0; }
            .selection\:bg-[#FF2D20]::selection { background-color: #FF2D20; color: #fff; }
            .grid { display: grid; }
            .grid-cols-2 { grid-template-columns: repeat(2, 1fr); }
            .lg\:grid-cols-3 { grid-template-columns: repeat(3, 1fr); }
            .gap-2 { gap: 0.5rem; }
            .lg\:justify-center { justify-content: center; }
            .lg\:col-start-2 { grid-column-start: 2; }
        </style>
    @endif
</head>
<body class="font-sans antialiased bg-gray-50 text-black">
<div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
    <!-- خلفية -->
    <img id="background" class="absolute -left-20 top-0 max-w-[877px]"
         src="https://laravel.com/assets/img/welcome/background.svg"
         alt="خلفية لارافيل" />

    <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
        <!-- رأس الصفحة -->
        <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
            <div class="flex lg:justify-center lg:col-start-2">
                <svg class="h-12 w-auto text-white lg:h-16 lg:text-[#FF2D20]" viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="..."/> <!-- شعار لارافيل -->
                </svg>
            </div>
            <h1 class="text-xl font-semibold text-black/50 lg:col-start-1">مرحبا بك في لارافيل</h1>
        </header>

        <!-- المحتوى الرئيسي -->
        <main class="text-center py-10">
            <p class="text-gray-700 text-sm/relaxed">
           انا     هذه صفحة البداية لمشروعك بلغة لارافيل. يمكنك تعديل هذه الصفحة لعرض المحتوى العربي بالكامل.
            </p>
<p>انا اسمي صفوان وهذة اول صفحة لي ارفعها في render</p>
            <!-- أزرار / روابط -->
            <div class="flex flex-col sm:flex-row justify-center gap-4 mt-6">
                <a href="#"
                   class="px-6 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                    ابدأ المشروع
                </a>
                <a href="#"
                   class="px-6 py-3 border border-red-600 text-red-600 rounded-lg hover:bg-red-50 transition">
                    اقرأ الوثائق
                </a>
            </div>
        </main>

        <!-- تذييل الصفحة -->
        <footer class="text-center py-6 text-gray-500 text-sm">
            &copy; 2025 جميع الحقوق محفوظة. تطوير بواسطة صفوان.
        </footer>
    </div>
</div>
</body>
</html>
