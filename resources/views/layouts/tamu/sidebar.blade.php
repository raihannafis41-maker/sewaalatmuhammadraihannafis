<aside class="col-md-4">

    {{-- Search --}}
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Pencarian</h5>
        </div>
        <div class="card-body">
            <form action="/search" method="GET">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Cari artikel...">
                    <div class="input-group-append">
                        <button class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Kategori --}}
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Kategori</h5>
        </div>
        <div class="card-body">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('kategori', 1) }}">Elektronik</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('kategori', 2) }}">Outdoor</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('kategori', 3) }}">Event</a
                </li>
            </ul>
        </div>
    </div>

    {{-- Artikel Terbaru --}}
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Artikel Terbaru</h5>
        </div>
        <div class="card-body">

            <div class="post">
                <p>
                    <a href="#">Tips memilih alat camping</a><br>
                    <small class="text-muted">20 Apr 2026</small>
                </p>
            </div>

            <div class="post">
                <p>
                    <a href="#">Cara merawat kamera</a><br>
                    <small class="text-muted">18 Apr 2026</small>
                </p>
            </div>

        </div>
    </div>

</aside>