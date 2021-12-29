<div>
    <div class="fixed-top h-100 bg-black bg-opacity-75">
        <div class="d-flex justify-content-center mt-3">
            <div wire:sortable-group="reorder" class="bg-white p-3 vh-50 overflow-scroll d-flex justify-content-between" style="width: 500px">
                @foreach ($groups as $group)
                    <div wire:key="group-{{ $group['id'] }}" wire:sortable.item="{{ $group['id'] }}">
                        <div style="display: flex">
                            <h4 wire:sortable.handle>{{ $group['label'] }}</h4>
                        </div>

                        <ul
                            wire:sortable-group.item-group="{{ $group['id'] }}"
                            class="list-group bg-white"
                        >
                            @if(isset($group['items']) && count($group['items']) > 0)
                            @foreach ($group['items'] as $task)
                                <li
                                    wire:key="task-{{ $task['id'] }}"
                                    wire:sortable-group.item="{{ $task['id'] }}"
                                    class="list-group-item list-group-item-action cursor-pointer {{ $group['id'] === 'show' ? 'bg-success' : 'bg-danger' }}"
                                    style="width: 200px; -webkit-user-select:none; -moz-user-select:none; user-select:none;"
                                >
                                    @lang($lang.'.'.$task['name'])
                                </li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-center mt-3">
            <div class="row mb-2" style="width: 500px">
                <div class="col-auto ms-auto text-end p-0 m-0 mt-n1">
                    <button
                        wire:click="save"
                        type="button"
                        class="btn btn-primary"
                    >
                        @lang('global.btn_save')
                    </button>

                    <button
                        wire:click="resetItems"
                        type="button"
                        class="btn btn-primary"
                    >
                        @lang('global.btn_reset')
                    </button>

                    <button
                        wire:click="$emitUp('showIndexGridColumnsSelect', false)"
                        type="button"
                        class="btn btn-primary"
                    >
                        @lang('global.btn_close')
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
