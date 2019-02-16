<form
        method="POST"
        style="display:inline"
        action="{{route('edit_user', $id)}}"
>
    @csrf
    <button
            type="submit"
            class="btn btn-warning"
            rel="tooltip"
            data-title="delete"
            style="width: auto; height: auto;"
    >
        <i class="fas fa-pen"></i>
    </button>
</form>