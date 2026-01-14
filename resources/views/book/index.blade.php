@extends('layouts.app1')

@section('title', 'قائمة الحجوزات - أضواء الخليج للسفريات والسياحة')

@section('content')
    <div class="p-6 bg-gray-100 min-h-screen" x-data="{ showModal: false, editMode: false, booking: {} }">

        <!-- العنوان + زر إضافة -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">قائمة الحجوزات</h1>

        </div>

        <!-- مربع البحث -->

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
                    <th class="p-3 text-right">الاسم</th>
                    <th class="p-3 text-right">الجزء</th>
                    <th class="p-3 text-right"> عدد الصفحات</th>
                    <th class="p-3 text-right">الحجم</th>
                    <th class="p-3 text-right">الاصدار</th>
                    <th class="p-3 text-right">الجهة</th>

                    <th class="p-3 text-right">اخرى</th>

                    <th class="p-3 text-right">الإجراءات</th>
                </tr>
                </thead>
                <tbody>

                    <tr>
                        <td colspan="10" class="text-center py-6 text-gray-500">لا توجد  حالياً</td>
                    </tr>

                </tbody>
            </table>
        </div>


            </div>

@endsection
