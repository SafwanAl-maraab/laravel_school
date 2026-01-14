<x-action-section dir="rtl">
    <x-slot name="title">
        {{ __('حذف الحساب') }}
    </x-slot>

    <x-slot name="description">
        {{ __('حذف حسابك نهائيًا من النظام.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600 text-right leading-relaxed">
            {{ __('عند حذف حسابك، سيتم حذف جميع بياناتك نهائيًا من النظام. يُرجى التأكد من تحميل أو حفظ أي بيانات مهمة ترغب بالاحتفاظ بها قبل المتابعة.') }}
        </div>

        <div class="mt-5 text-center">
            <x-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                {{ __('حذف الحساب') }}
            </x-danger-button>
        </div>

        <!-- نافذة تأكيد حذف الحساب -->
        <x-dialog-modal wire:model.live="confirmingUserDeletion" dir="rtl">
            <x-slot name="title">
                {{ __('تأكيد حذف الحساب') }}
            </x-slot>

            <x-slot name="content">
                <p class="text-gray-700 text-right leading-relaxed">
                    {{ __('هل أنت متأكد أنك تريد حذف حسابك؟ بعد الحذف، سيتم حذف جميع بياناتك بشكل دائم ولا يمكن استعادتها. الرجاء إدخال كلمة المرور لتأكيد العملية.') }}
                </p>

                <div class="mt-4 flex justify-center"
                     x-data="{}"
                     x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-input
                        type="password"
                        class="mt-1 block w-3/4 text-center"
                        autocomplete="current-password"
                        placeholder="{{ __('أدخل كلمة المرور') }}"
                        x-ref="password"
                        wire:model="password"
                        wire:keydown.enter="deleteUser" />
                </div>

                <x-input-error for="password" class="mt-2 text-center" />
            </x-slot>

            <x-slot name="footer">
                <div class="w-full flex justify-center gap-4">
                    <x-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                        {{ __('إلغاء') }}
                    </x-secondary-button>

                    <x-danger-button wire:click="deleteUser" wire:loading.attr="disabled">
                        {{ __('تأكيد الحذف') }}
                    </x-danger-button>
                </div>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>
