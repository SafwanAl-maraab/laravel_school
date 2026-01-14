@extends('layouts.app1')

@section('title', 'تعديل الحجز')

@section('content')
    <div class="bg-white rounded shadow p-6 max-w-3xl mx-auto">
        <h2 class="text-xl font-semibold mb-4">تعديل الحجز</h2>

        <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-4">

                <label>
                    <span class="text-sm font-medium">العميل</span>
                    <select name="customer_id" class="w-full border rounded p-2">
                        @foreach($customers as $c)
                            <option value="{{ $c->id }}" {{ $c->id == $booking->customer_id ? 'selected' : '' }}>
                                {{ $c->first_name }} {{ $c->last_name }}
                            </option>
                        @endforeach
                    </select>
                </label>

                <label>
                    <span class="text-sm font-medium">الوجهة</span>
                    <input type="text" name="trip_destination" value="{{ $booking->trip_destination }}" class="w-full border rounded p-2" />
                </label>

                <div class="grid grid-cols-2 gap-4">
                    <label>
                        <span class="text-sm font-medium">تاريخ المغادرة</span>
                        <input type="date" name="departure_date" value="{{ $booking->departure_date->format('Y-m-d') }}" class="w-full border rounded p-2" />
                    </label>
                    <label>
                        <span class="text-sm font-medium">تاريخ العودة (اختياري)</span>
                        <input type="date" name="return_date" value="{{ $booking->return_date?->format('Y-m-d') }}" class="w-full border rounded p-2" />
                    </label>
                </div>

                <div class="grid grid-cols-3 gap-4">
                    <label>
                        <span class="text-sm font-medium">السعر</span>
                        <input type="number" step="0.01" name="price" value="{{ $booking->price }}" class="w-full border rounded p-2" />
                    </label>
                    <label>
                        <span class="text-sm font-medium">المتبقي</span>
                        <input type="number" step="0.01" name="remaining_amount" value="{{ $booking->remaining_amount }}" class="w-full border rounded p-2" />
                    </label>
                    <label>
                        <span class="text-sm font-medium">آخر موعد للدفع</span>
                        <input type="date" name="due_date" value="{{ $booking->due_date?->format('Y-m-d') }}" class="w-full border rounded p-2" />
                    </label>
                </div>

                <div class="flex justify-end mt-4">
                    <button type="submit" class="px-6 py-2 bg-yellow-600 text-white rounded">حفظ التعديل</button>
                </div>
            </div>
        </form>
    </div>
@endsection
