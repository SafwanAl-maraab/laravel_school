<!-- layouts/app.blade.php -->
<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>لوحة تحكم - مكتب سفريات</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800 antialiased">
<div class="min-h-screen flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-white border-l border-gray-200 p-6 hidden lg:block">
        <a href="/" class="flex items-center mb-8">
            <div class="h-10 w-10 rounded bg-indigo-600 flex items-center justify-center text-white font-bold">SW</div>
            <div class="mr-3">
                <h1 class="text-lg font-semibold">ستارت ويب - مكتب سفريات</h1>
                <p class="text-sm text-gray-500">نظام إدارة الحجز</p>
            </div>
        </a>

        <nav class="space-y-2">
            <a href="/bookings" class="block p-2 rounded hover:bg-gray-100">الحجوزات</a>
            <a href="/customers" class="block p-2 rounded hover:bg-gray-100">العملاء</a>
            <a href="/employees" class="block p-2 rounded hover:bg-gray-100">الموظفين</a>
            <a href="/drivers" class="block p-2 rounded hover:bg-gray-100">السائقين</a>
            <a href="/vehicles" class="block p-2 rounded hover:bg-gray-100">المركبات</a>
            <a href="/payments" class="block p-2 rounded hover:bg-gray-100">المدفوعات</a>
            <a href="/cashbox" class="block p-2 rounded hover:bg-gray-100">الصندوق</a>
            <a href="/bank" class="block p-2 rounded hover:bg-gray-100">البنك</a>
            <a href="/expenses" class="block p-2 rounded hover:bg-gray-100">المصروفات</a>
            <a href="/passports" class="block p-2 rounded hover:bg-gray-100">الجوازات</a>
        </nav>
    </aside>

    <!-- Main -->
    <div class="flex-1">
        <!-- Topbar -->
        <header class="bg-white shadow p-4 flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <button class="lg:hidden p-2 bg-gray-100 rounded">قائمة</button>
                <h2 class="text-xl font-semibold">@yield('title')</h2>
            </div>

            <div class="flex items-center space-x-4">
                <div class="text-sm text-gray-600">مرحبا، <span class="font-medium">{{ auth()->user()->name ?? 'المستخدم' }}</span></div>
            </div>
        </header>

        <main class="p-6">
            @yield('content')
        </main>
    </div>
</div>
</body>
</html>


<!-- bookings/index.blade.php -->
@extends('layouts.app')

@section('title', 'قائمة الحجوزات')

@section('content')
    <div class="bg-white rounded shadow p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-medium">الحجوزات</h3>
            <div class="flex space-x-2">
                <a href="/bookings/create" class="px-4 py-2 bg-indigo-600 text-white rounded">حجز جديد</a>
                <form method="GET" action="/bookings" class="flex">
                    <input type="text" name="q" placeholder="بحث..." class="border rounded p-2" />
                </form>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-right table-auto">
                <thead>
                <tr class="bg-gray-50 text-sm text-gray-600">
                    <th class="p-3">#</th>
                    <th class="p-3">العميل</th>
                    <th class="p-3">الوجهة</th>
                    <th class="p-3">التاريخ</th>
                    <th class="p-3">السعر</th>
                    <th class="p-3">المتبقي</th>
                    <th class="p-3">الحالة</th>
                    <th class="p-3">إجراءات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bookings as $booking)
                    <tr class="border-b">
                        <td class="p-3">{{ $booking->id }}</td>
                        <td class="p-3">{{ $booking->customer->first_name ?? '-' }} {{ $booking->customer->last_name ?? '' }}</td>
                        <td class="p-3">{{ $booking->trip_destination }}</td>
                        <td class="p-3">{{ $booking->departure_date->format('Y-m-d') }}</td>
                        <td class="p-3">{{ number_format($booking->price,2) }}</td>
                        <td class="p-3">{{ number_format($booking->remaining_amount,2) }}</td>
                        <td class="p-3">{{ $booking->status }}</td>
                        <td class="p-3">
                            <a href="/bookings/{{ $booking->id }}/edit" class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded">تعديل</a>
                            <form action="/bookings/{{ $booking->id }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="px-3 py-1 bg-red-100 text-red-700 rounded">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">{{ $bookings->links() }}</div>
    </div>
