<form id="{{ $id }}"
      name="{{ $id }}"
      @isset($data) action="{{ route($route, $data) }}" @else action="{{ route($route) }}" @endisset
      @isset ($enctype) enctype="{{ $enctype }}" laravel @endisset
      method="POST">
    @csrf
    @method( $method )
</form>
