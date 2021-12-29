<div>
    <div class="d-flex justify-content-between">
        <div>
            <button
                wire:click="$emitUp('setPage', 'create')"
                type="button"
                class="btn btn-primary mt-n1"
            >
                <i class="fas fa-plus"></i>
                @lang('global.btn_new')
            </button>
        </div>

        <div>
            <div class="mb-3">
                <h1>@lang('modules/productionCard.h1')</h1>
            </div>
        </div>

        <div>
            <button
                wire:click="$emitUp('showIndexGridColumnsSelect', true)"
                type="button"
                class="btn btn-primary mt-n1 mx-1"
            >
                <i class="fas fa-hashtag"></i>
            </button>

            <button
                wire:click="close"
                type="button"
                class="btn btn-primary mt-n1"
            >
                @lang('global.btn_close')
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            @if(isset($groups[0]['items']) && count($groups[0]['items']) > 0)
                                @foreach($groups[0]['items'] as $item)
                                    <th scope="col">@lang('modules/productionCard.'.$item['name'])</th>
                                @endforeach
                            @endif

                            <th scope="col" class="d-flex justify-content-between">
                                @lang('global.actions')
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($productionCards as $card)
                            <tr>
                                @if(isset($groups[0]['items']) && count($groups[0]['items']) > 0)
                                    @foreach($groups[0]['items'] as $item)
                                        <td class="{{ $clickStatus ? 'cursor-pointer' : ''}}">
                                            {{ $card->{$item['name']} }}
                                        </td>
                                    @endforeach
                                @endif

                                <td class="table-action">
                                    <button
                                        wire:click="$emit('setPage', 'edit', '{{ $card->f_id }}')"
                                        type="button"
                                        class="btn my-0 py-0"
                                    >
                                        <i class="fas fa-pencil-alt"></i>
{{--                                            <i class="align-middle" data-feather="edit-2"></i>--}}
                                    </button>

                                    <button
                                        wire:click="delete('{{ $card->f_id }}')"
                                        type="button"
                                        class="btn my-0 py-0"
                                    >
                                        <i class="fas fa-trash"></i>
                                        {{--                                        <i class="align-middle" data-feather="trash-2"></i>--}}
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $productionCards->links() }}
        </div>
    </div>

    @if($pagee === 'index' && $showIndexGridColumnsSelect)
        <livewire:form.drag-list
            :groups="$groups"
            lang="modules/productionCard"
        />
    @endif
</div>
