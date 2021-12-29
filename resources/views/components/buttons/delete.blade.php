<a href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $id}}').submit();">
    <i class="align-middle text-danger" data-feather="trash-2"></i>
</a>
<form action="{{ $route }}" method="POST" class="d-none" id="delete-form-{{ $id }}">
    @csrf
    @method('DELETE')
</form>

