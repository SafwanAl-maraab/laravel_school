@extends('layouts.app2')

@section('content')
    <style>
        body {
            background: #f4f6f9;
        }

        .book-card {
            border-radius: 16px;
            padding: 15px;
            background: #fff;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: 0.3s;
        }

        .book-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.12);
        }

        .book-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 15px;
        }

        .btn-primary {
            background: linear-gradient(45deg, #007bff, #00c6ff);
            border: none;
            border-radius: 1px;

        }

        .btn-warning, .btn-danger {
            border-radius: 12px;
        }
    </style>

    <div class="container my-4">
        <div class="discount-container">

            <!-- 🔎 نموذج البحث -->
            <form action="{{ route('book.index') }}" method="GET" class="mb-4">
                <div class="input-group shadow-sm">
                    <button type="submit" class="btn btn-primary">بحث</button>
                    <input type="text" name="search" class="form-control" placeholder="🔎 ابحث باسم الكتاب..."
                           value="{{ request('search') }}">

                </div>
            </form>

            <!-- 📘 عرض الكتب على شكل بطاقات -->
            <div class="row g-3">

{{--                @forelse ($books as $book)--}}
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="book-card">

                            <!-- صورة الكتاب -->
{{--                            <img src="{{ asset('storage/'.$book->image) }}" class="book-img" alt="الصورة">--}}

                            <!-- بيانات الكتاب -->
                            <h5 class="fw-bold">hgu</h5>

                            <p class="mb-1"><strong>الجزء:</strong> </p>
                            <p class="mb-1"><strong>عدد الصفحات:</strong></p>
                            <p class="mb-1"><strong>الحجم:</strong> </p>
                            <p class="mb-1"><strong>الإصدار:</strong> </p>
                            <p class="mb-3"><strong>الجهة:</strong> </p>

                            <!-- أزرار التحكم -->
{{--                            <div class="d-flex justify-content-between">--}}
{{--                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">✏️ تعديل</a>--}}

{{--                                <form action="{{ route('books.destroy', $book->id) }}" method="POST"--}}
{{--                                      onsubmit="return confirm('هل تريد حذف هذا الكتاب؟')">--}}
{{--                                    @csrf--}}
{{--                                    @method('DELETE')--}}
{{--                                    <button class="btn btn-danger btn-sm">🗑️ حذف</button>--}}
{{--                                </form>--}}
                            </div>

                        </div>
                    </div>
{{--                @empty--}}
{{--                    <div class="col-12 text-center py-5 text-muted">--}}
{{--                        🚫 لا توجد كتب مطابقة للبحث--}}
{{--                    </div>--}}
{{--                @endforelse--}}

            </div>

            <!-- روابط الصفحات -->
            <div class="mt-4">
{{--                {{ $books->links() }}--}}
            </div>

        </div>
{{--    </div>--}}
@endsection
