<!-- resources/views/bookings/partials/create-modal.blade.php -->
<div id="createModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6 relative">
        <h2 class="text-xl font-bold mb-4">إضافة حجز جديد</h2>

        <form action="{{ route('bookings.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-2 gap-4">

                <div>
                    <label class="block text-gray-700">العميل</label>
                    <select name="customer_id" class="w-full border rounded p-2 mt-1">
                        <option value="">اختر العميل</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->last_name }}</option>
                        @endforeach
                    </select>
                    @error('customer_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700">الموظف</label>
                    <input type="text" name="employee_id" class="w-full border rounded p-2 mt-1" placeholder="معرف الموظف">
                    @error('employee_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700">السائق</label>
                    <input type="text" name="driver_id" class="w-full border rounded p-2 mt-1" placeholder="معرف السائق">
                    @error('driver_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700">تاريخ المغادرة</label>
                    <input type="date" name="departure_date" class="w-full border rounded p-2 mt-1">
                    @error('departure_date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700">تاريخ العودة</label>
                    <input type="date" name="return_date" class="w-full border rounded p-2 mt-1">
                    @error('return_date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700">المغادرة</label>
                    <input type="text" name="origin" class="w-full border rounded p-2 mt-1" placeholder="مكان المغادرة">
                    @error('origin')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700">الوجهة</label>
                    <input type="text" name="destination" class="w-full border rounded p-2 mt-1" placeholder="الوجهة">
                    @error('destination')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700">السعر</label>
                    <input type="number" name="price" class="w-full border rounded p-2 mt-1" placeholder="السعر">
                    @error('price')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700">المتبقي</label>
                    <input type="number" name="remaining_amount" class="w-full border rounded p-2 mt-1" placeholder="المبلغ المتبقي">
                    @error('remaining_amount')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700">تاريخ الاستحقاق</label>
                    <input type="date" name="due_date" class="w-full border rounded p-2 mt-1">
                    @error('due_date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700">الحالة</label>
                    <select name="status" class="w-full border rounded p-2 mt-1">
                        <option value="pending">قيد الانتظار</option>
                        <option value="confirmed">مؤكد</option>
                        <option value="cancelled">ملغي</option>
                    </select>
                    @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div class="mt-6 flex justify-end space-x-2">
                <button type="button" onclick="closeCreateModal()" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 transition">إلغاء</button>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">حفظ</button>
            </div>
        </form>
    </div>
</div>
