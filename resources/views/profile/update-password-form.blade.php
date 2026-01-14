<x-form-section submit="updatePassword" dir="rtl">
    <x-slot name="title">
        {{ __('تحديث كلمة المرور') }}
    </x-slot>

    <x-slot name="description">
        {{ __('تأكد من أن حسابك يستخدم كلمة مرور قوية وعشوائية للحفاظ على أمانه.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="current_password" value="كلمة المرور الحالية" />
            <x-input
                id="current_password"
                type="password"
                class="mt-1 block w-full text-center"
                wire:model="state.current_password"
                autocomplete="current-password"
                placeholder="أدخل كلمة المرور الحالية" />
            <x-input-error for="current_password" class="mt-2 text-center" />
        </div>

        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-label for="password" value="كلمة المرور الجديدة" />
            <x-input
                id="password"
                type="password"
                class="mt-1 block w-full text-center"
                wire:model="state.password"
                autocomplete="new-password"
                placeholder="أدخل كلمة المرور الجديدة" />
            <x-input-error for="password" class="mt-2 text-center" />
        </div>

        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-label for="password_confirmation" value="تأكيد كلمة المرور" />
            <x-input
                id="password_confirmation"
                type="password"
                class="mt-1 block w-full text-center"
                wire:model="state.password_confirmation"
                autocomplete="new-password"
                placeholder="أعد إدخال كلمة المرور الجديدة" />
            <x-input-error for="password_confirmation" class="mt-2 text-center" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3 text-center" on="saved">
            {{ __('تم الحفظ.') }}
        </x-action-message>

        <x-button class="mt-2">
            {{ __('حفظ') }}
        </x-button>
    </x-slot>
</x-form-section>
