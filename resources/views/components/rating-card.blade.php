<div class="p-4">
    <h4>{{ $rating->user->email }}</h4>
    <p>{{ $rating->note }}</p>
    <p>{{ $rating->comment }}</p>
    <p>{{ $rating->created_at }}</p>

    <div>
        @if ($rating->user_id == auth()->user()->id)
            <button class="btn btn-danger">
                <i class="fas fa-trash-alt"></i>
            </button>
        @endif
    </div>
</div>
