@extends('layouts.app')

@section('link')
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('peminjaman.index') }}" class="btn btn-icon">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <h1>{{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">Perpustakaan</div>
                    <div class="breadcrumb-item active">
                        <a href="{{ route('peminjaman.index') }}">Peminjaman</a>
                    </div>
                    <div class="breadcrumb-item">{{ $title }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="invoice">
                    <div class="invoice-print">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="invoice-title">
                                    <h2>Invoice</h2>
                                    <div class="invoice-number">{{ $pinjam->invoice }}</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <address>
                                            <strong>Peminjam:</strong><br>
                                            {{ $pinjam->user->name }}<br>
                                            {{ '@' . $pinjam->user->username }}<br>
                                            {{ $pinjam->user->alamat }}
                                        </address>
                                    </div>
                                    <div class="col-md-6 text-md-right">
                                        <address>
                                            <strong>Kontak Peminjam:</strong><br>
                                            {{ $pinjam->user->email }}<br>
                                            {{ $pinjam->user->telepon }}
                                        </address>
                                        <address>
                                            <strong>Waktu:</strong><br>
                                            {{ $pinjam->created_at->format('j-n-Y') }}
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="section-title">Buku yang dipinjam</div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-md">
                                        <tr>
                                            <th data-width="40">No</th>
                                            <th>Sampul Buku</th>
                                            <th class="text-center">Judul Buku</th>
                                            <th class="text-center">Kategori</th>
                                            <th class="text-right">Jumlah Pinjam</th>
                                        </tr>
                                        {{-- Looping Detail Peminjaman --}}
                                        @forelse ($pinjam->detail as $buku)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img src="{{ asset($buku->buku->gambar) }}" alt="{{ $buku->buku->judul }}" height="100">
                                                </td>
                                                <td class="text-center">{{ $buku->buku->judul }}</td>
                                                <td class="text-center">{{ $buku->buku->kategori->kategori }}</td>
                                                <td class="text-right">{{ $buku->jumlah }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Tidak ada detail</td>
                                            </tr>
                                        @endforelse
                                        {{-- End Looping Detail Peminjaman --}}
                                    </table>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-lg-8">
                                        <div class="section-title">Status Peminjaman</div>
                                        <div class="images">
                                            @switch($pinjam->status)
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
                                        </div>
                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Tanggal Peminjaman</div>
                                            <div class="invoice-detail-value">{{ $pinjam->tgl_pinjam ?? '-' }}</div>
                                        </div>
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Tenggat Pengembalian</div>
                                            <div class="invoice-detail-value">{{ $pinjam->tenggat ?? '-' }}</div>
                                        </div>
                                        <hr class="mt-2 mb-2">
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Tanggal Pengembalian</div>
                                            <div class="invoice-detail-value invoice-detail-value-lg">{{ $pinjam->tgl_kembali ?? '-' }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="text-md-right">
                        @if ($pinjam->status === '0')
                            <form action="{{ route('peminjaman.update', $pinjam->invoice) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="1">
                                <button type="submit" class="btn btn-info">Dipinjam</button>
                            </form>
                        @endif
                        @if ($pinjam->status === '1')
                            <form action="{{ route('peminjaman.update', $pinjam->invoice) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="2">
                                <button type="submit" class="btn btn-success">Dikembalikan</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
@endsection
