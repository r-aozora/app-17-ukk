<div class="col-lg-6">
    @if (Auth::user()->role !== 'pembaca')
        {{-- Admin --}}
            <div class="card">
                <div class="card-header">
                    <h4>Ulasan</h4>
                    <div class="card-header-action">
                        <a href="{{ route('ulasan.index') }}" class="btn btn-primary">Lihat semua <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive table-invoice">
                        <table class="table table-striped">
                            <tr>
                                <th>Dari</th>
                                <th>Untuk Buku</th>
                                <th>Rating</th>
                                <th>Action</th>
                            </tr>
                            {{-- Looping Ulasan --}}
                            @forelse ($data['ulasan'] as $item)
                                <tr>
                                    <td>{{ '@' . $item->user->username }}</td>
                                    <td>{{ $item->buku->judul }}</td>
                                    <td>
                                        <span class="badge badge-{{ $item->rating > 3 ? 'success' : 'warning' }}">
                                            {{ $item->rating }} <i class="fas fa-star"></i>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('ulasan.index') }}" class="btn btn-sm btn-info">Detail</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Belum ada data :(</td>
                                </tr>
                            @endforelse
                            {{-- End Looping Ulasan --}}
                        </table>
                    </div>
                </div>
            </div>
        {{-- End Admin --}}
    @else
        {{-- Pembaca --}}
            <div class="card">
                <div class="card-header">
                    <h4>Ulasan Kamu</h4>
                    <div class="card-header-action">
                        <a href="{{ route('ulasan.index') }}" class="btn btn-primary">Lihat semua <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive table-invoice">
                        <table class="table table-striped">
                            <tr>
                                <th>Untuk Buku</th>
                                <th>Rating</th>
                                <th>Action</th>
                            </tr>
                            {{-- Looping Ulasan --}}
                            @forelse ($data['ulasan'] as $item)
                                <tr>
                                    <td>{{ $item->buku->judul }}</td>
                                    <td>
                                        <span class="badge badge-{{ $item->rating > 3 ? 'success' : 'danger' }}">
                                            {{ $item->rating }} <i class="fas fa-star"></i>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('ulasan.index') }}" class="btn btn-sm btn-info">Detail</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Belum ada data :(</td>
                                </tr>
                            @endforelse
                            {{-- End Looping Ulasan --}}
                        </table>
                    </div>
                </div>
            </div>
        {{-- End Pembaca --}}
    @endif
</div>
