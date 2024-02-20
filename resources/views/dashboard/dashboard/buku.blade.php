<div class="col-lg-6">
    @if (Auth::user()->role !== 'pembaca')
        {{-- Admin --}}
            <div class="card">
                <div class="card-header">
                    <h4>Koleksi Buku</h4>
                    <div class="card-header-action">
                        <a href="{{ route('buku.index') }}" class="btn btn-primary">Lihat semua <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive table-invoice">
                        <table class="table table-striped">
                            <tr>
                                <th>Judul Buku</th>
                                <th>Kategori</th>
                                <th>Stok</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            {{-- Looping Buku --}}
                            @forelse ($data['buku'] as $item)
                                <tr>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->kategori->kategori }}</td>
                                    <td>{{ $item->stok - $item->pinjam }}</td>
                                    <td>
                                        <div class="badge badge-{{ $item->pinjam > $item->stok ? 'danger' : 'success' }}">
                                            {{ $item->pinjam > $item->stok ? 'Kosong' : 'Tesedia' }}
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('buku.show', $item->slug) }}" class="btn btn-sm btn-info">Detail</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada data :(</td>
                                </tr>
                            @endforelse
                            {{-- End Looping Buku --}}
                        </table>
                    </div>
                </div>
            </div>
        {{-- End Admin --}}
    @else
        {{-- Pembaca --}}
            <div class="card">
                <div class="card-header">
                    <h4>Koleksi Kamu</h4>
                    <div class="card-header-action">
                        <a href="{{ route('koleksi.index') }}" class="btn btn-primary">Lihat semua <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive table-invoice">
                        <table class="table table-striped">
                            <tr>
                                <th>Judul Buku</th>
                                <th>Kategori</th>
                                <th>Action</th>
                            </tr>
                            {{-- Looping Koleksi --}}
                            @forelse ($data['koleksi'] as $item)
                                <tr>
                                    <td>{{ $item->buku->judul }}</td>
                                    <td>{{ $item->buku->kategori->kategori }}</td>
                                    <td>
                                        <a href="{{ route('pustaka.show', $item->buku->slug) }}" class="btn btn-sm btn-info">Detail</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Belum ada data :(</td>
                                </tr>
                            @endforelse
                            {{-- End Looping Koleksi --}}
                        </table>
                    </div>
                </div>
            </div>
        {{-- End Pembaca --}}
    @endif
</div>
