<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- البريد الإلكتروني -->
            <div class="block text-center">
                <x-label for="email" value="{{ __('البريد الإلكتروني') }}" />
                <x-input id="email" class="block mt-1 w-full text-center" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            </div>

            <!-- كلمة المرور الجديدة -->
            <div class="mt-4 text-center">
                <x-label for="password" value="{{ __('كلمة المرور الجديدة') }}" />
                <x-input id="password" class="block mt-1 w-full text-center" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- تأكيد كلمة المرور -->
            <div class="mt-4 text-center">
                <x-label for="password_confirmation" value="{{ __('تأكيد كلمة المرور') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full text-center" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-button>
                    {{ __('إعادة تعيين كلمة المرور') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
