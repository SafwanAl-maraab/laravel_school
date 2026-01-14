@extends('layouts.app')

@section('content')
    <style>
        body {
            background: #f7f9fc;
            font-family: "Tajawal", "Cairo", sans-serif;
        }
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(90deg, #4e73df, #1cc88a);
            color: white;
            padding: 18px 25px;
            border-radius: 14px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.15);
            margin-bottom: 25px;
        }
        .card {
            background: white;
            border: none;
            border-radius: 14px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.1);
            padding: 30px;
            transition: all 0.3s ease;
        }
        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 20px rgba(0,0,0,0.12);
        }
        .form-label {
            font-weight: 600;
            color: #4e73df;
        }
        .form-control, select, textarea {
            border-radius: 12px;
            padding: 10px 12px;
            border: 1px solid #d1d3e2;
            transition: all 0.2s ease;
        }
        .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 6px rgba(78,115,223,0.3);
        }
        button.btn {
            border-radius: 12px;
            font-weight: bold;
            letter-spacing: 0.5px;
        }
        .btn-warning {
            background: linear-gradient(90deg, #f6c23e, #f8d06b);
            border: none;
            color: #000;
        }
        .btn-warning:hover {
            background: linear-gradient(90deg, #f8d06b, #f6c23e);
        }
        .btn-secondary {
            background: #858796;
            border: none;
        }
        .btn-secondary:hover {
            background: #6c757d;
        }
        .img-preview {
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-top: 10px;
        }
    </style>

    <div class="container mt-4">
        <div class="page-header">
            <h4 class="mb-0">✏️ تعديل الخصم</h4>
            <a href="{{ route('discount.index') }}" class="btn btn-light btn-sm shadow-sm">⬅️ رجوع إلى القائمة</a>
        </div>

        <div class="card">
            @if ($errors->any())
                <div class="alert alert-danger shadow-sm">
                    <strong>⚠️ يوجد أخطاء في الإدخال:</strong>
                    <ul class="mt-2 mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('discount.update', $discount->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- 🛍️ المنتج المرتبط --}}
                <div class="mb-3">
                    <label class="form-label">اسم المنتج</label>
                    <select name="product_id" class="form-control" required>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" {{ $discount->product_id == $product->id ? 'selected' : '' }}>
                                {{ $product->P_name }} — {{ $product->P_price }} $
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- 🔖 كود الخصم --}}
                <div class="mb-3">
                    <label class="form-label">كود الخصم</label>
                    <input type="text" name="code" class="form-control" value="{{ $discount->code }}" required>
                </div>

                {{-- 🖼️ الصورة --}}
                <div class="mb-3">
                    <label class="form-label">صورة العرض الحالية</label><br>
                    <img src="{{ asset('storage/'.$discount->image) }}" alt="صورة الخصم" width="140" height="140" class="img-preview">
                </div>

                <div class="mb-3">
                    <label class="form-label">تغيير الصورة (اختياري)</label>
                    <input type="file" name="image" class="form-control">
                </div>

                {{-- 📝 وصف الخصم --}}
                <div class="mb-3">
                    <label class="form-label">الوصف</label>
                    <textarea name="description" class="form-control" rows="3">{{ $discount->description }}</textarea>
                </div>

                {{-- 💰 نسبة الخصم --}}
                <div class="mb-3">
                    <label class="form-label">نسبة الخصم (%)</label>
                    <input type="number" name="amount" class="form-control" min="0" max="100" step="0.01" value="{{ $discount->amount }}" required>
                </div>

                {{-- 📅 التواريخ --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">تاريخ البداية</label>
                        <input type="date" name="start_date" class="form-control" value="{{ $discount->start_date }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">تاريخ النهاية</label>
                        <input type="date" name="end_date" class="form-control" value="{{ $discount->end_date }}">
                    </div>
                </div>

                {{-- 🟢 الحالة --}}
                <div class="mb-4">
                    <label class="form-label">الحالة</label>
                    <select name="active" class="form-control">
                        <option value="1" {{ $discount->active ? 'selected' : '' }}>✅ مفعل</option>
                        <option value="0" {{ !$discount->active ? 'selected' : '' }}>🚫 غير مفعل</option>
                    </select>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-warning shadow-sm px-4">💾 تحديث البيانات</button>
                    <a href="{{ route('discount.index') }}" class="btn btn-secondary shadow-sm px-4">إلغاء</a>
                </div>
            </form>
        </div>
    </div>
@endsection
