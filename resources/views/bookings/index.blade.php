@extends('layouts.app1')

@section('title', 'قائمة الحجوزات - أضواء الخليج للسفريات والسياحة')

@section('content')
    <div class="p-6 bg-gray-100 min-h-screen" x-data="{ showModal: false, editMode: false, booking: {} }">

        <!-- العنوان + زر إضافة -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">قائمة الحجوزات</h1>
            <button @click="showModal = true; editMode = false; booking = {}"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                + إضافة حجز
            </button>
        </div>

        <!-- مربع البحث -->
        <form method="GET" action="{{ route('bookings.index') }}" class="mb-6">
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="ابحث عن وجهة الرحلة أو العميل أو الحالة..."
                   class="w-full p-3 border rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none">
        </form>

        <!-- رسائل النجاح -->
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <!-- جدول الحجوزات -->
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full text-sm text-gray-700">
                <thead class="bg-gray-200 text-gray-800">
                <tr>
                    <th class="p-3 text-right">#</th>
                    <th class="p-3 text-right">العميل</th>
                    <th class="p-3 text-right">الموظف</th>
                    <th class="p-3 text-right">السائق</th>
                    <th class="p-3 text-right">الوجهة</th>
                    <th class="p-3 text-right">السعر</th>
                    <th class="p-3 text-right">المتبقي</th>
                    <th class="p-3 text-right">تاريخ الاستحقاق</th>
                    <th class="p-3 text-right">الحالة</th>
                    <th class="p-3 text-right">الإجراءات</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($bookings as $booking)
                    <tr class="border-b hover:bg-gray-50 transition">
                        <td class="p-3">{{ $booking->id }}</td>
                        <td class="p-3">{{ $booking->customer->first_name ?? '-' }}</td>
                        <td class="p-3">{{ $booking->employee->name ?? '-' }}</td>
                        <td class="p-3">{{ $booking->driver->name ?? '-' }}</td>
                        <td class="p-3">{{ $booking->trip_destination }}</td>
                        <td class="p-3">{{ number_format($booking->price, 2) }}</td>
                        <td class="p-3">{{ number_format($booking->remaining_amount, 2) }}</td>
                        <td class="p-3">{{ $booking->due_date ?? '-' }}</td>
                        <td class="p-3">
                            <span class="@if($booking->status=='confirmed') text-green-600
                                @elseif($booking->status=='pending') text-yellow-600
                                @else text-red-600 @endif font-semibold">
                                {{ $booking->status }}
                            </span>
                        </td>
                        <td class="p-3 flex gap-2">
                            <!-- زر تعديل -->
                            <button
                                @click="showModal = true; editMode = true; booking = {{ $booking->toJson() }}"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-lg">
                                تعديل
                            </button>

                            <!-- زر حذف -->
                            <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST"
                                  onsubmit="return confirm('هل أنت متأكد من حذف هذا الحجز؟')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg">
                                    حذف
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center py-6 text-gray-500">لا توجد حجوزات حالياً</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <!-- نافذة الإضافة / التعديل -->
        <div x-show="showModal"
             x-cloak
             class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
             x-transition>
            <div class="bg-white w-full max-w-2xl p-6 rounded-2xl shadow-lg relative"
                 @click.away="showModal = false">

                <h2 class="text-xl font-bold mb-4" x-text="editMode ? 'تعديل الحجز' : 'إضافة حجز جديد'"></h2>

                <form :action="editMode ? '/bookings/' + booking.id : '{{ route('bookings.store') }}'"
                      method="POST" class="space-y-4">
                    @csrf
                    <template x-if="editMode">
                        <input type="hidden" name="_method" value="PUT">
                    </template>

                    <!-- العميل -->
                    <div>
                        <label class="block font-semibold mb-1">العميل</label>
                        <select name="customer_id" class="w-full border rounded-lg p-2">
                            <option value="">اختر العميل</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}"
                                        :selected="booking.customer_id == {{ $customer->id }}">
                                    {{ $customer->first_name  }}  {{ $customer->last_name  }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- الوجهة -->
                    <div>
                        <label class="block font-semibold mb-1">وجهة الرحلة</label>
                        <input type="text" name="trip_destination" x-model="booking.trip_destination"
                               class="w-full border rounded-lg p-2" required>
                    </div>

                    <!-- السعر -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block font-semibold mb-1">السعر</label>
                            <input type="number" step="1000.00" name="price" x-model="booking.price"
                                   class="w-full border rounded-lg p-2" required>
                        </div>
                        <div>
                            <label class="block font-semibold mb-1">المتبقي</label>
                            <input type="number" step="1000.00" name="remaining_amount" x-model="booking.remaining_amount"
                                   class="w-full border rounded-lg p-2">
                        </div>
                    </div>

                    <!-- تاريخ الاستحقاق + الحالة -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block font-semibold mb-1">تاريخ الاستحقاق</label>
                            <input type="date" name="due_date" x-model="booking.due_date"
                                   class="w-full border rounded-lg p-2">
                        </div>
                        <div>
                            <label class="block font-semibold mb-1">الحالة</label>
                            <select name="status" x-model="booking.status" class="w-full border rounded-lg p-2">
                                <option value="pending">قيد الانتظار</option>
                                <option value="confirmed">مؤكد</option>
                                <option value="cancelled">ملغي</option>
                            </select>
                        </div>
                    </div>

                    <!-- الأزرار -->
                    <div class="flex justify-end gap-2 mt-4">
                        <button type="button" @click="showModal = false"
                                class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">إلغاء</button>
                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"
                                x-text="editMode ? 'تحديث' : 'حفظ'"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
