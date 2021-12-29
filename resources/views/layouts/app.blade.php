<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
<!--
      HOW TO USE:
      data-theme: default (default), dark, light, colored
      data-layout: fluid (default), boxed
      data-sidebar-position: left (default), right
      data-sidebar-layout: default (default), compact
    -->
<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
@if(request()->routeIs('login'))
    @yield('content')
@else
    @include('layouts.main')
@endif
@livewireScripts
<script src="{{ asset('js/resizable-table-columns/index.min.js') }}"></script>
<script src="{{ asset('js/resizable-table-columns/store.js') }}"></script>
<script src="{{ asset('theme/js/app.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
@if(app()->getLocale()!='en')
    <script src="{{ asset('theme/js/flatpickr-locales/'.app()->getLocale().'.js') }}"></script>
@endif
<script src="https://validide.github.io/resizable-table-columns/dist/samples/store.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        // Date picker
        flatpickr(".date",{
            "locale": "{{ app()->getLocale() == 'en' ? 'default' : app()->getLocale() }}"
        });
        flatpickr(".time", {
            time_24hr: true,
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
        });

        // Messages
        var success = '{{ session('success') }}';
        if (success) {
            getMessage(success, 'success');
        }
        var error = '{{ session('error') }}';
        if (error) {
            getMessage(error, 'danger');
        }
        function getMessage(message, type) {
            var message = message;
            var type = type;
            var duration = 3000;
            var dismissible = true;
            var positionX = 'center';
            var positionY = 'top';
            window.notyf.open({
                type,
                message,
                duration,
                dismissible,
                position: {
                    x: positionX,
                    y: positionY
                }
            });
        }

    });
</script>

//dragable
<script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
{{--<script>--}}
{{--    let root = document.querySelector('[drag-root]')--}}

{{--    root.querySelectorAll('[drag-item]').forEach(el => {--}}
{{--        el.addEventListener('dragstart', e => {--}}
{{--            e.target.setAttribute('dragging', true)--}}
{{--        })--}}

{{--        el.addEventListener('drop', e => {--}}
{{--            e.target.classList.remove('active')--}}

{{--            let draggingEl = root.querySelector('[dragging]')--}}
{{--            e.target.before(draggingEl)--}}

{{--            //refresh the livewire component--}}
{{--            let component = Livewire.find(--}}
{{--                e.target.closest('[wire\\:id]').getAttribute('wire:id')--}}
{{--            )--}}

{{--            let orderIds = Array.from(root.querySelectorAll('[drag-item]'))--}}
{{--                .map(itemEl => itemEl.getAttribute('drag-item'))--}}

{{--            let method = root.getAttribute('drag-root')--}}

{{--            component.call(method, orderIds)--}}
{{--        })--}}

{{--        el.addEventListener('dragenter', e => {--}}
{{--            e.target.classList.add('active')--}}

{{--            e.preventDefault();--}}
{{--        })--}}

{{--        el.addEventListener('dragover', e => {--}}
{{--            e.preventDefault();--}}
{{--        })--}}


{{--        el.addEventListener('dragleave', e => {--}}
{{--            e.target.classList.remove('active')--}}
{{--        })--}}

{{--        el.addEventListener('dragend', e => {--}}
{{--            e.target.removeAttribute('dragging')--}}
{{--        })--}}
{{--    })--}}
{{--</script>--}}
</body>
</html>
