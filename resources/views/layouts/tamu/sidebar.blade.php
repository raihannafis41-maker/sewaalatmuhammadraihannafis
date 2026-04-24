<aside class="col-md-4">

    {{-- SEARCH --}}
    <div class="card mb-3">
        <div class="card-header">
            <b>Pencarian</b>
        </div>
        <div class="card-body">
            <form action="{{ route('home') }}" method="GET">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari artikel...">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    {{-- KATEGORI --}}
    <div class="card mb-3">
        <div class="card-header">
            <b>Kategori</b>
        </div>
        <div class="card-body">
            @forelse($kategori as $k)
                <a href="{{ route('kategori', $k->id) }}">{{ $k->namakategori }}</a>
                <hr>
            @empty
                <p class="text-muted">Belum ada kategori</p>
            @endforelse
        </div>
    </div>


    {{-- ARTIKEL TERBARU --}}
    <div class="card">
        <div class="card-header">
            <b>Artikel Terbaru</b>
        </div>
        <div class="card-body">
            @forelse($artikelTerbaru as $a)
                <a href="{{ route('detailartikel', $a->id) }}">{{ $a->judul }}</a>
                <br>
                <small class="text-muted">{{ $a->created_at->format('d M Y') }}</small>
                <hr>
            @empty
                <p class="text-muted">Belum ada artikel</p>
            @endforelse
        </div>
    </div>

</aside>