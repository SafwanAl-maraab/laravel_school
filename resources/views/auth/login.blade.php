<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ $value }}
        </div>
        @endsession

        <form method="POST" action="{{ route('login') }}" dir="rtl" style="font-family: 'Tajawal', sans-serif;">
            @csrf

            <!-- البريد الإلكتروني -->
            <div>
                <x-label for="email" value="{{ __('البريد الإلكتروني') }}" />
                <x-input id="email" class="block mt-1 w-full text-center" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <!-- كلمة المرور -->
            <div class="mt-4">
                <x-label for="password" value="{{ __('كلمة المرور') }}" />
                <x-input id="password" class="block mt-1 w-full text-center" type="password" name="password" required autocomplete="current-password" />
            </div>

            <!-- تذكرني -->
            <div class="block mt-4">
                <label for="remember_me" class="flex items-center justify-end">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="me-2 text-sm text-gray-600">{{ __('تذكرني') }}</span>
                </label>
            </div>

            <!-- روابط الأزرار -->
            <div class="flex items-center justify-between mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('نسيت كلمة المرور؟') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('تسجيل الدخول') }}
                </x-button>
            </div>
        </form>

        <div class="text-center mt-4 text-sm text-gray-600">
            ليس لديك حساب؟
            <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">إنشاء حساب جديد</a>
        </div>
    </x-authentication-card>
</x-guest-layout>
