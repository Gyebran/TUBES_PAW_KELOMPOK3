

<form action="{{ route('comments.store') }}" method="POST">
    @csrf
    <input type="hidden" name="karya_id" value="{{ $karya->id }}">
    <textarea name="content" required></textarea>
    <button type="submit">Send</button>
</form>

<!-- Daftar Komentar -->
@foreach ($karya->comments as $comment)
    <div>
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->content }}</p>

        @if(auth()->id() === $comment->user_id || auth()->user()->is_admin)
            <!-- Tombol Edit & Hapus -->
        @endif
    </div>
@endforeach
