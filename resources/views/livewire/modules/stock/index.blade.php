<div>
    <div class="col-auto ms-auto text-end">
        <button
            wire:click="$emitUp('create')"
            type="button"
            class="btn btn-primary"
        >
            <i class="fas fa-plus"></i>
            @lang('global.btn_new')
        </button>

        @if($clickStatus)
            <button
                wire:click="close()"
                type="button"
                class="btn btn-dark"
            >
                @lang('global.btn_close')
            </button>
        @endif
    </div>

    <div class="mb-3">
        <h1>@lang('modules/stock.h1')</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">@lang('modules/stock.f_id')</th>
                            <th scope="col">@lang('modules/stock.f_name')</th>
                            <th scope="col">@lang('modules/stock.f_type')</th>
                            <th scope="col">@lang('modules/stock.f_groupid')</th>
                            <th scope="col">@lang('modules/stock.f_unitid')</th>
                            <th scope="col">@lang('modules/stock.f_price_sale1')</th>
                            <th scope="col">@lang('global.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($stocks as $stock)
                            <tr>
                                <td class="{{ $clickStatus ? 'cursor-pointer' : ''}}" wire:click="select('{{ $stock->f_id }}')">{{ $stock->f_id }}</td>
                                <td class="{{ $clickStatus ? 'cursor-pointer' : ''}}" wire:click="select('{{ $stock->f_id }}')">{{ $stock->f_name }}</td>
                                <td class="{{ $clickStatus ? 'cursor-pointer' : ''}}" wire:click="select('{{ $stock->f_id }}')">{{ $stock->f_type }}</td>
                                <td class="{{ $clickStatus ? 'cursor-pointer' : ''}}" wire:click="select('{{ $stock->f_id }}')">{{ $stock->f_groupid }}</td>
                                <td class="{{ $clickStatus ? 'cursor-pointer' : ''}}" wire:click="select('{{ $stock->f_id }}')">{{ $stock->f_unitid }}</td>
                                <td class="{{ $clickStatus ? 'cursor-pointer' : ''}}" wire:click="select('{{ $stock->f_id }}')">{{ $stock->f_price_sale1 }}</td>
                                <td class="table-action">
                                    <button
                                        wire:click="$emitUp('changePage', 'edit', '{{ $stock->f_id }}')"
                                        type="button"
                                        class="btn my-0 py-0"
                                    >
                                        <i class="fas fa-pencil-alt"></i>
                                        {{--                                        <i class="align-middle" data-feather="edit-2"></i>--}}
                                    </button>

                                    <button
                                        wire:click="delete('{{ $stock->f_id }}')"
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
            {{ $stocks->links() }}
        </div>
    </div>
</div>
