{{-- resources/views/partials/form-fields.blade.php --}}
<div class="grid grid-cols-1 gap-4">
    {{-- مثال للحقول الأساسية، عدل حسب كل صفحة --}}
    @if(Route::currentRouteName() == 'bookings.index')
        <label class="block">
            <span class="text-sm font-medium">العميل</span>
            <select name="customer_id" class="w-full border rounded p-2">
                @foreach($customers as $c)
                    <option value="{{ $c->id }}" :selected="editData.customer_id == {{ $c->id }}">{{ $c->first_name }} {{ $c->last_name }}</option>
                @endforeach
            </select>
        </label>
        <label class="block">
            <span class="text-sm font-medium">الوجهة</span>
            <input name="trip_destination" type="text" class="w-full border rounded p-2" :value="editData.trip_destination ?? ''" />
        </label>
        <div class="grid grid-cols-2 gap-4">
            <label>
                <span class="text-sm font-medium">تاريخ المغادرة</span>
                <input name="departure_date" type="date" class="w-full border rounded p-2" :value="editData.departure_date ?? ''" />
            </label>
            <label>
                <span class="text-sm font-medium">تاريخ العودة (اختياري)</span>
                <input name="return_date" type="date" class="w-full border rounded p-2" :value="editData.return_date ?? ''" />
            </label>
        </div>
        <div class="grid grid-cols-3 gap-4">
            <label>
                <span class="text-sm font-medium">السعر</span>
                <input name="price" type="number" step="0.01" class="w-full border rounded p-2" :value="editData.price ?? ''" />
            </label>
            <label>
                <span class="text-sm font-medium">المتبقي</span>
                <input name="remaining_amount" type="number" step="0.01" class="w-full border rounded p-2" :value="editData.remaining_amount ?? ''" />
            </label>
            <label>
                <span class="text-sm font-medium">آخر موعد للدفع</span>
                <input name="due_date" type="date" class="w-full border rounded p-2" :value="editData.due_date ?? ''" />
            </label>
        </div>
    @endif
    {{-- أضف شروط مماثلة لبقية الصفحات --}}
</div>
