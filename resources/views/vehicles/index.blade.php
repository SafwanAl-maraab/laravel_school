@extends('layouts.app1')

@section('title', 'إدارة المركبات')

@section('content')
    <div class="p-6 bg-gray-100 min-h-screen">
        <!-- 🔹 رأس الصفحة -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">إدارة المركبات</h1>
            <button id="addBtn" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                + إضافة مركبة
            </button>
        </div>

        <!-- 🔍 البحث -->
        <form method="GET" action="{{ route('vehicles.index') }}" class="mb-4 flex gap-2">
            <input type="text" name="search" placeholder="ابحث برقم اللوحة أو الموديل..."
                   value="{{ request('search') }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400">
            <button type="submit" class="bg-gray-700 text-white px-4 py-2 rounded-lg hover:bg-gray-800">بحث</button>
        </form>

        <!-- 📋 الجدول -->
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full text-sm text-gray-800">
                <thead class="bg-gray-200">
                <tr class="text-center">
                    <th class="py-3 px-2">#</th>
                    <th class="py-3 px-2">رقم اللوحة</th>
                    <th class="py-3 px-2">الموديل</th>
                    <th class="py-3 px-2">السعة</th>
                    <th class="py-3 px-2">الحالة</th>
                    <th class="py-3 px-2">الإجراءات</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($vehicles as $index => $v)
                    <tr class="text-center border-b hover:bg-gray-50">
                        <td class="py-2">{{ $index + 1 }}</td>
                        <td class="py-2">{{ $v->license_plate }}</td>
                        <td class="py-2">{{ $v->model }}</td>
                        <td class="py-2">{{ $v->capacity }}</td>
                        <td class="py-2">
                        <span class="px-3 py-1 rounded-full text-white text-xs
                            {{ $v->status === 'active' ? 'bg-green-500' :
                               ($v->status === 'maintenance' ? 'bg-yellow-500' : 'bg-gray-500') }}">
                            {{ $v->status }}
                        </span>
                        </td>
                        <td class="py-2 space-x-2 rtl:space-x-reverse">
                            <button onclick="editVehicle({{ $v->id }})" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                                تعديل
                            </button>
                            <button onclick="deleteVehicle({{ $v->id }})" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                                حذف
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-4 text-center text-gray-500">لا توجد مركبات حالياً</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- 🧩 المودال (إضافة / تعديل) -->
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
        <div class="bg-white w-full max-w-lg rounded-2xl shadow-lg p-6 relative">
            <h2 id="modalTitle" class="text-xl font-bold text-gray-700 mb-4">إضافة مركبة</h2>
            <form id="vehicleForm" class="space-y-3">
                @csrf
                <input type="hidden" id="vehicle_id" name="id">

                <div>
                    <label class="block font-semibold">رقم اللوحة</label>
                    <input name="license_plate" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                </div>
                <div>
                    <label class="block font-semibold">الموديل</label>
                    <input name="model" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                </div>
                <div>
                    <label class="block font-semibold">السعة</label>
                    <input name="capacity" type="number" min="1" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                </div>
                <div>
                    <label class="block font-semibold">الحالة</label>
                    <select name="status" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        <option value="active">نشطة</option>
                        <option value="maintenance">صيانة</option>
                        <option value="inactive">غير فعالة</option>
                    </select>
                </div>

                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" id="closeModal" class="px-4 py-2 bg-gray-400 hover:bg-gray-500 text-white rounded-lg">
                        إغلاق
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                        حفظ
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const modal = document.getElementById('modal');
        const addBtn = document.getElementById('addBtn');
        const closeModal = document.getElementById('closeModal');
        const form = document.getElementById('vehicleForm');
        const idField = document.getElementById('vehicle_id');
        const title = document.getElementById('modalTitle');

        // ✅ فتح نافذة الإضافة
        addBtn.addEventListener('click', () => {
            form.reset();
            idField.value = '';
            title.textContent = 'إضافة مركبة';
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        });

        // ❌ إغلاق المودال
        closeModal.addEventListener('click', () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        });

        // 💾 حفظ (إضافة / تعديل)
        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            const id = idField.value;
            const url = id ? `/vehicles/${id}` : '/vehicles';
            const method = id ? 'PUT' : 'POST';

            const formData = new FormData(form);
            const res = await fetch(url, {
                method,
                headers: { 'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value },
                body: formData
            });

            const data = await res.json();
            alert(data.message);
            if (data.success) window.location.reload();
        });

        // ✏️ تعديل
        async function editVehicle(id) {
            const res = await fetch(`/vehicles/${id}`);
            const data = await res.json();

            title.textContent = 'تعديل مركبة';
            idField.value = data.id;

            Object.keys(data).forEach(key => {
                if (form[key]) form[key].value = data[key];
            });

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        // 🗑️ حذف
        async function deleteVehicle(id) {
            if (!confirm('هل أنت متأكد من حذف هذه المركبة؟')) return;
            const res = await fetch(`/vehicles/${id}`, {
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value },
            });

            const data = await res.json();
            alert(data.message);
            if (data.success) window.location.reload();
        }
    </script>
@endsection