@endsection


<!-- bookings/create.blade.php -->
@extends('layouts.app')
@section('title','إضافة حجز جديد')
@section('content')
    <div class="bg-white rounded shadow p-6 max-w-3xl mx-auto">
        <form action="/bookings" method="POST">
            @csrf
            <div class="grid grid-cols-1 gap-4">
                <label class="block">
                    <span class="text-sm font-medium">العميل</span>
                    <select name="customer_id" class="w-full border rounded p-2">
                        @foreach($customers as $c)
                            <option value="{{ $c->id }}">{{ $c->first_name }} {{ $c->last_name }}</option>
                        @endforeach
                    </select>
                </label>

                <label class="block">
                    <span class="text-sm font-medium">الوجهة</span>
                    <input name="trip_destination" type="text" class="w-full border rounded p-2" />
                </label>

                <div class="grid grid-cols-2 gap-4">
                    <label>
                        <span class="text-sm font-medium">تاريخ المغادرة</span>
                        <input name="departure_date" type="date" class="w-full border rounded p-2" />
                    </label>
                    <label>
                        <span class="text-sm font-medium">تاريخ العودة (اختياري)</span>
                        <input name="return_date" type="date" class="w-full border rounded p-2" />
                    </label>
                </div>

                <div class="grid grid-cols-3 gap-4">
                    <label>
                        <span class="text-sm font-medium">السعر</span>
                        <input name="price" type="number" step="0.01" class="w-full border rounded p-2" />
                    </label>
                    <label>
                        <span class="text-sm font-medium">المتبقي</span>
                        <input name="remaining_amount" type="number" step="0.01" class="w-full border rounded p-2" />
                    </label>
                    <label>
                        <span class="text-sm font-medium">آخر موعد للدفع</span>
                        <input name="due_date" type="date" class="w-full border rounded p-2" />
                    </label>
                </div>

                <div class="flex justify-end">
                    <button class="px-6 py-2 bg-indigo-600 text-white rounded">حفظ الحجز</button>
                </div>
            </div>
        </form>
    </div>
@endsection


