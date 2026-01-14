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
            background: linear-gradient(90deg, #1cc88a, #4e73df);
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
            border-color: #1cc88a;
            box-shadow: 0 0 6px rgba(28,200,138,0.3);
        }
        button.btn {
            border-radius: 12px;
            font-weight: bold;
            letter-spacing: 0.5px;
        }
        .btn-success {
            background: linear-gradient(90deg, #1cc88a, #20d48c);
            border: none;
        }
        .btn-success:hover {
            background: linear-gradient(90deg, #20d48c, #1cc88a);
        }
        .btn-secondary {
            background: #858796;
            border: none;
        }
        .btn-secondary:hover {
            background: #6c757d;
        }
    </style>

    <div class="container mt-4">
        <div class="page-header">
            <h4 class="mb-0">➕ إضافة خصم جديد</h4>
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

            <form action="{{ route('discount.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- 🛍️ اختيار المنتج --}}
                <div class="mb-3">
                    <label class="form-label">اسم المنتج</label>
                    <select name="product_id" class="form-control" required>
                        <option value="">-- اختر المنتج --</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">
                                {{ $product->P_name }} — {{ $product->P_price }} $
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- 🔖 كود الخصم --}}
                <div class="mb-3">
                    <label class="form-label">كود الخصم</label>
                    <input type="text" name="code" class="form-control" placeholder="مثال: SAVE10" required>
                </div>

                {{-- 🖼️ صورة العرض --}}
                <div class="mb-3">
                    <label class="form-label">صورة العرض</label>
                    <input type="file" name="image" class="form-control" required>
                </div>

                {{-- 📝 وصف العرض --}}
                <div class="mb-3">
                    <label class="form-label">الوصف</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="أدخل وصفًا قصيرًا للخصم..."></textarea>
                </div>

                {{-- 💰 نسبة الخصم --}}
                <div class="mb-3">
                    <label class="form-label">نسبة الخصم (%)</label>
                    <input type="number" name="amount" class="form-control" min="0" max="100" step="0.01" placeholder="مثال: 15" required>
                </div>

                {{-- 📅 التواريخ --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">تاريخ البداية</label>
                        <input type="date" name="start_date" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">تاريخ النهاية</label>
                        <input type="date" name="end_date" class="form-control">
                    </div>
                </div>

                {{-- 🟢 الحالة --}}
                <div class="mb-4">
                    <label class="form-label">الحالة</label>
                    <select name="active" class="form-control">
                        <option value="1" selected>✅ مفعل</option>
                        <option value="0">🚫 غير مفعل</option>
                    </select>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success shadow-sm px-4">💾 حفظ الخصم</button>
                    <a href="{{ route('discount.index') }}" class="btn btn-secondary shadow-sm px-4">إلغاء</a>
                </div>
            </form>
        </div>
    </div>
@endsection
