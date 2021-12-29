<ul class="nav nav-tabs" role="tablist">
    @for($i = 0; $i < $count; $i++ )
        <li class="nav-item"  wire:click="setCurrentTab({{$i + 1}})">
            @isset($currentTab)
            <a class="nav-link {{$currentTab == $i + 1 ? 'active' : '' }}" href="#tab-{{$i + 1}}" data-bs-toggle="tab" role="tab">
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
