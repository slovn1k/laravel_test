@if($status == \App\User::USER_BLOCKED)
    <form
            method="POST"
            style="display:inline"
            action="{{route('change_status', $id)}}"
    >
        @csrf
        <button
                type="submit"
                class="btn btn-dark"
                rel="tooltip"
                data-title="delete"
                style="width: auto; height: auto;"
        >
            <i class="fas fa-lock"></i>
        </button>
    </form>
@else
    <form
            method="POST"
            style="display:inline"
            action="{{route('change_status', $id)}}"
    >
        @csrf
        <button
                type="submit"
                class="btn btn-info"
                rel="tooltip"
                data-title="delete"
                style="width: auto; height: auto;"
        >
            <i class="fas fa-lock-open"></i>
        </button>
    </form>
@endif
