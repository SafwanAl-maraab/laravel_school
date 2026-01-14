<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-right">
            {{ __('الملف الشخصي') }}
        </h2>
    </x-slot>

    <div dir="rtl">
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

            {{-- ✅ تحديث معلومات الحساب --}}
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <div class="text-right">
                    @livewire('profile.update-profile-information-form')
                </div>

                <x-section-border />
            @endif

            {{-- ✅ تغيير كلمة المرور --}}
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0 text-right">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif

            {{-- ✅ إدارة التحقق الثنائي --}}
            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0 text-right">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-section-border />
            @endif

            {{-- ✅ إنهاء الجلسات الأخرى --}}
            <div class="mt-10 sm:mt-0 text-right">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            {{-- ✅ حذف الحساب --}}
            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />

                <div class="mt-10 sm:mt-0 text-right">
                    @livewire('profile.delete-user-form')
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
