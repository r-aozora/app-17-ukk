@extends('layouts.app')

@section('link')
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">Perpustakaan</div>
                    <div class="breadcrumb-item">{{ $title }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    {{-- Looping Koleksi --}}
                    @forelse ($koleksi as $item)
                        <div class="col-12 col-md-6 col-lg-3">
                            <article class="article article-style-b">
                                <div class="article-header">
                                    <div class="article-image" data-background="{{ asset($item->buku->gambar) }}"></div>
                                    <div class="article-badge">
                                        <div class="article-badge-item bg-primary">{{ $item->buku->kategori->kategori }}</div>
                                    </div>
                                </div>
                                <div class="article-details">
                                    <div class="article-title">
                                        <h2><a href="{{ route('pustaka.show', $item->buku->slug) }}">{{ $item->buku->judul }}</a></h2>
                                    </div>
                                    <p>
                                        @if (strlen($item->buku->deskripsi) > 100)
                                            {{ substr($item->buku->deskripsi, 0, 100) }}...
                                        @else
                                            {{ $item->buku->deskripsi }}
                                        @endif
                                    </p>
                                    <div class="article-cta">
                                        <a href="{{ route('koleksi.destroy', $item->id) }}" class="btn btn-danger" data-confirm-delete="true">Hapus dari Koleksi</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="empty-state" data-height="400">
                                        <div class="empty-state-icon">
                                            <i class="fas fa-question"></i>
                                        </div>
                                        <h2>Koleksi masih kosong</h2>
                                        <p class="lead">
                                            Kamu belum menambahkan buku ke koleksi kamu. Cari buku yang ingin kamu tambahkan di Pustaka Buku.
                                        </p>
                                        <a href="{{ route('pustaka.index') }}" class="btn btn-primary mt-4">Pustaka Buku</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse
                    {{-- End Looping --}}
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
@endsection
