<ul class="nav nav-tabs" role="tablist">
    @for($i = 0; $i < $count; $i++ )
        <li class="nav-item"  wire:click="setTab('{{ $i + 1}}')">
            @isset($tab)
                <a class="nav-link {{$tab == $i + 1 ? 'active' : '' }}" href="#tab-{{$i + 1}}" data-bs-toggle="tab" role="tab">
                    @lang($lang . $i + 1)
                </a>
            @else
                <a class="nav-link {{$i + 1 == 1 ? 'active' : '' }}" href="#tab-{{$i + 1}}" data-bs-toggle="tab" role="tab">
                    @lang($lang . $i + 1)
                </a>
            @endisset
        </li>
    @endfor
</ul>
