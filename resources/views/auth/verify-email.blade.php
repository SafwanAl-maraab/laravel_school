<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <!-- رسالة التحقق -->
        <div class="mb-4 text-sm text-gray-600" dir="rtl">
            {{ __('قبل المتابعة، يرجى التحقق من عنوان بريدك الإلكتروني عن طريق النقر على الرابط الذي أرسلناه للتو. إذا لم تستلم البريد، سنرسل لك رابطًا آخر بكل سرور.') }}
        </div>

        <!-- رسالة نجاح إرسال الرابط -->
        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600" dir="rtl">
                {{ __('تم إرسال رابط تحقق جديد إلى عنوان البريد الإلكتروني الذي قدمته في إعدادات ملفك الشخصي.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between" dir="rtl">
            <!-- إعادة إرسال رابط التحقق -->
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div>
                    <x-button type="submit">
                        {{ __('إعادة إرسال رابط التحقق') }}
                    </x-button>
                </div>
            </form>

            <div class="flex items-center">
                <!-- رابط تعديل الملف الشخصي -->
                <a
                    href="{{ route('profile.show') }}"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    {{ __('تعديل الملف الشخصي') }}
                </a>

                <!-- زر تسجيل الخروج -->
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ms-2">
                        {{ __('تسجيل الخروج') }}
                    </button>
                </form>
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>
