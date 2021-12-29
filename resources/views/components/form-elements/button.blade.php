<button
    form="{{ $form ?? null }}"
    class="btn {{ $class ?? '' }}"
    type="{{ $type ?? 'submit' }}"
    name="{{ $name ?? null }}"
    value="{{ $value ?? null}}"
>
    @if(isset($dataFeather))<i class="align-middle" data-feather="{{ $dataFeather }}"></i> @endif
    @if(isset($fontawesomeIcon))<i class="{{ $fontawesomeIcon }}"></i> @endif
    @lang($text ?? 'global.btn_empty')
</button>
