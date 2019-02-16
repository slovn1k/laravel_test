<form
        method="POST"
        style="display:inline"
        data-section="delete_{{$id}}"
        action="/{{ $resource }}/{{ $id }}"
>
    @csrf
    <input name="_method" type="hidden" value="delete"/>
    <button
            type="submit"
            class="btn btn-danger"
            rel="tooltip"
            data-title="delete"
            style="width: auto; height: auto;"
    >
        <i class="fas fa-trash-alt"></i>
    </button>
</form>