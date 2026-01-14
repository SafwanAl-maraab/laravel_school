<x-action-section dir="rtl">
    <x-slot name="title">
        {{ __('التحقق بخطوتين') }}
    </x-slot>

    <x-slot name="description">
        {{ __('أضف طبقة أمان إضافية إلى حسابك باستخدام التحقق بخطوتين.') }}
    </x-slot>

    <x-slot name="content">
        <h3 class="text-lg font-medium text-gray-900 text-center">
            @if ($this->enabled)
                @if ($showingConfirmation)
                    {{ __('أكمل تفعيل التحقق بخطوتين.') }}
                @else
                    {{ __('تم تفعيل التحقق بخطوتين.') }}
                @endif
            @else
                {{ __('لم تقم بتفعيل التحقق بخطوتين.') }}
            @endif
        </h3>

        <div class="mt-3 max-w-xl text-sm text-gray-600 text-center mx-auto">
            <p>
                {{ __('عند تفعيل التحقق بخطوتين، ستحتاج إلى إدخال رمز أمني عشوائي أثناء تسجيل الدخول. يمكنك الحصول على هذا الرمز من تطبيق Google Authenticator على هاتفك.') }}
            </p>
        </div>

        @if ($this->enabled)
            @if ($showingQrCode)
                <div class="mt-4 max-w-xl text-sm text-gray-600 text-center mx-auto">
                    <p class="font-semibold">
                        @if ($showingConfirmation)
                            {{ __('لإكمال التفعيل، امسح رمز الاستجابة السريعة (QR) باستخدام تطبيق المصادقة على هاتفك أو أدخل مفتاح الإعداد وادخل رمز OTP المولد.') }}
                        @else
                            {{ __('تم تفعيل التحقق بخطوتين. امسح رمز الاستجابة السريعة (QR) باستخدام تطبيق المصادقة على هاتفك أو أدخل مفتاح الإعداد.') }}
                        @endif
                    </p>
                </div>

                <div class="mt-4 p-2 inline-block bg-white text-center">
                    {!! $this->user->twoFactorQrCodeSvg() !!}
                </div>

                <div class="mt-4 max-w-xl text-sm text-gray-600 text-center mx-auto">
                    <p class="font-semibold">
                        {{ __('مفتاح الإعداد') }}: {{ decrypt($this->user->two_factor_secret) }}
                    </p>
                </div>

                @if ($showingConfirmation)
                    <div class="mt-4 text-center">
                        <x-label for="code" value="{{ __('الرمز') }}" />

                        <x-input id="code" type="text" name="code" class="block mt-1 w-1/2 text-center mx-auto" inputmode="numeric" autofocus autocomplete="one-time-code"
                                 wire:model="code"
                                 wire:keydown.enter="confirmTwoFactorAuthentication" />

                        <x-input-error for="code" class="mt-2 text-center" />
                    </div>
                @endif
            @endif

            @if ($showingRecoveryCodes)
                <div class="mt-4 max-w-xl text-sm text-gray-600 text-center mx-auto">
                    <p class="font-semibold">
                        {{ __('احفظ هذه الرموز في مدير كلمات المرور بشكل آمن. يمكن استخدامها لاستعادة الوصول إلى حسابك إذا فقدت جهاز التحقق بخطوتين.') }}
                    </p>
                </div>

                <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg mx-auto text-center">
                    @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                        <div>{{ $code }}</div>
                    @endforeach
                </div>
            @endif
        @endif

        <div class="mt-5 text-center">
            @if (! $this->enabled)
                <x-confirms-password wire:then="enableTwoFactorAuthentication">
                    <x-button type="button" wire:loading.attr="disabled">
                        {{ __('تفعيل') }}
                    </x-button>
                </x-confirms-password>
            @else
                @if ($showingRecoveryCodes)
                    <x-confirms-password wire:then="regenerateRecoveryCodes">
                        <x-secondary-button class="me-3">
                            {{ __('إعادة إنشاء الرموز') }}
                        </x-secondary-button>
                    </x-confirms-password>
                @elseif ($showingConfirmation)
                    <x-confirms-password wire:then="confirmTwoFactorAuthentication">
                        <x-button type="button" class="me-3" wire:loading.attr="disabled">
                            {{ __('تأكيد') }}
                        </x-button>
                    </x-confirms-password>
                @else
                    <x-confirms-password wire:then="showRecoveryCodes">
                        <x-secondary-button class="me-3">
                            {{ __('عرض الرموز') }}
                        </x-secondary-button>
                    </x-confirms-password>
                @endif

                @if ($showingConfirmation)
                    <x-confirms-password wire:then="disableTwoFactorAuthentication">
                        <x-secondary-button wire:loading.attr="disabled">
                            {{ __('إلغاء') }}
                        </x-secondary-button>
                    </x-confirms-password>
                @else
                    <x-confirms-password wire:then="disableTwoFactorAuthentication">
                        <x-danger-button wire:loading.attr="disabled">
                            {{ __('تعطيل') }}
                        </x-danger-button>
                    </x-confirms-password>
                @endif

            @endif
        </div>
    </x-slot>
</x-action-section>
