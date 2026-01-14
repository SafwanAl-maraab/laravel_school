<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div dir="rtl">
                <x-label for="name" value="الاسم الكامل" />
                <x-input id="name" class="block mt-1 w-full text-right" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4" dir="rtl">
                <x-label for="email" value="البريد الإلكتروني" />
                <x-input id="email" class="block mt-1 w-full text-right" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4" dir="rtl">
                <x-label for="password" value="كلمة المرور" />
                <x-input id="password" class="block mt-1 w-full text-right" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4" dir="rtl">
                <x-label for="password_confirmation" value="تأكيد كلمة المرور" />
                <x-input id="password_confirmation" class="block mt-1 w-full text-right" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4" dir="rtl">
                    <x-label for="terms">
                        <div class="flex items-center justify-end">
                            <x-checkbox name="terms" id="terms" required class="ms-2" />
                            <div>
                                {!! __('أوافق على :terms_of_service و :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('شروط الخدمة').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('سياسة الخصوصية').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-between mt-4" dir="rtl">
                <x-button class="ms-4">
                    {{ __('تسجيل جديد') }}
                </x-button>

                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('هل لديك حساب؟ تسجيل الدخول') }}
                </a>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
