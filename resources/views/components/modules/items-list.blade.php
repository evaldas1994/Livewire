<div class="table-responsive">
    <table class="table table-sm table-striped">
        <thead>
        <tr>
            @foreach($langs as $lang)
                <th scope="col">@lang($lang)</th>
            @endforeach

            <th scope="col">@lang('global.actions')</th>
        </tr>
        </thead>
        <tbody>

        @foreach($items as $item)

            <tr>
                @foreach($fields as $field)
                    <td>{{ $item[$field] }}</td>
                @endforeach

                <td class="table-action">
                    @isset($wireEmmitUpName)
{{--                        <button wire:click="$emitUp('{{ $wireEmmitUpName }}', {{ $wireEmmitValue ?? true }}, {{ '\''.$item->f_id.'\'' }})"--}}
{{--                                class="btn "--}}
{{--                        ><i class="align-middle" data-feather="edit-2"></i>--}}
{{--                        </button>--}}

                        <button
                            wire:click="$emitUp('{{ $wireEmmitUpName }}', {{ $wireEmmitValue ?? true }}, {{ '\''.$item->f_id.'\'' }})"
                            class="btn"
                        >Edit</button>

{{--                        <x-form-elements.button--}}
{{--                            form="delete_form_{{ $item->f_id }}"--}}
{{--                            class="p-0"--}}
{{--                            name="button-action-without-validation"--}}
{{--                            value="{{ $name }}-delete|{{ $item->f_id }}"--}}
{{--                            dataFeather="trash-2"--}}
{{--                        />--}}

                        <button
                            form="delete_form_{{ $item->f_id }}"
                            type="submit"
                            class="btn"
                        >delete</button>
                        <form
                            action="{{ route($deleteFormRoute, [$parentRouteData, $item]) }}"
                            method="POST" class="d-none"
                            id="delete_form_{{ $item->f_id }}"
                            name="delete_form_{{ $item->f_id }}">
                            @csrf
                            @method('DELETE')
                        </form>
                    @else
                        <x-form-elements.button
                            form="{{ $form }}"
                            class="p-0"
                            name="button-action-without-validation"
                            value="{{ $name }}-edit|{{ $item->f_id }}"
                            dataFeather="edit-2"
                        />

                        <x-form-elements.button
                            form="delete_form_{{ $item->f_id }}"
                            class="p-0"
                            name="button-action-without-validation"
                            value="{{ $name }}-delete|{{ $item->f_id }}"
                            dataFeather="trash-2"
                        />
                        <form
                            action="{{ route($deleteFormRoute, [$parentRouteData, $item]) }}"
                            method="POST" class="d-none"
                            id="delete_form_{{ $item->f_id }}"
                            name="delete_form_{{ $item->f_id }}">
                            @csrf
                            @method('DELETE')
                        </form>
                    @endisset
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