<!-- payments/index.blade.php -->
@extends('layouts.app')
@section('title','المدفوعات')
@section('content')
    <div class="bg-white rounded shadow p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-medium">المدفوعات</h3>
            <a href="/payments/create" class="px-4 py-2 bg-green-600 text-white rounded">سند قبض</a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full table-auto text-right">
                <thead class="bg-gray-50 text-sm text-gray-600">
                <tr>
                    <th class="p-3">#</th>
                    <th class="p-3">الحجز</th>
                    <th class="p-3">المبلغ</th>
                    <th class="p-3">الطريقة</th>
                    <th class="p-3">المكان</th>
                    <th class="p-3">التاريخ</th>
                </tr>
                </thead>
                <tbody>
                @foreach($payments as $p)
                    <tr class="border-b">
                        <td class="p-3">{{ $p->id }}</td>
                        <td class="p-3">{{ $p->booking->id ?? '-' }}</td>
                        <td class="p-3">{{ number_format($p->amount,2) }}</td>
                        <td class="p-3">{{ $p->payment_method }}</td>
                        <td class="p-3">{{ $p->destination }}</td>
                        <td class="p-3">{{ $p->payment_date }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">{{ $payments->links() }}</div>
    </div>
@endsection


<!-- cashbox/index.blade.php -->
@extends('layouts.app')
@section('title','سجل الصندوق')
@section('content')
    <div class="bg-white rounded shadow p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-medium">سجل الصندوق</h3>
            <a href="/cashbox/create" class="px-4 py-2 bg-indigo-600 text-white rounded">دفع / استلام</a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full table-auto text-right">
                <thead class="bg-gray-50 text-sm text-gray-600">
                <tr>
                    <th class="p-3">#</th>
                    <th class="p-3">الوصف</th>
                    <th class="p-3">وارد</th>
                    <th class="p-3">منصرف</th>
                    <th class="p-3">الرصيد بعد العملية</th>
                    <th class="p-3">التاريخ</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cashboxes as $c)
                    <tr class="border-b">
                        <td class="p-3">{{ $c->id }}</td>
                        <td class="p-3">{{ $c->description }}</td>
                        <td class="p-3">{{ number_format($c->amount_in,2) }}</td>
                        <td class="p-3">{{ number_format($c->amount_out,2) }}</td>
                        <td class="p-3">{{ number_format($c->balance,2) }}</td>
                        <td class="p-3">{{ $c->transaction_date }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">{{ $cashboxes->links() }}</div>
    </div>
@endsection


<!-- bank/index.blade.php -->
@extends('layouts.app')
@section('title','سجل البنك')
@section('content')
    <div class="bg-white rounded shadow p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-medium">سجل البنك</h3>
            <a href="/bank/create" class="px-4 py-2 bg-indigo-600 text-white rounded">حركة بنكية</a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full table-auto text-right">
                <thead class="bg-gray-50 text-sm text-gray-600">
                <tr>
                    <th class="p-3">#</th>
                    <th class="p-3">البنك</th>
                    <th class="p-3">وارد</th>
                    <th class="p-3">منصرف</th>
                    <th class="p-3">الرصيد</th>
                    <th class="p-3">التاريخ</th>
                </tr>
                </thead>
                <tbody>
                @foreach($banks as $b)
                    <tr class="border-b">
                        <td class="p-3">{{ $b->id }}</td>
                        <td class="p-3">{{ $b->bank_name }}</td>
                        <td class="p-3">{{ number_format($b->amount_in,2) }}</td>
                        <td class="p-3">{{ number_format($b->amount_out,2) }}</td>
                        <td class="p-3">{{ number_format($b->balance,2) }}</td>
                        <td class="p-3">{{ $b->transaction_date }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">{{ $banks->links() }}</div>
    </div>
@endsection


<!-- expenses/index.blade.php -->
@extends('layouts.app')
@section('title','المصروفات')
@section('content')
    <div class="bg-white rounded shadow p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-medium">سجل المصروفات</h3>
            <a href="/expenses/create" class="px-4 py-2 bg-red-600 text-white rounded">اضافة مصروف</a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full table-auto text-right">
                <thead class="bg-gray-50 text-sm text-gray-600">
                <tr>
                    <th class="p-3">#</th>
                    <th class="p-3">المصدر</th>
                    <th class="p-3">المبلغ</th>
                    <th class="p-3">الفئة</th>
                    <th class="p-3">الوصف</th>
                    <th class="p-3">التاريخ</th>
                </tr>
                </thead>
                <tbody>
                @foreach($expenses as $e)
                    <tr class="border-b">
                        <td class="p-3">{{ $e->id }}</td>
                        <td class="p-3">{{ $e->source }}</td>
                        <td class="p-3">{{ number_format($e->amount,2) }}</td>
                        <td class="p-3">{{ $e->category }}</td>
                        <td class="p-3">{{ $e->description }}</td>
                        <td class="p-3">{{ $e->expense_date }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">{{ $expenses->links() }}</div>
    </div>
@endsection


<!-- index pages for employees, customers, drivers, vehicles, passports (simple list) -->

<!-- employees/index.blade.php -->
@extends('layouts.app')
@section('title','الموظفين')
@section('content')
    <div class="bg-white rounded shadow p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-medium">قائمة الموظفين</h3>
            <a href="/employees/create" class="px-4 py-2 bg-indigo-600 text-white rounded">اضافة موظف</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full table-auto text-right">
                <thead class="bg-gray-50 text-sm text-gray-600">
                <tr>
                    <th class="p-3">#</th>
                    <th class="p-3">الاسم</th>
                    <th class="p-3">الهاتف</th>
                    <th class="p-3">المنصب</th>
                    <th class="p-3">الراتب</th>
                </tr>
                </thead>
                <tbody>
                @foreach($employees as $emp)
                    <tr class="border-b">
                        <td class="p-3">{{ $emp->id }}</td>
                        <td class="p-3">{{ $emp->name }}</td>
                        <td class="p-3">{{ $emp->phone }}</td>
                        <td class="p-3">{{ $emp->position }}</td>
                        <td class="p-3">{{ number_format($emp->salary,2) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection


<!-- customers/index.blade.php -->
@extends('layouts.app')
@section('title','العملاء')
@section('content')
    <div class="bg-white rounded shadow p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-medium">قائمة العملاء</h3>
            <a href="/customers/create" class="px-4 py-2 bg-indigo-600 text-white rounded">اضافة عميل</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full table-auto text-right">
                <thead class="bg-gray-50 text-sm text-gray-600">
                <tr>
                    <th class="p-3">#</th>
                    <th class="p-3">الاسم</th>
                    <th class="p-3">الهاتف</th>
                    <th class="p-3">الجنسية</th>
                    <th class="p-3">ج/انتهاء الجواز</th>
                </tr>
                </thead>
                <tbody>
                @foreach($customers as $c)
                    <tr class="border-b">
                        <td class="p-3">{{ $c->id }}</td>
                        <td class="p-3">{{ $c->first_name }} {{ $c->last_name }}</td>
                        <td class="p-3">{{ $c->phone }}</td>
                        <td class="p-3">{{ $c->nationality }}</td>
                        <td class="p-3">{{ optional($c->passport_expiry)->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection


<!-- drivers/index.blade.php -->
@extends('layouts.app')
@section('title','السائقين')
@section('content')
    <div class="bg-white rounded shadow p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-medium">قائمة السائقين</h3>
            <a href="/drivers/create" class="px-4 py-2 bg-indigo-600 text-white rounded">اضافة سائق</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full table-auto text-right">
                <thead class="bg-gray-50 text-sm text-gray-600">
                <tr>
                    <th class="p-3">#</th>
                    <th class="p-3">الاسم</th>
                    <th class="p-3">الرخصة</th>
                    <th class="p-3">الهاتف</th>
                </tr>
                </thead>
                <tbody>
                @foreach($drivers as $d)
                    <tr class="border-b">
                        <td class="p-3">{{ $d->id }}</td>
                        <td class="p-3">{{ $d->first_name }} {{ $d->last_name }}</td>
                        <td class="p-3">{{ $d->license_number }}</td>
                        <td class="p-3">{{ $d->phone }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection


<!-- vehicles/index.blade.php -->
@extends('layouts.app')
@section('title','المركبات')
@section('content')
    <div class="bg-white rounded shadow p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-medium">قائمة المركبات</h3>
            <a href="/vehicles/create" class="px-4 py-2 bg-indigo-600 text-white rounded">اضافة مركبة</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full table-auto text-right">
                <thead class="bg-gray-50 text-sm text-gray-600">
                <tr>
                    <th class="p-3">#</th>
                    <th class="p-3">اللوحة</th>
                    <th class="p-3">النوع</th>
                    <th class="p-3">السعة</th>
                </tr>
                </thead>
                <tbody>
                @foreach($vehicles as $v)
                    <tr class="border-b">
                        <td class="p-3">{{ $v->id }}</td>
                        <td class="p-3">{{ $v->license_plate }}</td>
                        <td class="p-3">{{ $v->model }}</td>
                        <td class="p-3">{{ $v->capacity }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection


<!-- passports/index.blade.php -->
@extends('layouts.app')
@section('title','الجوازات')
@section('content')
    <div class="bg-white rounded shadow p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-medium">قائمة الجوازات</h3>
            <a href="/passports/create" class="px-4 py-2 bg-indigo-600 text-white rounded">اضافة جواز</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full table-auto text-right">
                <thead class="bg-gray-50 text-sm text-gray-600">
                <tr>
                    <th class="p-3">#</th>
                    <th class="p-3">العميل</th>
                    <th class="p-3">رقم الجواز</th>
                    <th class="p-3">تاريخ الانتهاء</th>
                    <th class="p-3">الحالة</th>
                </tr>
                </thead>
                <tbody>
                @foreach($passports as $p)
                    <tr class="border-b">
                        <td class="p-3">{{ $p->id }}</td>
                        <td class="p-3">{{ $p->customer->first_name ?? '-' }}</td>
                        <td class="p-3">{{ $p->passport_number }}</td>
                        <td class="p-3">{{ optional($p->expiry_date)->format('Y-m-d') }}</td>
                        <td class="p-3">{{ $p->status }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection


<!-- End of file -->
