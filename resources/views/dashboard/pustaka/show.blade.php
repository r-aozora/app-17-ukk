@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/modules/chocolat/dist/css/chocolat.css') }}">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('pustaka.index') }}" class="btn btn-icon">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <h1>{{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">Perpustakaan</div>
                    <div class="breadcrumb-item">
                        <a href="{{ route('pustaka.index') }}">Pustaka Buku</a>
                    </div>
                    <div class="breadcrumb-item">Detail Buku</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Detail Buku</h4>
                            </div>
                            <div class="card-body">
                                <a href="#" class="btn btn-primary btn-icon icon-left btn-lg btn-block mb-4 d-md-none" data-toggle-slide="#ticket-items">
                                    <i class="fas fa-list"></i> Ulasan Buku
                                </a>
                                <div class="tickets row">
                                    <div class="col-12 col-lg-4 ticket-items" id="ticket-items">
                                        {{-- Looping Ulasan --}}
                                        @forelse ($pustaka->ulasan as $item)
                                            <a href="#" class="btn-show" data-toggle="modal" data-target="#show-ulasan-{{ $item->id }}">
                                                <div class="ticket-item">
                                                    <div class="ticket-title">
                                                        <h4>{{ $item->ulasan }}</h4>
                                                    </div>
                                                    <div class="ticket-desc">
                                                        <div>{{ $item->user->name }}</div>
                                                        <div class="bullet"></div>
                                                        <div>{{ $item->rating }} <i class="fas fa-star"></i></div>
                                                        <div class="bullet"></div>
                                                        <div>{{ $item->created_at->format('j-n-Y') }}</div>
                                                    </div>
                                                </div>
                                            </a>
                                        @empty
                                            <div class="text-center">Belum ada ulasan :(</div>
                                        @endforelse
                                        {{-- End Looping Ulasan --}}
                                    </div>
                                    <div class="col-12 col-lg-8 ticket-content">
                                        <div class="ticket-header">
                                            <div class="ticket-detail">
                                                <div class="ticket-title">
                                                    <h4>{{ $pustaka->judul }}</h4>
                                                </div>
                                                <div class="ticket-info">
                                                    <div class="font-weight-600">{{ $pustaka->penulis }}</div>
                                                    <div class="bullet"></div>
                                                    <div class="font-weight-600">{{ $pustaka->penerbit }}</div>
                                                    <div class="bullet"></div>
                                                    <div class="font-weight-600">{{ $pustaka->tahun }}</div>
                                                    <div class="bullet"></div>
                                                    <div class="font-weight-600">{{ number_format($pustaka->ulasan_avg_rating, 1) }} <i class="fas fa-star"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ticket-description">
                                            <div class="gallery gallery-fw" data-item-height="300">
                                                <div class="gallery-item" data-image="{{ asset($pustaka->gambar) }}" data-title="{{ $pustaka->judul }}"></div>
                                            </div>
                                            {{ $pustaka->deskripsi }}
                                            <div class="ticket-divider"></div>
                                            <div class="ticket-form">
                                                @if (!$koleksi)
                                                    <form action="{{ route('koleksi.store') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="user" value="{{ Auth::id() }}">
                                                        <input type="hidden" name="buku" value="{{ $pustaka->id }}">
                                                        <button type="submit" class="btn btn-lg btn-primary">
                                                            <i class="fas fa-star"></i> Tambah ke Koleksi
                                                        </button>
                                                    </form>
                                                @endif
                                                @if ($pinjam)
                                                    <form action="{{ route('ulasan.store') }}" method="POST" novalidate>
                                                        @csrf
                                                        <div class="section-title">{{ $ulasan ? 'Edit' : 'Tulis' }} Ulasan dan Rating Kamu</div>
                                                        <input type="hidden" name="user" value="{{ Auth::id() }}">
                                                        <input type="hidden" name="buku" value="{{ $pustaka->id }}">
                                                        <div class="form-group">
                                                            <label for="rating">Rating</label>
                                                            <div class="selectgroup selectgroup-pills">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    <label class="selectgroup-item">
                                                                        <input type="radio" name="rating" value="{{ $i }}" class="selectgroup-input" {{ $i == $ulasan?->rating ? 'checked' : '' }} required>
                                                                        <span class="selectgroup-button selectgroup-button-icon">
                                                                            {{ $i }} <i class="fas fa-star"></i>
                                                                        </span>
                                                                    </label>
                                                                @endfor
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="ulasan">Ulasan</label>
                                                            <textarea class="form-control" name="ulasan" id="ulasan" style="height: 150px" placeholder="Tulis ulasan kamu..." required>{{ $ulasan ? $ulasan->ulasan : old('ulasan') }}</textarea>
                                                        </div>
                                                        <div class="form-group text-right">
                                                            <button type="submit" class="btn btn-primary btn-lg">Posting</button>
                                                        </div>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('dashboard.ulasan.show', ['ulasan' => $pustaka->ulasan])
@endsection

@section('script')
    <script src="{{ asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
@endsection
