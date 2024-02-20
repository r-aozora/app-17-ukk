<div class="row">
    <div class="col-12">
        @if (Auth::user()->role !== 'pembaca')
            {{-- Admin --}}
            <div class="card">
                <div class="card-header">
                    <h4>Peminjaman</h4>
                    <div class="card-header-action">
                        <a href="#" class="btn btn-primary">Lihat semua <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive table-invoice">
                        <table class="table table-striped">
                            <tr>
                                <th>Invoice ID</th>
                                <th>Peminjam</th>
                                <th>Waktu</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tenggat</th>
                                <th>Tanggal Kembali</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            {{-- Looping Peminjaman --}}
                            @forelse ($data['pinjam'] as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->created_at->format('j-n-Y') }}</td>
                                    <td>{{ $item->tgl_pinjam ?? '-' }}</td>
                                    <td>{{ $item->tenggat ?? '-' }}</td>
                                    <td>{{ $item->tgl_kembali ?? '-' }}</td>
                                    <td>
                                        @switch($item->status)
                                            @case('0')
                                                <div class="badge badge-warning">Dipesan</div>
                                                @break
                                            @case('1')
                                                <div class="badge badge-info">Dipinjam</div>
                                                @break
                                            @case('2')
                                                <div class="badge badge-success">Dikembalikan</div>
                                                @break
                                            @default
                                        @endswitch
                                    </td>
                                    <td>
                                        <a href="{{ route('peminjaman.show', $item->invoice) }}" class="btn btn-sm btn-info">Detail</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Belum ada data :(</td>
                                </tr>
                            @endforelse
                            {{-- End Looping Peminjaman --}}
                        </table>
                    </div>
                </div>
            </div>
            {{-- End Admin --}}
        @else
            {{-- Pembaca --}}
            <div class="card">
                <div class="card-header">
                    <h4>Peminjaman Terbaru Kamu</h4>
                    <div class="card-header-action">
                        <a href="{{ route('pinjam.index') }}" class="btn btn-primary">Lihat semua <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive table-invoice">
                        <table class="table table-striped">
                            <tr>
                                <th>Invoice ID</th>
                                <th>Waktu</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tenggat</th>
                                <th>Tanggal Kembali</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            {{-- Looping Peminjaman --}}
                            @forelse ($data['pinjam'] as $item)
                                <tr>
                                    <td>{{ $item->invoice }}</td>
                                    <td>{{ $item->created_at->format('j-n-Y') }}</td>
                                    <td>{{ $item->tgl_pinjam ?? '-' }}</td>
                                    <td>{{ $item->tenggat ?? '-' }}</td>
                                    <td>{{ $item->tgl_kembali ?? '-' }}</td>
                                    <td>
                                        @switch($item->status)
                                            @case('0')
                                                <div class="badge badge-warning">Dipesan</div>
                                                @break
                                            @case('1')
                                                <div class="badge badge-info">Dipinjam</div>
                                                @break
                                            @case('2')
                                                <div class="badge badge-success">Dikembalikan</div>
                                                @break
                                            @default
                                        @endswitch
                                    </td>
                                    <td>
                                        <a href="{{ route('pinjam.show', $item->invoice) }}" class="btn btn-sm btn-info">Detail</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Belum ada data :(</td>
                                </tr>
                            @endforelse
                            {{-- End Looping Peminjaman --}}
                        </table>
                    </div>
                </div>
            </div>
            {{-- End Pembaca --}}
        @endif
    </div>
</div>
