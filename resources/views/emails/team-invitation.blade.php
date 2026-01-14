@component('mail::message')
    {{ __('لقد تمت دعوتك للانضمام إلى فريق :team!', ['team' => $invitation->team->name]) }}

    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::registration()))
        {{ __('إذا لم يكن لديك حساب، يمكنك إنشاء واحد بالنقر على الزر أدناه. بعد إنشاء الحساب، يمكنك قبول دعوة الفريق بالنقر على زر القبول في هذا البريد:') }}

        @component('mail::button', ['url' => route('register')])
            {{ __('إنشاء حساب') }}
        @endcomponent

        {{ __('إذا كان لديك حساب بالفعل، يمكنك قبول هذه الدعوة بالنقر على الزر أدناه:') }}

    @else
        {{ __('يمكنك قبول هذه الدعوة بالنقر على الزر أدناه:') }}
    @endif

    @component('mail::button', ['url' => $acceptUrl])
        {{ __('قبول الدعوة') }}
    @endcomponent

    {{ __('إذا لم تتوقع استلام دعوة للانضمام لهذا الفريق، يمكنك تجاهل هذا البريد.') }}
@endcomponent
