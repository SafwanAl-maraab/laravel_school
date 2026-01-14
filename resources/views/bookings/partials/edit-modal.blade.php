<!-- resources/views/bookings/partials/edit-modal.blade.php -->
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6 relative">
        <h2 class="text-xl font-bold mb-4">تعديل الحجز</h2>

        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-2 gap-4">

                <div>
                    <label class="block text-gray-700">العميل</label>
                    <select name="customer_id" id="editCustomer" class="w-full border rounded p-2 mt-1">
                        <option value="">اختر العميل</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->last_name }}</option>
                        @endforeach
                    </select>
                    <p class="text-red-500 text-sm mt-1" id="errorCustomer"></p>
                </div>

                <div>
                    <label class="block text-gray-700">الموظف</label>
                    <input type="text" name="employee_id" id="editEmployee" class="w-full border rounded p-2 mt-1">
                    <p class="text-red-500 text-sm mt-1" id="errorEmployee"></p>
                </div>

                <div>
                    <label class="block text-gray-700">السائق</label>
                    <input type="text" name="driver_id" id="editDriver" class="w-full border rounded p-2 mt-1">
                    <p class="text-red-500 text-sm mt-1" id="errorDriver"></p>
                </div>

                <div>
                    <label class="block text-gray-700">تاريخ المغادرة</label>
                    <input type="date" name="departure_date" id="editDeparture" class="w-full border rounded p-2 mt-1">
                    <p class="text-red-500 text-sm mt-1" id="errorDeparture"></p>
                </div>

                <div>
                    <label class="block text-gray-700">تاريخ العودة</label>
                    <input type="date" name="return_date" id="editReturn" class="w-full border rounded p-2 mt-1">
                    <p class="text-red-500 text-sm mt-1" id="errorReturn"></p>
                </div>

                <div>
                    <label class="block text-gray-700">المغادرة</label>
                    <input type="text" name="origin" id="editOrigin" class="w-full border rounded p-2 mt-1">
                    <p class="text-red-500 text-sm mt-1" id="errorOrigin"></p>
                </div>

                <div>
                    <label class="block text-gray-700">الوجهة</label>
                    <input type="text" name="destination" id="editDestination" class="w-full border rounded p-2 mt-1">
                    <p class="text-red-500 text-sm mt-1" id="errorDestination"></p>
                </div>

                <div>
                    <label class="block text-gray-700">السعر</label>
                    <input type="number" name="price" id="editPrice" class="w-full border rounded p-2 mt-1">
                    <p class="text-red-500 text-sm mt-1" id="errorPrice"></p>
                </div>

                <div>
                    <label class="block text-gray-700">المتبقي</label>
                    <input type="number" name="remaining_amount" id="editRemaining" class="w-full border rounded p-2 mt-1">
                    <p class="text-red-500 text-sm mt-1" id="errorRemaining"></p>
                </div>

                <div>
                    <label class="block text-gray-700">تاريخ الاستحقاق</label>
                    <input type="date" name="due_date" id="editDue" class="w-full border rounded p-2 mt-1">
                    <p class="text-red-500 text-sm mt-1" id="errorDue"></p>
                </div>

                <div>
                    <label class="block text-gray-700">الحالة</label>
                    <select name="status" id="editStatus" class="w-full border rounded p-2 mt-1">
                        <option value="pending">قيد الانتظار</option>
                        <option value="confirmed">مؤكد</option>
                        <option value="cancelled">ملغي</option>
                    </select>
                    <p class="text-red-500 text-sm mt-1" id="errorStatus"></p>
                </div>

            </div>

            <div class="mt-6 flex justify-end space-x-2">
                <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 transition">إلغاء</button>
                <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition">تحديث</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditModal(booking) {
        const modal = document.getElementById('editModal');
        modal.classList.remove('hidden');

        document.getElementById('editForm').action = `/bookings/${booking.id}`;

        document.getElementById('editCustomer').value = booking.customer_id;
        document.getElementById('editEmployee').value = booking.employee_id;
        document.getElementById('editDriver').value = booking.driver_id;
        document.getElementById('editDeparture').value = booking.departure_date;
        document.getElementById('editReturn').value = booking.return_date;
        document.getElementById('editOrigin').value = booking.origin;
        document.getElementById('editDestination').value = booking.destination;
        document.getElementById('editPrice').value = booking.price;
        document.getElementById('editRemaining').value = booking.remaining_amount;
        document.getElementById('editDue').value = booking.due_date;
        document.getElementById('editStatus').value = booking.status;
    }

    function closeEditModal() {
        const modal = document.getElementById('editModal');
        modal.classList.add('hidden');
    }
</script>
