<div style="margin-left: {{ $level * 40 }}px; margin-bottom:15px;">

    <div class="border rounded p-3 bg-white shadow-sm">

        {{-- NAMA --}}
        <strong>
            {{ $komentar->penyewa->nama ?? $komentar->user->username ?? 'User' }}
        </strong>

        <p class="mb-1">{{ $komentar->isikomentar }}</p>

        <small class="text-muted">
            {{ $komentar->created_at->diffForHumans() }}
        </small>

        {{-- TOMBOL --}}
        <div class="mt-2">

            {{-- BALAS --}}
            <button class="btn btn-sm btn-primary"
                onclick="toggleReply({{ $komentar->id }})">
                Balas
            </button>

            {{-- HAPUS (ADMIN SAJA) --}}
            @auth
            <form action="{{ route('admin.komentar.destroy', $komentar->id) }}"
                method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">Hapus</button>
            </form>
            @endauth

        </div>

        {{-- FORM BALAS --}}
        <form id="reply-{{ $komentar->id }}"
            action="{{ route('komentar.store', ['id' => $komentar->artikelid]) }}"
            method="POST"
            style="display:none; margin-top:10px;">
            @csrf

            <input type="hidden" name="parent_id" value="{{ $komentar->id }}">
            <input type="hidden" name="artikelid" value="{{ $komentar->artikelid }}">

            <textarea name="isikomentar"
                class="form-control mb-2"
                placeholder="Tulis balasan..."
                required></textarea>

            <button class="btn btn-success btn-sm">Kirim</button>
        </form>

    </div>

    {{-- RECURSIVE REPLIES --}}
    @if($komentar->replies && $komentar->replies->count())
    @foreach($komentar->replies as $reply)
    @include('user.komentar.item', [
    'komentar' => $reply,
    'level' => $level + 1
    ])
    @endforeach
    @endif

</div>