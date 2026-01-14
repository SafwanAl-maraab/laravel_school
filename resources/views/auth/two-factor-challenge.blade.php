<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div x-data="{ recovery: false }">
            <!-- رسالة توضيحية رمز التوثيق -->
            <div class="mb-4 text-sm text-gray-600" x-show="! recovery">
                {{ __('يرجى تأكيد الوصول إلى حسابك عن طريق إدخال رمز المصادقة من تطبيق المصادقة الخاص بك.') }}
            </div>

            <!-- رسالة توضيحية رمز الطوارئ -->
            <div class="mb-4 text-sm text-gray-600" x-cloak x-show="recovery">
                {{ __('يرجى تأكيد الوصول إلى حسابك عن طريق إدخال أحد رموز الطوارئ الخاصة بك.') }}
            </div>

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('two-factor.login') }}">
                @csrf

                <!-- إدخال رمز المصادقة -->
                <div class="mt-4 text-center" x-show="! recovery">
                    <x-label for="code" value="{{ __('رمز المصادقة') }}" />
                    <x-input id="code" class="block mt-1 w-full text-center" type="text" inputmode="numeric" name="code" autofocus x-ref="code" autocomplete="one-time-code" />
                </div>

                <!-- إدخال رمز الطوارئ -->
                <div class="mt-4 text-center" x-cloak x-show="recovery">
                    <x-label for="recovery_code" value="{{ __('رمز الطوارئ') }}" />
                    <x-input id="recovery_code" class="block mt-1 w-full text-center" type="text" name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code" />
                </div>

                <div class="flex items-center justify-center mt-4 space-x-4">
                    <!-- زر التبديل لاستخدام رمز الطوارئ -->
                    <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                            x-show="! recovery"
                            x-on:click="
                                        recovery = true;
                                        $nextTick(() => { $refs.recovery_code.focus() })
                                    ">
                        {{ __('استخدام رمز الطوارئ') }}
                    </button>

                    <!-- زر التبديل لاستخدام رمز المصادقة -->
                    <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                            x-cloak
                            x-show="recovery"
                            x-on:click="
                                        recovery = false;
                                        $nextTick(() => { $refs.code.focus() })
                                    ">
                        {{ __('استخدام رمز المصادقة') }}
                    </button>

                    <!-- زر تسجيل الدخول -->
                    <x-button class="ms-4">
                        {{ __('تسجيل الدخول') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
