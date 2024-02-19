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
                        <a href="#">Dashboard</a>
                    </div>
                    <div class="breadcrumb-item">Perpustakaan</div>
                    <div class="breadcrumb-item">{{ $title }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="section-title mt-0">Cari Buku</div>
                                <form action="#" method="GET">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="Cari buku..." value="">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">Cari</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{-- Looping Pustaka --}}
                        <div class="col-12 col-md-4 col-lg-4">
                            <article class="article article-style-c">
                                <div class="article-header">
                                    <div class="article-image" data-background="{{ asset('images/buku.png') }}"></div>
                                </div>
                                <div class="article-details">
                                    <div class="article-category">
                                        <a href="#">Kategori</a>
                                        <div class="bullet"></div>
                                        <a href="#">Stok tersisa</a>
                                        <div class="bullet"></div>
                                        <a href="#">Rating<i class="fas fa-star"></i></a>
                                    </div>
                                    <div class="article-title">
                                        <h2><a href="#">Nama Buku</a></h2>
                                    </div>
                                    <p>Deskripsi</p>
                                    <div class="article-user">
                                        <div class="article-user-details">
                                            <div class="user-detail-name">
                                                <a href="#">Penulis</a>
                                            </div>
                                            <div class="text-job">
                                                Penerbit
                                                <div class="bullet"></div>
                                                Tahun Terbit
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
@endsection
