<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <!-- رسالة استعادة كلمة المرور -->
        <div class="mb-4 text-sm text-gray-600" dir="rtl">
            {{ __('نسيت كلمة المرور؟ لا مشكلة. فقط أرسل لنا بريدك الإلكتروني وسنرسل لك رابطًا لإعادة تعيين كلمة المرور يتيح لك اختيار كلمة مرور جديدة.') }}
        </div>

        <!-- رسالة نجاح إرسال الرابط -->
        @session('status')
        <div class="mb-4 font-medium text-sm text-green-600" dir="rtl">
            {{ $value }}
        </div>
        @endsession

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- إدخال البريد الإلكتروني -->
            <div class="block">
                <x-label for="email" value="{{ __('البريد الإلكتروني') }}" />
                <x-input id="email" class="block mt-1 w-full text-center" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <!-- زر إرسال رابط إعادة تعيين كلمة المرور -->
            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('إرسال رابط إعادة تعيين كلمة المرور') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
