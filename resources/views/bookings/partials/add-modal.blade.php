@extends('layouts.app1')

@section('title', 'إضافة حجز جديد - أضواء الخليج للسفريات والسياحة')

@section('content')
    <div class="bg-white rounded shadow p-6 max-w-4xl mx-auto">

        <h2 class="text-2xl font-semibold mb-6">إضافة حجز جديد</h2>

        <form action="{{ route('bookings.store') }}" method="POST">
            @csrf

            <!-- العميل -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">العميل</label>
                <div class="flex space-x-2">
                    <select name="customer_id" class="flex-1 border rounded p-2">
                        <option value="">اختر العميل</option>
                        @foreach($customers as $c)
                            <option value="{{ $c->id }}">{{ $c->first_name }} {{ $c->last_name }}</option>
                        @endforeach
                    </select>
                    <button type="button" onclick="openCustomerModal()" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">إضافة عميل</button>
                </div>
                @error('customer_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- الحقول الأخرى للحجز -->
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium mb-1">الوجهة</label>
                    <input type="text" name="trip_destination" class="w-full border rounded p-2" value="{{ old('trip_destination') }}">
                    @error('trip_destination') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">تاريخ المغادرة</label>
                    <input type="date" name="departure_date" class="w-full border rounded p-2" value="{{ old('departure_date') }}">
                    @error('departure_date') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium mb-1">تاريخ العودة (اختياري)</label>
                    <input type="date" name="return_date" class="w-full border rounded p-2" value="{{ old('return_date') }}">
                    @error('return_date') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">السعر</label>
                    <input type="number" name="price" step="0.01" class="w-full border rounded p-2" value="{{ old('price') }}">
                    @error('price') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-6">
                <div>
                    <label class="block text-sm font-medium mb-1">المتبقي</label>
                    <input type="number" name="remaining_amount" step="0.01" class="w-full border rounded p-2" value="{{ old('remaining_amount') }}">
                    @error('remaining_amount') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">آخر موعد للدفع</label>
                    <input type="date" name="due_date" class="w-full border rounded p-2" value="{{ old('due_date') }}">
                    @error('due_date') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">حفظ الحجز</button>
        </form>
    </div>

    <!-- Modal إضافة عميل جديد -->
    <div id="customerModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded shadow-lg p-6 w-96 relative">
            <h3 class="text-lg font-semibold mb-4">إضافة عميل جديد</h3>
            <form action="{{ route('customers.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="block text-sm font-medium mb-1">الاسم الأول</label>
                    <input type="text" name="first_name" class="w-full border rounded p-2">
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium mb-1">الاسم الأخير</label>
                    <input type="text" name="last_name" class="w-full border rounded p-2">
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium mb-1">الهاتف</label>
                    <input type="text" name="phone" class="w-full border rounded p-2">
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium mb-1">الجنسية</label>
                    <input type="text" name="nationality" class="w-full border rounded p-2">
                </div>
                <div class="flex justify-end space-x-2 mt-4">
                    <button type="button" onclick="closeCustomerModal()" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">إلغاء</button>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">حفظ العميل</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openCustomerModal() {
            document.getElementById('customerModal').classList.remove('hidden');
        }

        function closeCustomerModal() {
            document.getElementById('customerModal').classList.add('hidden');
        }
    </script>
@endsection
