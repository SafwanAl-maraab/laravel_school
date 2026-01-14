@extends('layouts.app1')

@section('title', 'إضافة حجز جديد - أضواء الخليج للسفريات والسياحة')

@section('content')
    <div class="bg-white rounded shadow p-6 max-w-4xl mx-auto">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">إضافة حجز جديد</h2>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('bookings.store') }}" method="POST" class="space-y-4">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <label class="block">
                    <span class="text-sm font-medium">العميل</span>
                    <select name="customer_id" class="w-full border rounded p-2">
                        <option value="">اختر العميل</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->last_name }}</option>
                        @endforeach
                    </select>
                </label>

                <label class="block">
                    <span class="text-sm font-medium">الموظف (اختياري)</span>
                    <select name="employee_id" class="w-full border rounded p-2">
                        <option value="">اختر الموظف</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                        @endforeach
                    </select>
                </label>

                <label class="block">
                    <span class="text-sm font-medium">السائق (اختياري)</span>
                    <select name="driver_id" class="w-full border rounded p-2">
                        <option value="">اختر السائق</option>
                        @foreach($drivers as $driver)
                            <option value="{{ $driver->id }}">{{ $driver->first_name }} {{ $driver->last_name }}</option>
                        @endforeach
                    </select>
                </label>

                <label class="block">
                    <span class="text-sm font-medium">تاريخ المغادرة</span>
                    <input type="date" name="departure_date" class="w-full border rounded p-2" />
                </label>

                <label class="block">
                    <span class="text-sm font-medium">تاريخ العودة (اختياري)</span>
                    <input type="date" name="return_date" class="w-full border rounded p-2" />
                </label>

                <label class="block">
                    <span class="text-sm font-medium">المكان الأصلي</span>
                    <input type="text" name="origin" class="w-full border rounded p-2" placeholder="مكان المغادرة" />
                </label>

                <label class="block">
                    <span class="text-sm font-medium">الوجهة</span>
                    <input type="text" name="destination" class="w-full border rounded p-2" placeholder="الوجهة" />
                </label>

                <label class="block">
                    <span class="text-sm font-medium">السعر</span>
                    <input type="number" step="0.01" name="price" class="w-full border rounded p-2" />
                </label>

                <label class="block">
                    <span class="text-sm font-medium">المتبقي</span>
                    <input type="number" step="0.01" name="remaining_amount" class="w-full border rounded p-2" />
                </label>

                <label class="block">
                    <span class="text-sm font-medium">آخر موعد للدفع</span>
                    <input type="date" name="due_date" class="w-full border rounded p-2" />
                </label>

                <label class="block">
                    <span class="text-sm font-medium">الحالة</span>
                    <select name="status" class="w-full border rounded p-2">
                        <option value="Pending">معلق</option>
                        <option value="Confirmed">مؤكد</option>
                        <option value="Cancelled">ملغى</option>
                    </select>
                </label>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded shadow hover:bg-indigo-700 transition">
                    حفظ الحجز
                </button>
            </div>
        </form>
    </div>
@endsection
